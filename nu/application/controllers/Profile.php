<?php	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends CI_Controller 
	{
		function __construct()
  		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('email');
			$this->load->model('buyers_model','',TRUE);
			$this->load->model('sadmin_model','',TRUE);
			date_default_timezone_set('Asia/Kolkata');
  		}
	
  		function index()
		{
			
			
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id'] = $session_data['id'];
			    
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        
				if ($this->uri->segment(3) == 'request')
				{
					$data['msg'] = 'Your Request for Mobile and/or TIN no change is successfully sent to admin...!!!';
					$data['cls'] = 'alert alert-success';
				}
				elseif ($this->uri->segment(3) == 'updated')
				{
					$data['msg'] = 'Data is Updated Successfully...!!!';
					$data['cls'] = 'alert alert-success';
				}
				else
				{
					$data['msg'] = '';
					$data['cls'] = '';
				}
				
		        $data['category_list'] =  $this->main_categories();
			    $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
			    
			    $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
			    $data['list_count'] =$wish_products['list_count'];
			    
			    $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
			    $return_data = $this->cart_product_list();
			    $data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];
     			
			    $data['res'] = (array)$this->buyers_model->get_by_id($data['id'])->row();
			    
			    $this->home_template->show('buyer_home/profile_view',$data);
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}
		}
		
		
		function viewprofile(){
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id'] = $session_data['id'];
			    
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        
				if ($this->uri->segment(3) == 'request')
				{
					$data['msg'] = 'Your Request for Mobile and/or TIN no change is successfully sent to admin...!!!';
					$data['cls'] = 'alert alert-success';
				}
				elseif ($this->uri->segment(3) == 'updated')
				{
					$data['msg'] = 'Data is Updated Successfully...!!!';
					$data['cls'] = 'alert alert-success';
				}
				else
				{
					$data['msg'] = '';
					$data['cls'] = '';
				}
				
		        $data['category_list'] =  $this->main_categories();
			    $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
			    
			    $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
			    $data['list_count'] =$wish_products['list_count'];
			    
			    $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
			    $return_data = $this->cart_product_list();
			    $data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];
     			
			    $data['res'] = (array)$this->buyers_model->get_by_id($data['id'])->row();
			    
			    $this->home_template->show('buyer_home/profile_view',$data);
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}
		}
		
		function edit()
		{
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id'] = $session_data['id'];
			    
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        
		        $data['category_list'] =  $this->main_categories();
			    $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
			    
			    $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
			    $data['list_count'] =$wish_products['list_count'];
			    
			    $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
			    $return_data = $this->cart_product_list();
			    $data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];
     			
			    $data['res'] = (array)$this->buyers_model->get_by_id($data['id'])->row();
			    //print_r($data['res']);
			    
			    $this->home_template->show('buyer_home/edit_profile_view',$data);
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}
		}
		
		function request_change()
		{
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id'] = $session_data['id'];
			    $data['email'] = $session_data['email'];
				
				// REQUEST ID GENERATOR
				$request_id = 'RES'.uniqid();
				//echo $request_id;
				
				$det = array('request_id' => $request_id,
								'user_type' =>'1',
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
				
				$html = 'Dear <b>Admin</b>, <br><br> <p>Requesting for change in Mobile no. and/or TIN no. for my current account.</p> <br> <br> Thanks and Regards, <br> '.$data['buyer_name'];
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
				
				$html = 'Dear <b>'.$data['buyer_name'].'</b>, <br> <p>Your Request for change in Mobile no and/or TIN no is in progress. We`ll get back to you within 24Hrs.</p> <br>Your Request ID : '.$request_id.'<br>  Thanks and Regards, <br> Team NuCatalog <br>www.nucatalog.com';
				//echo $html;
				$this->email->subject('NuCatalog.com - Request for Changes in Profile.');
 				$this->email->message($html);
 				$this->email->send();
				
				redirect('profile/index/request');
			}
			else
			{
				redirect('welcome');
			}
		}
		
		function update()
		{
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id'] = $session_data['id'];
			     
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        
		        $data['category_list'] =  $this->main_categories();
			    $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
			    
			    $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
			    $data['list_count'] =$wish_products['list_count'];
			    
			    $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
			    $return_data = $this->cart_product_list();
			    $data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];
     			
			    $data['res'] = (array)$this->buyers_model->get_by_id($data['id'])->row();
			    //print_r($data['res']);
			    
			    // VALIDATIONS
			    $this->set_rules();
			    if ($this->form_validation->run() === FALSE)
			    {
			    	$this->home_template->show('buyer_home/edit_profile_view',$data);
			    }
			    else 
			    {
				    // READ INPUTS
				    $name = $this->input->post('name');
				    $business = $this->input->post('business');
				    $pan = $this->input->post('pan');
				    $phone = $this->input->post('phone');
				    $address = $this->input->post('address');
				    $yoi = $this->input->post('yoi');
				    $office = $this->input->post('office');
			    	$today = date('Y-m-d H:i:s');
			    	
				    // UPDATE IN DB
				    $det = array('buyer_name' => $name,
				    				'business_name' => $business,
				    				'address' => $address,
				    				'pan' => $pan,
				    				'phone' => $phone,
				    				'office' => $office,
				    				'year_of_inception' => $yoi,
				    				'updated_by' => $data['buyer_name'],
				    				'updated_on' => $today);
				    //print_r($det);die;
				    $this->buyers_model->update_buyer($data['id'],$det);
				    
				    redirect('profile/index/updated');
			    }
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}    
		}
		
		function main_categories()
 		{
 			$session_data = $this->session->userdata('logged_in');
			$data['buyer_name'] = $session_data['buyer_name'];
			$data['id'] = $session_data['id'];
			    
 			$categories = (array)$this->sadmin_model->get_categories()->result();
 	        $options = array();
     		$options1 = array();
     		if($categories != null)
     		{                       
            	foreach($categories as $category)
                {
                	if ($category->parent_category_id == '0')
                    {
                    	$sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();
                        
                    	$options = array( $category->id =>'<li class="dropdown">
                            									'.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'');
                        			
	                    $options1 =$options1 + $options;
                   	}                        		
               	}                    
			}
            return   $options1;
		}
		
		function wish_list()
		{
			 $session_data = $this->session->userdata('logged_in');
			 $data['vendor_name'] = $session_data['buyer_name'];
			 $data['id'] = $session_data['id'];
			
			$products_cart = (array)$this->buyers_model->get_wish_list($data['id'])->result();
						
			$cart1 = array();
			$cart2 = array();
			$price = '';
			if($products_cart != null)
			{
				$j = '0';
				foreach($products_cart as $cart)
				{
					//$Prices   =(array)$this->buyers_model->get_price($cart->size_id)->row();	
					$Product  =(array)$this->buyers_model->get_product($cart->product_id)->row();
					//$size = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_from'])->row();
					$images =(array)$this->buyers_model->get_images($cart->product_id)->row();
								 
					if($images != null)
					{
						$image_name= $images['image_name'];
					}
					else 
					{
						$image_name= 'no_image.png';
					}
								 
					$cart1 = '<li>
								<span style="float:right">'.anchor('buyer_home/delete_cart/'.$cart->id,'<i class="fa fa-times"></i>').'&nbsp'.anchor('buyer_home/add_product_view/'.$cart->product_id,'<i class="fa fa-check"></i>').'</span>
								<a class="dropdown-menu-shipping-cart-img" href="#">	                                        
									<img  src="'. base_url().'images_products/'.$image_name.'"  />
								</a>
								<div class="dropdown-menu-shipping-cart-inner">
									<p class="dropdown-menu-shipping-cart-price">'.$Product['brand_name'].'</p>
									<p class="dropdown-menu-shipping-cart-item"><a href="#">'.nl2br($Product['description']).'</a></p>
								</div>
							</li>' ;
					$j++;		         
					array_push($cart2, $cart1);
				}
				$list_count = $j;
			}
			else 
			{
				$cart2 = '';
				$price ='';
				$list_count='0';
			}
			$data['wish_list'] = $cart2;
			$data['list_count'] = $list_count;
						
			return $data ;
		}
	
 		function cart_product_list()
 		{
	 	 	$session_data = $this->session->userdata('logged_in');
		 	$data['vendor_name'] = $session_data['buyer_name'];
		 	$data['id'] = $session_data['id'];
 	
 			$products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
 			//print_r($products_cart);die;
     		$cart1 = array();
     		$cart2 = array();
     		$price = '';
     		if($products_cart != null)
     		{
     			$i='0';
	     		foreach($products_cart as $cart)
	     		{
	     			$Prices   =(array)$this->buyers_model->get_price($cart->size_id)->row();	
					$Product  =(array)$this->buyers_model->get_product($cart->product_id)->row();
				    $size = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_from'])->row();
				    $images =(array)$this->buyers_model->get_images($cart->product_id)->row();
				         
	     			if($images != null)
				    {
				    	$image_name= $images['image_name'];
				    }
				    else 
				    {
				    	$image_name= 'no_image.png';
				    }
				         
				    $cart1 = '<li>
				              	<span style="float:right">'.anchor('buyer_home/delete_cart/'.$cart->id,'<i class="fa fa-times"></i>').'</span>
	                            <a class="dropdown-menu-shipping-cart-img" href="#">	                                        
	                            	<img  src="'. base_url().'images_products/'.$image_name.'"  />
								</a>
	                            <div class="dropdown-menu-shipping-cart-inner">
	                            	<p class="dropdown-menu-shipping-cart-price">'.$Prices['price'].'</p>
	                                <p class="dropdown-menu-shipping-cart-item"><a href="#">'.nl2br($Product['description']).'</a>
	                                </p>
	                           	</div>
	                       	</li>' ;
					$price = $price +  $Prices['price']; 
				    $i++;				         
				    array_push($cart2, $cart1);
	     		}
	     		$cart_count= $i;
     		}
     		else 
     		{
     			$cart2 = '';
     			$price ='';
     			$cart_count='0';
     		}
     			
     		$data['carts'] = $cart2;
     		$data['price_total'] = $price;
     		$data['cart_count'] = $cart_count;
     			
     		return $data;
 		}

 		function change_password()
		{
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id'] = $session_data['id'];
			    
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        
		        $data['category_list'] =  $this->main_categories();
			    $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
			    
			    $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
			    $data['list_count'] =$wish_products['list_count'];
			    
			    $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
			    $return_data = $this->cart_product_list();
			    $data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];

			    $data['res'] = (array)$this->buyers_model->get_by_id($data['id'])->row();
     			
			      if($this->uri->segment(3)=='same')
			      {
			        $data['msg'] = 'Both Passwords should not be same.';
			        $data['cls'] = 'text-danger';
			      }elseif($this->uri->segment(3)=='error'){
			        $data['msg'] = 'Current password not correct.';
			        $data['cls'] = 'text-danger';
			      }elseif($this->uri->segment(3)=='success'){
			        $data['msg'] = 'Password changed successfully.';
			        $data['cls'] = 'text-success';
			      }else{
			        $data['msg'] = '';
			        $data['cls'] = '';
			      }
			    
			    $this->set_rules1();  
			     if ($this->form_validation->run() === FALSE){
			     	$this->home_template->show('buyer_home/change_password',$data);
			     }else{
			       $email = $this->input->post('email');
			       $current_password = $this->input->post('current_password');
			       $new_password = $this->input->post('new_password');
			       $cnt = strcmp($current_password, $new_password);
			       
			       if(!$cnt){ 
			        // CURRENT AND NEW PASSWORD SHOULD NOT BE SAME
			        $url = 'profile/change_password/same';
			        echo'<script>window.location.href = "'.base_url().''.$url.'";</script>';
			       }else{
			            $password_details = array('password' => md5($new_password),
			                                      'updated_by'=>$data['buyer_name'],
			                                      'updated_on'=>date('Y-m-d H:i:s'),
			                                    );
			       
			            $id = $this->buyers_model->change_password($password_details,$current_password, $email);

			            if($id == 0){
			              $url = 'profile/change_password/error';
			              echo '<script>window.location.href = "'.base_url().''.$url.'";</script>';
			            }else{
			              $url = 'profile/change_password_success';
			              echo '<script>window.location.href = "'.base_url().''.$url.'";</script>';
			            }

			       }

			     }

			    
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}
		}

		function change_password_success()
		 {
		   $this->session->unset_userdata('logged_in');
		   session_destroy();
		   $this->login_template->show('buyer/changed');
		 }
 		
 		function set_rules()
 		{
 			$this->form_validation->set_rules('name','Buyer Name','required|trim|xss_clean');
 			$this->form_validation->set_rules('business','Business Name','required|trim|xss_clean');
 			$this->form_validation->set_rules('pan','PAN No.','required|trim|xss_clean');
 			$this->form_validation->set_rules('phone','Phone','required|is_natural|trim|xss_clean');
 			$this->form_validation->set_rules('address','Address','required|trim|xss_clean');
 			$this->form_validation->set_rules('yoi','Year Of Inception','required|is_natural|exact_length[4]|trim|xss_clean');
 			$this->form_validation->set_rules('office','Office No','required|is_natural|trim|xss_clean');
 		}

 		 function set_rules1()
		  {
		    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[4]');
		    $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[4]');
		  }
	}