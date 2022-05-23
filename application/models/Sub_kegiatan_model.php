<?php
require_once(__DIR__ . '/Model.php');
class Sub_kegiatan_model extends Model
{
    public $id;
    public $data_proyek_id;
    public $name;

    protected $table = 'sub_kegiatan';
    public $sub_kegiatan;

    public function byDataProyek($id)
    {
        $this->db->where('data_proyek_id', $id);
        return $this;
    }
}
