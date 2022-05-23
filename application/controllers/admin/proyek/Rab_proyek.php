<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rab_proyek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->authentication->user()) {
            redirect('auth/login');
        }
        $this->load->library('adminview');
        $this->load->model('Data_proyek_model');
        $this->load->model('Sub_kegiatan_model');
        $this->load->model('Jenis_pekerjaan_model');
    }

    public function index()
    {
        $data_proyek = $this->Data_proyek_model;
        $data_proyeks = $data_proyek->accepted()->paginate();
        $links = $data_proyek->links;
        return $this->adminview->render('admin/proyek/rab_proyek/index', compact('data_proyeks', 'links'));
    }

    public function detail($id)
    {
        $data_proyek = $this->Data_proyek_model->find($id);
        $action = base_url('admin/proyek/rab_proyek/update/' . $data_proyek->id);
        $title = "RAB - $data_proyek->nama_paket";
        $rab = array_map(function ($item) {
            $raw = $item;
            $raw->jenis_pekerjaan = (new $this->Jenis_pekerjaan_model)->bySubKegiatan($raw->id)->get();
            $raw->jumlah_sub_total = (new $this->Jenis_pekerjaan_model)->bySubKegiatan($raw->id)->sum('jumlah_harga')->get()[0]->jumlah_harga;
            return $raw;
        }, $this->Sub_kegiatan_model->byDataProyek($id)->get());
        $jumlah_konstruksi = array_reduce($rab, function ($before = 0.00, $item) {
            return floatval($before + $item->jumlah_sub_total);
        });
        $ppn = $jumlah_konstruksi * (10/100);
        $jumlah_keseluruhan = $jumlah_konstruksi + $ppn;
        return $this->adminview->render('admin/proyek/rab_proyek/detail', compact('data_proyek', 'action', 'title', 'rab', 'jumlah_keseluruhan', 'jumlah_konstruksi', 'ppn'));
    }

    public function sub_kegiatan($data_proyek_id)
    {
        $form = $this->input->post(['nama']);
        $form['data_proyek_id'] = $data_proyek_id;
        $this->Sub_kegiatan_model->create($form);
        return redirect(base_url('admin/proyek/rab_proyek/detail/' . $data_proyek_id));
    }

    public function update_sub_kegiatan($sub_kegiatan_id)
    {
        $form = $this->input->post(['nama']);
        $this->Sub_kegiatan_model->find($sub_kegiatan_id)->update($form);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_sub_kegiatan($sub_kegiatan_id)
    {
        $this->Sub_kegiatan_model->delete($sub_kegiatan_id);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function jenis_pekerjaan($sub_kegiatan_id)
    {
        $form = $this->input->post([
            'nama',
            'volume',
            'satuan',
            'harga_satuan',
        ]);
        $form['sub_kegiatan_id'] = $sub_kegiatan_id;
        $form['jumlah_harga'] = floatval($form['volume'])  * floatval($form['harga_satuan']);
        $this->Jenis_pekerjaan_model->create($form);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_jenis_pekerjaan($jenis_pekerjaan_id)
    {
        $form = $this->input->post([
            'nama',
            'volume',
            'satuan',
            'harga_satuan',
        ]);
        $form['jumlah_harga'] = floatval($form['volume'])  * floatval($form['harga_satuan']);
        $this->Jenis_pekerjaan_model->find($jenis_pekerjaan_id)->update($form);
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_jenis_pekerjaan($jenis_pekerjaan_id)
    {
        $this->Jenis_pekerjaan_model->delete($jenis_pekerjaan_id);
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
