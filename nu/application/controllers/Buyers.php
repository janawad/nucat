<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Buyers extends CI_Controller {

  function __construct()
  {
	parent::__construct();
   	$this->load->library(array('table','form_validation','email'));
   	$this->load->helper(array('form', 'url'));
    $this->load->model('buyers_model','',TRUE);
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
       $data['page_title'] = 'Buyers';
       $data['menu_active'] = 'buyers';
       
	    if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Buyers added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Buyers successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Buyers successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='delete_success')
		{
			$data['message'] = 'Buyers details successfully deleted..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
        
		$Buyers = $this->buyers_model->get_all_buyers()->result();

		if($Buyers != null){
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" style="font-size:12px" id="buyers">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Buyer Name',
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
		foreach ($Buyers as $Buyers1){
			
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
			
			$status = $Buyers1->status;
			if($status == '0')
				$status1 = '<span class="label label-default">Suspended</span>';
			if($status == '1')
				$status1 = '<span class="label label-success">Active</span>';
			if($status == '2')
				$status1 = '<span class="label label-info">Pending</span>';
			if($status == '3')
				$status1 = '<span class="label label-warning">Rejected</span>';	
				
			$this->table->add_row($i++,
								anchor('buyers/view/'.$Buyers1->id,$Buyers1->buyer_name),
								$Buyers1->business_name,
								$Buyers1->categories,
								$Buyers1->tin,
								$Buyers1->pan,
								$Buyers1->mobile,
								$Buyers1->email,
								$status1
								//$actions_list
						);
		}
			$data['table'] = $this->table->generate();
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
       $this->sadmin_template->show('buyers/all_buyers', $data);
    }else{
	   redirect('login', 'refresh');
    }
  }
  function get_buyer_search()
  {
  	$buyer = $this->input->post('buyer');
  	
  	if($buyer != null)
  	{
  		$Buyers = $this->buyers_model->get_search_buyers($buyer)->result();
    	//print_r($Buyers);die;
		if($Buyers != null){
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="buyers">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Buyer Name',
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
		foreach ($Buyers as $Buyers1){
			
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
			
			$status = $Buyers1->status;
			if($status == '0')
				$status1 = '<span class="label label-default">Suspended</span>';
			if($status == '1')
				$status1 = '<span class="label label-success">Active</span>';
			
			$this->table->add_row($i++,
								anchor('buyers/view/'.$Buyers1->id,$Buyers1->buyer_name),
								$Buyers1->business_name,
								$Buyers1->categories,
								$Buyers1->tin,
								$Buyers1->pan,
								$Buyers1->mobile,
								$Buyers1->email,
								$status1
								//$actions_list
						);
		}
			echo $this->table->generate();
		}else{
			echo $data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
  	}
  	else 
  	{
  		$Buyers = $this->buyers_model->get_all_buyers()->result();
	  	if($Buyers != null){
	        // generate pagination
			$this->load->library('table');
			$this->table->set_empty("");
			
			$table_setup = array (
				'table_open'  => '<table class="table table-hover" id="buyers">',
			);
			 
			$this->table->set_template($table_setup);
			$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
			$this->table->set_heading('No',
									  'Buyer Name',
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
			foreach ($Buyers as $Buyers1){
				
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
				
				$status = $Buyers1->status;
				if($status == '0')
					$status1 = '<span class="label label-default">Suspended</span>';
				if($status == '1')
					$status1 = '<span class="label label-success">Active</span>';
				
				$this->table->add_row($i++,
									anchor('buyers/view/'.$Buyers1->id,$Buyers1->buyer_name),
									$Buyers1->business_name,
									$Buyers1->categories,
									$Buyers1->tin,
									$Buyers1->pan,
									$Buyers1->mobile,
									$Buyers1->email,
									$status1
									//$actions_list
							);
			}
				echo $this->table->generate();
			}else{
				echo $data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
			}
	  		
  		
    }
    
  }
  
  function requests()
  {
	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Buyer Requests';
       $data['menu_active'] = 'request';
	   
	   if ($this->uri->segment(3) == 'updated')
	   {
		   $data['msg'] = 'Data updated successfully';
	   }
	   else
	   {
		   $data['msg'] = '';
	   }
	   
	   $utype='1';
	   $data['res'] = (array)$this->sadmin_model->get_request1($utype)->result();
	   //print_r($res);
	   
	   $this->sadmin_template->show('buyers/buyer_request',$data);
	}
	else
	{
		redirect('sadmin');
	}
  }
  
  function request_status($id,$uid)
  {
		$det = array('status' => '0');
		$this->sadmin_model->updated_status($det,$id);
		
		$res = (array)$this->buyers_model->get_by_id($uid)->row();
				
				//send email to admin
				$this->load->library('email');
				$config['protocol'] = 'sendmail';
        		$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
				$email = $res['email'];
				
				$this->email->from('nucatalog@hotmail.com', 'NuCatalog');
				$this->email->to($email);
				
				$html = 'Dear <b>'.$res['buyer_name'].'</b>, <br><br> <p>Your Request for Mobile and/or TIN No. change is successfully updated.</p> <br> <br> Thanks and Regards, <br> Team NuCatalog<br>www.nucatalog.com';
				//echo $html;
				$this->email->subject('NuCatalog.com - Request for Changes in Profile.');
 				$this->email->message($html);
 				$this->email->send();
				
		redirect('buyers/requests/updated');
  }
  
  function edit($id)
  {
	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Edit Buyer';
       $data['menu_active'] = 'request';
	   
	   $data['action'] = 'buyers/edit/'.$id;
	   $data['Buyer'] = (array)$this->buyers_model->get_by_id($id)->row();
	   
	   $this->form_validation->set_rules('mobile','Mobile No.','required|trim|xss_clean|exact_length[10]|is_natural');
	   $this->form_validation->set_rules('tin','TIN No.','required|trim|xss_clean');
	   if($this->form_validation->run() === FALSE)
	   {
		 $this->sadmin_template->show('buyers/edit_buyer',$data);  
	   }
	   else
	   {
		   $mobile = $this->input->post('mobile');
		   $tin = $this->input->post('tin');
		   
		   $det = array('mobile' => $mobile,
						'tin' => $tin);
		   
		   $tb_name = 'buyers';
		   $this->sadmin_model->updated_det($det,$id,$tb_name);
		   
		   redirect('buyers/requests/updated');
	   }
	   
	}
	else
	{
		redirect('sadmin');
	}
  }
  
  function new_buyers()
  {
    if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Buyers';
       $data['menu_active'] = 'buyers';
       
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
			$data['message'] = 'Buyers details successfully deleted..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
        
		$Buyers = $this->buyers_model->get_new_buyers()->result();
		if($Buyers != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="buyers">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Buyer Name',
 								  'Business Name',
								  'Categories',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status',
								  $heading_last
 								);
		$i = 1;
		foreach ($Buyers as $Buyers1){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>'.anchor('buyers/accept/'.$Buyers1->id,'<i class="icon-database-check"></i> Accept').'</li>
								<li>'.anchor('buyers/reject/'.$Buyers1->id,'<i class="icon-database-remove"></i> Reject').'</li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Buyers1->status;
			if($status == '2')
				$status1 = '<span class="label label-info">Pending</span>';
			
			$this->table->add_row($i++,
								anchor('buyers/view/'.$Buyers1->id,$Buyers1->buyer_name),
								$Buyers1->business_name,
								$Buyers1->categories,
								$Buyers1->tin,
								$Buyers1->pan,
								$Buyers1->mobile,
								$Buyers1->email,
								$status1,
								$actions_list
						);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
       $this->sadmin_template->show('buyers/new_buyers', $data);
    }else{
	   redirect('login', 'refresh');
    }
  }
  
  function rejected_buyers()
  {
    if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Rejected Buyers List';
       $data['menu_active'] = 'buyers';
       
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
        
		$Buyers = $this->buyers_model->get_rejected_buyers()->result();
		if($Buyers != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="buyers">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Buyer Name',
 								  'Business Name',
								  'Categories',
								  'TIN',
								  'PAN',
								  'Mobile',
		 						  'Email',
								  'Status',
								  $heading_last
 								);
		$i = 1;
		foreach ($Buyers as $Buyers1){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			
			$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>'.anchor('buyers/accept1/'.$Buyers1->id,'<i class="icon-database-check"></i> Accept').'</li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			$status = $Buyers1->status;
			if($status == '3')
				$status1 = '<span class="label label-warning">Rejected</span>';
			
			$this->table->add_row($i++,
								anchor('buyers/view/'.$Buyers1->id,$Buyers1->buyer_name),
								$Buyers1->business_name,
								$Buyers1->categories,
								$Buyers1->tin,
								$Buyers1->pan,
								$Buyers1->mobile,
								$Buyers1->email,
								$status1,
								$actions_list
						);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
       $this->sadmin_template->show('buyers/new_buyers', $data);
    }else{
	   redirect('login', 'refresh');
    }
  }
  
  function accept($buyer_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Buyers';
       $data['menu_active'] = 'buyers';
       
       $today = date("Y-m-d H:i:s");
	   $Buyer = array( 'status' => '1', 
	   					'activation_date' => $today, 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->buyers_model->update_buyer($buyer_id, $Buyer);
			 
	   $url = 'buyers/new_buyers/accept_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
function accept1($buyer_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Buyers';
       $data['menu_active'] = 'buyers';
       
       $today = date("Y-m-d H:i:s");
	   $Buyer = array( 'status' => '1', 
	   					'activation_date' => $today, 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->buyers_model->update_buyer($buyer_id, $Buyer);
			 
	   $url = 'buyers/rejected_buyers/accept_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
function suspened($buyer_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Buyers';
       $data['menu_active'] = 'buyers';
       
       $today = date("Y-m-d H:i:s");
	   $Buyer = array( 'status' => '0', 
	   					'activation_date' => $today, 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->buyers_model->update_buyer($buyer_id, $Buyer);
			 
	   $url = 'buyers/index/suspend_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
 function reject($buyer_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Registred Buyers';
       $data['menu_active'] = 'buyers';
       
       $today = date("Y-m-d H:i:s");
	   $Buyer = array( 'status' => '3', 
	   					'updated_by' 	=> $data['username'],
	 	 				'updated_on' 	=> $today,);
	   
	   $this->buyers_model->update_buyer($buyer_id, $Buyer);
			 
	   $url = 'buyers/new_buyers/reject_success';
	   echo'<script> window.location.href = "'.base_url().''.$url.'";
			</script>';
    }else{
	   redirect('login', 'refresh');
    }  
  }
  
  function view($buyer_id){
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'View Buyer Details';
       $data['menu_active'] = 'buyers';
       
       $data['Buyer'] = (array)$this->buyers_model->get_by_id($buyer_id)->row();
       
	   $this->sadmin_template->show('buyers/view_buyer', $data);     
    }else{
	   redirect('login', 'refresh');
    }
  }
  
     

}

?>