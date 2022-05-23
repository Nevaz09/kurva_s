<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->authentication->user()) {
            redirect('auth/login');
        }
        $this->load->library('adminview');
    }

    public function index()
    {
        return $this->adminview->render('dashboard/index', ['asd' => 'asd']);
    }
}
