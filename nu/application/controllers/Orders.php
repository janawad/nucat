<?php	defined('BASEPATH') OR exit('No direct script access allowed');

	class Orders extends CI_Controller 
	{
		function __construct() 
  		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('buyers_model','',TRUE);
			$this->load->model('vendors_model','',TRUE);
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
     			
			    $res = (array)$this->buyers_model->get_user_orders1($data['id'])->result();
				
				
				$tmpl = array('table_open' => '<table class="table table-striped table-hover">',
								
								'heading_row_start' => '<tr class="bg-blue">',
								'heading_row_end' => '</tr>',
								'heading_cell_start' => '<th>',
								'heading_cell_end' => '</th>',
								
								'row_start' => '<tr>',
								'row_end' => '</tr>',
								'cell_start' => '<td>',
								'cell_end' => '</td>',
								
								'table_close' => '</table>');
				
				$this->table->set_template($tmpl);
				$this->table->set_heading('Sl No.',
											'Order ID',
											'Buyer Name',
											'Product Id',
											'Image',
											'Color',
											'Quantity',
											'price',
											'Order Date',
											'Total No. of Products',
											'Print Order'
											);
				
				if ($res)	
				{
					$i = 0;
					foreach($res as $order){
					//print_r($order);exit;
						$a = date_create($order->updated_on);
						$date = date_format($a,'d M Y');
						$buyer_det = (array)$this->vendors_model->get_buyer_det($order->buyer_id)->row();
						$productdetail = (array)$this->vendors_model->get_productid($order->cart_id)->row();
						$productdetails = (array)$this->vendors_model->get_productss($productdetail['product_id'])->row();
						//print_r($productdetails );exit;
						if($productdetails['image_name'] !=""){
						
                                         $imgg = '<img src="http://nucatalog.com/nu/images_products/'.$productdetails['image_name'].'" width="84px" height="97px">';
                                                 }
                                                 else{
			                           $imgg = "No Image found";		
			                              }
						$this->table->add_row(++$i,
												anchor('orders/order_view/'.$order->order_id, $order->order_id, 'class="btn btn-warning"'),$buyer_det['buyer_name'],$productdetail['productid'],$imgg,
												$productdetail['productcolor'],$productdetail['quantity'],$productdetails['price'],
												
												$date,
												$order->count,
												anchor('buyer_home/pdf/'.$order->order_id.'/'.$data['id'],'<i class="fa fa-print"></i> Print','class="btn "  style="background-color: #96b6ce;border-color:#96b6ce" target="_blank"')
												
												);
					}
					$data['table'] = $this->table->generate();
				}
				else
				{
					$data['table'] = '<h4> -- No Orders Found Yet --</h4>';
				}
				
			    $this->home_template->show('buyer_home/my_orders_view',$data);
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}
		}
		
		function vieworder()
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
     			
			    $res = (array)$this->buyers_model->get_user_orders1($data['id'])->result();
				//print_r($res);
				
				$tmpl = array('table_open' => '<table class="table table-striped table-hover">',
								
								'heading_row_start' => '<tr class="bg-blue">',
								'heading_row_end' => '</tr>',
								'heading_cell_start' => '<th>',
								'heading_cell_end' => '</th>',
								
								'row_start' => '<tr>',
								'row_end' => '</tr>',
								'cell_start' => '<td>',
								'cell_end' => '</td>',
								
								'table_close' => '</table>');
				
				$this->table->set_template($tmpl);
				$this->table->set_heading('Sl No.',
											'Order ID',
											'Order Date',
											'Total No. of Products',
											'Print Order'
											);
				
				if ($res)	
				{
					$i = 0;
					foreach($res as $order){
						$a = date_create($order->updated_on);
						$date = date_format($a,'d M Y');
						
						$this->table->add_row(++$i,
												anchor('orders/order_view/'.$order->order_id, $order->order_id, 'class="btn btn-warning"'),
												$date,
												$order->count,
												anchor('buyer_home/pdf/'.$order->order_id.'/'.$data['id'],'<i class="fa fa-print"></i> Print','class="btn btn-success"  style="background-color: #96b6ce;border-color:#96b6ce" target="_blank"')
												
												);
					}
					$data['table'] = $this->table->generate();
				}
				else
				{
					$data['table'] = '<h4> -- No Orders Found Yet --</h4>';
				}
				
			    $this->home_template->show('buyer_home/my_orders_view',$data);
   			}
   			else 
   			{
   				redirect('welcome','refresh');
   			}
		}
		
		
		function order_view($order_id)
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
     			
				$data['order_id'] = $order_id;
			    $data['get_order'] = (array)$this->buyers_model->get_orders1($order_id,$data['id'])->result();
				//print_r($data['get_order']);
				
			    $this->home_template->show('buyer_home/orders_view',$data);
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
	}