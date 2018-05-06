<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Buyer_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('template/buyer_header', $data);
        $CI->load->view($view, $data);
        $CI->load->view('template/buyer_footer', $data);
    }
}
  