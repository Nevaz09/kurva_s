<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminView
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function render($page, $data = null)
    {
        $this->CI->load->view('admin/header', $data);
        $this->CI->load->view('admin/body', $data);
        $this->CI->load->view($page, $data);
        $this->CI->load->view('admin/footer', $data);
    }
}
