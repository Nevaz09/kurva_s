<?php
require_once(__DIR__ . '/Model.php');
class Jenis_pekerjaan_model extends Model
{
    public $id;
    public $nama;
    public $volume;
    public $satuan;
    public $harga_satuan;
    public $jumlah_harga;
    public $sub_kegiatan_id;
    
    protected $jenis_pekerjaan;
    protected $table = 'jenis_pekerjaan';

    public function bySubKegiatan($id)
    {
        $result = $this->db->where('sub_kegiatan_id', $id);
        return $this;
    }
}
