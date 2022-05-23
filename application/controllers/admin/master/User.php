<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->authentication->user()) {
            redirect('auth/login');
        }
        $this->load->library('adminview');
        $this->load->model('Role_model');
    }

    public function index()
    {
        $user = $this->User_model->joinRole();
        $users = $user->paginate();
        $links = $user->links;
        return $this->adminview->render('admin/master/user/index', compact('users', 'links'));
    }

    public function create()
    {
        $user = $this->User_model;
        $action = base_url('admin/master/user/store');
        $title = "Tambah User";
        $roles = $this->Role_model->all();
        return $this->adminview->render('admin/master/user/form', compact('user', 'action', 'title', 'roles'));
    }

    public function edit($id)
    {
        $user = $this->User_model->find($id);
        $action = base_url('admin/master/user/update/' . $user->id);
        $title = "Edit User";
        $roles = $this->Role_model->all();
        return $this->adminview->render('admin/master/user/form', compact('user', 'action', 'title', 'roles'));
    }

    public function store()
    {
        if (!$this->_validateForm()) {
            return $this->create();
        } else {
            $form = $this->input->post(['username', 'password', 'role_id'], true);
            $form['password'] = password_hash($form['password'], 0);
            $this->User_model->create($form);
            $this->session->set_flashdata('success', 'User berhasil ditambah!');
            return redirect('admin/master/user');
        }
    }

    public function update($id)
    {
        if (!$this->_validateForm()) {
            return $this->edit($id);
        } else {
            $form = $this->input->post(['username', 'password', 'role_id'], true);
            $form['password'] = password_hash($form['password'], 0);
            $this->User_model->find($id)->update($form);
            $this->session->set_flashdata('success', 'User berhasil diperbaharui!');
            return redirect('admin/master/user');
        }
    }

    public function destroy($id)
    {
        $this->User_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus!');
        return redirect('admin/master/user');
    }

    private function _validateForm()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        return $this->form_validation->run() != FALSE;
    }
}
