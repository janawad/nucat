<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vendors extends CI_Controller {

  function __construct()
  {
	parent::__construct();
   	$this->load->library(array('table','form_validation'));
   	$this->load->helper(array('form', 'url'));
    $this->load->model('vendors_model','',TRUE);
	$this->load->model('sadmin_model','',TRUE);
    date_default_timezone_set('Asia/Kolkata');
  }

  function index()
  {
    if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Vendors';
       $data['menu_active'] = 'vendors';
       
	    if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Vendors added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Vendors successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Vendors suspended successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
        
		$Vendors = $this->vendors_model->get_all_vendors()->result();

		if($Vendors != null){
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" style="font-size:12px" id="vendors">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Vendor Name',
 								  'Business Name',
								  'Brand',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status'
								  //$heading_last
 								);
		$i = 1;
		foreach ($Vendors as $Vendors1){
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
								<li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
								<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Vendors1->status;
			if($status == '0')
				$status1 = '<span class="label label-default">Suspended</span>';
			if($status == '1')
				$status1 = '<span class="label label-success">Active</span>';
		        if($status == '2')
				$status1 = '<span class="label label-warning">Rejected</span>';
			if($status == '3')
				$status1 = '<span class="label label-info">Pending</span>';
			
			$this->table->add_row($i++,
								anchor('vendors/view/'.$Vendors1->id,$Vendors1->vendor_name),
								$Vendors1->business_name,
								$Vendors1->brand,
								$Vendors1->tin,
								$Vendors1->pan,
								$Vendors1->mobile,
								$Vendors1->email,
								$status1
								//$actions_list
						);
		}
			$data['table'] = $this->table->generate();
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		
       $this->sadmin_template->show('vendors/all_vendors', $data);
    }else{
	   redirect('login', 'refresh');
    }
  }
  function get_vendor()
  {
  	$vendor = $this->input->post('vendor');
  	if($vendor != null)
  	{
    	$Vendors = $this->vendors_model->get_search_vendors($vendor)->result();

		if($Vendors != null){
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="vendors">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Vendor Name',
 								  'Business Name',
								  'Brand',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status'
								  //$heading_last
 								);
		$i = 1;
		foreach ($Vendors as $Vendors1){
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
								<li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
								<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Vendors1->status;
			if($status == '0')
				$status1 = '<span class="label label-default">Suspended</span>';
			if($status == '1')
				$status1 = '<span class="label label-success">Active</span>';
			
			$this->table->add_row($i++,
								anchor('vendors/view/'.$Vendors1->id,$Vendors1->vendor_name),
								$Vendors1->business_name,
								$Vendors1->brand,
								$Vendors1->tin,
								$Vendors1->pan,
								$Vendors1->mobile,
								$Vendors1->email,
								$status1
								//$actions_list
						);
		}
			echo $data['table'] = $this->table->generate();
		}else{
			echo $data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		
  	}
  	else 
  	{
  		$Vendors = $this->vendors_model->get_all_vendors()->result();

		if($Vendors != null){
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="vendors">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Vendor Name',
 								  'Business Name',
								  'Brand',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status'
								  //$heading_last
 								);
		$i = 1;
		foreach ($Vendors as $Vendors1){
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
								<li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
								<li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Vendors1->status;
			if($status == '0')
				$status1 = '<span class="label label-default">Suspended</span>';
			if($status == '1')
				$status1 = '<span class="label label-success">Active</span>';
			
			$this->table->add_row($i++,
								anchor('vendors/view/'.$Vendors1->id,$Vendors1->vendor_name),
								$Vendors1->business_name,
								$Vendors1->brand,
								$Vendors1->tin,
								$Vendors1->pan,
								$Vendors1->mobile,
								$Vendors1->email,
								$status1
								//$actions_list
						);
		}
			$table = $this->table->generate();
		}else{
			$table = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		echo $table;
  	}
  }
  
  function requests()
  {
	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Vendors Requests';
       $data['menu_active'] = 'request';
	   
	   if ($this->uri->segment(3) == 'updated')
	   {
		   $data['msg'] = 'Data updated successfully';
	   }
	   else
	   {
		   $data['msg'] = '';
	   }
	   
	   $utype='2';
	   $data['res'] = (array)$this->sadmin_model->get_request1($utype)->result();
	   //print_r($res);
	   
	   $this->sadmin_template->show('vendors/vendor_request',$data);
	}
	else
	{
		redirect('sadmin');
	}
  }
  
  function request_status($id,$uid)
  {
		$this->load->library('email');
		$det = array('status' => '0');
		$this->sadmin_model->updated_status($det,$id);
		
		$res = (array)$this->vendors_model->get_by_id($uid)->row();
				
				//send email to admin
				$config['protocol'] = 'sendmail';
        		$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
				$email = $res['email'];
				
				$this->email->from('nucatalog@hotmail.com', 'NuCatalog');
				$this->email->to($email);
				
				$html = 'Dear <b>'.$res['vendor_name'].'</b>, <br><br> <p>Your Request for Mobile and/or TIN No. change is successfully updated.</p> <br> <br> Thanks and Regards, <br> Team NuCatalog<br>www.nucatalog.com';
				//echo $html;
				$this->email->subject('NuCatalog.com - Request for Changes in Profile.');
 				$this->email->message($html);
 				$this->email->send();
				
		redirect('vendors/requests/updated');
  }
  
  function edit($id)
  {
	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Edit Vendor';
       $data['menu_active'] = 'request';
	   
	   $data['action'] = 'vendors/edit/'.$id;
	   $data['Vendor'] = (array)$this->vendors_model->get_by_id($id)->row();
	   
	   $this->form_validation->set_rules('mobile','Mobile No.','required|trim|xss_clean|exact_length[10]|is_natural');
	   $this->form_validation->set_rules('tin','TIN No.','required|trim|xss_clean');
	   if($this->form_validation->run() === FALSE)
	   {
		 $this->sadmin_template->show('vendors/edit_vendor',$data);  
	   }
	   else
	   {
		   $mobile = $this->input->post('mobile');
		   $tin = $this->input->post('tin');
		   
		   $det = array('mobile' => $mobile,
						'tin' => $tin);
		   
		   $tb_name = 'vendors';
		   $this->sadmin_model->updated_det($det,$id,$tb_name);
		   
		   redirect('vendors/requests/updated');
	   }
	   
	}
	else
	{
		redirect('sadmin');
	}
  }
  
  function new_vendors()
  {
    if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Vendors';
       $data['menu_active'] = 'vendors';
       
	    if ($this->uri->segment(3)=='accept_success')
		{
			$data['message'] = 'Accepted successfully..!';
			$data['cls'] = 'alert alert-success alert-styled-left';
		}
		elseif ($this->uri->segment(3)=='reject_success')
		{
			$data['message'] = 'Rejected successfully..!';
			$data['cls'] = 'alert alert-warning alert-styled-left';
		}
		elseif ($this->uri->segment(3)=='delete_success')
		{
			$data['message'] = 'Vendors details successfully deleted..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
        
		$Vendors = $this->vendors_model->get_new_vendors()->result();
		if($Vendors != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="vendors">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Vendor Name',
 								  'Business Name',
								  'Brand',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status',
								  $heading_last
 								);
		$i = 1;
		foreach ($Vendors as $Vendors1){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>'.anchor('vendors/accept_status/'.$Vendors1->id,'<i class="icon-database-check"></i> Accept').'</li>
								<li>'.anchor('vendors/reject/'.$Vendors1->id,'<i class="icon-database-remove"></i> Reject').'</li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Vendors1->status;
			if($status == '2')
				$status1 = '<span class="label label-info">Pending</span>';
			
			$this->table->add_row($i++,
								anchor('vendors/view/'.$Vendors1->id,$Vendors1->vendor_name),
								$Vendors1->business_name,
								$Vendors1->brand,
								$Vendors1->tin,
								$Vendors1->pan,
								$Vendors1->mobile,
								$Vendors1->email,
								$status1,
								$actions_list
						);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
       $this->sadmin_template->show('vendors/new_vendors', $data);
    }else{
	   redirect('login', 'refresh');
    }
  }

  function accept_status($vendor_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Vendor Details';
       $data['menu_active'] = 'vendorrs';
       
       $data['Vendor'] = (array)$this->vendors_model->get_by_id($vendor_id)->row();

	   $this->sadmin_template->show('vendors/accept_vendor', $data);     
    }else{
	   redirect('login', 'refresh');
    }
  }

  function accept_status1(){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Vendor Details';
       $data['menu_active'] = 'vendors';
       
        $vendor_id = $this->input->post('vendor_id');
        $this->set_rules();
		if ($this->form_validation->run() === FALSE){
	       $data['Vendor'] = (array)$this->vendors_model->get_by_id($vendor_id)->row();
	   	   $this->sadmin_template->show('vendors/accept_vendor', $data);
       }else{
       	   
       	   $activation_date = $this->input->post('activation_date');
		   $package = $this->input->post('package');
       	   $vaidity = $this->input->post('vaidity');
       	   $amount = $this->input->post('amount');
       	   
       	   $today = date("Y-m-d H:i:s");
		   $Vendor = array( 'status' => '1', 
		   					'package' => $package,
		   					'validity' => $vaidity,
		   					'amount' => $amount,
		   					'activation_date' => date('Y-m-d', strtotime($activation_date)), 
		   					'updated_by' 	=> $data['username'],
		 	 				'updated_on' 	=> $today,);
		   
		   $this->vendors_model->update_vendor($vendor_id, $Vendor);
				 
		   $url = 'vendors/rejected_vendors/accept_success';
		   echo'<script> window.location.href = "'.base_url().''.$url.'";
				</script>';
       }
        
       
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
  function rejected_vendors()
  {
    if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Rejected Vendors List';
       $data['menu_active'] = 'vendors';
       
	    if ($this->uri->segment(3)=='accept_success')
		{
			$data['message'] = 'Accepted successfully..!';
			$data['cls'] = 'alert alert-success alert-styled-left';
		}
		elseif ($this->uri->segment(3)=='reject_success')
		{
			$data['message'] = 'Rejected successfully..!';
			$data['cls'] = 'alert alert-warning alert-styled-left';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
        
		$Vendors = $this->vendors_model->get_rejected_vendors()->result();
		if($Vendors != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="vendors">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Vendor Name',
 								  'Business Name',
								  'Brand',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status',
								  $heading_last
 								);
		$i = 1;
		foreach ($Vendors as $Vendors1){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>'.anchor('vendors/accept1/'.$Vendors1->id,'<i class="icon-database-check"></i> Accept').'</li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Vendors1->status;
			if($status == '3')
				$status1 = '<span class="label label-warning">Rejected</span>';
			
			$this->table->add_row($i++,
								anchor('vendors/view/'.$Vendors1->id,$Vendors1->vendor_name),
								$Vendors1->business_name,
								$Vendors1->brand,
								$Vendors1->tin,
								$Vendors1->pan,
								$Vendors1->mobile,
								$Vendors1->email,
								$status1,
								$actions_list
						);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
       $this->sadmin_template->show('vendors/new_vendors', $data);
    }else{
	   redirect('login', 'refresh');
    }
  }
  
  function accept($vendor_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Vendors';
       $data['menu_active'] = 'vendors';
       
       $today = date("Y-m-d H:i:s");
	   $Vendor = array( 'status' => '1', 
	   					'activation_date' => $today, 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->vendors_model->update_vendor($vendor_id, $Vendor);
			 
	   $url = 'vendors/new_vendors/accept_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
function accept1($vendor_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Vendors';
       $data['menu_active'] = 'vendors';
       
       $today = date("Y-m-d H:i:s");
	   $Vendor = array( 'status' => '1', 
	   					'activation_date' => $today, 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->vendors_model->update_vendor($vendor_id, $Vendor);
			 
	   $url = 'vendors/rejected_vendors/accept_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
function suspened($vendor_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Vendors';
       $data['menu_active'] = 'vendors';
       
       $today = date("Y-m-d H:i:s");
	   $Vendor = array( 'status' => '0', 
	   					'activation_date' => $today, 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->vendors_model->update_vendor($vendor_id, $Vendor);
			 
	   $url = 'vendors/index/suspend_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
 function reject($vendor_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Vendors';
       $data['menu_active'] = 'vendors';
       
       $today = date("Y-m-d H:i:s");
	   $Vendor = array( 'status' => '3', 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->vendors_model->update_vendor($vendor_id, $Vendor);
			 
	   $url = 'vendors/new_vendors/reject_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
  function view($vendor_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'View Vendor Details';
       $data['menu_active'] = 'vendorrs';
       
       $data['Vendor'] = (array)$this->vendors_model->get_by_id($vendor_id)->row();
       
	   $this->sadmin_template->show('vendors/view_vendor', $data);     
    }else{
	   redirect('login', 'refresh');
    }
  }

  function set_rules(){
  	$this->form_validation->set_rules('activation_date', 'Activation Date', 'trim|required');
    $this->form_validation->set_rules('package', 'Package', 'trim|required');
    $this->form_validation->set_rules('vaidity', 'Validity', 'trim|required');
    $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
  }
  
     

}

?>