<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Sadmin_home extends CI_Controller {

 	function __construct() {
    	parent::__construct();
    	$this->load->model('sadmin_model','',TRUE);
        $this->load->model('vendors_model','',TRUE);
        $this->load->model('buyers_model','',TRUE);
		date_default_timezone_set('Asia/Kolkata');
 	}

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['menu_active'] = 'sadmin_home';
     $data['page_title'] = 'Dashboard';
     
     // COUNTS
     $data['count_all_vendors'] =  $this->vendors_model->count_all_vendors();
     $data['count_all_buyers'] =  $this->buyers_model->count_all_buyers();
     $data['count_all_products'] =  $this->vendors_model->count_all_products();

     // PRODUCTS
     $products = (array)$this->vendors_model->get_latest_products()->result();
     if($products != null){
        $this->load->library('table');
        $this->table->set_empty("");
        
        $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap">');
        $this->table->set_template($table_setup);
        $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
        $this->table->set_heading('#',
                                  'Business Name ',
                                  'Brand',
                                  'Product ID',
                                  'Inventory',
                                  'Availability' ,
                                  $heading_last                               
                                );
        $i = 1;
        foreach ($products as $products1) {
            $status = $products1->status;
            $Vendor = (array)$this->vendors_model->get_by_id($products1->vendor_id)->row();
  //print_r($Vendor);exit;
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
            
            $this->table->add_row($i++, 
                                    anchor('vendors/view/'.$products1->vendor_id,$Vendor['business_name']),                    
                                    anchor('categories/view_product/'.$products1->id,$products1->brand_name),
                                    anchor('categories/view_product/'.$products1->id, $products1->product_id),
                                    $products1->inventory,    
                                    $products1->availability,
                                    $actions_list
                                );
        }

        $data['products_table'] = $this->table->generate();
     }else{
        $data['products_table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new products found..!</h6></center>";
     }  

     // VENDORS
     $vendors = (array)$this->vendors_model->get_latest_vendors()->result();
     if($vendors != null){
        $this->load->library('table');
        $this->table->set_empty("");
        
        $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap">');
        $this->table->set_template($table_setup);
        $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
        $this->table->set_heading('#',
                                  'Vendor Name',
                                  'Business Name ',
                                  $heading_last                               
                                );
        $i = 1;
        foreach ($vendors as $vendors1) {
            $list = '<ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>'.anchor('vendors/accept/'.$vendors1->id,'<i class="icon-database-check"></i> Accept').'</li>
                                <li>'.anchor('vendors/reject/'.$vendors1->id,'<i class="icon-database-remove"></i> Reject').'</li>
                                <li class="divider"></li>
                                <li>'.anchor('vendors/view/'.$vendors1->id,'<i class="icon-file-eye"></i> View').'</li>
                                 
                            </ul>
                        </li>
                    </ul>';
            $actions_list = array('data' => $list, 'class' => 'text-center');
            
            $this->table->add_row($i++, 
                                    anchor('vendors/view/'.$vendors1->id,$vendors1->vendor_name),
                                    anchor('vendors/view/'.$vendors1->id, $vendors1->business_name),
                                    $actions_list
                                );
        }

        $data['vendors_table'] = $this->table->generate();
     }else{
        $data['vendors_table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new vendors found..!</h6></center>";
     }

     // BUYERS
     $buyers = (array)$this->buyers_model->get_latest_buyers()->result();
     if($buyers != null){
        $this->load->library('table');
        $this->table->set_empty("");
        
        $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap">');
        $this->table->set_template($table_setup);
        $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
        $this->table->set_heading('#',
                                  'Buyer Name',
                                  'Business Name ',
                                  $heading_last                               
                                );
        $i = 1;
        foreach ($buyers as $buyers1) {
            $list = '<ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>'.anchor('buyers/accept/'.$buyers1->id,'<i class="icon-database-check"></i> Accept').'</li>
                                <li>'.anchor('buyers/reject/'.$buyers1->id,'<i class="icon-database-remove"></i> Reject').'</li>
                                <li class="divider"></li>
                                <li>'.anchor('buyers/view/'.$buyers1->id,'<i class="icon-file-eye"></i> View').'</li>
                                 
                            </ul>
                        </li>
                    </ul>';
            $actions_list = array('data' => $list, 'class' => 'text-center');
            
            $this->table->add_row($i++, 
                                    anchor('buyers/view/'.$buyers1->id,$buyers1->buyer_name),
                                    anchor('buyers/view/'.$buyers1->id, $buyers1->business_name),
                                    $actions_list
                                );
        }

        $data['buyers_table'] = $this->table->generate();
     }else{
        $data['buyers_table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new buyers found..!</h6></center>";
     }




     $this->sadmin_template->show('sadmin_home/home_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('sadmin', 'refresh');
   }
 }
 
	function change_pwd(){
		if($this->session->userdata('logged_in')) {
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		$data['menu_active'] = 'change_password';
     		$data['page_title'] = 'Change Password';
     		
			if ($this->uri->segment(3) == 'err') {
				$data['msg'] = 'Invalid Current password..!!';
				$data['cls'] = 'alert alert-danger';
			}elseif ($this->uri->segment(3) == 'same') {
				$data['msg'] = 'Current and New Password are same. Please enter different one..!!!';
				$data['cls'] = 'alert alert-warning';
			}else {
				$data['msg'] = '';
				$data['cls'] = '';
			}
			
			$this->form_validation->set_rules('cur_pwd','Password','required');
			if ($this->form_validation->run() === FALSE) {
					$this->sadmin_template->show('sadmin_home/change_pwd', $data);
			}else {
				$cur_pwd = $this->input->post('cur_pwd');
				$new_pwd = $this->input->post('new_pwd');
				
				$res = $this->sadmin_model->login($data['username'],$cur_pwd);
				
				if ($res) {
					if ($cur_pwd != $new_pwd){
						$det = array('password'=>md5($new_pwd));
						$tb_name = 'sadmin';
						$this->sadmin_model->updated_det($det,$res[0]->id,$tb_name);
						
						redirect('sadmin_home/logout');
					}else {
						redirect('sadmin_home/change_pwd/same');
					}
				}else {
					redirect('sadmin_home/change_pwd/err');
				}
			}     		
   		}else {
     		//If no session, redirect to login page
     		redirect('sadmin', 'refresh');
   		}
	}
	
	function colors(){
		if($this->session->userdata('logged_in')) {
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		$data['menu_active'] = 'catalog';
     		$data['page_title'] = 'Colors';
     		$data['action'] = 'sadmin_home/colors';
     		$data['a'] = '0';
     		
     		if ($this->uri->segment(3) == 'added'){
     			$data['msg'] = 'Successfully Added Color..!!!';
     			$data['cls'] = 'alert alert-success text-center';
     		}elseif ($this->uri->segment(3) == 'update'){
     			$data['msg'] = 'Successfully Updated Color..!!!';
     			$data['cls'] = 'alert alert-success text-center';
     		}elseif ($this->uri->segment(3) == 'delete'){
     			$data['msg'] = 'Successfully Deleted Color..!!!';
     			$data['cls'] = 'alert alert-warning text-center';
     		}else {
     			$data['msg'] = '';
     			$data['cls'] = '';
     		}
     		
     		$tb_name = 'colors';
     		$data['colors'] = (array)$this->sadmin_model->get_info($tb_name)->result();
			
     		$this->form_validation->set_rules('color','Color','trim|xss_clean');
     		if ($this->form_validation->run() === false){
     			$data['cors'] = array('color_name'=>'');
     			$this->sadmin_template->show('categories/color', $data);
     		}else {
     			$color = $this->input->post('color');
     			
     			$det = array('color_name'=>$color, 'updated_by'=>$data['username'], 'updated_on'=>date('Y-m-d H:i:s'));
     			$tb_name = 'colors';
     			
     			$this->sadmin_model->insert_det($det,$tb_name);
     			
     			redirect('sadmin_home/colors/added');
     		}
		}else {
     		//If no session, redirect to login page
     		redirect('sadmin', 'refresh');
   		}
	}
	
	function colors_del($id){
		if($this->session->userdata('logged_in')) {
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		$data['menu_active'] = 'catalog';
     		$data['page_title'] = 'Colors';
     		
     		$tb_name = 'colors';
     		$this->sadmin_model->delete_det($id,$tb_name);
     		
     		redirect('sadmin_home/colors/delete');
		}else {
     		//If no session, redirect to login page
     		redirect('sadmin', 'refresh');
   		}
	}
	
	function colors_edit($id){
		if($this->session->userdata('logged_in')) {
     		$session_data = $this->session->userdata('logged_in');
     		$data['username'] = $session_data['username'];
     		$data['menu_active'] = 'catalog';
     		$data['page_title'] = 'Colors';
     		$data['action'] = 'sadmin_home/colors_edit/'.$id;
     		$data['a'] = '1';
     		
     		$tb_name = 'colors';
     		$data['colors'] = (array)$this->sadmin_model->get_info($tb_name)->result();
			$color = (array)$this->sadmin_model->get_by_id($id,$tb_name)->row();
     		
     		$this->form_validation->set_rules('color','Color','trim|xss_clean');
     		if ($this->form_validation->run() === false){
     			$data['cors'] = $color;
     			$data['msg'] = '';
     			$data['cls'] = '';
     			$this->sadmin_template->show('categories/color', $data);
     		}else {
     			$color = $this->input->post('color');
     			
     			$det = array('color_name'=>$color, 'updated_by'=>$data['username'], 'updated_on'=>date('Y-m-d H:i:s'));
     			$tb_name = 'colors';
     			
     			$this->sadmin_model->update_det($id,$det,$tb_name);
     			
     			redirect('sadmin_home/colors/update');
     		}
		}else {
     		//If no session, redirect to login page
     		redirect('sadmin', 'refresh');
   		}
	}

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('sadmin', 'refresh');
 }


 // REPORTS
 function subscription(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reports';
        $data['page_title'] = 'Subscription Expired Vendors List';
             
        $vendors = (array)$this->sadmin_model->get_info('vendors')->result();
        
        if($vendors){
            $this->load->library('table');
            $this->table->set_empty("");
            
            $table_setup = array ('table_open'  => '<table class="table table-hover table-nowrap">');
            $this->table->set_template($table_setup);
            $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
            $this->table->set_heading('#',
                                      'Vendor Name',
                                      'Business Name',
                                      'Mobile',
                                      'Email',
                                      'Package',
                                      'Validity',
                                      'Reg. Date',
                                      'Exp. Date'
                                    );
            $i = 1;
            foreach ($vendors as $vendors1){
                $pk = $vendors1->package;
                    if($pk == 1) $pk_name = "Seed";
                    if($pk == 2) $pk_name = "Grow";
                    if($pk == 3) $pk_name = "Establish";
                    if($pk == 4) $pk_name = "Enterprise";
                $validity = $vendors1->package;
                    if($validity == 1) $validity_name = "6 Months";
                    if($validity == 2) $validity_name = "12 Months";

                $activation_date = $vendors1->activation_date;
                     if($validity == 1){
                        $exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
                        $expire = date('Y-m-d', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
                     }
                     if($validity == 2){
                        $exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
                        $expire = date('Y-m-d', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
                     }

                $today = date("Y-m-d");
                $today_time = strtotime($today);
                $expire_time = strtotime($expire);
                if ($expire_time < $today_time) {
                    $this->table->add_row($i++, 
                                    anchor('vendor_home/view_product/'.$vendors1->id,$vendors1->vendor_name),
                                    $vendors1->business_name,
                                    $vendors1->mobile,
                                    $vendors1->email,
                                    $pk_name,
                                    $validity_name,
                                    date('d-m-Y', strtotime($vendors1->activation_date)),
                                    $exp_date
                                );
                }
            }
            if($i == 1){
                $data['table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new subscription found..!</h6></center>";
            }else
                $data['table'] = $this->table->generate();
        }else{
            $data['table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new subscription found..!</h6></center>";
        }
                       
        $this->sadmin_template->show('sadmin_home/subscription', $data);
             
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }

 function subscription_download(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reports';
        $data['page_title'] = 'Subscription Expired Vendors List';
             
        $vendors = (array)$this->sadmin_model->get_info('vendors')->result();
        
        if($vendors){
            $this->load->library('table');
            $this->table->set_empty("");
            
            $table_setup = array ('table_open'  => '<table border="1" class="table table-hover table-nowrap">');
            $this->table->set_template($table_setup);
            $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
            $this->table->set_heading('#',
                                      'Vendor Name',
                                      'Business Name',
                                      'Mobile',
                                      'Email',
                                      'Package',
                                      'Validity',
                                      'Reg. Date',
                                      'Exp. Date'
                                    );
            $i = 1;
            foreach ($vendors as $vendors1){
                $pk = $vendors1->package;
                    if($pk == 1) $pk_name = "Seed";
                    if($pk == 2) $pk_name = "Grow";
                    if($pk == 3) $pk_name = "Establish";
                    if($pk == 4) $pk_name = "Enterprise";
                $validity = $vendors1->package;
                    if($validity == 1) $validity_name = "6 Months";
                    if($validity == 2) $validity_name = "12 Months";

                $activation_date = $vendors1->activation_date;
                     if($validity == 1){
                        $exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
                        $expire = date('Y-m-d', strtotime(date("Y-m-d", strtotime($activation_date)) . " +6 month"));
                     }
                     if($validity == 2){
                        $exp_date = date('d-m-Y', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
                        $expire = date('Y-m-d', strtotime(date("Y-m-d", strtotime($activation_date)) . " +12 month"));
                     }

                $today = date("Y-m-d");
                $today_time = strtotime($today);
                $expire_time = strtotime($expire);
                if ($expire_time < $today_time) {
                    $this->table->add_row($i++, 
                                    $vendors1->vendor_name,
                                    $vendors1->business_name,
                                    $vendors1->mobile,
                                    $vendors1->email,
                                    $pk_name,
                                    $validity_name,
                                    date('d-m-Y', strtotime($vendors1->activation_date)),
                                    $exp_date
                                );
                }
            }

            $data['table'] = $this->table->generate();
        }else{
            $data['table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new products found..!</h6></center>";
        }

        $data['file_name'] = 'Subscription Expired Vendors List.xls';
        $this->load->view('excelview',$data);
             
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }

 function orders(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reports';
        $data['page_title'] = 'Orders List';
        
        $data['vendors_dropdown'] = $this->vendors_model->get_vendors_dropdown();
        $data['buyers_dropdown'] = $this->buyers_model->get_buyers_dropdown();

        $this->sadmin_template->show('sadmin_home/orders', $data);
                
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }

 function orders_search(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reports';
        $data['page_title'] = 'Orders List';
        
        $vendor_id  = $this->input->post('vendor_id');
        $buyer_id  = $this->input->post('buyer_id');
        $order_status  = $this->input->post('order_status');

        $orders = (array)$this->sadmin_model->search_orders($vendor_id, $buyer_id, $order_status)->result();
        // print_r($orders); 
		if($orders != null){ 
        $this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		                   );
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',															
								  'Order ID',
								  'Buyer',
								  'Vendor',
								  'Amount',
								  'Status',
								  'Ordered Date',
								  'Delivered Date'
 								);
			$i = 0;
			foreach($orders as $orders1){
				$buyer_det = (array)$this->vendors_model->get_buyer_det($orders1->buyer_id)->row();
				$vendors_det = (array)$this->vendors_model->get_by_id($orders1->vendor_id)->row();
				$cart_det = (array)$this->buyers_model->get_cart1($orders1->cart_id)->row();
				$price = (array)$this->buyers_model->get_price($cart_det['size_id'])->row();
				$product = (array)$this->buyers_model->get_product($price['product_id'])->row();
				if($orders1->status == 1) $status = "<p class='text-danger text-bold'> Pending. </p>";
				if($orders1->status == 2) $status = "<p class='text-success text-bold'> Delivered. </p>";
				if($orders1->status == 1) $delivery="-NA-"; 
				else $delivery = date('d-m-Y H:i A', strtotime($orders1->delivered_on));
				$this->table->add_row(++$i,
										anchor('sadmin_home/order_view/'.$orders1->id,$orders1->order_id),
										ucwords($buyer_det['buyer_name']),
										ucwords($vendors_det['vendor_name']),
										($price['price'] * $cart_det['quantity'] * $product['sales_packages']),
										$status,
										date('d-m-Y H:i A', strtotime($orders1->updated_on)),
										$delivery
								);
			}
			echo $data['table'] = $this->table->generate();    
		}
		else
		{
			echo $data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/><h6 class="text-semibold text-center">No Prodcut List Found..!</h6></center>';
		}
                
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }

function orders_download(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reports';
        $data['page_title'] = 'Orders List';
        
        $vendor_id  = $this->input->post('vendor_id');
        $buyer_id  = $this->input->post('buyer_id');
        $order_status  = $this->input->post('order_status');

        $orders = (array)$this->sadmin_model->search_orders($vendor_id, $buyer_id, $order_status)->result();
        // print_r($orders); 
        if($orders != null){ 
        $this->load->library('table');
        $this->table->set_empty("");
        
        $table_setup = array (
            'table_open'  => '<table class="table table-hover" border="1" id="categories">',
                           );
         
        $this->table->set_template($table_setup);
        $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
        $this->table->set_heading('No',                                                         
                                  'Order ID',
                                  'Buyer',
                                  'Vendor',
                                  'Amount',
                                  'Status',
                                  'Ordered Date',
                                  'Delivered Date'
                                );
            $i = 0;
            foreach($orders as $orders1){
                $buyer_det = (array)$this->vendors_model->get_buyer_det($orders1->buyer_id)->row();
                $vendors_det = (array)$this->vendors_model->get_by_id($orders1->vendor_id)->row();
                $cart_det = (array)$this->buyers_model->get_cart1($orders1->cart_id)->row();
                $price = (array)$this->buyers_model->get_price($cart_det['size_id'])->row();
                $product = (array)$this->buyers_model->get_product($price['product_id'])->row();
                if($orders1->status == 1) $status = "<p class='text-danger text-bold'> Pending. </p>";
                if($orders1->status == 2) $status = "<p class='text-success text-bold'> Delivered. </p>";
                if($orders1->status == 1) $delivery="-NA-"; 
                else $delivery = date('d-m-Y H:i A', strtotime($orders1->delivered_on));
                $this->table->add_row(++$i,
                                        $orders1->order_id,
                                        ucwords($buyer_det['buyer_name']),
                                        ucwords($vendors_det['vendor_name']),
                                        ($price['price'] * $cart_det['quantity'] * $product['sales_packages']),
                                        $status,
                                        date('d-m-Y H:i A', strtotime($orders1->updated_on)),
                                        $delivery
                                );
            }
             
        }
        else
        {
            $this->table->add_row('--No Records Found--');
        }

        $data['table'] = $this->table->generate();
        $data['file_name'] = 'Orders.xls';
        $this->load->view('excelview',$data);
                
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }
 function order_view($order_id){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reports';
        $data['page_title'] = 'Order View';
        
        $data['res'] = $this->vendors_model->get_orders($order_id)->row();
		$data['det'] = (array)$this->buyers_model->get_cart1($data['res']->cart_id)->row();
		$data['price'] = (array)$this->buyers_model->get_price($data['det']['size_id'])->row();
		$data['product'] = (array)$this->buyers_model->get_product($data['det']['product_id'])->row();
        $data['size'] = (array)$this->sadmin_model->get_sizes_list12($data['price']['sizes_from'])->row();
        $data['size1'] = (array)$this->sadmin_model->get_sizes_list12($data['price']['sizes_to'])->row();
                                
		$images = (array)$this->buyers_model->get_images($data['det']['product_id'])->row();
     		if ($data['res']->status == 1)
				$data['status'] = "<span class='text-danger text-bold'> Pending. </span>";
			else
				$data['status'] = "<span class='text-success text-bold'> Delivered. </span>";
			
			if ($images)
				$data['image_name'] = $images['image_name'];
			else
				$data['image_name'] = 'no_image.png';

        $this->sadmin_template->show('sadmin_home/order_view', $data);
                
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }


function reviews(){
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['menu_active'] = 'reviews';
        $data['page_title'] = 'Reivews';

        if ($this->uri->segment(3) == 'success') {
                $data['msg'] = '<i class="icon-thumbs-up2"></i> Review Approved..!!';
                $data['cls'] = 'alert alert-success';
            }else {
                $data['msg'] = '';
                $data['cls'] = '';
            }
        
        $reviews =(array)$this->buyers_model->get_reviews1()->result();
        // print_r($reviews); die;
        if($reviews != null){ 
        $this->load->library('table');
        $this->table->set_empty("");
        
        $table_setup = array (
            'table_open'  => '<table class="table table-hover">',
                           );
         
        $this->table->set_template($table_setup);
        $heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
        $this->table->set_heading('No',                                                         
                                  'Product Name',
                                  'Review',
                                  'Review Date',
                                  'Actions'
                                );
            $i = 0;
            foreach($reviews as $reviews1){
                $review_date = date('d-m-Y H:i A', strtotime($reviews1->updated_on));
                $this->table->add_row(++$i,
                                        $reviews1->brand_name,
                                        $reviews1->review_product,
                                        $review_date,
                                        anchor('sadmin_home/review_status/'.$reviews1->id.'/1','<i class="icon-thumbs-up2"></i> Approve','class="btn btn-xs btn-success"').'&nbsp;'.anchor('sadmin_home/review_status/'.$reviews1->id.'/2','<i class="icon-thumbs-down2"></i> Reject','class="btn btn-xs btn-danger"')
                                );
            }

            $data['table'] = $this->table->generate();
             
        }
        else
        {
            $data['table'] = "<center><img src='".base_url()."assets/images/no_data.png'/><h6 class='text-muted'> no new reviews found..!</h6></center>";
        }


        $this->sadmin_template->show('sadmin_home/reviews', $data);
    }else {
        //If no session, redirect to login page
        redirect('sadmin', 'refresh');
    }
 }
 function review_status($rid, $status){
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['menu_active'] = 'reviews';
            $data['page_title'] = 'Reviews';

            $det = array('approval'=> $status);
            $this->sadmin_model->updated_det($det,$rid,'products_reviews');
            
            redirect('sadmin_home/reviews/success');
                         
        }else {
            //If no session, redirect to login page
            redirect('sadmin', 'refresh');
        }
    }
	//suscription leads
	 function subscription_leads(){
	
		if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['menu_active'] = 'subscription_leads';
            $data['page_title'] = 'subscription_leads';
			            
            $res = $this->sadmin_model->subscription()->result();
          $this->load->library('table');
        $this->table->set_empty("");
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		                   );
		 
		$this->table->set_template($table_setup);
$tmpl = array('table_open' => '<table class="table table-striped table-hover" width="500px">',
								
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
											'Email Id',
											'Subscribed Date'
											);
				
				if ($res)	
				{
					$i = 1;
					foreach($res as $sbleads){
						$a = date_create($sbleads->subscribed_date);
						$date = date_format($a,'d M Y');
						
						$this->table->add_row($i++,
												$sbleads->subscribed_email_id, 
												$date//$sbleads->subscribed_date
												);
					}
					
					$data['table'] = $this->table->generate();
				}
				else
				{
					$data['table'] = '<h4> -- No Orders Found Yet --</h4>';
				}
				$this->load->view('template/sadmin_header', $data);
               $this->load->view('sadmin_home/subscription_leads', $data);
               $this->load->view('template/sadmin_footer', $data);
		    //$this->home_template->show('sadmin_home/subscription_leads',$data);
   			}
   			else 
   			{
				//redirect('sadmin_home/subscription_leads');
			}
                         
          // $this->sadmin_template->show('sadmin_home/subscription_leads', $data);
	} 
	
	
	//contact leads
	
	 function contact_leads(){
	
		if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['menu_active'] = 'contact_leads';
            $data['page_title'] = 'contact_leads';
			            
$res = $this->sadmin_model->contactform()->result();

$this->load->library('table');
        $this->table->set_empty("");
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		                   );
		 
		$this->table->set_template($table_setup);
$tmpl = array('table_open' => '<table class="table table-striped table-hover" width="500px">',
								
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
											'contact_name',
											'contactemail_id',
											'contact_message',
											'contact_subject'
											);
				
				if ($res)	
				{
					$i = 1;
					foreach($res as $sbleads){
					//print_r($res['contact_form_subjet']);exit;
						//$a = date_create($sbleads->subscribed_date);
						//$date = date_format($a,'d M Y');
						
						$this->table->add_row($i++,
												$sbleads->contact_form_name, 
												$sbleads->contact_form_email_id,
												$sbleads->contact_form_message,
												$sbleads->contact_form_subjet
												);
					}
					$data['table'] = $this->table->generate();
				}
				else
				{
					$data['table'] = '<h4> -- No Orders Found Yet --</h4>';
				}
				
			   $this->load->view('template/sadmin_header', $data);
               $this->load->view('sadmin_home/contact_leads', $data);
               $this->load->view('template/sadmin_footer', $data);
			   
			// $this->home_template->show('sadmin_home/contact_leads',$data);
   			}
   			else 
   			{
				
   				/* redirect('welcome','refresh'); */
				//redirect('sadmin_home/contact_leads');
   			}
         
         //   $this->sadmin_template->show('sadmin_home/contact_leads', $data);              
        
	}
}

?>