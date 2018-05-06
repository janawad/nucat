<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login_template2 {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('template/login_header2', $data);
        $CI->load->view($view, $data);
        $CI->load->view('template/login_footer1', $data);
    }
}