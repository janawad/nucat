<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class School_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
//    	$url = current_url();
//        $url = rtrim($url, '/');
//        $url = filter_var($url, FILTER_SANITIZE_URL);
//        $this->_url = explode('/', $url);
//        echo $file = base_url().'application/views/' . $this->_url[4] . '/inc/header.php';
//        if (file_exists($file)) {
//        	require $file;
//        }

        // Load template views
        $CI->load->view('template/school_header', $data);
        $CI->load->view($view, $data);
        $CI->load->view('template/school_footer', $data);
    }
}
  