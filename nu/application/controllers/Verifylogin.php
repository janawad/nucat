<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifylogin extends CI_Controller {
 function __construct()
  {
	parent::__construct();
	$this->load->library(array('table','form_validation'));
	$this->load->helper(array('form', 'url'));
	$this->load->model('vendors_model','',TRUE);
	$this->load->model('buyers_model','',TRUE);
	date_default_timezone_set('Asia/Kolkata');
  }
  
  function vendor(){
   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_vendor_database');
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    // $this->login_template2->show('welcome/welcome');
    redirect('../');
   }
   else
   {
     //Go to private area
    redirect('vendor_home', 'refresh');
   }
  }
  
 function check_vendor_database($password)
 {
   //Field validation succeeded.  Validate against database
	$email = $this->input->post('email');

   //query the database
   $result = $this->vendors_model->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'vendor_name' => $row->vendor_name,
         'email' => $row->email
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_vendor_database', 'Invalid Email or Password');
     return false;
   }
 }
 
 function vendor2(){
   $this->form_validation->set_rules('email4', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password4', 'Password', 'trim|required|xss_clean|callback_check_vendor_database2');
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    // $this->login_template2->show('welcome/welcome');
    redirect('../');
   }
   else
   {
     //Go to private area
    redirect('vendor_home', 'refresh');
   }
  }
  
 function check_vendor_database2($password)
 {
   //Field validation succeeded.  Validate against database
	$email = $this->input->post('email4');

   //query the database
   $result = $this->vendors_model->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'vendor_name' => $row->vendor_name,
         'email' => $row->email
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_vendor_database', 'Invalid Email or Password');
     return false;
   }
 }
 
 function buyer(){
     
   $this->form_validation->set_rules('email1', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password1', 'Password', 'trim|required|xss_clean|callback_check_buyer_database');
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    // $this->login_template2->show('welcome/welcome');
     redirect('../');
   }
   else
   { 
     //Go to private area
     redirect('buyer_home/homepage', 'refresh');
   }
  }
  
  
  
function check_buyer_database($password)
 {
   //Field validation succeeded.  Validate against database
	$email = $this->input->post('email1');
	//$password = $this->input->post('password1');
  
   //query the database
   $result = $this->buyers_model->login($email, $password);
//prinr_r($result);
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'buyer_name' => $row->buyer_name,
         'email' => $row->email,
       	 'mobile' => $row->mobile
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_buyer_database', 'Invalid Email or Password');
     return false;
   }
 }
 
 
 function buyer2(){
    
   $this->form_validation->set_rules('email2', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password2', 'Password', 'trim|required|xss_clean|callback_check_buyer_database2');
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    // $this->login_template2->show('welcome/welcome');
     redirect('../');
   }
   else
   {
     //Go to private area
     redirect('buyer_home/homepage', 'refresh');
   }
  }
  
  function check_buyer_database2($password)
 {
   //Field validation succeeded.  Validate against database
	$email = $this->input->post('email2');
	

   //query the database
   $result = $this->buyers_model->login($email, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'buyer_name' => $row->buyer_name,
         'email' => $row->email,
       	 'mobile' => $row->mobile
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
     
   }
   else
   {
     $this->form_validation->set_message('check_buyer_database', 'Invalid Email or Password');
     return false;
   }
 }
 
 
}
