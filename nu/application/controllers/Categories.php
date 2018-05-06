<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   
    $this->load->helper(array('form','file','url'));
    $this->load->library(array('table','form_validation'));   	 
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('sadmin_model','',TRUE);
    $this->load->model('vendors_model','',TRUE);
 }

 function index()
 {
 	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'All Categories';
       $data['menu_active'] = 'catalog';
       $data['action'] ='categories';
       $data['action1'] = 'SAVE';
       $data['a'] = '0';
        
        
	    if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Category added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Category successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Category Deleted successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
       
   $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|xss_clean');
   $this->form_validation->set_rules('parent_name', 'Parent Category', 'trim|required|xss_clean');
   $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');

   $options = array('' =>'--Select Category --','0'=>'-- No Parent Category --'); 
   $options1 = array();
   $options2 = array('' =>'--Select Category --','0'=>'-- No Parent Category --');
   $categories = (array)$this->sadmin_model->get_categories()->result();
   
	if($categories != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Category Name',
 								 'Action'
 								);
		$i = 1;
		foreach ($categories as $categories1){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
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
		
			$status = $categories1->status;
			if($status == '1')
				$status1 = '<i class="icon-shield-notice text-warning"></i>';
			else $status1 = '<i class="icon-shield-check text-success"></i>';
				
				$options1 = array($categories1->id => $main_name.$categories1->category_name);
				$options2 = $options2 + $options1 ;
			
			$this->table->add_row($i++,								
								$main_name.$categories1->category_name,								
								$status1 .' &nbsp;|&nbsp; '.
								anchor('categories/edit_category/'.$categories1->id,'<i class="icon-pencil5 text-primary"></i>','title="Edit"').' &nbsp;|&nbsp; '
								.anchor('categories/delete_category/'.$categories1->id, '<i class="icon-trash text-danger"></i>','title="Delete"')
								
					         	);
		}
			$data['table'] = $this->table->generate();    
		}else{

			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		
		$data['options'] = $options2 ;
		
   
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $data['category']['category_name'] ='';
     $data['category']['status']='';
     $data['category']['parent_category_id']='';
     $this->sadmin_template->show('categories/all_categories',$data);
   }
   else
   {
   	  $today  = date('Y-m-d H:i:s');
               
   	  $insert_data = array('category_name'     => $this->input->post('category_name'),
   	                     'parent_category_id' =>$this->input->post('parent_name'),
   	                     'status'             =>$this->input->post('status'),
   	  				     'updated_by'         =>$data['username'],
   	  				    
   	  				     'updated_on'         => $today  	  
   	                );
   	         //print_r($insert_data);exit;
   	       $this->sadmin_model->add_category($insert_data);
           redirect('categories/index/add_success', 'refresh');
   }
     
	}
	else 
	{
		  redirect('sadmin','refresh');
	}
   
 }
 function get_extra_price()
 {
 	
 	echo '<input type="text" name="ex_price" id="ex_price"  class="form-control" />';
 }
function get_sizes_category()
  {
  	
  	    $category1 = $this->input->post('category_id');
  	
  	   $options = $this->sadmin_model->get_sizes_list($category1);
  	   
  	   echo form_dropdown('size_from', $options, set_value('size_from', ''),'class="form-control" ');
  	   
  	   //echo '<select name="size_from[]" multiple="multiple" class="form-control">'
  	
  }
function get_sizes_category1()
  {
  	
  	    $category_id = $this->input->post('category_id');  	
  	    $options = $this->sadmin_model->get_sizes_list($category_id);
  	   
  	   echo form_dropdown('size_to', $options, set_value('size_to', ''),'class="form-control"');
  	
  }
function get_sub_category()
{
	 $category_id = $this->input->post('category_id'); 	
	 $options = $this->sadmin_model->get_sub_category($category_id);
	
     $options1 = array();
     $options2 = array(''=>'--Select Category--');
     $categories = (array)$this->sadmin_model->get_categories()->result();
   
 	if($categories != null){ 
       
		foreach ($categories as $categories1){
			
			if($categories1->parent_category_id == $category_id){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
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
	
	echo form_dropdown('category1', $options2, set_value('category1', ''),'class="form-control" id="category1"');

}
 function delete_category($id)
 {
 	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       
       $this->sadmin_model->delete_category($id);
       
       redirect('categories/index/suspend_success', 'refresh');
       
	}
	else 
	{
		redirect('sadmin','refresh');
	}
 }
 function add_sizes()
 {
 	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Category - Sizes';
       $data['menu_active'] = 'catalog';
       $data['action'] ='categories/add_sizes';
       $data['action1'] = 'SAVE';
       $data['a'] = '0';
        
        
	    if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Record added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Record successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Record Deleted successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
		
	
		
   $options = array('' =>'--Select Category --','0'=>'-- No Parent Category --'); 
   $options1 = array();
   $options2 = array(''=>'--Select Category--');
   $categories = (array)$this->sadmin_model->get_categories()->result();
   
	if($categories != null){ 
       
		foreach ($categories as $categories1){
			if($categories1->parent_category_id != '0')
			{
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
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
		
		$data['options'] = $options2 ;
		
		$categories = (array)$this->sadmin_model->get_categories()->result();
		
		
	if($categories != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Category Name',
 								  'Sizes',
								  'Action'
 								);
		$i = 1;
				
		foreach($categories as $value )
		{
			if($value->parent_category_id != '0')
			{
				
				
				
			$category1 = (array)$this->sadmin_model->get_category($value->parent_category_id)->row();
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
			
				
			   $sizes = (array)$this->sadmin_model->get_sizes_list1($value->id)->result();
			    $size1="";		         
			    $size2="";
			    if($sizes != null)
			    {
					foreach($sizes as $size)
					{				
						$size1 = $size->sizes;
						$size2  =  $size1 .','. $size2 ;
					}
			    }
			    else 
			    {
			    	$size2= '- NO SIZES -';
			    }
				$size2 = rtrim($size2,',');
				$size2 = ltrim($size2,',');
				$this->table->add_row($i++,								
								$main_name .$value->category_name,								
								$size2,
								anchor('categories/edit_sizes/'.$value->id,'<i class="icon-pencil7 text-primary"></i>').' &nbsp;|&nbsp; '
							   .anchor('categories/delete_sizes/'.$value->id, '<i class="icon-trash text-danger"></i>')
								
								);
			}
		}
		
		$data['table'] = $this->table->generate();
		
	}
	else 
	{
		$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
	}
		
		     
				   $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|xss_clean');
				   $this->form_validation->set_rules('size_name', 'Size', 'trim|required|xss_clean');
				  
					 if($this->form_validation->run() == FALSE)
				   {
				     //Field validation failed.  User redirected to login page
				     $data['category']['category_name'] ='';
				     $data['category']['size_name']='';
				    
				     $this->sadmin_template->show('categories/add_sizes',$data);
				   }
				   else
				   {
				   	  $today  = date('Y-m-d H:i:s');	
				   	  			   	  
				   	  $tata = $this->input->post('size_name');				   	  
				   	  $ids    =   explode(',',$tata);
				   	
				   foreach($ids as $id)
							{
							     $insert_data = array('category_id'      => $this->input->post('category_name'),
				   	                                  'sizes'              => $id
 			   	                                      );
							    
							     $this->sadmin_model->add_sizes($insert_data);
							     unset($tata);
							}
				   	  
				           redirect('categories/add_sizes/add_success', 'refresh');
				   }
 	
	}
	else 
	{
		redirect('sadmin','refresh');
	}
 	
 }
 function edit_sizes($category_id)
 {
 if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['menu_active'] = 'catalog';
       $data['action'] ='categories/edit_sizes/'.$category_id;
       $data['action1'] = 'UPDATE';
       $data['page_title'] = 'Sizes Edit';
       $data['a'] = '1';
       
         if ($this->uri->segment(3)=='add_success')
		{
			$data['message'] = 'Record added successfully..!';
			$data['cls'] = 'alert alert-info';
		}
		elseif ($this->uri->segment(3)=='update_success')
		{
			$data['message'] = 'Record successfully updated..!';
			$data['cls'] = 'alert alert-success';
		}
		elseif ($this->uri->segment(3)=='suspend_success')
		{
			$data['message'] = 'Record Deleted successfully..!';
			$data['cls'] = 'alert alert-danger';
		}
		else
		{
			$data['message'] = '';
			$data['cls'] = '';
		}      
       
         $options = array('' =>'--Select Category --','0'=>'-- No Parent Category --'); 
   		 $options1 = array();
   		 $options2 = array(''=>'--Select Category--');
   		 $categories = (array)$this->sadmin_model->get_categories()->result();
   
	if($categories != null){ 
       
		foreach ($categories as $categories1){
			if($categories1->parent_category_id != '0')
			{
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
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
		
		$data['options'] = $options2 ;
		 		                     
		$categories = (array)$this->sadmin_model->get_categories()->result();
		
		
	if($categories != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Category Name',
 								  'Sizes',
								  'Action'
 								);
		$i = 1;
				
		foreach($categories as $value )
		{
			if($value->parent_category_id != '0')
			{
			
			$category1 = (array)$this->sadmin_model->get_category($value->parent_category_id)->row();
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
			
			   $sizes = (array)$this->sadmin_model->get_sizes_list1($value->id)->result();
			    $size1="";		         
			    $size2="";
			    if($sizes != null)
			    {
					foreach($sizes as $size)
					{				
						$size1 = $size->sizes;
						$size2  =  $size1 .','. $size2 ;
					}
			    }
			    else 
			    {
			    	$size2= '- NO SIZES -';
			    }
				$size2 = rtrim($size2,',');
				$size2 = ltrim($size2,',');
				$this->table->add_row($i++,								
								$main_name .$value->category_name,								
								$size2,
								anchor('categories/edit_sizes/'.$value->id,'<i class="icon-pencil7 text-primary"></i>').' &nbsp;|&nbsp; '
							   .anchor('categories/delete_sizes/'.$value->id, '<i class="icon-trash text-danger"></i>')
								
								);
								
								if($category_id == $value->id )
								{
									 $data['category']['category_name'] = $category_id;
				                     $data['category']['size_name']=  $size2;
								}
			}
		}
		
		$data['table'] = $this->table->generate();
		
	}
	else 
	{
		$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
	}      
		                     
		               
	               $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|xss_clean');
				   $this->form_validation->set_rules('size_name', 'Size', 'trim|required|xss_clean');
				  
					 if($this->form_validation->run() == FALSE)
				   {
				     
				    
				     $this->sadmin_template->show('categories/add_sizes',$data);
				   }
				   else
				   {
				   	  $this->sadmin_model->delete_sizes($category_id);
				   	  
				   	  $today  = date('Y-m-d H:i:s');	
				   	  			   	  
				   	  $tata = $this->input->post('size_name');				   	  
				   	  $ids    =   explode(',',$tata);
				   	
				   foreach($ids as $id)
							{
							     $insert_data = array('category_id'      => $this->input->post('category_name'),
				   	                                  'sizes'              => $id
 			   	                                      );
							    
							     $this->sadmin_model->add_sizes($insert_data);
							     unset($tata);
							}
				   	  
				           redirect('categories/add_sizes/update_success', 'refresh');
				   }
		                     
       
       
	}
	else 
	{
		redirect('sadmin','refresh');
	}
 	
 }
 function delete_sizes($category_id)
 {
 if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       
       $this->sadmin_model->delete_sizes($category_id);
       
       redirect('categories/add_sizes/suspend_success', 'refresh');
       
	}
	else 
	{
		redirect('sadmin','refresh');
	}
 	
 }
 
 function edit_category($id)
 {
 	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Edit Category';
       $data['menu_active'] = 'catalog';
       $data['action'] ='categories/edit_category/'.$id;
       $data['category'] = (array)$this->sadmin_model->get_category($id)->row();
       $data['action1'] = 'UPDATE';
       $data['message'] = '';
	   $data['cls'] = '';
	   $data['a'] = '1';
	  $data['options'] = $this->sadmin_model->categories_list();
      $categories = (array)$this->sadmin_model->get_categories()->result();
   
	if($categories != null){ 
        // generate pagination
		$this->load->library('table');
		$this->table->set_empty("");
		
		$table_setup = array (
			'table_open'  => '<table class="table table-hover" id="categories">',
		);
		 
		$this->table->set_template($table_setup);
		$heading_last = array('data' => '<i class="icon-menu-open2"></i>', 'class' => 'text-center', 'style' => 'width: 30px;');
		$this->table->set_heading('No',
								  'Category Name',
 								 'Action'
 								);
		$i = 1;
		foreach ($categories as $categories1){
			
//			$status_link = anchor('batches/status/'.$Batches1->id,$Batches1->status=='1'?'<i class="fa fa-check-circle text-primary"></i>':'<i class="fa fa-times-circle text-warning"></i>',array('class'=>'editcls'));
			
		
			$status = $categories1->status;
			if($status == '1')
				$status1 = '<i class="icon-shield-notice text-warning"></i>';
			else $status1 = '<i class="icon-shield-check text-success"></i>';
			
			$this->table->add_row($i++,								
								$categories1->category_name,								
								$status1 .' &nbsp;|&nbsp; '.anchor('categories/edit_category/'.$categories1->id,'<i class="icon-pencil7 text-primary"></i>').' &nbsp;|&nbsp; '.anchor('categories/delete_category/'.$categories1->id, '<i class="icon-trash text-danger"></i>')
								
					         	);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<h5 class="text-semibold text-center">No Vendors List Found..!</h5>';
		}
	
		   $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|xss_clean');
           $this->form_validation->set_rules('parent_name', 'Parent Category', 'trim|required|xss_clean');
           $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
		   if($this->form_validation->run() == FALSE)
		   {
		     
		     $this->sadmin_template->show('categories/all_categories',$data);
		   }
		   else
		   {
		   	  $today  = date('Y-m-d H:i:s');
		    
		   	  $insert_data = array('category_name'      => $this->input->post('category_name'),
		   	                     'parent_category_id' =>$this->input->post('parent_name'),
		   	                     'status'             =>$this->input->post('status'),
		   	  				     'updated_by'         =>$data['username'],
		   	  				     'updated_on'         => $today  	  
		   	                );
		   	      
		   	                
		   	       
		   	       $this->sadmin_model->update_category($insert_data,$id);
		           redirect('categories/index/update_success', 'refresh');
		   }
			}
			else 
			{
				  redirect('sadmin','refresh');
			}
		 	
 	
 }
 function all_products()
  {
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'All Products';
       $data['menu_active'] = 'products';
       
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
       
       $products = (array)$this->vendors_model->get_products_all()->result();
		
		$data['products'] = $products;
		
		$Vendors1 = $this->vendors_model->get_all_vendors1()->result();
		
		
		
	if($Vendors1 != null){ 
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
				
				foreach($Vendors1 as $Vendors11)
				{
					
					$Vendor = (array)$this->vendors_model->get_by_id($Vendors11->id)->row();
					$Vendor_products =(array)$this->vendors_model->products_vendor($Vendors11->id)->result();
				
					//print_r($Vendor_products);
					 
			       
					
				    if($Vendor_products != null)
					{
							
						$this->table->add_row(anchor('vendors/view/'.$Vendors11->id,$Vendor['business_name']),
						                      '','','','','','','','','','',''
					
														);
						foreach($Vendor_products as $vendor)
						{
							 $status = $vendor->status;
							 if($status == '0')
				             $status1 = '<span class="label label-default">Rejected</span>';
			                 if($status == '1')
				             $status1 = '<span class="label label-success">Accepted</span>';
				             $delete_link = anchor('categories/delete_product/'.$vendor->id,'<span class="label label-danger">DELETE</span>',array('class'=>'editcls','onclick'=>"return confirm('Are you sure you want to Delete ?')"));
							
				$this->table->add_row($i++,	
										//'<img src="'.base_url().'images_products/'.$product->image_name.'" width="40px" height="40px">'	,							
										//anchor('vendors/view/'.$vendor->vendor_id,$Vendor['business_name']),							
										$vendor->brand_name,	
										anchor('categories/view_prices/'.$vendor->id,'<span class="label label-default">Click</span>'),	
										$vendor->product_id,	
										$vendor->product_fit,	
										$vendor->fabric,
										$vendor->colors,							
										$vendor->sales_packages,	
										$vendor->style,	
										$vendor->inventory,	
										$vendor->availability,
										$status1.'&nbsp;'.
										anchor('categories/view_product/'.$vendor->id,'<span class="label label-default">VIEW</span>')
										.'&nbsp;'.$delete_link
							         	);
					}
					
					}
							         	
				}
							         	
							         	
				
		
	         $data['table'] = $this->table->generate();    
		}
		else
		{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		
		
		$this->sadmin_template->show('categories/products_admin',$data);
       
       
	}
	else 
	{
		redirect('sadmin');
	}
  	
  }
  function view_vendor($id)
  {
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id']    = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Vendor Profile';
       $data['menu_active'] = 'Products';
       
       
	}
	else 
	{
		redirect('sadmin');
	}
  }
  function view_product($product_id)
  {  	
  if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'View Product';
       $data['menu_active'] = 'products';
       $data['back'] = 'categories/all_products';
       
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
		else
		{
			
		}
		
	$data['sub_category']	= $options2[$data['product']['category']];
	
	
		$data['prices'] = $prices;
		$this->sadmin_template->show('categories/view_product', $data);
       
	}
	else 
	{
		redirect('sadmin');
	}
  	
  }
function delete_product($product_id)
  {
  	if($this->session->userdata('logged_in'))
	{
		$session_data = $this->session->userdata('logged_in');		
		$data['id'] = $session_data['id'];
		
		$this->vendors_model->delete_product($product_id);		
		$this->vendors_model->delete_images($product_id);
		$this->vendors_model->delete_prices_product($product_id);
		redirect('categories/all_products/suspend_success','refresh');
		
		
	}
  else
	{  	
	  	redirect('vendor', 'refresh');  
	}  	
  }
  function new_products()
  {
  
  if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'New Products';
       $data['menu_active'] = 'products';
       $data['message'] = '';
	   $data['cls'] = '';
       
       $products = (array)$this->vendors_model->get_products_new()->result();
		
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
								 
								  'Business Name ',
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
								  'Status',
								  $heading_last								  
 								);
				$i = 1;
				foreach($products as $product)
				{
					$status = $product->status;
					$Vendor = (array)$this->vendors_model->get_by_id($product->vendor_id)->row();
						$list = '<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li>'.anchor('categories/product_accept/'.$product->id,'<i class="icon-database-check"></i> Accept').'</li>
								<li>'.anchor('categories/product_reject/'.$product->id,'<i class="icon-database-remove"></i> Reject').'</li>
								<li>'.anchor('categories/delete_product/'.$product->id,'<span class="label label-danger">DELETE</span>',array('class'=>'editcls','onclick'=>"return confirm('Are you sure you want to Delete ?')")).'</li>
							</ul>
						</li>
					</ul>';
			$actions_list = array('data' => $list, 'class' => 'text-center');
			
			        if($status == '2')			
				    $status1 = '<span class="label label-info">Pending</span>';					
			        if($status == '0')
				    $status1 = '<span class="label label-default">Rejected</span>';
			        if($status == '1')
				    $status1 = '<span class="label label-success">Accepted</span>';
				   
				    $delete_link = anchor('categories/delete_product/'.$product->id,'<span class="label label-danger">DELETE</span>',array('class'=>'editcls','onclick'=>"return confirm('Are you sure you want to Delete ?')"));
					
				$this->table->add_row($i++,	
										//'<img src="'.base_url().'images_products/'.$product->image_name.'" width="40px" height="40px">'	,							
										$Vendor['business_name'],							
										anchor('categories/view_product/'.$product->id,$product->brand_name),
										anchor('categories/view_prices/'.$product->id,'<span class="label label-default">Click</span>'),
										anchor('categories/view_product/'.$product->id, $product->product_id),
										$product->product_fit,	
										$product->fabric,
										$product->colors,							
										$product->sales_packages,	
										$product->style,	
										$product->inventory,	
										$product->availability,
										$status1.'&nbsp;'.
										anchor('categories/view_product/'.$product->id,'<span class="label label-default">VIEW</span>'),
										$actions_list
							         	);
							         	
				}
							         	
							         	
				
		
	         $data['table'] = $this->table->generate();    
		}
		else
		{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		
		
		$this->sadmin_template->show('categories/products_admin',$data);
       
       
	}
	else 
	{
		redirect('sadmin');
	}
  
  }
  function view_prices($product_id)
  {
  	if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Product Prices';
       $data['menu_active'] = 'products';
       $data['link1']  = anchor('categories/new_products','<i class="fa fa-mail-reply"></i>BACK','class="btn btn-default"');
       $prices = (array)$this->vendors_model->get_prices($product_id)->result();
       
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
 								  'Price'								  
 								 );
		$i = 1;
		foreach ($prices as $price){
			$size1 = (array)$this->vendors_model->get_size($price->sizes_from)->row();
			$size2 = (array)$this->vendors_model->get_size($price->sizes_to)->row();
			$this->table->add_row($i++,
								$size1['sizes'].'-'.$size2['sizes'],								
								$price->price
							
					         	);
		}
			$data['table'] = $this->table->generate();    
		}else{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
       
       $this->sadmin_template->show('categories/prodcut_prices',$data);
	}
	else 
	{
		redirect('sadmin');
	}  
  }
  function product_accept($product_id)
  {
  	 if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
	   
	   $insert_data= array('status'=>'1');
	   $this->vendors_model->update_product($insert_data,$product_id);
	   
	   redirect('categories/new_products');
	   
	}
	else 
	
	{
		redirect('sadmin');
	}
  }
 function product_reject($product_id)
  {
   if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
	   
	   $insert_data= array('status'=>'0');	   
	   $this->vendors_model->update_product($insert_data,$product_id);
	   
	   redirect('categories/new_products');
	   
	}
	else 
	
	{
		redirect('sadmin');
	}
  }
  function rejected_products()
  {
  if($this->session->userdata('logged_in'))
	{
	   $session_data = $this->session->userdata('logged_in');
	   $data['id'] = $session_data['id'];
       $data['username'] = $session_data['username'];
       $data['page_title'] = 'Rejected Products';
       $data['menu_active'] = 'products';
       $data['message'] = '';
	   $data['cls'] = '';
       
       $products = (array)$this->vendors_model->get_products_rejected()->result();
		
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
								 'Business Name',
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
					$Vendor = (array)$this->vendors_model->get_by_id($product->vendor_id)->row();
				
			        if($status == '0')
				    $status1 = '<span class="label label-default">Rejected</span>';
			        if($status == '1')
				    $status1 = '<span class="label label-success">Accepted</span>';
				     $delete_link = anchor('categories/delete_product/'.$product->id,'<span class="label label-danger">DELETE</span>',array('class'=>'editcls','onclick'=>"return confirm('Are you sure you want to Delete ?')"));
					
				$this->table->add_row($i++,	
										//'<img src="'.base_url().'images_products/'.$product->image_name.'" width="40px" height="40px">'	,							
										$Vendor['business_name'],						
										$product->brand_name,											
										anchor('categories/view_prices/'.$product->id,'<span class="label label-default">Click</span>'),	
										$product->product_id,	
										$product->product_fit,	
										$product->fabric,
										$product->colors,							
										$product->sales_packages,	
										$product->style,	
										$product->inventory,	
										$product->availability,
										$status1.'&nbsp;'.
										anchor('categories/view_product/'.$product->id,'<span class="label label-default">VIEW</span>')
										.'&nbsp;'.$delete_link
							         	);
							         	
				}
							         	
							         	
				
		
	         $data['table'] = $this->table->generate();    
		}
		else
		{
			$data['table'] = '<center><img src="'.base_url().'assets/images/no_data.png"/> <h5> NO DETAILS FOUND..!';
		}
		
		
		$this->sadmin_template->show('categories/products_admin',$data);
       
       
	}
	else 
	{
		redirect('sadmin');
	}
  	
  }
 
 
 }