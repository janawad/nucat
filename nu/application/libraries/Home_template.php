<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
       //$CI->load->view('template/home_header', $data);
       // $CI->load->view($view, $data);
       // $CI->load->view('template/home_footer', $data);
		
		$CI->load->view('newtheme/header', $data);
       $CI->load->view($view, $data);
       $CI->load->view('newtheme/footer', $data);
    }
}
  