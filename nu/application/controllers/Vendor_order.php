<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Vendor_order extends CI_Controller 
	{
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
				$data['vendor_name'] = $session_data['vendor_name'];
				$data['menu_active'] = 'vendor_home';
				$data['page_title'] = 'Dashboard';
				
				$this->vendor_template->show('vendor_home/index', $data);
			}
			else
			{
			 //If no session, redirect to login page
			 redirect('welcome', 'refresh');
			}
		}
	}