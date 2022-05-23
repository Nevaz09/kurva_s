<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->authentication->user()) {
            return redirect('admin/dashboard');
        }
        $this->load->view('auth/login');
    }

    public function authenticate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $form = $this->input->post(['username', 'password'], true);
            $user = $this->User_model->findByUsername($form['username']);
            if ($user && password_verify($form['password'], $user->password)) {
                $this->session->set_userdata('auth', $user);
                redirect('admin/dashboard');
            } else {
                // $this->session->flash('errors', 'Username atau password salah!');
                $this->load->view('auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
