<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *  Buyer/Vendor Status Codes
 *  1 - Accept [Register & Paid]
 *  2 - Register & Not Paid
 *  3 - Reject
 */
class Registration extends CI_Controller {
  private $PayUkey = 'o5gBXo8x';
  private $PayUsalt = '8O6nzLeMW1';
  
  function __construct()
  {
	parent::__construct();
	$this->load->library(array('table','form_validation'));
	$this->load->helper(array('form', 'url'));
	$this->load->model('vendors_model','',TRUE);
	$this->load->model('buyers_model','',TRUE);
	$this->load->library('email');
	date_default_timezone_set('Asia/Kolkata');
  }

  function vendor()
 	{
   		$data['page_title'] = 'Vendor Login';
   		$data['action'] = 'registration/vendor';
   		$data['error'] = '';
   		$data['packs'] = (array)$this->vendors_model->get_info('packages')->result();
   		
   		$this->_set_rules();
   		if ($this->form_validation->run() === FALSE){
			$data['Vendor']['vendor_name'] = $this->input->post('vendor_name');
			$data['Vendor']['business_name'] = $this->input->post('business_name');
			$data['Vendor']['dob'] = $this->input->post('dob');
			$data['Vendor']['address'] = $this->input->post('address');
			$data['Vendor']['tin'] = $this->input->post('tin');
			$data['Vendor']['pan'] = $this->input->post('pan');
			$data['Vendor']['brand'] = $this->input->post('brand');
			$data['Vendor']['mobile'] = $this->input->post('mobile');
			$data['Vendor']['office'] = $this->input->post('office');
			$data['Vendor']['email'] = $this->input->post('email');
			$data['Vendor']['password'] = $this->input->post('password');
			
   			$this->login_template->show('register/vendor',$data);
   		}
		else
		{
   			$today = date("Y-m-d H:i:s");
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$pack_id = $this->input->post('pack_id');
			$pack = (array)$this->vendors_model->get_by_field('id',$pack_id,'packages')->row();
			
			$res = (array)$this->vendors_model->check_user($mobile,$email)->row();
			$otp = sprintf("%06d", mt_rand(1, 999999));
			$pwd = md5($otp);
			
			$vendor_details = array('vendor_name'		=>	$this->input->post('vendor_name'),
										'business_name' 	        =>	$this->input->post('business_name'),
										'vendorDOB'                     =>      $this->input->post('dob'),
										'address' 			=>	$this->input->post('address'),
										'tin'				=>	$this->input->post('tin'),
										'pan'				=>	$this->input->post('pan'),
										'brand'				=>	$this->input->post('brand'),
										'mobile'			=>	$mobile,
										'office'			=>	$this->input->post('office'),
										'email' 			=> 	$email,
										'agreement'                     =>      $this->input->post('agree'),
										'status'			=>	'2',
										'reg_date'			=>  $today,
										'amount'			=>  $pack['price']*$pack['validity'],
										'package'			=>  $pack_id,
										'validity'			=>  $pack['validity'],
										'activation_date'	=>  '',
										'password'			=>  $pwd,
										'updated_by'		=>	'',
										'updated_on'		=>	$today);
				
				$id=$this->vendors_model->save($vendor_details);
			  
				//send email
				$this->load->library('email');
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
			
				$this->email->from('nucatalog@hotmail.com', 'NU CATALOG');
				$this->email->to($vendor_details['email']);
					
				$html = 'Dear <b>'.$vendor_details['vendor_name'].'</b>, <br><br> <font color="red"> <h4> Congratulations !</h4> </font> <p> Your Vendor Account has been Created successfully.<br/><br/>';
					
				$this->email->subject('Nucatalog.com - Account Created Successfully.');
				$this->email->message($html);
				$this->email->send();

				//TODO: SMS Send Code START
				$apiKey = 'Afedccdff7e0753062c81b059115748bc';
				$SenderID = 'NUCTLG';
				$To = $mobile;
				$msg = urlencode("Your Username is your Email and Password is $otp");
				
				$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
				$ret = file($url);
				//TODO: SMS Send Code END
				
				//TODO: SMS Send Code START
				$apiKey = 'Afedccdff7e0753062c81b059115748bc';
				$SenderID = 'NUCTLG';
				$To = $mobile;
				$msg = urlencode('Thank you for registering with NuCatalog as your B2B partner. Our team will contact you within 48 hours. For help email us at support@nucatalog.com.');
				
				$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
				$ret = file($url);
				//TODO: SMS Send Code END
				
				redirect("registration/vendor_pack/$id");			
   			}
	}
	
	function vendor_pack($id){
		$data['page_title'] = 'Vendor Registration';
		$data['vendor'] = (array)$this->vendors_model->get_by_id($id,'vendors')->row();
		$data['pack'] = (array)$this->vendors_model->get_by_field('id',$data['vendor']['package'],'packages')->row();

		// PAYUMONEY CODE
		$data['key'] = $key= $this->PayUkey;
		$SALT = $this->PayUsalt;
		$data['action'] = "https://secure.payu.in/_payment";
		
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$data['txnid'] = $txnid;
		$amount = $data['vendor']['amount'];
		$data['amount'] = $amount;
		$productinfo = $id;
		$data['pro'] = $productinfo;
		$firstname = $data['vendor']['vendor_name'];
		$data['name'] = $firstname;
		$email = $data['vendor']['email'];
		$data['email'] = $email;
		$data['phone'] = $data['vendor']['mobile'];
		
		$data['surl'] = base_url().'registration/vendor_success';
		$data['furl'] = base_url().'registration/vendor_failure';
		
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		$hashVarsSeq = explode('|', $hashSequence);
		$hash_string = '';
		foreach($hashVarsSeq as $hash_var) {
			$hash_string .= isset($_POST[$hash_var]) ? $_POST[$hash_var] : '';
			$hash_string .= '|';
		}
		$hash_string .= $SALT;
		$hash_string = "$key|$txnid|$amount|$productinfo|$firstname|$email|||||||||||$SALT";
		$hash = strtolower(hash('sha512', $hash_string));
		//$hash = strtolower(hash('sha512', $hash_string));
		$data['hash'] = $hash;
		// END
		
		$this->login_template->show('register/vendor_pack',$data);
	}
	
	function vendor_success(){
	 	$data['page_title'] = 'Vendor Regstration Success';
	   	// PAYU SUCCESS CODE
     	$salt=$this->PayUsalt;
     	$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		
		if (isset($_POST["additionalCharges"])) {
			$additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}else {
			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}
		$hash = hash("sha512", $retHashSeq);
		if ($hash != $posted_hash) {
			redirect("registration/vendor_pack/$productinfo");
		}else {
			$det = array('txnid'=>$txnid, 'status'=>1, 'activation_date'=>date('Y-m-d H:i:s'));
			$this->vendors_model->update_vendor($productinfo,$det);
			$data['amount'] = $amount;
			$data['txnid'] = $txnid;
			
			$this->login_template->show('register/vendor_success',$data);
		}
	}
	
	function vendor_failure(){
		$data['page_title'] = 'Vendor Regstration Failure';
		// PAYU FAILURE CODE
     	$salt=$this->PayUsalt;
     	$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		
		if (isset($_POST["additionalCharges"])) {
			$additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}else {
			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}
		$hash = hash("sha512", $retHashSeq);
		if ($hash != $posted_hash) {
			redirect("registration/vendor_pack/$productinfo");
		}else {
			$data['amount'] = $amount;
			$data['txnid'] = $txnid;
			
			$this->login_template->show('register/vendor_failure',$data);
		}
	}

  function buyer()
 	{
   		$data['page_title'] = 'Buyer Login';
   		$data['action'] = 'registration/buyer';
   		$data['error'] = '';
   		$this->_set_rules1();
   		if ($this->form_validation->run() === FALSE){
			$data['Buyer']['buyer_name'] = $this->input->post('buyer_name');
			$data['Buyer']['business_name'] = $this->input->post('business_name');
			$data['Buyer']['address'] = $this->input->post('address');
			$data['Buyer']['tin'] = $this->input->post('tin');
			$data['Buyer']['pan'] = $this->input->post('pan');
			$data['Buyer']['mobile'] = $this->input->post('mobile');
			$data['Buyer']['office'] = $this->input->post('office');
			$data['Buyer']['email'] = $this->input->post('email');
			$data['Buyer']['year_of_inception'] = $this->input->post('year_of_inception');
			$data['Buyer']['categories'] = $this->input->post('categories');
			$data['Buyer']['password'] = $this->input->post('password');
			
   			$this->login_template->show('register/buyer',$data);
   		}else{
   			$today = date("Y-m-d H:i:s");
   			$mobile = $this->input->post('mobile');
   			$otp = sprintf("%06d", mt_rand(1, 999999));
			$pwd = md5($otp);
			
   			$buyer_details = array(
   					'buyer_name'		=>	$this->input->post('buyer_name'),
 					'business_name' 	=>	$this->input->post('business_name') ,
 		            'address' 			=>	$this->input->post('address'),
 					'tin'				=>	$this->input->post('tin'),
 					'pan'				=>	$this->input->post('pan'),
 					'categories'		=>	$this->input->post('categories'),
 					'mobile'			=>	$mobile,
   					'office'			=>	$this->input->post('office'),
 					'email' 			=> 	$this->input->post('email'),
   					'year_of_inception' => 	$this->input->post('year_of_inception'),
   					'status'			=>	'2',
   					'reg_date'			=>  $today,
   					'activation_date'	=>  '',
   					'password'			=>  $pwd,
 					'updated_by'		=>	'',
 					'updated_on'		=>	$today
   			);
	 	  $id=$this->buyers_model->save($buyer_details);
	 	  
	 	  
	 	       //send email
	 	        $this->load->library('email');
				$config['protocol'] = 'sendmail';
        		$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
		
				$this->email->from('nucatalog@hotmail.com', 'NU CATALOG');
				$this->email->to($buyer_details['email']);
				
				$html = 'Dear <b>'.$buyer_details['buyer_name'].'</b>, <br><br> <font color="red"> <h4> Congratulations !</h4> </font> <p> Your Buyer Account has been Created successfully.<br/><br/>';
				
				$this->email->subject('Nucatalog.com - Account Created Successfully.');
 				$this->email->message($html);
 				$this->email->send();
	 	  		
				//TODO: SMS Send Code START
				$apiKey = 'Afedccdff7e0753062c81b059115748bc';
				$SenderID = 'NUCTLG';
				$To = $mobile;
				$msg = urlencode("Your Username is your Email and Password is $otp");
				
				$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
				$ret = file($url);
				//TODO: SMS Send Code END
				
				//TODO: SMS Send Code START
				$apiKey = 'Afedccdff7e0753062c81b059115748bc';
				$SenderID = 'NUCTLG';
				$To = $mobile;
				$msg = urlencode('Thank you for registering with NuCatalog as your B2B partner. Your account will be activated within 48 hours subject to verification.');
				
				$url = "http://sms.variforrmsolution.com/apiv2/?api=http&workingkey=$apiKey&to=$To&sender=$SenderID&message=$msg";
				$ret = file($url);
				//TODO: SMS Send Code END
				
	 	  $url = 'registration/buyers_success';
		  echo'<script> window.location.href = "'.base_url().''.$url.'";
			 </script>';
   		}
 }
 
 function buyers_success(){
 	$data['page_title'] = 'Buyers Regstration Success';
   	$data['error'] = '';
	$this->login_template->show('register/buyers_success',$data);
 }
 
 
 function _set_rules(){
  	$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required|trim');
  	$this->form_validation->set_rules('business_name', 'Business Name', 'required|trim');
  	$this->form_validation->set_rules('dob', 'Date of birth', 'required|trim');
  	$this->form_validation->set_rules('address', 'Address', 'required|trim');
  	$this->form_validation->set_rules('tin', 'TIN', 'required|trim');
  	$this->form_validation->set_rules('pan', 'PAN', 'required|trim');
  	$this->form_validation->set_rules('brand', 'brand', 'required|trim');
  	$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|trim|is_numeric|min_length[10]|max_length[10]|is_unique[vendors.mobile]');
  	$this->form_validation->set_rules('pack_id', 'Packages', 'required|trim');
  	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[vendors.email]');
  	$this->form_validation->set_rules('agree','Checkbox','trim|required|xss_clean');
 } 
 
function _set_rules1(){
  	$this->form_validation->set_rules('buyer_name', 'Buyer Name', 'required|trim');
  	$this->form_validation->set_rules('business_name', 'Business Name', 'required|trim');
  	$this->form_validation->set_rules('address', 'Address', 'required|trim');
  	$this->form_validation->set_rules('tin', 'TIN', 'required|trim');
  	$this->form_validation->set_rules('pan', 'PAN', 'required|trim');
  	$this->form_validation->set_rules('categories', 'categories', 'required|trim');
  	$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|trim|is_numeric|min_length[10]|max_length[10]|is_unique[buyers.mobile]');
  	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[buyers.email]');
  	$this->form_validation->set_rules('year_of_inception', 'Year of Inception', 'required|trim|is_numeric|min_length[4]|max_length[4]');
 }
  	
}