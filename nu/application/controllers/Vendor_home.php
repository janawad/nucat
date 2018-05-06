<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_home extends CI_Controller {
 function __construct()
  {
	parent::__construct();
	$this->load->library(array('table','form_validation','email'));
	$this->load->helper(array('form', 'url'));
	$this->load->model('vendors_model','',TRUE);
	$this->load->model('buyers_model','',TRUE);
	$this->load->model('sadmin_model','',TRUE);
	date_default_timezone_set('Asia/Kolkata');
  }
  
  function index(){
  if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['id'] = $session_data['id'];
     $data['vendor_name'] = $session_data['vendor_name'];
     $data['menu_active'] = 'vendor_home';
     $data['page_title'] = 'Dashboard';

     $products = (array)$this->vendors_model->get_products_by_id1($data['id'])->result();
     if($products != null){
        
        $table='';
        $table .= '<table class="table table-hover table-nowrap latest-products">';
        $table .='<thead>
                 <tr>
                 <th width="5%">#</th>
                 <th width="25%">Brand</th>
                 <th width="25%">Product ID</th>
                 <th width="15%">Inventory</th>
                 <th width="15%">Availability</th>
                 <th width="15%">Status</th>
                 </tr>
                 </thead>
                 <tbody>';

        
        $i = 1;
        foreach ($products as $products1) {
            $status = $products1->status;
			if($status == '0')
				$status1 = '<span class="label label-default">Rejected</span>';
			if($status == '1')
				$status1 = '<span class="label label-success">Accepted</span>';
			if($status == '2')
				$status1 = '<span class="label label-warning">
				
				
				
				
				
				
				
				
				
				
				</span>';
				    
            $list = '<ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>'.anchor('categories/product_accept/'.$products1->id,'<i class="icon-database-check"></i> Accept').'</li>
                                <li>'.anchor('categories/product_reject/'.$products1->id,'<i class="icon-database-remove"></i> Reject').'</li>
                                <li class="divider"></li>
                                <li>'.anchor('categories/view_product/'.$products1->id,'<i class="icon-file-eye"></i> View').'</li>
                                <li>'.anchor('categories/delete_product/'.$products1->id,'<i class="icon-cross3"></i> Delete', array('class'=>'editcls text-danger','onclick'=>"return confirm('Are you sure you want to Delete ?')")).'</li>
                            </ul>
                        </li>
                    </ul>';
            $actions_list = array('data' => $list, 'class' => 'text-center');
            $i++;
            
            $table .='<tr>
                       <td>'.$i.'</td>
                       <td>'.anchor('vendor_home/view_product/'.$products1->id,$products1->brand_name).'</td>
                       <td>'.anchor('vendor_home/view_product/'.$products1->id, $products1->product_id).'</td>
                       <td>'.$products1->inventory.'</td>
                       <td>'.$products1->availability.'</td>
                       <td>'.$status1.'</td>
                     </tr>';
            
        }
         $table .='</tbody>
                   </table>';

        $data['products_table'] = $table;
     }else{
        $data['products_table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new products found..!</h6></center>";
     }  


     $orders = $this->vendors_model->get_recent_orders($data['id'])->result();
     // print_r($orders); 
     if($orders != null){
     	$this->load->library('table');
        $this->table->set_empty("");
        
        $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap">');
        $this->table->set_template($table_setup);
        $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
        $this->table->set_heading('#',
                                  'Order ID',
                                  'Buyer Name',
                                  'Status'
                                );
        $i = 1;
        foreach ($orders as $orders1) {
            $status = $orders1->status;
			if($status == '1')
				$status1 = '<span class="label label-success">Pending</span>';
			if($status == '2')
				$status1 = '<span class="label label-warning">Delivered</span>';
		  $buyer_det = (array)$this->vendors_model->get_buyer_det($orders1->buyer_id)->row();		    
           $this->table->add_row($i++, 
                                    anchor('vendor_home/view_order/'.$orders1->id.'/'.$orders1->buyer_id,$orders1->order_id),
                                    anchor('vendor_home/buyer_det/'.$orders1->buyer_id, ucwords($buyer_det['buyer_name'])),
                                    $status1
                                );
        }
     	$data['orders_table'] = $this->table->generate();
     }else{
     	$data['orders_table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new orders found..!</h6></center>";
     }

     $this->vendor_template->show('vendor_home/index', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('vendor', 'refresh');
   }
  }
  
  function profile()
  {
	if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['menu_active'] = '';
		$data['page_title'] = 'Profile';
		
		if($this->uri->segment(3) == 'success')
		{
			$data['msg'] = 'Successfully updated the profile details';
			$data['cls'] = 'alert alert-success';
		}
		elseif($this->uri->segment(3) == 'request')
		{
			$data['msg'] = 'Your Request for Mobile and/or TIN no change is successfully sent to admin...!!!';
			$data['cls'] = 'alert alert-success';
		}
		else
		{
			$data['msg'] = '';
			$data['cls'] = '';
		}
		
		$data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
		$this->vendor_template->show('vendor_home/profile', $data);
	}else{
		redirect('vendor', 'refresh');
	}
  }

  function change_password()
  {
	if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['menu_active'] = '';
		$data['page_title'] = 'Change Password';
		
	  if($this->uri->segment(3)=='same')
      {
        $data['message'] = 'Both Passwords should not be same.';
        $data['cls'] = 'text-danger';
      }elseif($this->uri->segment(3)=='error'){
        $data['message'] = 'Current password not correct.';
        $data['cls'] = 'text-danger';
      }elseif($this->uri->segment(3)=='success'){
        $data['message'] = 'Password changed successfully.';
        $data['cls'] = 'text-success';
      }else{
        $data['message'] = '';
        $data['cls'] = '';
      }
		
	  // $data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
	  
	 $this->_changepassword_set_rules();  
     if ($this->form_validation->run() === FALSE){
      $this->vendor_template->show('vendor_home/change_password', $data);
     }else{
       $current_password = $this->input->post('current_password');
       $new_password = $this->input->post('new_password');
       $cnt = strcmp($current_password, $new_password);
       
       if(!$cnt){ 
        // CURRENT AND NEW PASSWORD SHOULD NOT BE SAME
        $url = 'vendor_home/change_password/same';
        echo'<script>window.location.href = "'.base_url().''.$url.'";</script>';
       }else{
            $password_details = array('password' => md5($new_password),
                                      'updated_by'=>$data['vendor_name'],
                                      'updated_on'=>date('Y-m-d H:i:s'),
                                    );
       
            $id = $this->vendors_model->change_password($password_details,$current_password, $data['email']);

            if($id == 0){
              $url = 'vendor_home/change_password/error';
              echo '<script>window.location.href = "'.base_url().''.$url.'";</script>';
            }else{
              $url = 'vendor_home/change_password_success';
              echo '<script>window.location.href = "'.base_url().''.$url.'";</script>';
            }

       }

     }

	}else{
		redirect('vendor', 'refresh');
	}
  }

  function change_password_success()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   $this->login_template->show('vendor/changed');
 }
   
  
		function request_change()
		{
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
				$data['id'] = $session_data['id'];
				$data['vendor_name'] = $session_data['vendor_name'];
				$data['email'] = $session_data['email'];
				$data['menu_active'] = '';
				
				// REQUEST ID GENERATOR
				$request_id = 'RES'.uniqid();
				//echo $request_id;
				
				$det = array('request_id' => $request_id,
								'user_type' =>'2',
								'user_id' => $data['id'],
								'status' => '1',
								'updated_on' => date('Y-m-d H:i:s'));
								
				$this->buyers_model->insert_det($det);
				
				//send email to admin
				$config['protocol'] = 'sendmail';
        		$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
				$email = "nucatalog@hotmail.com";
				
				$this->email->from($data['email'], 'NuCatalog');
				$this->email->to($email);
				
				$html = 'Dear <b>Admin</b>, <br><br> <p>Requesting for change in Mobile no. and/or TIN no. for my current account.</p> <br> <br> Thanks and Regards, <br> '.$data['vendor_name'];
				//echo $html;
				$this->email->subject('NuCatalog.com - Request for Changes in Profile.');
 				$this->email->message($html);
 				$this->email->send();
				
				//send email to buyer
				$config['protocol'] = 'sendmail';
        		$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
				$email = $data['email'];
				
				$this->email->from('nucatalog@hotmail.com', 'NuCatalog');
				$this->email->to($email);
				
				$html = 'Dear <b>'.$data['vendor_name'].'</b>, <br> <p>Your Request for change in Mobile no and/or TIN no is in progress. We`ll get back to you within 24Hrs.</p> <br>Your Request ID : '.$request_id.'<br>  Thanks and Regards, <br> Team NuCatalog <br>www.nucatalog.com';
				//echo $html;
				$this->email->subject('NuCatalog.com - Request for Changes in Profile.');
 				$this->email->message($html);
 				$this->email->send();
				
				redirect('vendor_home/profile/request');
			}
			else
			{
				redirect('welcome');
			}
		}
  
	function profile_edit()
	{	
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['email'] = $session_data['email'];
			$data['menu_active'] = '';
			$data['page_title'] = 'Edit Profile';
			
			$data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
			
			$this->vendor_template->show('vendor_home/edit_profile', $data);
		}
		else
		{
			redirect('vendor', 'refresh');
		}
	}
	
	function profile_update()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['email'] = $session_data['email'];
			$data['menu_active'] = '';
			$data['page_title'] = 'Edit Profile';
			
			$vendor_name = $this->input->post('vendor_name');
			$add = $this->input->post('add');
			$ph = $this->input->post('ph');
			$bname = $this->input->post('bname');
			$off_ph = $this->input->post('off_ph');
			$brand = $this->input->post('brand');
			$today = date('Y-m-d H:i:s');
			
			$det = array('vendor_name' => $vendor_name,
							'business_name' => $bname,
							'address' => $add,
							'brand' => $brand,
							'phone' => $ph,
							'office' => $off_ph,
							'updated_on' => $today);
			
			$this->vendors_model->update_ven_det($data['email'],$det);
			
			redirect('vendor_home/profile/success');
		}
		else
		{
			redirect('vendor', 'refresh');
		}
	}
  function add_product()
  {
  	if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		$data['menu_active'] = 'products';
		$data['page_title'] = 'Add Product';
		$data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
		
		$data['action'] = 'vendor_home/add_product';
		$data['a'] = '0';
		 
	    if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Product added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Product successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Product Deleted successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
		
		     $data['product']['parent_category']='';	
		     $data['product']['category']      ='';		
		   	 $data['product']['brand_name' ]	='';		   	 								   	 						
		   	 $data['product']['product_id'] 	='';
		   	 $data['product']['product_fit'] 	='';
		   	 $data['product']['fabric'] 		='';
		   	 $data['product']['colors']		='';
		   	
		   	 $data['product']['sub_colors' ]	='';
		   	 $data['product']['sales_packages'] ='';
		   	 $data['product']['style'] 			='';
		   	 $data['product']['inventory'] 		='';
		   	 $data['product']['availability'] 	='';
		   	 $data['product']['description'] 	='';
		   	 $data['product']['vendor_id'] 	    ='';
	
			
       $categories = (array)$this->sadmin_model->get_categories()->result();   
	   $data['options'] = $this->sadmin_model->categories_list1();
	   $data['options1'] = array ('' => 'Select Category');
	   $data['colors'] = (array)$this->sadmin_model->get_info('colors')->result();
	   
	
		$this->set_rules();
	if($this->form_validation->run() == false)
		   {
		     
		 $this->vendor_template->show('vendor_home/prodcuts_add', $data);
		   }
		   else
		   {
		   		
		   		
		
		   		
		   		$checkboxArr = $this->input->post('colors');
                                $chkboxStr = implode(",",$checkboxArr);
		   	  
		   	
			 $insert_data = array(
		   	 						'category' 		=>$this->input->post('category1'),
		   	 						'parent_category' 	=>$this->input->post('category'),
		   	 						'brand_name' 		=>$this->input->post('brand_name'),		   	 								   	 						
		   	 						'product_id' 		=>$this->input->post('product_id'),
		   	 						'product_fit' 		=>$this->input->post('product_fit'),
		   	 						'fabric' 		=>$this->input->post('fabric'),
		   	 						'colors' 		=>$chkboxStr,
		   	 						
		   	                                                'sub_colors' 		=>$this->input->post('sub_colors'),
		   	 						'sales_packages' 	=>$this->input->post('sales_packages'),
		   	 						'style' 		=>$this->input->post('style'),
		   	 						'inventory' 		=>$this->input->post('inventory'),
		   	 						'availability' 		=>$this->input->post('availability'),
		   	 						'description' 		=>$this->input->post('description'),
		   	 						'vendor_id' 	    =>$data['id'],		   	 						
		   	 						'status' 	        =>'2',
		   	                     			 );	
		   	                     			 	
		   	
		   					$product_id = $this->vendors_model->add_product($insert_data);
                    
		   					redirect('vendor_home/add_product1/'.$product_id.'/0', 'refresh');		   	
		   }
		
		
	}
	else
	{
		redirect('vendor', 'refresh');
	}
  	
  }
  	function add_product1($product_id,$a)
  	{
 
  		if($this->session->userdata('logged_in'))
		{
	  	    $session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['email'] = $session_data['email'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'products';
			$data['page_title'] = 'Add Price';
			$data['action'] = 'vendor_home/add_product1/'.$product_id.'/'.$a;
			$data['a']  = $a;
			$data['pid'] = $product_id;
			
			$prices = (array)$this->vendors_model->get_prices($product_id)->result();
			//print_r($prices);
		
			if ($this->uri->segment(4)=='price_success')
			{
				$data['message'] = 'Price Successfully Added..!';
				$data['cls'] = 'alert alert-success';
			}
			elseif ($this->uri->segment(4)=='suspend_success')
			{
				$data['message'] = 'Price Deleted Successfully..!';
				$data['cls'] = 'alert alert-danger';
			}
			elseif ( $this->uri->segment(4) == 'update_success')
			{
				$data['message'] = 'Price Successfully Updated..!';
				$data['cls'] = 'alert alert-success';
			}
	     	elseif ( $this->uri->segment(4) == 'update_product')
			{
				$data['message'] = 'Product Successfully Updated..!';
				$data['cls'] = 'alert alert-success';
			}
			else
			{
				$data['message'] = '';
				$data['cls'] = '';
			}      
			
			$data['prices'] = $prices;
		 	$product = (array)$this->vendors_model->get_product($product_id)->row();		
		 	$data['options'] = $this->sadmin_model->get_sizes_list($product['category']);
			//print_r($product['category']);exit;
		
			$this->form_validation->set_rules('sizes', 'Size From', 'trim|required|xss_clean');
			$this->form_validation->set_rules('sizes1', 'Size To', 'trim|required|xss_clean');
	        $this->form_validation->set_rules('price', 'Price', 'trim|required|is_numeric|xss_clean');  
			
	        if($this->form_validation->run() == FALSE)
		   	{
		     	$data['price'] ='';
		     	$data['size'] ='';
		     	$data['size1'] ='';
		    	
		     	$this->vendor_template->show('vendor_home/prodcuts_add1', $data);
		   	}
		   	else
		   	{
                       //   echo 123;exit;
		   	 	$insert_data= array ('price'      => $this->input->post('price'),
		   	 					  'sizes_from' => $this->input->post('sizes'),
		   	 					  'sizes_to' => $this->input->post('sizes1'),		   	 					 
		   	 					  'Product_id' => $product_id		   	 
		   	                      );
                              $this->vendors_model->UpdateP_price($product_id);
		   	
		   	   	$this->vendors_model->add_price($insert_data);
		   		
		   	 	redirect('vendor_home/add_product1/'.$product_id.'/'.$a);
		   	}
		}
		else
		{
			redirect('vendor', 'refresh');
		}
  	}
  	
  	function add_product2($product_id,$a){
  		if($this->session->userdata('logged_in'))
		{
	  	    $session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['email'] = $session_data['email'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'products';
			$data['page_title'] = 'Upload Images';
			$data['pid'] = $product_id;
			$data['a'] = $a;
			
			$tb_name = 'products_images';
			$data['imgs'] = (array)$this->vendors_model->get_images($product_id)->result();
			
			$this->form_validation->set_rules('pid','pid','trim');
			if ($this->form_validation->run() === false){
				$data['error'] = '';
				
				$this->vendor_template->show('vendor_home/prodcuts_add2',$data);
			}else {
				$img_name = $_FILES['photo'];
				$image_info = getimagesize($_FILES["photo"]["tmp_name"]);
				$image_width = $image_info[0];
				$image_height = $image_info[1];
				
				
			
				$config['upload_path'] = './images_products';
				$config['allowed_types'] = 'jpeg|jpg|png';
			  	$config['overwrite'] = false;
			  	
			  	$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->set_allowed_types('jpeg|jpg|png');
				$data['upload_data'] = '';
				//echo $image_width;exit;
				
				//if not successful, set the error message
				if (!$this->upload->do_upload('photo')) {
					
					$data['error'] = $this->upload->display_errors();
						
					$this->vendor_template->show('vendor_home/prodcuts_add2',$data);
				}else {
					if(($image_width>2000) &&($image_height>2000) ){
						$data['error'] = 'Please upload image of Width 2000px and Height 2000px';
					
					}else{
				
					$upload_data = $this->upload->data();
					$data['upload_data'] = $upload_data;
					
					$image_config['image_library'] = 'gd2';
					$image_config['source_image'] = $upload_data["full_path"];
					$image_config['new_image'] = $upload_data["file_path"].'prd_img_'.$product_id.'_'.$img_name['name'];
					$image_config['quality'] = "100%";
					$image_config['maintain_ratio'] = FALSE;
					$image_config['max_size'] = "2048000";
					$image_config['max_width'] = "2000";
					$image_config['max_height'] = "2000";
					$image_config['x_axis'] = '0';
					$image_config['y_axis'] = '0';
					
					$this->load->library('image_lib');
					$img = 'prd_img_'.$product_id.'_'.$img_name['name'];
					
					$this->image_lib->clear();
					$this->image_lib->initialize($image_config); 
					$this->image_lib->resize();
					unlink($upload_data["full_path"]);
					
					$det = array('image_name'=>$img, 'product_id'=>$product_id);
					$this->vendors_model->add_images($det);	
                                        $this->vendors_model->addUpdate_images($product_id,$img);					
				}
				}
				redirect('vendor_home/add_product2/'.$product_id.'/'.$a);			
			}
		}else {
			redirect('vendor', 'refresh');
		}
  	}
  	
  	function product_img_del($id,$product_id,$a){
  		if($this->session->userdata('logged_in')) {
	  	    $session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['email'] = $session_data['email'];
			$data['id'] = $session_data['id'];
			$data['a'] = $a;
			
			$tb_name = 'products_images';
			$this->sadmin_model->delete_det($id,$tb_name);
			
			redirect('vendor_home/add_product2/'.$product_id.'/'.$a);  			
		}else {
			redirect('vendor', 'refresh');
		}
  	}
  	
  	function edit_price($product_id,$price_id)
  	{
  		if($this->session->userdata('logged_in'))
		{
  	    $session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		$data['menu_active'] = 'products';
		$data['page_title'] = 'Edit Price';
		$data['action'] = 'vendor_home/edit_price/'.$product_id.'/'.$price_id;
		$data['a']  = '1';
		$data['pid'] = $product_id;
		
		$prices = (array)$this->vendors_model->get_prices($product_id)->result();
		
		if ($this->uri->segment(4)=='add_success')
		{
			$data['message'] = 'Product Added Successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(4)=='price_success')
		{
			$data['message'] = 'Price Successfully Added..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(4)== 'update_success')
		{
			$data['message'] = 'Price Successfully Updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(4)=='suspend_success')
		{
			$data['message'] = 'Price Deleted Successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
		
		 $product = (array)$this->vendors_model->get_product($product_id)->row();		
		 $data['options'] = $this->sadmin_model->get_sizes_list($product['category']);
		 $price1 =(array)$this->vendors_model->get_price($price_id)->row(); 
		$data['prices'] = $prices;
		$this->form_validation->set_rules('sizes', 'Size From ', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sizes1', 'Size To ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|is_numeric|xss_clean');  
		if($this->form_validation->run() == FALSE)
		   {
		     $data['price'] = $price1['price'];
		     $data['size']  = $price1['sizes_from'];
		     $data['size1']  = $price1['sizes_to'];
		     //$data['size1'] = $price1['sizes_to'];
		     $this->vendor_template->show('vendor_home/prodcuts_add1', $data);
		   }
		   else
		   {
		   	 $insert_data= array ('price'      => $this->input->post('price'),
		   	 					  'sizes_from' => $this->input->post('sizes'),	
		   	 					  'sizes_to'   => $this->input->post('sizes1'),			   	 					
		   	 					  'Product_id' => $product_id		   	 
		   	                      );
		   	
		   	   $this->vendors_model->update_price($insert_data,$price_id);
		   	                      
		   	 redirect('vendor_home/add_product1/'.$product_id.'/update_success', 'refresh');
		   }
		
		
	}
	else
	{
		redirect('vendor', 'refresh');
	}
  	
  }
  function delete_price($product_id,$price_id,$a)
  {
  	if($this->session->userdata('logged_in'))
	{
  	    $session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		
		$this->vendors_model->delete_price($price_id);
		
		redirect('vendor_home/add_product1/'.$product_id.'/'.$a, 'refresh');
	
	}
	else 
	{
		redirect('vendor', 'refresh');
	}
  
  }
  function all_produtcs()
  {
  	if($this->session->userdata('logged_in'))
	{
  	    $session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		$data['menu_active'] = 'products';
		$data['page_title'] = 'All Products';
		$data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
		$products = (array)$this->vendors_model->get_products_by_id($data['id'])->result();
		
		
		
		 if($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Product added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Product successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Product Deleted successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
		
		
		
		$data['products'] = $products;
		
	if($products != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		                   );
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',															
								  'Brand',
								  'Product Id ',
								  'Produtc Fit',
								  'Fabric',
								  'Colors',
								  'Sales Packages',
								  'Style',
								  'Inventory',
								  'Availability',
								  'Status',
								  'Actions'						  
 								);
				$i = 1;
				foreach($products as $product)
				{
					$status = $product->status;
			        if($status == '0')
				    $status1 = '<span class="label label-default">Rejected</span>';
			        if($status == '1')
				    $status1 = '<span class="label label-success">Accepted</span>';
				    if($status == '2')
				    $status1 = '<span class="label label-warning">Pending</span>';
				    
				    $delete_link = anchor('vendor_home/delete_product/'.$product->id,'<span class="icon-trash text-danger"></i>',array('class'=>'editcls','onclick'=>"return confirm('Are you sure you want to Delete ?')"));
					
				$this->table->add_row($i++,	
										anchor('vendor_home/view_product/'.$product->id,$product->brand_name),	
										$product->product_id,	
										$product->product_fit,	
										$product->fabric,
										$product->colors.','.$product->sub_colors,							
										$product->sales_packages,	
										$product->style,	
										$product->inventory,	
										$product->availability,
										$status1,
										$delete_link	
							         	);
							         	
							         	
				}
		
	         $data['table'] = $this->table->generate();    
		}
		else
		{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/><h6 class="text-semibold text-center">No Prodcut List Found..!</h6></center>';
		}
		
		
		$this->vendor_template->show('vendor_home/prodcuts_all', $data);
	
		
	  }
	  else
	  {  	
	  	redirect('vendor', 'refresh');  
	  }
  }
  function delete_product($product_id)
  {
  	if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		
		$this->vendors_model->delete_product($product_id);		
		$this->vendors_model->delete_images($product_id);
		$this->vendors_model->delete_prices_product($product_id);
		redirect('vendor_home/all_produtcs/suspend_success');
	}
  else
	{  	
	  	redirect('vendor', 'refresh');  
	}  	
  }
  function view_product($product_id)
  {
  	 if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		$data['menu_active'] = 'products';
		$data['page_title'] = 'Update Product';
		$data['back'] = 'vendor_home/all_produtcs';
		$data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
		$data['product'] =(array)$this->vendors_model->get_product($product_id)->row();
		
		$data['colors'] =(array)$this->sadmin_model->get_by_id($data['product']['colors'],'colors')->row();
		$data['color_name'] = $data['colors']['color_name']; 

		$prices = (array)$this->vendors_model->get_prices($product_id)->result();
		$data['images'] =(array)$this->vendors_model->get_images($product_id)->result();
		
		
   $options1 = array();
   $options2 = array(''=>'--Select Category--');
   $categories = (array)$this->sadmin_model->get_categories()->result();
   
	if($categories != null){ 
       
		foreach ($categories as $categories1){
			if($categories1->id == $data['product']['parent_category'])
			{
				$data['category'] = $categories1->category_name;
			}
			
			if($categories1->parent_category_id != '0'){
			
//		$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			$category1 = (array)$this->sadmin_model->get_category($categories1->parent_category_id)->row();
			if($category1 != null)
			{				
				$main_name = $category1['category_name'] .' &nbsp;>&nbsp;';				
				$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();				
					if($category1 != null)
					{						
						$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;										
						$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();					
						if($category1 != null)
						{							
							        $main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;							       							
									$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
									if($category1 != null)
									{										
										$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;																				
										$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();									
										if($category1 != null)
										{										
											$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;																						
										    $category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
											if($category1 != null)
											{												
												$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;												
											}
											
										}
																		
									}							
						}
						
					}
				
			}
			else 
			{
				$main_name = '';
			}								
				$options1 = array($categories1->id => $main_name.$categories1->category_name);
				$options2 = $options2 + $options1 ;		
	     	}
		  }
		}
		$data['sub_category']	= $options2[$data['product']['category']];
		$data['prices'] = $prices;
		$this->vendor_template->show('vendor_home/view_product', $data);
	}
	else 
	{
		redirect('vendor','refresh');
	}
  	
  }
  function edit_product($product_id,$a)
  {
   if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		$data['menu_active'] = 'products';
		$data['page_title'] = 'Update Product';
		$data['Vendor'] = (array)$this->vendors_model->get_by_email($data['email'])->row();
		$data['product'] =(array)$this->vendors_model->get_product($product_id)->row();
		
		$data['action'] = 'vendor_home/edit_product/'.$product_id.'/'.$a;
		$data['a'] = $a;
		 
	    if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Product added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Product successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Product Deleted successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
		$data['options'] = $this->sadmin_model->categories_list1();
		 
   $options1 = array();
   $options2 = array(''=>'--Select Category--');
   $categories = (array)$this->sadmin_model->get_categories()->result();
   $data['colors'] = (array)$this->sadmin_model->get_info('colors')->result();
   
	if($categories != null){ 
       
		foreach ($categories as $categories1){
			
			if($categories1->parent_category_id != '0'){
			
//		$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			$category1 = (array)$this->sadmin_model->get_category($categories1->parent_category_id)->row();
			if($category1 != null)
			{				
				$main_name = $category1['category_name'] .' &nbsp;>&nbsp;';				
				$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();				
					if($category1 != null)
					{						
						$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;										
						$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();					
						if($category1 != null)
						{							
							        $main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;							       							
									$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
									if($category1 != null)
									{										
										$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;																				
										$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();									
										if($category1 != null)
										{										
											$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;																						
										    $category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
											if($category1 != null)
											{												
												$main_name = $category1['category_name'] .' &nbsp;>&nbsp;'.$main_name;												
											}
											else 
											{
												$main_name = $main_name; }
										}
										else 
										{	$main_name = $main_name;	}										
									}
									else 
									{$main_name = $main_name;}
						}
						else 
						{$main_name = $main_name;}
					}
					else 
					{	$main_name = $main_name; }
			}
			else 
			{
				$main_name = '';
			}								
				$options1 = array($categories1->id => $main_name.$categories1->category_name);
				$options2 = $options2 + $options1 ;		
	     	}
		  }
		}
		else
		{
			
		}
		
		$data['options1'] = $options2;
		
		$this->set_rules();
		if($this->form_validation->run() == FALSE)
		   {
		     
		    $this->vendor_template->show('vendor_home/prodcuts_add', $data);
		   }
		   else
		   {
		         $insert_data = array(  'category' 		    => $this->input->post('category1'),
			   	  	 					'parent_category' 	=> $this->input->post('category'),
			   	 						'brand_name' 		=> $this->input->post('brand_name'),		   	 								   	 						
			   	 						'product_id' 		=> $this->input->post('product_id'),
			   	 						'product_fit' 		=> $this->input->post('product_fit'),
			   	 						'fabric' 			=> $this->input->post('fabric'),
			   	 						'colors' 			=> $this->input->post('colors'),
			   	 			 			'sales_packages' 	=> $this->input->post('sales_packages'),
			   	 						'style' 			=> $this->input->post('style'),
			   	 						'inventory' 		=> $this->input->post('inventory'),
			   	 						'availability' 		=> $this->input->post('availability'),
			   	 						'description' 		=> $this->input->post('description')
		   	 						
		   	                      );	
		   	  	
		   	  
		   	                      
		   	                     $this->vendors_model->update_product($insert_data,$product_id);
		   	
		   	                     redirect('vendor_home/view_product/'.$product_id);
		   	
		   }
		
		
	}
	else
	{
		redirect('vendor', 'refresh');
	}
  	
  }
  
	function pending_orders()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'orders';
			$data['page_title'] = 'Recent Orders';
			
			if($this->uri->segment(3) == 'status_update')
			{
				$data['msg'] = 'Order Status Updated..!!';
				$data['cls'] = 'alert alert-success';
			}
			else
			{
				$data['msg'] = "";
				$data['cls'] = "";
			}
			
			$data['res'] =  $this->vendors_model->get_pending_orders($data['id'])->result();
			//echo '<pre>';print_r($data['res']);
			//$productdetaill = (array)$this->vendors_model->get_productid($product['cart_id'])->row();
			//print_r(productdetaill );
			//$Prices[]   = (array)$this->buyers_model->get_price($cart->size_id)->row();
			//$data['Prices'] = $Prices;
			$this->vendor_template->show('vendor_home/pending_order_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}  
	}

	function delivered_orders(){
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'delivered_orders';
			$data['page_title'] = 'Delivered Orders';
			
			if($this->uri->segment(3) == 'status_update')
			{
				$data['msg'] = 'Order Status Updated..!!';
				$data['cls'] = 'alert alert-success';
			}
			else
			{
				$data['msg'] = "";
				$data['cls'] = "";
			}
			
			$data['res'] = $this->vendors_model->get_delivered_orders($data['id'])->result();
			// print_r($data['res']);
			
			$this->vendor_template->show('vendor_home/delivered_orders_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}  
	}

	function delivered_orders_download(){
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'delivered_orders';
			$data['page_title'] = 'Delivered Orders';
			
			if($this->uri->segment(3) == 'status_update')
			{
				$data['msg'] = 'Order Status Updated..!!';
				$data['cls'] = 'alert alert-success';
			}
			else
			{
				$data['msg'] = "";
				$data['cls'] = "";
			}
			
			$res = $this->vendors_model->get_delivered_orders($data['id'])->result();
			// print_r($res); die;
			if($res){

				$this->load->library('table');
		        $this->table->set_empty("");
		        
		        $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap" border="1">');
		        $this->table->set_template($table_setup);

			// SET TABLE HEADING
			$this->table->set_heading('#',
									'Order ID',
									'Buyer Name',
									'Total Amount',
									'Status',
									'Order On',
									'Delivered On'
								);
						
			$i = 0;
				foreach ($res as $row){
					$buyer_det = (array)$this->vendors_model->get_buyer_det($row->buyer_id)->row();
					$cart_det = (array)$this->buyers_model->get_cart1($row->cart_id)->row();
					$price = (array)$this->buyers_model->get_price($cart_det['size_id'])->row();
					$product = (array)$this->buyers_model->get_product($price['product_id'])->row();

					$this->table->add_row(++$i,
										$row->order_id,
										ucwords($buyer_det['buyer_name']),
										($price['price'] * $cart_det['quantity'] * $product['sales_packages']),
										'Delivered',
										date('d-m-Y H:i A', strtotime($row->updated_on)),
										date('d-m-Y H:i A', strtotime($row->delivered_on))
								);
				}
			}else{
				$this->table->add_row('--No Records Found--');
			}
			$data['table'] = $this->table->generate();
			$data['file_name'] = 'Delivered Orders.xls';
			$this->load->view('excelview',$data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}

	function pending_orders_download(){
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'delivered_orders';
			$data['page_title'] = 'Delivered Orders';
			
			if($this->uri->segment(3) == 'status_update')
			{
				$data['msg'] = 'Order Status Updated..!!';
				$data['cls'] = 'alert alert-success';
			}
			else
			{
				$data['msg'] = "";
				$data['cls'] = "";
			}
			
			$res = $this->vendors_model->get_pending_orders($data['id'])->result();
			// print_r($res); die;
			if($res){

			// SET TABLE HEADING
				$this->load->library('table');
		        $this->table->set_empty("");
		        
		        $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap" border="1">');
		        $this->table->set_template($table_setup);
		        
				$this->table->set_heading('#',
									'Order ID',
									'Buyer Name',
									'Total Amount',
									'Status',
									'Order On'
									// 'Delivered On'
								);
						
			$i = 0;
				foreach ($res as $row){
					$buyer_det = (array)$this->vendors_model->get_buyer_det($row->buyer_id)->row();
					$cart_det = (array)$this->buyers_model->get_cart1($row->cart_id)->row();
					$price = (array)$this->buyers_model->get_price($cart_det['size_id'])->row();
					$product = (array)$this->buyers_model->get_product($price['product_id'])->row();

					$this->table->add_row(++$i,
										$row->order_id,
										ucwords($buyer_det['buyer_name']),
										($price['price'] * $cart_det['quantity'] * $product['sales_packages']),
										'Delivered',
										date('d-m-Y H:i A', strtotime($row->updated_on))
										// date('d-m-Y H:i A', strtotime($row->delivered_on))
								);
				}
			}else{
				$this->table->add_row('--No Records Found--');
			}
			$data['table'] = $this->table->generate();
			$data['file_name'] = 'Recent Orders.xls';
			$this->load->view('excelview',$data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}
	}
	
	function buyer_det($buyer_id)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'orders';
			$data['page_title'] = 'Pending Orders';
			
			$data['res'] = $this->vendors_model->get_buyer_det($buyer_id)->row();
			//print_r($data['res']);
			
			$this->vendor_template->show('vendor_home/buyer_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}  
	}
	
	function view_order($id,$p)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'orders';
			$data['page_title'] = 'Pending Orders';
			
			if($this->uri->segment(3) == 'status_update')
			{
				$data['msg'] = 'Order Status Updated..!!';
				$data['cls'] = 'alert alert-success';
			}
			else
			{
				$data['msg'] = "";
				$data['cls'] = "";
			}
			
			if($p)
			{
				$data['page'] = 'pending_orders';
			}
			else
			{
				$data['page'] = 'delivered_orders';
			}
			
			$data['res'] = $this->vendors_model->get_orders($id)->row();
			$data['det'] = (array)$this->buyers_model->get_cart1($data['res']->cart_id)->row();
			$data['price'] = (array)$this->buyers_model->get_price($data['det']['size_id'])->row();
			$data['product'] = (array)$this->buyers_model->get_product($data['det']['product_id'])->row();
			$images = (array)$this->buyers_model->get_images($data['det']['product_id'])->row();
			
			if ($data['res']->status == 1)
				$data['status'] = 'Pending..';
			else
				$data['status'] = 'Delivered';
			
			if ($images)
				$data['image_name'] = $images['image_name'];
			else
				$data['image_name'] = 'no_image.png';
			
			$this->vendor_template->show('vendor_home/order_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}  
	}
	
	function deliver_status($order_id)
	{
		$this->vendors_model->deliver_status($order_id);
		redirect('vendor_home/pending_orders/status_update');
	}
	 
  
  function logout()
  {
	$this->session->unset_userdata('logged_in');
	session_destroy();
	redirect('http://nucatalog.com', 'refresh');
  }
  //set rules
  function set_rules()
  {
    $this->form_validation->set_rules('category', 'Category ', 'trim|required|xss_clean');
    $this->form_validation->set_rules('category1', 'Sub Category ', 'trim|required|xss_clean');
    $this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required|xss_clean');   
    $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|xss_clean');
    $this->form_validation->set_rules('product_fit', 'Fit', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fabric', 'Fabric', 'trim|required|xss_clean');
    //$this->form_validation->set_rules('colors[]', 'Colors', 'trim|required|xss_clean');			
  	$this->form_validation->set_rules('sales_packages', 'Sales Packages', 'trim|required|is_numeric|xss_clean');
    $this->form_validation->set_rules('style', 'Style', 'trim|required|xss_clean');
    $this->form_validation->set_rules('inventory', 'Inventory', 'trim|required|is_numeric|xss_clean');
    $this->form_validation->set_rules('availability', 'Availability', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
  	
  	
  }

  function _changepassword_set_rules()
  {
    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[4]');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[4]');
  }
  
}