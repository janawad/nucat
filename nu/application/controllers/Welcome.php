<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
function __construct()
  {
	parent::__construct();
	
	$this->load->helper(array('form', 'url'));
	date_default_timezone_set('Asia/Kolkata');
  }
	public function index()
	{
	redirect('http://nucatalog.com');
		//$this->login_template1->show('welcome/welcome');
	}
}
