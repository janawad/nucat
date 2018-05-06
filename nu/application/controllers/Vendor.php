<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
function __construct()
  {
	parent::__construct();
	$this->load->library(array('table','form_validation'));
	$this->load->helper(array('form', 'url'));
	date_default_timezone_set('Asia/Kolkata');
  }
	public function index()
	{
		//$this->load->view('vendor/login');
		$this->login_template->show('vendor/login');
	}
	
}
