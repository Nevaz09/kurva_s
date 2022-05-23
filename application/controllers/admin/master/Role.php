<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
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
        $role = $this->Role_model;
        $roles = $role->paginate();
        $links = $role->links;
        return $this->adminview->render('admin/master/role/index', compact('roles', 'links'));
    }

    public function create()
    {
        $role = $this->Role_model;
        $action = base_url('admin/master/role/store');
        $title = "Tambah Role";
        $roles = $this->Role_model->all();
        return $this->adminview->render('admin/master/role/form', compact('role', 'action', 'title', 'roles'));
    }

    public function edit($id)
    {
        $role = $this->Role_model->find($id);
        $action = base_url('admin/master/role/update/' . $role->id);
        $title = "Edit Role";
        $roles = $this->Role_model->all();
        return $this->adminview->render('admin/master/role/form', compact('role', 'action', 'title', 'roles'));
    }

    public function store()
    {
        if (!$this->_validateForm()) {
            return $this->create();
        } else {
            $form = $this->input->post(['rolename', 'password', 'role_id'], true);
            $form['password'] = password_hash($form['password'], 0);
            $this->Role_model->create($form);
            $this->session->set_flashdata('success', 'Role berhasil ditambah!');
            return redirect('admin/master/role');
        }
    }

    public function update($id)
    {
        if (!$this->_validateForm()) {
            return $this->edit($id);
        } else {
            $form = $this->input->post(['rolename', 'password', 'role_id'], true);
            $form['password'] = password_hash($form['password'], 0);
            $this->Role_model->find($id)->update($form);
            $this->session->set_flashdata('success', 'Role berhasil diperbaharui!');
            return redirect('admin/master/role');
        }
    }

    public function destroy($id)
    {
        $this->Role_model->delete($id);
        $this->session->set_flashdata('success', 'Role berhasil dihapus!');
        return redirect('admin/master/role');
    }

    private function _validateForm()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama Role', 'required');
        return $this->form_validation->run() != FALSE;
    }
}
