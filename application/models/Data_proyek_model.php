<?php
require_once(__DIR__ . '/Model.php');
class Data_proyek_model extends Model
{
    public $id;
    public $kode_tender;
    public $kode_rup;
    public $nama_paket;
    public $pd;
    public $satuan_kerja;
    public $jenis_pengadaan;
    public $jenis_anggaran;
    public $tahun_anggaran;
    public $nomor_kontrak;
    public $nilai;
    public $lokasi;
    public $masa_pekerjaan;
    public $disetujui_pada;

    protected $users;
    protected $table = 'data_proyek';

    public function paginate()
    {
        $data = parent::paginate();
        $result = [];
        foreach ($data as $item) {
            $result[] = (new self)->fill($item);
        }
        return $result;
    }

    public function accept()
    {
        $this->db->where('id', $this->id);
        $this->disetujui_pada = date('Y-m-d');
        $this->db->update($this->table, ['disetujui_pada' => $this->disetujui_pada]);
        return $this;
    }

    public function cancel()
    {
        $this->db->where('id', $this->id);
        $this->disetujui_pada = null;
        $this->db->update($this->table, ['disetujui_pada' => $this->disetujui_pada]);
        return $this;
    }

    public function accepted()
    {
        $this->where_not_null('disetujui_pada');
        return $this;
    }
}
