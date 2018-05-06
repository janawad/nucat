<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

	class Buyer_home extends CI_Controller 
	{
 		function __construct()
  		{
			parent::__construct();
			$this->load->library(array('table','form_validation'));
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
			    $data['vendor_name'] = $session_data['buyer_name'];
			    $data['buyer_name'] = $session_data['buyer_name'];
			    $data['id']          = $session_data['id'];
			    $data['menu_active'] = 'vendor_home';
			    $data['page_title']  = 'Dashboard';
			    
			    $Products = $data['Products'] =(array)$this->buyers_model->all_products()->result();     
     			$categories = (array)$this->sadmin_model->get_categories()->result();
     			$data['categories'] = $categories;    			
     			
   			    $cart3 = array();
     			$cart4 = array();
     			$history = array();
     			$history1 = array();
     			
     			if($Products != null)
     			{
	     			foreach($Products as $Product)
	     			{
	     				$images   =(array)$this->buyers_model->get_images($Product->id)->row();
				         
				        // print_r($images);die;
				        if($images != null)
				        {
				        	$image_name= base_url().'images_products/'.$images['image_name'];
				        }
				        else 
				        {
				        	$image_name= base_url().'images_products/no_image.png';
				        }
				         
				        $cart3 = '<div class="owl-item">
				        			<div class="product  owl-item-slide" style="padding: 1px;">
				                    	<ul class="product-labels"></ul>
				                        <div class="product-img-wrap">
				                            <img class="product-img" src="'.$image_name.'" width="200px" height="200px" alt="Image Alternative text" title="Image Title" />
				                        </div>
				                        '. anchor('buyer_home/add_product_view/'.$Product->id,'&nbsp;','class="product-link"').'
				                        <div class="product-caption">
				                            <h5 class="product-caption-title">'. $Product->brand_name.'('.$Product->colors.')'.'</h5>
				                            <div class="product-caption-price"><span class="product-caption-price-new"></span>
				                            </div>
				                            <ul class="product-caption-feature-list">				                                
				                                <li>Free Shipping</li>
				                            </ul>
				                        </div>
				                    </div>
				                </div>';
				        				         
				    	array_push($cart4, $cart3);
				    	
				    	$history = '<div class="owl-item">
				        			<div class="product  owl-item-slide" style="padding: 1px;">
				                    	<ul class="product-labels"></ul>
				                        <div class="product-img-wrap">
				                            <img class="product-img" src="'.$image_name.'" width="200px" height="200px" alt="Image Alternative text" title="Image Title" />
				                        </div>
				                        '. anchor('buyer_home/add_product_view/'.$Product->id,'&nbsp;','class="product-link"').'
				                        <div class="product-caption">
				                            <h5 class="product-caption-title">'. $Product->brand_name.'('.$Product->colors.')'.'</h5>
				                            <div class="product-caption-price"><span class="product-caption-price-new"></span>
				                            </div>
				                            <ul class="product-caption-feature-list">				                                
				                                <li>Free Shipping</li>
				                            </ul>
				                        </div>
				                    </div>
				                </div>';
				    	
				    	array_push($history1, $history);
	     			}
     			}
     			else 
     			{
     				$cart3 = '';
     				$history = '';
     			}
     			
     			$data['products_list'] = $cart4;
     			$data['browser_history'] = $history1;
     			
     			$products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
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
				         //print_r($size);
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
	     		}
     			else 
     			{
     				$cart2 = '';
     				$price ='';
     				$i ='0';
     			}
     			
     			$data['carts'] = $cart2;
     			$data['price_total'] = $price;
     			$data['cart_count'] = $i;
     			
     			$wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
     			$data['list_count'] = $wish_products['list_count'];
     			
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
                            									'.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'
                        					');
                        			
	                        $options1 =$options1 + $options;
                        }                        		
					}                    
				}
                        
                $data['indexes'] = array_keys($options1);
                $data['category_list'] = $options1;   
                      
               	// print_r($options1);
               	$options2 = array();
     			$options1 = array();
   				if($categories != null)
   				{ 
       				foreach ($categories as $categories1)
       				{
						if($categories1->id == '1')
						{
							// $status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
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
													$main_name = $main_name;
												}
											}
											else 
											{
												$main_name = $main_name;
											}										
										}
										else 
										{
											$main_name = $main_name;										
										}
									}
									else 
									{
										$main_name = $main_name;							
									}
								}
								else 
								{
									$main_name = $main_name;						
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
           		$options1 = '';    
			    $options5 = array();
			    $options4 = array();
			    $categories = (array)$this->sadmin_model->get_categories()->result();
   
 				if($categories != null && $data['category_list'] != null)
 				{ 
 					foreach ($data['indexes'] as $index)
 					{
			        	$options2= ''; 
						foreach ($categories as $categories1)
						{
							if($categories1->parent_category_id == $index)
							{
								// $status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
								$category1 = (array)$this->sadmin_model->get_category($categories1->parent_category_id)->row();
								if($category1 != null)
								{				
									$main_name =  ' &nbsp;';				
									$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();				
									if($category1 != null)
									{						
										$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);										
										$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();					
										if($category1 != null)
										{							
							       			$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);							       							
											$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
											
											if($category1 != null)
											{										
												$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);																				
												$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();									
												if($category1 != null)
												{										
													$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);																						
												    $category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
													if($category1 != null)
													{												
														$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);
														$category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
														if($category1 != null)
														{												
															$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);	
														    $category1 = (array)$this->sadmin_model->get_category($category1['parent_category_id'])->row();								
															if($category1 != null)
															{												
																$main_name = ucwords($category1['category_name']) .' &nbsp;>&nbsp;'.ucwords($main_name);												
															}											
														}
														else
														{
															$main_name = $main_name; 
														}	
													}
													else
													{
														$main_name = $main_name; 
													}
												}
												else
												{
													$main_name = $main_name; 
												}
											}
											else
											{
												$main_name = $main_name; 
											}									
										}
										else
										{
											$main_name = $main_name; 
										}
									}
								}
								else 
								{
									$main_name = '';
								}								
								$options1 = anchor('buyer_home/products_category/'.$categories1->id,ucwords($main_name).strtoupper($categories1->category_name));
								$options2 = $options2.$options1;
		 					}
		  				}
						$options4 = array($index => $options2);		  
						$options5 = $options5 + $options4;
 	     			}
 	    		}
				//print_r($options5);die;
		
		 		$sess_array = array('categories' => $options5);
                  
		 		$this->session->set_userdata('sub_categories', $sess_array);
		 		$session_data = $this->session->userdata('sub_categories');
		 		$data['sub_category'] = $session_data['categories'];
		
     			$this->home_template->show('buyer_home/buyer_home1', $data);
   			}
   			else
   			{
     			//If no session, redirect to login page
     			redirect('welcome', 'refresh');
   			}
  		}
  		
 		function place_order()
 		{
 	 		if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];		
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id']  = $session_data['id'];	
			    $data['email'] = $session_data['email'];
			    $data['mobile'] = $session_data['mobile'];
				
				//$data['action'] = 'buyer_home/buyer_cart_final';
				
				$session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        $return_data = $this->cart_product_list();				         
				$data['carts'] = $return_data['carts'];
     		    $data['price_total'] = $return_data['price_total'];
     		    $data['cart_count']  =$return_data['cart_count'];
     			
		        $data['category_list'] =  $this->main_categories();
		        $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
		        $data['category_name'] ='';
		        $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
				//print_r($products_cart);
     			$cart1 = array();
     			$cart2 = array();
     			$price = '';
     			if($products_cart != null)
     			{
     				$i = 0;
	     			foreach($products_cart as $cart)
	     			{
	     				$Prices[]   = (array)$this->buyers_model->get_price($cart->size_id)->row();	
				        $Product[]  = (array)$this->buyers_model->get_product($cart->product_id)->row();
				        //print_r($Product);
				        
				        $size     = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_from'])->row();
				        $size1    = (array)$this->sadmin_model->get_sizes_list12($Prices[$i]['sizes_to'])->row();
				        
				        $images   = (array)$this->buyers_model->get_images($cart->product_id)->row();
				         
	     				if($images != null)
				        {
				        	$image_name[] = $images['image_name'];
				        }
				        else 
				        {
				        	$image_name[] = 'no_image.png';
				        }
						$qty[] = $cart->quantity;
						$i++;
	     			}
     			}
     			else 
     			{
     				$cart2 = '';
     				$price ='';
     			}
     			$data['Product'] = $Product;
     			$data['Prices'] = $Prices;
     			$data['image_name'] = $image_name;
     			$data['qty'] = $qty;
     			
     			$wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
     			$data['list_count'] = $wish_products['list_count'];
			    
     			$k = 0;$amt = 0;
     			foreach ($Product as $Product1) {
     				$amt += ($Prices[$k]['price'] * $Product1['sales_packages'] * $qty[$k]);
     				$k++;
     			}
     			// PAYUMONEY PAYMENT PARAMETERS
			    $data['action'] = 'https://test.payu.in/_payment';
				$data['key'] = $key= "rjQUPktu";
				$SALT = "e5iIg1jwi8";
				$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
				$data['txnid'] = $txnid;
				$amount = $amt;
				$data['amount'] = $amt;
				$productinfo = $Product['0']['brand_name'];
				$data['pro'] = $productinfo;
				$firstname = $data['buyer_name'];
				$data['name'] = $firstname;
				$email = $data['email'];
				$data['email'] = $email;
				$data['phone'] = $data['mobile'];
				$data['surl'] = base_url()."buyer_home/buyer_cart_final";
				$data['furl'] = base_url()."buyer_home/buyer_cart_final";
				
				$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
				$hashVarsSeq = explode('|', $hashSequence);
			    $hash_string = '';
				foreach($hashVarsSeq as $hash_var) {
				     $hash_string .= isset($_POST[$hash_var]) ? $_POST[$hash_var] : '';
				     $hash_string .= '|';
				}
				$hash_string .= $SALT;
				$hash_string = "$key|$txnid|$amount|$productinfo|$firstname|$email|||||||||||$SALT";
				$hash = strtolower(hash('sha512', $hash_string));
				//$hash = strtolower(hash('sha512', $hash_string));
				$data['hash'] = $hash;
				// end
			    
			    $this->cart_template->show('buyer_home/cart_products',$data);
   			}
   			else 
   			{
   				redirect('welcome', 'refresh');
   			} 	
 		}
 		
 		function buyer_cart_final()
 		{
 			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id']  = $session_data['id'];	
			    $mobile = $session_data['mobile'];
				$data['action'] = 'buyer_home/buyer_cart_final';
				
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        $return_data = $this->cart_product_list();				         
				$data['carts'] = $return_data['carts'];
     		    $data['price_total'] = $return_data['price_total'];
     		    $data['cart_count'] = $return_data['cart_count'];
     		    
     		    $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
     			$data['list_count'] = $wish_products['list_count'];
     			         
		        $data['category_list'] =  $this->main_categories();
		        $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
		        $data['category_name'] ='';
		        $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
				//print_r($products_cart);die;
     			$cart1 = array();
     			$cart2 = array();
     			$price = '';

     			// PAYU SUCCESS CODE
     			$salt="e5iIg1jwi8";
     			$status=$_POST["status"];
				$firstname=$_POST["firstname"];
				$amount=$_POST["amount"];
				$txnid=$_POST["txnid"];
				$posted_hash=$_POST["hash"];
				$key=$_POST["key"];
				$productinfo=$_POST["productinfo"];
				$email=$_POST["email"];
	   			
				if (isset($_POST["additionalCharges"])) {
					$additionalCharges=$_POST["additionalCharges"];
					$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
				}else {
					$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
				}
				$hash = hash("sha512", $retHashSeq);
				if ($hash != $posted_hash) {
			    	redirect('buyer_home/place_order/err');
				}else {
					echo "<h3>Thank You. Your order status is ". $status .".</h3>";
		          	echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
		          	echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
		          	
		          	$order_id = 'OD'.uniqid();
					
	     			$i='0';
		     		foreach($products_cart as $cart)
		     		{	
		     			$Prices   = (array)$this->buyers_model->get_price($cart->size_id)->row();	
						$quantity = $cart->quantity;
						$Product  = (array)$this->buyers_model->get_product($cart->product_id)->row();
					    //$size     = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_from'])->row();
					    //$size1    = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_to'])->row();
					    $images   = (array)$this->buyers_model->get_images($cart->product_id)->row();
	                    $today = date('Y-m-d H:i:s');
	                    
					    if($quantity != null || $quantity != '0')
					    {
		                	$cart1 = array('txnid' => $txnid,
		                					'order_id' => $order_id,
											'cart_id' => $cart->id,
											'status' => '1',
											'buyer_id' => $data['id'],
											'vendor_id' => $Product['vendor_id'],
											'updated_on' => $today);
							
							$this->buyers_model->add_order($cart1);
							$this->buyers_model->update_cart_status($cart->id);
						}
		     		}
		     		
		     		$res = (array)$this->sadmin_model->get_by_id($Product['vendor_id'],'vendors')->row();
					//TODO: SMS Send Code to VENDOR START
					$apiKey = 'Afedccdff7e0753062c81b059115748bc';
					$SenderID = 'NUCTLG';
					$To = $res['mobile'];
					$name = $res['vendor_name'];
					$msg = urlencode("Dear $name , You have received a new order from a buyer. Please login to your vendor panel for order details. NuCatalog is delighted to be your business partner.");
					
					$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
					$ret = file($url);
					//TODO: SMS Send Code END
					
					//TODO: SMS Send Code to BUYER START
					$apiKey = 'Afedccdff7e0753062c81b059115748bc';
					$SenderID = 'NUCTLG';
					$To = $mobile;
					$msg = urlencode("Your order with Order id : $order_id has been successfully placed. The vendor/s will contact you shortly. NuCatalog is delighted to be your business partner.");
					
					$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
					$ret = file($url);
					//TODO: SMS Send Code END
					
	     			redirect('buyer_home/view_final_cart');
				}
     			// END				
   			}
   			else 
   			{
   				redirect('welcome', 'refresh');
   			} 
 		}
 
 		function view_final_cart()
 		{
		 	if($this->session->userdata('logged_in'))
		   	{
				$session_data = $this->session->userdata('logged_in');
				$data['buyer_name'] = $session_data['buyer_name'];		
				$data['id']  = $session_data['id'];	
				
				$data['action'] = 'buyer_home/buyer_cart_final';
				
				$session_data = $this->session->userdata('sub_categories');
				$data['sub_category'] = $session_data['categories'];
				$return_data = $this->cart_product_list();				         
				$data['carts'] = $return_data['carts'];
		     	$data['price_total'] = $return_data['price_total'];
		     	$data['cart_count'] = $return_data['cart_count'];
     		    
		     	$wish_products = $this->wish_list();
		     	$data['wish_list'] = $wish_products['wish_list'];
		     	$data['list_count'] = $wish_products['list_count'];
		     			         
				$data['category_list'] =  $this->main_categories();
				$data['categories'] = (array)$this->sadmin_model->get_categories()->result();
				$data['category_name'] ='';
				
				$cart1 = '';
		     	$cart2 = '';
		     	$price = '';
     			
				$get_order = (array)$this->buyers_model->get_orders($data['id'])->row();
				//print_r($get_order);
				$get_order1 = (array)$this->buyers_model->get_orders1($get_order['order_id'],$data['id'])->result();
				//print_r($get_order1);
				$data['order_id'] = $get_order['order_id'];
				
     			$table_setup = array ('table_open'  => '<table class="table">');
     			
				$i='0';
     			foreach($get_order1 as $order)
				{
					$res = (array)$this->buyers_model->get_order_cart1($data['id'],$order->cart_id)->row();
					//print_r($res);die;
					
					$Prices   = (array)$this->buyers_model->get_price($res['size_id'])->row();	
					$Product  = (array)$this->buyers_model->get_product($res['product_id'])->row();
					//print_r($Product);
					$size = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_from'])->row();
					$size1 = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_to'])->row();
					$images   = (array)$this->buyers_model->get_images($res['product_id'])->row();
					$today =date('Y-m-d H:i:s');
					
					$cart1= '<tr>
		            			<td>'.++$i.'</td>
								<td>'.$Product['brand_name'].'</td>
					       		<td>'.$Product['description'].'</td>
								<td>'.$size['sizes'].' - '.$size1['sizes'].'</td>
					            <td>'.$res['quantity'].'</td>
					            <td>'.$res['quantity']* $Product['sales_packages'] * $Prices['price'].' /-</td>
			                   </tr>'
	                            ;                                                              
					$price = $price +  $res['quantity']* $Product['sales_packages'] * $Prices['price'];
		     		$cart2= $cart2.$cart1;
					
					$vid = (array)$this->buyers_model->get_vendor_email($Product['vendor_id'])->row();
					$email = $vid['email']; // vendor email id
					$name = $vid['vendor_name'];
					
					//send email
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';

					$this->email->initialize($config);
			
					$this->email->from('nucatalog@hotmail.com', 'NuCatalog');
					$this->email->to($email);
					
					$html = 'Dear <b>'.$name.'</b>, <br><br> <h4> You have new order from a buyer, Please Login to your vendor panel for more details...!</h4> <br> <br> Thanks and Regards, <br> Team NuCatalog, <br> www.nucatalog.com';
					//echo $html;
					$this->email->subject('NuCatalog.com - Orders Notification.');
					$this->email->message($html);
					$this->email->send();
					
				}
     			
		     	$data['total_price'] = $price;
		     	$data['table_value'] = $cart2;
					    
				$this->cart_template->show('buyer_home/cart_final_view',$data);
   			}
   			else 
		   	{
		   		redirect('welcome', 'refresh');
		   	}
 		}
		
		function pdf($order_no,$id)
		{
			// PDF GENERATING
			$this->load->library('fpdf');
			define('FPDF_FONTPATH','font/');
			$this->load->library('fpdi');
			$pdf =new FPDI('L','mm','A4');
			
			// GLOBAL VARIABLES
			$reportName = "ORDER SLIP [".strtoupper($order_no)."]";
			$pdf_name = 'OrderSlip['.strtoupper($order_no).'].pdf';
			
			$pdf->AliasNbPages();
			
			// PAGE STARTS
			$pdf->AddPage();
			
			$pdf->SetTextColor(100,100,100);
			$pdf->SetFont( 'Arial', 'B', 15 );
			$pdf->Cell( 0, 5, $reportName, 0, 0, 'C' );
			$pdf->Ln(10);
			
			
			$get_order = (array)$this->buyers_model->get_orders2($order_no,$id)->result();
			//print_r($get_order);
			
			$total = '';
			foreach($get_order as $order){
				$det = (array)$this->buyers_model->get_vendor_email($order->vendor_id)->row();
				//print_r($det);
				
				$pdf->Cell( 0, 6, '', 0, 0, 'L' );
				$pdf->Ln(11);
				
				// VENDOR NAME
				$pdf->SetTextColor(100,100,100);
				$pdf->SetFont( 'Arial', '', 13 );
				$pdf->Cell( 0, 6, 'Vendor Name :'.$det['vendor_name'], 0, 0, 'L' );
				$pdf->Ln(11);
				
				// TABLE HEADER
				$pdf->SetFont( 'Arial', '', 10);
				$pdf->SetTextColor(244,244,244);
				$pdf->SetFillColor(33,33,33);
				$pdf->Cell( 20, 7, "S.No", 1, 0, 'C', true );
				$pdf->Cell( 50, 7, "Brand", 1, 0, 'C', true );
				$pdf->Cell( 50, 7, "Product", 1, 0, 'C', true );
				$pdf->Cell( 50, 7, "Size", 1, 0, 'C', true );
				$pdf->Cell( 50, 7, "Qty", 1, 0, 'C', true );
				$pdf->Cell( 50, 7, "Price", 1, 0, 'C', true );
					
				$pdf->Ln(7);
				$pdf->SetTextColor(33,33,33);
				
				$get_order1 = (array)$this->buyers_model->get_orders3($order_no,$id,$order->vendor_id)->result();
				//print_r($get_order1);
				
				$i = 0;
				$price = '';
				foreach($get_order1 as $order1){
					$res = (array)$this->buyers_model->get_order_cart1($id,$order1->cart_id)->row();
					//print_r($res);die;
					
					$Prices   = (array)$this->buyers_model->get_price($res['size_id'])->row();	
					$Product  = (array)$this->buyers_model->get_product($res['product_id'])->row();
					//print_r($Product);
					$size = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_from'])->row();
					$size1 = (array)$this->sadmin_model->get_sizes_list12($Prices['sizes_to'])->row();
					
					$pdf->Cell( 20, 7, ++$i, 1, 0, 'C', false );
					$pdf->Cell( 50, 7, $Product['brand_name'], 1, 0, 'C', false );
					$pdf->Cell( 50, 7, $Product['description'], 1, 0, 'C', false );
					$pdf->Cell( 50, 7, $size['sizes'].' - '.$size1['sizes'], 1, 0, 'C', false);
					$pdf->Cell( 50, 7, $res['quantity'], 1, 0, 'C', false );
					$pdf->Cell( 50, 7, number_format($res['quantity']* $Product['sales_packages'] * $Prices['price'],2).' /-', 1, 0, 'R', false );
					$pdf->ln(7);
					
					$price = $price +  $res['quantity']* $Product['sales_packages'] * $Prices['price'];
				}
				
				$total = $total + $price;
				
				$pdf->SetFont( 'Arial', 'B', 10 );
				$pdf->Cell( 20, 7, '', 1, 0, 'C', false );
				$pdf->Cell( 50, 7, '', 1, 0, 'C', false );
				$pdf->Cell( 50, 7, '', 1, 0, 'C', false );
				$pdf->Cell( 50, 7, '', 1, 0, 'C', false);
				$pdf->Cell( 50, 7, 'Total', 1, 0, 'C', false );
				$pdf->Cell( 50, 7, number_format($price,2).' /-', 1, 0, 'R', false );
				$pdf->ln(7);
			}
			
			$pdf->Ln(7);
			$pdf->SetTextColor(33,33,33);
			$pdf->SetFont( 'Arial', 'B', 12 );
					
			$pdf->Cell( 230, 7, 'Grand Total : ', 0, 0, 'R', false );
			$pdf->Cell( 50, 7,'Rs '.number_format($total,2).' /-', 0, 0, 'L', false );
			
			/*$pdf->Ln(20);
			$pdf->SetTextColor(2,58,104);
			$pdf->SetFont( 'Arial', 'B', 12 );
			$pdf->Cell( 20, 7,' Copyrights 2016. NuCatalog.', 0, 0, 'L', false,'http://www.nucatalog.com');
			$pdf->Cell( 220, 7,'Powered by EMEfocus', 0, 0, 'R', false,'http://www.emefocus.com');*/
			
			$pdf->Output($pdf_name,'D');
			//$pdf->Output();
		}
		
		function delete_final_cart($id)
 		{
 			if($this->session->userdata('logged_in'))
   			{
			     $session_data = $this->session->userdata('logged_in');
			     $data['vendor_name'] = $session_data['buyer_name'];
			     $data['id'] = $session_data['id'];
			     
			     $this->buyers_model->delete_cart_final($id);
			     
			     redirect('buyer_home/view_final_cart');
			}
   			else 
   			{
   				redirect('welcome');
   			}
 		}
 
 		function add_product_view($id)
 		{
 			if($this->session->userdata('logged_in'))
   			{
				$session_data = $this->session->userdata('logged_in');
				$data['vendor_name'] = $session_data['buyer_name'];
				$data['buyer_name'] = $session_data['buyer_name'];		
				$data['id'] = $session_data['id'];
				     
				$session_data = $this->session->userdata('sub_categories');
			    $data['sub_category'] = $session_data['categories'];	
			        	        
			    $data['category_list'] =  $this->main_categories();
			    $data['categories'] = (array)$this->sadmin_model->get_categories()->result();
			        
				//$data['product_id'] = $this->input->post('product_id');
				$data['product_id'] = $id;
			    //$data['price_id']   = '';
			    $data['count'] = $this->buyers_model->product_count();
			    
			    $wish_products = $this->wish_list();
	     		$data['wish_list'] = $wish_products['wish_list'];
	     		$data['list_count'] = $wish_products['list_count'];
	     		  
	     		$data['reviews'] =(array)$this->buyers_model->get_reviews($data['product_id'],'1')->result();
				    
				$today = date('Y-m-d H:i:s');
				    
				//$data['Prices']   = (array)$this->buyers_model->get_price($data['price_id'])->row();	
				$data['Product']  = (array)$this->buyers_model->get_product($data['product_id'])->row();
				         
				$data['sizes']     = (array)$this->buyers_model->product_sizes($data['product_id'])->result();
				//print_r($data['sizes']);
				$data['images']   = (array)$this->buyers_model->get_images($data['product_id'])->result();
				$data['images1']  = (array)$this->buyers_model->get_images($data['product_id'])->row();
					         
				$return_data = $this->cart_product_list();				         
				$data['carts'] = $return_data['carts'];
	     		$data['price_total'] = $return_data['price_total'];
	     		$data['cart_count']  = $return_data['cart_count'];
	     			         
				$this->cart_template->show('buyer_home/product_view',$data);
   			}
	   		else 
	   		{
	   			redirect('welcome', 'refresh');
	   		}
  		}
  		
  		function price()
  		{
  			$size_id = $this->input->post('size_id');
  			$res = (array)$this->buyers_model->product_price($size_id)->row();
  			$price = $res['price'];
  			echo '<p class="product-page-desc" id="price">Price : Rs. '.$price.' /-</p>';
  		}
  		
 		function delete_cart($id)
 		{
 	       if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];		
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id']  = $session_data['id'];	  
			    
			    $this->buyers_model->delete_cart_prodcut($id);
			    
			    redirect('buyer_home/');
   			}
   			else 
   			{
   				redirect('welcome', 'refresh');
   			} 	
 		}
 
 		function products_category($category_id)
  		{
  			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];	
			    $data['buyer_name'] = $session_data['buyer_name'];			
			    $data['id']  = $session_data['id'];	    
			    $Products =(array)$this->buyers_model->all_products()->result(); 			     
			    $categories = (array)$this->sadmin_model->get_categories()->result();
			    $data['category'] =(array)$this->sadmin_model->get_category($category_id)->row();
     			$data['category_name']= ucwords($data['category']['category_name']);
     			$data['categories'] = $categories;
     			$session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
     			$data['category_id'] = $category_id;
     			$data['brand_value'] = '';
     			$return_data = $this->cart_product_list();				         
				$data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];
     			 
     			$data['brand_group'] =(array)$this->buyers_model->brand_group()->result();     			 
     			
     			
     			$options = array();
     			$options1 = array();
     			if($categories != null)
     			{                       
                	foreach($categories as $category)
                	{
                		if ($category->parent_category_id == '0')
                		{
                			$sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();
                			$options = '<li class="dropdown">
                            				'.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'
		                            		<ul class="dropdown-menu dropdown-menu-shipping-cart">
		                                		<li>'
		                							.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'
		                                		</li>
		                               		</ul>
                        				</li> ';
                        			
	                        array_push($options1, $options);
                        }                        		
					}                    
				}
                        
                $data['category_list'] = $options1;   
			     
				$options1 = array();
				$options2 = array();
				$categories = (array)$this->sadmin_model->get_categories()->result();
				   
				if($categories != null)
				{ 
					foreach ($categories as $categories1)
					{
						if($categories1->id == $category_id)
						{								
							$category1 = (array)$this->sadmin_model->get_category1($category_id)->result();	
						    array_push($options1,$categories1->id);
							if($category1  != null)
							{
								foreach($category1 as $category11)
								{
									array_push($options1,$category11->id);
									$category1= (array)$this->sadmin_model->get_category1($category11->id)->result();	
											
									if($category1  != null)
									{
										foreach($category1 as $category11)
										{
											array_push($options1,$category11->id);
										    $category1= (array)$this->sadmin_model->get_category1($category11->id)->result();	
											
											if($category1  != null)
											{
												foreach($category1 as $category11)
												{
													array_push($options1,$category11->id);
												 	$category1= (array)$this->sadmin_model->get_category1($category11->id)->result();	
											
													if($category1  != null)
													{
														foreach($category1 as $category11)
														{
															array_push($options1,$category11->id);
														 	$category1= (array)$this->sadmin_model->get_category1($category11->id)->result();	
											
															if($category1  != null)
															{
																foreach($category1 as $category11)
																{
																	array_push($options1,$category11->id);																																		
																}															
															}																																
														 }															
													}																												
												}													
											}																								
										}											
									}										
								}									
							}							
						}																			
					}						
				}
				else 
				{
					$options1 = '';
				}
					
				$values  = array();
				$values1 =array();
				if($options1 != null)
				{
					foreach($options1 as $opt)
					{
						 $Product11  =(array)$this->buyers_model->get_product_category($opt)->result();							 
						 foreach($Product11 as $Product)
						 {
						 	$images =(array)$this->buyers_model->get_images($Product->id)->row();
				         	if($images != null)
							{
								$image_name= $images['image_name'];
							}
							else 
							{
								$image_name= 'no_image.png';
							}
								 
							if($Product != null)
							{
								$values = '<div class="col-md-4">
					        				<div class="product ">
					                      		<ul class="product-labels">
				                                    <li>NEW</li>
				                                </ul>
					                            <div class="product-img-wrap">
					                            	<img class="product-img-primary" src="'. base_url().'images_products/'.$image_name.'" width="100px" height="200px" alt="Image Alternative text" title="Image Title" />
					                                <img class="product-img-alt" src="'. base_url().'images_products/'.$image_name.'" width="100px" height="200px" alt="Image Alternative text" title="Image Title" />
												</div>
					                            '. anchor('buyer_home/add_product_view/'.$Product->id,'&nbsp;','class="product-link"').'
					                            <div class="product-caption">                                  
					                            	<h5 class="product-caption-title">'.$Product->brand_name.'('.$Product->colors.')'.'</h5>
					                                <div class="product-caption-price"><span class="product-caption-price-new"></span>
					                                </div>
					                                <ul class="product-caption-feature-list">
					                                	<li>Free Shipping</li>
													</ul>
												</div>
											</div>
					                      </div>';
								array_push($values1, $values);
							}
						}
					}
				}
				else 
				{
					$data['Products1'] ='';
				}
				$data['Products1'] = $values1	;
				
				$wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
     			$data['list_count'] =$wish_products['list_count'];

				$this->buyer_template->show('buyer_home/buyer_home', $data);
			}
   			else 
   			{
   				//If no session, redirect to login page
     			redirect('welcome', 'refresh');
   			}
  		}
  		
  		function search_products()
  		{
  			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];	
			    $data['buyer_name'] = $session_data['buyer_name'];			
			    $data['id']  = $session_data['id'];	    
			    $Products =(array)$this->buyers_model->all_products()->result(); 			     
			    $categories = (array)$this->sadmin_model->get_categories()->result();
			    $data['category_name']='Search Products';
     			$data['categories'] = $categories;
     			$session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
     		    $data['brand_group'] =(array)$this->buyers_model->brand_group()->result();   
     			$data['brand_value'] = '';
     			 $return_data = $this->cart_product_list();				         
				 $data['carts'] = $return_data['carts'];
     			 $data['price_total'] = $return_data['price_total'];
     			 $data['cart_count']  = $return_data['cart_count'];
     			
     		  $serach =$this->input->post('search');
					
						$values  = array();
						$values1 =array();

		     $Product11 =(array)$this->buyers_model->search_products($serach)->result();	
					
						if($Product11 != null)
						{	 
							foreach($Product11 as $Product)
								 {
								  $images =(array)$this->buyers_model->get_images($Product->id)->row();
				         
					     			if($images != null)
								        {
								        	$image_name= $images['image_name'];
								        }
								        else 
								        {
								        	$image_name= 'no_image.png';
								        }
								 
								 
								 	
								 	$values ='<div class="col-md-4">
					                            <div class="product ">
					                                <ul class="product-labels">
				                                    <li>NEW</li>
				                                   </ul>
					                                <div class="product-img-wrap">
					                                    <img class="product-img-primary" src="'. base_url().'images_products/'.$image_name.'" width="100px" height="200px" alt="Image Alternative text" title="Image Title" />
					                                    <img class="product-img-alt" src="'. base_url().'images_products/'.$image_name.'" width="100px" height="200px" alt="Image Alternative text" title="Image Title" />
					                                </div>
					                                '. anchor('buyer_home/add_product_view/'.$Product->id,'&nbsp;','class="product-link"').'
					                                <div class="product-caption">                                  
					                                    <h5 class="product-caption-title">'.$Product->brand_name.'('.$Product->colors.')'.'</h5>
					                                    <div class="product-caption-price"><span class="product-caption-price-new"></span>
					                                    </div>
					                                    <ul class="product-caption-feature-list">
					                                        <li>Free Shipping</li>
					                                    </ul>
					                                </div>
					                            </div>
					                        </div>';
								 
								
								  array_push($values1, $values);
								 
								 
								}
							
						}
						else 
						{
							$data['Products1'] ='';
						}
						
					 	$data['Products1'] = $values1	;
					 	
					 	$wish_products = $this->wish_list();
     			        $data['wish_list'] = $wish_products['wish_list'];
     			        $data['list_count'] =$wish_products['list_count'];

					 	$this->buyer_template->show('buyer_home/buyer_home', $data);
			             
   			}
   			else 
   			{
   				//If no session, redirect to login page
     			redirect('welcome', 'refresh');
   			}
  		
  		}
  		function products_brand($brand)
  		{
			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];		
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id']  = $session_data['id'];	    
			    $Products =(array)$this->buyers_model->all_products()->result(); 			     
			    $categories = (array)$this->sadmin_model->get_categories()->result();
			    $data['category_name']=ucwords($brand);
     			$data['categories'] = $categories;
     			$session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
     		    $data['brand_group'] =(array)$this->buyers_model->brand_group()->result();   
     			$data['brand_value'] = '';
     			 $return_data = $this->cart_product_list();				         
				 $data['carts'] = $return_data['carts'];
     			 $data['price_total'] = $return_data['price_total'];
     			 $data['cart_count']  = $return_data['cart_count'];
     			
     		  
					
						$values  = array();
						$values1 =array();

		     $Product11 =(array)$this->buyers_model->search_products1($brand)->result();	
					
						if($Product11 != null)
						{	 
							foreach($Product11 as $Product)
								 {
								  $images =(array)$this->buyers_model->get_images($Product->id)->row();
				         
					     			if($images != null)
								        {
								        	$image_name= $images['image_name'];
								        }
								        else 
								        {
								        	$image_name= 'no_image.png';
								        }
								 
								 
								 	
								 	$values ='<div class="col-md-4">
					                            <div class="product ">
					                                <ul class="product-labels">
				                                    <li>NEW</li>
				                                   </ul>
					                                <div class="product-img-wrap">
					                                    <img class="product-img-primary" src="'. base_url().'images_products/'.$image_name.'" width="100px" height="200px" alt="Image Alternative text" title="Image Title" />
					                                    <img class="product-img-alt" src="'. base_url().'images_products/'.$image_name.'" width="100px" height="200px" alt="Image Alternative text" title="Image Title" />
					                                </div>
					                                '. anchor('buyer_home/add_product_view/'.$Product->id,'&nbsp;','class="product-link"').'
					                                <div class="product-caption">                                  
					                                    <h5 class="product-caption-title">'.$Product->brand_name.'('.$Product->colors.')'.'</h5>
					                                    <div class="product-caption-price"><span class="product-caption-price-new"></span>
					                                    </div>
					                                    <ul class="product-caption-feature-list">
					                                        <li>Free Shipping</li>
					                                    </ul>
					                                </div>
					                            </div>
					                        </div>';
								 
								
								  array_push($values1, $values);
								 
								 
								}
							
						}
						else 
						{
							$data['Products1'] ='';
						}
						
					 	$data['Products1'] = $values1	;
					 	
					 	$wish_products = $this->wish_list();
     			        $data['wish_list'] = $wish_products['wish_list'];
     			        $data['list_count'] =$wish_products['list_count'];

					 	$this->buyer_template->show('buyer_home/buyer_home', $data);
			             
   			}
   			else 
   			{
   				//If no session, redirect to login page
     			redirect('welcome', 'refresh');
   			}
  			
  		}
  		
  		function view_product($product_id)
  		{
  			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id']  = $session_data['id'];
			    $data['menu_active'] = 'vendor_home';
			    $data['page_title'] = 'Dashboard';
			    $Product  =(array)$this->buyers_model->get_product($product_id)->row();
			    $data['category_id'] = $Product['parent_category'];
			    $data['category'] =(array)$this->sadmin_model->get_category($Product['category'])->row();
			    $data['category_name']= ucwords($data['category']['category_name']);
			    $data['brand_group'] =(array)$this->buyers_model->brand_group()->result();   
			    $data['brand_value'] = 'ddd';
			    $session_data = $this->session->userdata('sub_categories');
		        $data['sub_category'] = $session_data['categories'];
		        
		        $wish_products = $this->wish_list();
     			$data['wish_list'] = $wish_products['wish_list'];
			    $data['list_count'] =$wish_products['list_count'];
			    
			    $products_cart = (array)$this->buyers_model->get_cart($data['id'])->result();
     		    $return_data = $this->cart_product_list();				         
				$data['carts'] = $return_data['carts'];
     			$data['price_total'] = $return_data['price_total'];
     			$data['cart_count']  = $return_data['cart_count'];
			    
			   	$categories = (array)$this->sadmin_model->get_categories()->result();
     		   	$data['categories'] = $categories;
     			
     			$options = array();
     			$options1 = array();
     			if($categories != null)
     			{                       
                	foreach($categories as $category)
                	{
                		if ($category->parent_category_id == '0')
                		{
                			$sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();
                			$options = '<li class="dropdown">
                            				'.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'
                            				<ul class="dropdown-menu dropdown-menu-shipping-cart">
                                				<li>
                                    				'.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'
                                				</li>
                            				</ul>
                        				</li> ';
                        		
	                        array_push($options1, $options);
                    	}                        		
                	}                    
				}
                        
                $data['category_list'] = $options1;  
	
			    $Prices =(array)$this->buyers_model->product_sizes($product_id)->result();
				//print_r($Prices);
			    $Product  =(array)$this->buyers_model->get_product($product_id)->row();
			    //print_r($Product);
			    $options  = array();
			    $options1 = array();
			    
			    if($Prices != null)
			    {
			    	$images =(array)$this->buyers_model->get_images($product_id)->row();
			    	if($images != null)
					{
						$data['image_name']= $images['image_name'];
					}
					else 
					{
						$data['image_name']= 'no_image.png';
					}

					foreach($Prices as $Price)
					{
					    $price[]    = number_format($Price->price, 2);
					}
					
					$data['price'] = $price;
					$data['size'] = $Prices;			 
			    }
			    else  
			    {
			    	$options1 = '';
			    }
			   
			    //$data['options'] = $options1;  
			    $data['Product'] = $Product;   
			    
     			$this->buyer_template->show('buyer_home/view_product', $data);
   			}
   			else
   			{
     			//If no session, redirect to login page
     			redirect('welcome', 'refresh');
   			}
  		}
  		
  		function add_product_cart()
  		{
  			if($this->session->userdata('logged_in'))
   			{
			 	$session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id'] = $session_data['id'];
			    
			    $product_id = $this->input->post('product_id');
			    $size_id   = $this->input->post('sizes');
				$qty = $this->input->post('qty');
			    //echo $size_id;die;
			    $today = date('Y-m-d H:i:s');
			    
			    $insert_data =array( 'product_id' => $product_id, 
			    					 'size_id'   => $size_id,
			    					 'buyer_id'   => $data['id'],
									 'quantity' => $qty,
			    					 'status'     => '1',
			    					 'updated_on' => $today);
			                           
			    $this->buyers_model->add_cart($insert_data);			     
			   	redirect('buyer_home/add_product_view/'.$product_id);
			}
   			else 
   			{
   				redirect('welcome', 'refresh');
   			}
  		}
  		
  		function add_product_cart1($cart_id)  		
  		{
  			if($this->session->userdata('logged_in'))
   			{
			     $session_data = $this->session->userdata('logged_in');
			     $data['vendor_name'] = $session_data['buyer_name'];
			     $data['buyer_name'] = $session_data['buyer_name'];		
			     $data['id'] = $session_data['id'];
			    
			   
			    $today = date('Y-m-d H:i:s');
			    
			    $insert_data =array( 
			    					 'updated_on' => $today,
			    					 'status'     => '1'
			    					
			                           );
			                           
			     
			     $this->buyers_model->update_cart($insert_data,$cart_id);			     
			     redirect('buyer_home');
			    
   			}
   			else 
   			{
   				redirect('welcome', 'refresh');
   			}
  		}
  		function add_wish_product()
  		{	
  			if($this->session->userdata('logged_in'))
   			{
			    $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id'] = $session_data['id'];

			    $product_id = $this->input->post('product_id');
			    
			    $today = date('Y-m-d H:i:s');

			    $insert_data =array( 'product_id' => $product_id, 
			    					 //'size_id'	  => $size_id,
			    					 'buyer_id'   => $data['id'],
			    					 'updated_on' => $today,
			    					 'status'     => '0');
			                           
				$this->buyers_model->add_cart($insert_data);			          
			    
				redirect('buyer_home/add_product_view/'.$product_id);
			    
			    
   			}
   			else 
   			{
   				redirect('welcome', 'refresh');
   			}
  			
  		}
  		
 function main_categories()
 {
 	            $session_data = $this->session->userdata('logged_in');
			    $data['vendor_name'] = $session_data['buyer_name'];
			    $data['buyer_name'] = $session_data['buyer_name'];		
			    $data['id'] = $session_data['id'];
			    
 				$categories = (array)$this->sadmin_model->get_categories()->result();
 	            $options = array();
     			$options1 = array();
     			if($categories != null){                       
                        	foreach($categories as $category)
                        	{
                        		if ($category->parent_category_id == '0')
                        		{
                        			$sub_categories =(array)$this->sadmin_model->get_category($category->id)->result();
                        			
	                        
                        			
                        			$options = array( $category->id =>'     
                   			
                        	<li class="dropdown">
                            '.anchor('buyer_home/products_category/'.$category->id,ucwords($category->category_name)).'
                            
                        ');
                        			
                        			
                        			
	                        		$options1 =$options1 + $options;
                        		}                        		
                        	}                    
                        }
                        
        	return   $options1;
		}
 
 		function cart_product_list()
 		{
	 	 	$session_data = $this->session->userdata('logged_in');
		 	$data['vendor_name'] = $session_data['buyer_name'];
		 	$data['buyer_name'] = $session_data['buyer_name'];		
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
 
		function wish_list()
		{
			 $session_data = $this->session->userdata('logged_in');
			 $data['vendor_name'] = $session_data['buyer_name'];
			 $data['buyer_name'] = $session_data['buyer_name'];		
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
								<span style="float:right">'.anchor('buyer_home/delete_cart/'.$cart->id,'<i class="fa fa-times text-danger"></i>').'&nbsp;&nbsp;'.anchor('buyer_home/add_product_view/'.$cart->product_id,'<i class="fa fa-check text-success"></i>').'</span>
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
		
 		function product_review()
 		{
		 	$session_data = $this->session->userdata('logged_in');
			$data['buyer_name'] = $session_data['buyer_name'];
			$data['id'] = $session_data['id'];
	
		 	//$price_id = $this->input->post('price_id');
		 	$product_id = $this->input->post('product_id');
		 	$review = ucwords($this->input->post('review'));
 	 
 			$today =date('Y-m-d H:i:s');
 	
		 	$insert_data = array( 'product_id' =>$product_id,
		 						  'price_id' => '',
		 						  'review_product' =>$review,
		 	                      'updated_by' =>$data['buyer_name'],
		 	                      'updated_on' =>$today
		 	                      );
 	                      
 	                     
	 	  	$this->buyers_model->add_review_product($insert_data);
	 	  	$reviews =(array)$this->buyers_model->get_reviews($product_id,'1')->result();
 	
 			echo '<ul class="blog-sidebar-comments">';                           
                                
            if($reviews != null)
            {  
            	foreach($reviews as $review)
            	{               
                 	echo '<li>
                         	<p class="blog-sidebar-comments-meta">'. $review->review_product.'</p>
							<p class="blog-sidebar-comments-body">'. 'Review By:'.$review->updated_by.','. date('Y M d', strtotime($review->updated_on)).'</p>
                         </li>';  
				} 
           	}
            else
            {
            	echo '-- No Reviews --';
            }
            echo '</ul>';
 		}
 
 		function logout()
  		{
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('welcome', 'refresh');
  		}
	}