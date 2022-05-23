<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->authentication->user()) {
            redirect('auth/login');
        }
        $this->load->library('adminview');
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
        $pegawaies = $this->Pegawai_model->paginate();
        $links = $this->Pegawai_model->links;
        return $this->adminview->render('admin/master/pegawai/index', compact('pegawaies', 'links'));
    }

    public function create()
    {
        $pegawai = $this->Pegawai_model;
        $action = base_url('admin/master/pegawai/store');
        $title = "Tambah Pegawai";
        return $this->adminview->render('admin/master/pegawai/form', compact('pegawai', 'action', 'title'));
    }

    public function edit($id)
    {
        $pegawai = $this->Pegawai_model->find($id);
        $action = base_url('admin/master/pegawai/update/' . $pegawai->id);
        $title = "Edit Pegawai";
        return $this->adminview->render('admin/master/pegawai/form', compact('pegawai', 'action', 'title'));
    }

    public function store()
    {
        if (!$this->_validateForm()) {
            return $this->create();
        } else {
            $form = $this->input->post(['name', 'position'], true);
            $this->Pegawai_model->create($form);
            $this->session->set_flashdata('success', 'Pegawai berhasil ditambah!');
            return redirect('admin/master/pegawai');
        }
    }

    public function update($id)
    {
        if (!$this->_validateForm()) {
            return $this->edit($id);
        } else {
            $form = $this->input->post(['name', 'position'], true);
            $this->Pegawai_model->find($id)->update($form);
            $this->session->set_flashdata('success', 'Pegawai berhasil diperbaharui!');
            return redirect('admin/master/pegawai');
        }
    }

    public function destroy($id)
    {
        $this->Pegawai_model->delete($id);
        $this->session->set_flashdata('success', 'Pegawai berhasil dihapus!');
        return redirect('admin/master/pegawai');
    }

    private function _validateForm()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('position', 'Jabatan', 'required');
        return $this->form_validation->run() != FALSE;
    }
}
