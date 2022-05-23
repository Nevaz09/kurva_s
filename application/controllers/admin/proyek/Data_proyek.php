<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_proyek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->authentication->user()) {
            redirect('auth/login');
        }
        $this->load->library('adminview');
        $this->load->model('Data_proyek_model');
    }

    public function index()
    {
        $data_proyek = $this->Data_proyek_model;
        $data_proyeks = $data_proyek->paginate();
        $links = $data_proyek->links;
        return $this->adminview->render('admin/proyek/data_proyek/index', compact('data_proyeks', 'links'));
    }

    public function create()
    {
        $data_proyek = $this->Data_proyek_model;
        $action = base_url('admin/proyek/data_proyek/store');
        $title = "Tambah Data Proyek";
        return $this->adminview->render('admin/proyek/data_proyek/form', compact('data_proyek', 'action', 'title'));
    }

    public function edit($id)
    {
        $data_proyek = $this->Data_proyek_model->find($id);
        $action = base_url('admin/proyek/data_proyek/update/' . $data_proyek->id);
        $title = "Edit Data Proyek";
        return $this->adminview->render('admin/proyek/data_proyek/form', compact('data_proyek', 'action', 'title'));
    }

    public function store()
    {
        if (!$this->_validateForm()) {
            return $this->create();
        } else {
            $form = $this->input->post([
                'kode_tender',
                'kode_rup',
                'nama_paket',
                'pd',
                'satuan_kerja',
                'jenis_pengadaan',
                'tahun_anggaran',
                'nomor_kontrak',
                'nilai',
                'lokasi',
                'masa_pekerjaan'
            ], true);
            $this->Data_proyek_model->create($form);
            $this->session->set_flashdata('success', 'Data Proyek berhasil ditambah!');
            return redirect('admin/proyek/data_proyek');
        }
    }

    public function update($id)
    {
        if (!$this->_validateForm()) {
            return $this->edit($id);
        } else {
            $form = $this->input->post([
                'kode_tender',
                'kode_rup',
                'nama_paket',
                'pd',
                'satuan_kerja',
                'jenis_pengadaan',
                'tahun_anggaran',
                'nomor_kontrak',
                'nilai',
                'lokasi',
                'masa_pekerjaan',
            ], true);
            $this->Data_proyek_model->find($id)->update($form);
            $this->session->set_flashdata('success', 'Data_proyek berhasil diperbaharui!');
            return redirect('admin/proyek/data_proyek');
        }
    }

    public function destroy($id)
    {
        $this->Data_proyek_model->delete($id);
        $this->session->set_flashdata('success', 'Data_proyek berhasil dihapus!');
        return redirect('admin/proyek/data_proyek');
    }

    private function _validateForm()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode_tender', 'Kode Tender', 'required');
        $this->form_validation->set_rules('kode_rup', 'Kode Rup', 'required');
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('pd', 'Pd', 'required');
        $this->form_validation->set_rules('satuan_kerja', 'Satuan Kerja', 'required');
        $this->form_validation->set_rules('jenis_pengadaan', 'Jenis Pengadaan', 'required');
        $this->form_validation->set_rules('tahun_anggaran', 'Tahun Anggaran', 'required');
        $this->form_validation->set_rules('nomor_kontrak', 'Nomor Kontrak', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('masa_pekerjaan', 'Masa Pekerjaan', 'required');

        return $this->form_validation->run() != FALSE;
    }
}
