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
     $data['vendor_name'] = $session_data['vendor_name'];
     $data['menu_active'] = 'vendor_home';
     $data['page_title'] = 'Dashboard';
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
		   	 $data['product']['colors' ]		='';
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
		$this->set_rules();
		if($this->form_validation->run() == FALSE)
		   {
		     
		    $this->vendor_template->show('vendor_home/prodcuts_add', $data);
		   }
		   else
		   {
		   	
		   	
		   	
		   	 $insert_data = array(  'category' 			=>$this->input->post('category1'),
		   	 						'parent_category' 	=>$this->input->post('category'),
		   	 						'brand_name' 		=>$this->input->post('brand_name'),		   	 								   	 						
		   	 						'product_id' 		=>$this->input->post('product_id'),
		   	 						'product_fit' 		=>$this->input->post('product_fit'),
		   	 						'fabric' 			=>$this->input->post('fabric'),
		   	 						'colors' 			=>$this->input->post('colors'),
		   	                        'sub_colors' 		=>$this->input->post('sub_colors'),
		   	 						'sales_packages' 	=>$this->input->post('sales_packages'),
		   	 						'style' 			=>$this->input->post('style'),
		   	 						'inventory' 		=>$this->input->post('inventory'),
		   	 						'availability' 		=>$this->input->post('availability'),
		   	 						'description' 		=>$this->input->post('description'),
		   	 						'vendor_id' 	    =>$data['id'],		   	 						
		   	 						'status' 	        =>'2',
		   	                      );		
		   	
		   	$product_id = $this->vendors_model->add_product($insert_data);
                    
         				    // retrieve the number of images uploaded;
						    $number_of_files = sizeof($_FILES['uploadfiles']['tmp_name']);
						    // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
						    $files = $_FILES['uploadfiles'];
						    $errors = array();
						if($number_of_files != 0)
						    {
						      $this->load->helper('form');
						      $this->load->library('upload');
						      $config['overwrite'] = false;						     
						      $config['upload_path'] = './images_products';						     
						      $config['allowed_types'] = 'gif|jpg|png|jpeg|psd';
						      for ($i = 0; $i < $number_of_files; $i++) 
						      {
						      	$today = date('H:i:s');
						        $_FILES['uploadedimage']['name'] = $today.$files['name'][$i];
						        $_FILES['uploadedimage']['type'] = $files['type'][$i];
						        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
						        $_FILES['uploadedimage']['error'] = $files['error'][$i];
						        $_FILES['uploadedimage']['size'] = $files['size'][$i];						        
						        $this->upload->initialize($config);
						       
						        if ($this->upload->do_upload('uploadedimage'))
						        {
						          $data1=array();
						          $data['uploads'][$i] = $this->upload->data();						         
						          $image_name =   $data1['file_name'] =$data['uploads'][$i]['file_name'];	
						          $image_data = array('image_name' =>$image_name, 'product_id'=>$product_id);						          
						          $this->vendors_model->add_images($image_data);					         
						        }
						        
						        else
						        {						        	  
						              $data['error'] = $this->upload->display_errors();						              
						        }
						      }						       
						    }
		   	
		   
		   	                     redirect('vendor_home/add_product1/'.$product_id.'/add_success', 'refresh');
		   	
		   }
		
		
	}
	else
	{
		redirect('vendor', 'refresh');
	}
  	
  }
  	function add_product1($product_id)
  	{
  		if($this->session->userdata('logged_in'))
		{
	  	    $session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['email'] = $session_data['email'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'products';
			$data['page_title'] = 'Add Price';
			$data['action'] = 'vendor_home/add_product1/'.$product_id;
			$data['link1']  = anchor('vendor_home/add_product','<i class="fa fa-mail-reply"></i>New Product','class="btn btn-info"');
			
			$prices = (array)$this->vendors_model->get_prices($product_id)->result();
			//print_r($prices);
		
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
		
			if($prices != null)
			{ 
		        // generate pagination
				$this->load->library('table');
				$this->table->set_empty("");
		
				$table_setup = array ('table_open'  => '<table class="table table-hover" id="categories">');
		 
				$this->table->set_template($table_setup);
				$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
				$this->table->set_heading('No',
										  'Sizes',
		 								  'Price',
										  'Action');
				$i = 1;
				foreach ($prices as $price)
				{
					$size1 = (array)$this->vendors_model->get_size($price->sizes_from)->row();
					$size2 = (array)$this->vendors_model->get_size($price->sizes_to)->row();
					$this->table->add_row($i++,
											$size1['sizes'].'-'.$size2['sizes'],								
											$price->price,
											anchor('vendor_home/edit_price/'.$product_id.'/'.$price->id,'<span class="label label-warning">EDIT</span>').'&nbsp;&nbsp;&nbsp;&nbsp;'
											.anchor('vendor_home/delete_price/'.$product_id.'/'.$price->id, '<span class="label label-warning">DELETE</span>')								
										  );
				}
				$data['table'] = $this->table->generate();    
			}
			else
			{
				$data['table'] = '<h5 class="text-semibold text-center">No Price List Found..!</h5>';
			}
		
		 	$product = (array)$this->vendors_model->get_product($product_id)->row();		
		 	$data['options'] = $this->sadmin_model->get_sizes_list($product['category']);
			//print_r($data['options']);
		
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
		   	 	$insert_data= array ('price'      => $this->input->post('price'),
		   	 					  'sizes_from' => $this->input->post('sizes'),
		   	 					  'sizes_to' => $this->input->post('sizes1'),		   	 					 
		   	 					  'Product_id' => $product_id		   	 
		   	                      );
		   	
		   	   	$this->vendors_model->add_price($insert_data);
		   	                      
		   	 	redirect('vendor_home/add_product1/'.$product_id.'/price_success', 'refresh');
		   	}
		}
		else
		{
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
		$data['link1']  = anchor('vendor_home/add_product1/'.$product_id,'<i class="fa fa-mail-reply"></i>CANCEL','class="btn default"');
		
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
		
	if($prices != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Sizes',
 								  'Price',
								  'Action'
 								 );
		$i = 1;
		foreach ($prices as $price){
			$size1 = (array)$this->vendors_model->get_size($price->sizes_from)->row();
			$size2 = (array)$this->vendors_model->get_size($price->sizes_to)->row();
			$this->table->add_row($i++,
								$size1['sizes'].'-'.$size2['sizes'],								
								$price->price,
								anchor('vendor_home/edit_price/'.$product_id.'/'.$price->id,'<span class="label label-warning">EDIT</span>').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
								.anchor('vendor_home/delete_price/'.$product_id.'/'.$price->id, '<span class="label label-warning">DELETE</span>')								
								
								
					         	);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<h5 class="text-semibold text-center">No Price List Found..!</h5>';
		}
		
		 $product = (array)$this->vendors_model->get_product($product_id)->row();		
		 $data['options'] = $this->sadmin_model->get_sizes_list($product['category']);
		 $price1 =(array)$this->vendors_model->get_price($price_id)->row(); 
		
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
  function delete_price($product_id,$price_id)
  {
  	if($this->session->userdata('logged_in'))
	{
  	    $session_data = $this->session->userdata('logged_in');
		$data['vendor_name'] = $session_data['vendor_name'];
		$data['email'] = $session_data['email'];
		$data['id'] = $session_data['id'];
		
		$this->vendors_model->delete_price($price_id);
		
		redirect('vendor_home/add_product1/'.$product_id.'/suspend_success', 'refresh');
	
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
								  'Sizes-Prices ',
								  'Product Id ',
								  'Produtc Fit',
								  'Fabric',
								  'Colors',
								  'Sales Packages',
								  'Style',
								  'Inventory',
								  'Availability' ,
								  'Status'								  
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
				    
				    $delete_link = anchor('vendor_home/delete_product/'.$product->id,'<span class="label label-danger">DELETE</span>',array('class'=>'editcls','onclick'=>"return confirm('Are you sure you want to Delete ?')"));
					
				$this->table->add_row($i++,	
										//'<img src="'.base_url().'images_products/'.$product->image_name.'" width="40px" height="40px">'	,														
										$product->brand_name,	
										form_open('vendor_home/add_product1/'.$product->id)
										.'
										<button type="submit" class="label label-warning">Click</button>
										</form>',	
										$product->product_id,	
										$product->product_fit,	
										$product->fabric,
										$product->colors.','.$product->sub_colors,							
										$product->sales_packages,	
										$product->style,	
										$product->inventory,	
										$product->availability,
										$status1
										.'&nbsp;'.anchor('vendor_home/edit_product/'.$product->id,'<span class="label label-default">EDIT</span>')
										.'&nbsp;'.anchor('vendor_home/view_product/'.$product->id,'<span class="label label-default">VIEW</span>')
										.'&nbsp;'.$delete_link	
							         	);
							         	
							         	
				}
		
	         $data['table'] = $this->table->generate();    
		}
		else
		{
			$data['table'] = '<h5 class="text-semibold text-center">No Prodcut List Found..!</h5>';
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
		redirect('all_produtcs/suspend_success','refresh');
		
		
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
		else
		{
			
		}
		
	$data['sub_category']	= $options2[$data['product']['category']];
	
	
		
	if($prices != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Sizes',
 								  'Price',
								  'Action'
 								 );
		$i = 1;
		foreach ($prices as $price){
			$size1 = (array)$this->vendors_model->get_size($price->sizes_from)->row();
			$size2 = (array)$this->vendors_model->get_size($price->sizes_to)->row();
			$this->table->add_row($i++,
								$size1['sizes'].'-'.$size2['sizes'],								
								$price->price,
								anchor('vendor_home/edit_price/'.$product_id.'/'.$price->id,'<span class="label label-warning">EDIT</span>').'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
								.anchor('vendor_home/delete_price/'.$product_id.'/'.$price->id, '<span class="label label-warning">DELETE</span>')								
								
								
					         	);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<h5 class="text-semibold text-center">No Price List Found..!</h5>';
		}
		
		$this->vendor_template->show('vendor_home/view_product', $data);
	}
	else 
	{
		redirect('vendor','refresh');
	}
  	
  }
  function edit_product($product_id)
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
		
		$data['action'] = 'vendor_home/edit_product/'.$product_id;
		
		 
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
		                  $number_of_files = sizeof($_FILES['uploadfiles']['tmp_name']); 
						    // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
						    $files = $_FILES['uploadfiles'];	
						    $file1 = $_FILES['uploadfiles']['name'];	
						    $errors = array();	
						    			    						    
					    for($i=0;$i<$number_of_files;$i++)
			            {
			             if($_FILES['uploadfiles']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['uploadfiles']['name'][$i];
			            }
						   
						  
						if(sizeof($errors)==0)
						    {
						    	
						      $this->vendors_model->delete_images($product_id);
						      $this->load->helper('form');
						      $this->load->library('upload');
						      $config['overwrite'] = True;						     
						      $config['upload_path'] = './images_products';						     
						      $config['allowed_types'] = 'gif|jpg|png|jpeg|psd';
						      for ($i = 0; $i < $number_of_files; $i++) 
						      {
						      	$today = date('H:i:s');
						        $_FILES['uploadedimage']['name'] = $today.$files['name'][$i];
						        $_FILES['uploadedimage']['type'] = $files['type'][$i];
						        $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
						        $_FILES['uploadedimage']['error'] = $files['error'][$i];
						        $_FILES['uploadedimage']['size'] = $files['size'][$i];						        
						        $this->upload->initialize($config);
						       
						        if ($this->upload->do_upload('uploadedimage'))
						        {
						          $data1=array();
						          $data['uploads'][$i] = $this->upload->data();						         
						          $image_name =   $data1['file_name'] =$data['uploads'][$i]['file_name'];	
						          $image_data = array('image_name' =>$image_name, 'product_id'=>$product_id);						          
						          $this->vendors_model->add_images($image_data);					         
						        }
						        
						        else
						        {						        	  
						              $data['error'] = $this->upload->display_errors();						              
						        }
						      }						       
						    }
		   	
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
		   	
		   	                     redirect('vendor_home/add_product1/'.$product_id.'/update_product', 'refresh');
		   	
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
			
			$data['res'] = $this->vendors_model->get_pending_orders($data['id'])->result();
			//print_r($data['res']);
			
			$this->vendor_template->show('vendor_home/pending_order_view', $data);
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
	
	function delivered_orders()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['vendor_name'] = $session_data['vendor_name'];
			$data['id'] = $session_data['id'];
			$data['menu_active'] = 'orders';
			$data['page_title'] = 'Delivered Orders';
			
			$data['res'] = $this->vendors_model->get_delivered_orders($data['id'])->result();
			//print_r($data['res']);
			
			$this->vendor_template->show('vendor_home/delivered_order_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('welcome', 'refresh');
		}  
	}
  
  function logout()
  {
	$this->session->unset_userdata('logged_in');
	session_destroy();
	redirect('welcome', 'refresh');
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
    $this->form_validation->set_rules('colors', 'Colors', 'trim|required|xss_clean');			
  	$this->form_validation->set_rules('sales_packages', 'Sales Packages', 'trim|required|is_numeric|xss_clean');
    $this->form_validation->set_rules('style', 'Style', 'trim|required|xss_clean');
    $this->form_validation->set_rules('inventory', 'Inventory', 'trim|required|is_numeric|xss_clean');
    $this->form_validation->set_rules('availability', 'Availability', 'trim|required|xss_clean');
    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
  	
  	
  }
  
}
