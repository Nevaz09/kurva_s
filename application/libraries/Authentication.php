<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('User_model');
        $this->CI->load->model('Role_model');
    }

    public function user()
    {
        // $this->CI->load->model('User_model');
        $user = $this->CI->session->userdata('auth');
        if(!$user) return false;
        $user->role = $this->CI->Role_model->find($user->role_id);
        return $user;
    }
}
