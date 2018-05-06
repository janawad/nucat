<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pdf_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('template/pdf_header', $data);
        $CI->load->view($view, $data);
        $CI->load->view('template/pdf_footer', $data);
    }
}
  