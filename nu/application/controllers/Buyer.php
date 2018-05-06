<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {
function __construct()
  {
	parent::__construct();
	$this->load->library(array('table','form_validation'));
	$this->load->helper(array('form', 'url'));
	$this->load->model('sadmin_model','',true);
	$this->load->model('vendors_model','',true);
	date_default_timezone_set('Asia/Kolkata');
  }
	public function index()
	{
		$this->login_template->show('welcome');
	}
	
	function forgot_pwd(){
		$data['action'] = 'buyer/forgot_pwd';
		$data['panel'] = 'Buyer';
		$data['img'] = 'buyer.png';
		
		if ($this->uri->segment(3) == 'invalid'){
			$data['msg'] = 'Invalid Email ID..!!';
			$data['cls'] = 'alert alert-warning text-center';
		}elseif ($this->uri->segment(3) == 'reset'){
			$data['msg'] = 'Password Reset Successfull..!!';
			$data['cls'] = 'alert alert-success text-center';
		}else {
			$data['msg'] = '';
			$data['cls'] = '';
		}
		
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		if ($this->form_validation->run() === false){
			$this->login_template->show('buyer/forgot_pwd',$data);
		}else {
			$email = $this->input->post('email');
			
			$res = (array)$this->vendors_model->get_by_field('email',$email,'buyers')->row();
			if ($res){
				$otp = sprintf("%06d", mt_rand(1, 999999));
				$pwd = md5($otp);
				$det = array('password'=>$pwd);
				$this->sadmin_model->update_det($res['id'],$det,'buyers');
				
				//TODO: SMS Send Code START
				$apiKey = 'Afedccdff7e0753062c81b059115748bc';
				$SenderID = 'NUCTLG';
				$To = $res['mobile'];
				$msg = urlencode("Your Password Rest is successfull. Use this OTP : $otp as your password to login into your account.");
				
				$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
				$ret = file($url);
				//TODO: SMS Send Code END
				
				redirect('buyer/forgot_pwd/reset');
			}else {
				redirect('buyer/forgot_pwd/invalid');
			}
		}
	}
	
	function forgot_pwd1(){
		$data['action'] = 'buyer/forgot_pwd1';
		$data['panel'] = 'Vendor';
		$data['img'] = 'vendor.png';
		
		if ($this->uri->segment(3) == 'invalid'){
			$data['msg'] = 'Invalid Email ID..!!';
			$data['cls'] = 'alert alert-warning text-center';
		}elseif ($this->uri->segment(3) == 'reset'){
			$data['msg'] = 'Password Reset Successfull..!!';
			$data['cls'] = 'alert alert-success text-center';
		}else {
			$data['msg'] = '';
			$data['cls'] = '';
		}
		
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		if ($this->form_validation->run() === false){
			$this->login_template->show('buyer/forgot_pwd',$data);
		}else {
			$email = $this->input->post('email');
			
			$res = (array)$this->vendors_model->get_by_field('email',$email,'vendors')->row();
			if ($res){
				$otp = sprintf("%06d", mt_rand(1, 999999));
				$pwd = md5($otp);
				$det = array('password'=>$pwd);
				$this->sadmin_model->update_det($res['id'],$det,'vendors');
				
				//TODO: SMS Send Code START
				$apiKey = 'Afedccdff7e0753062c81b059115748bc';
				$SenderID = 'NUCTLG';
				$To = $res['mobile'];
				$msg = urlencode("Your Password Rest is successfull. Use this OTP : $otp as your password to login into your account.");
				
				$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
				$ret = file($url);
				//TODO: SMS Send Code END
				
				redirect('buyer/forgot_pwd1/reset');
			}else {
				redirect('buyer/forgot_pwd1/invalid');
			}
		}
	}
	
	function support(){
		$radio = $this->input->post('radio');
		$msg = $this->input->post('msg');
		$mobile = $this->input->post('mobile');
		$type = ($radio)?'inquiry':'Support';
		
		$det = array('type'=>$type,'mobile'=>$mobile,'msg'=>$msg,'updated_on'=>date('Y-m-d H:i:s'));
		
		$this->sadmin_model->insert_det($det,'newsletter');
		
		//TODO: SMS Send Code START
		$apiKey = 'Afedccdff7e0753062c81b059115748bc';
		$SenderID = 'NUCTLG';
		$To = $mobile;
		$msg = urlencode('Thank you for Contacting NuCatalog. Our team will contact you within 48 hours. For help email us at support@nucatalog.com.');
		
		$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
		$ret = file($url);
		//TODO: SMS Send Code END
				
		echo '1';
	}
	
	
	
}
