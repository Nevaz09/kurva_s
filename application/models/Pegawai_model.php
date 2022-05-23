<?php
require_once(__DIR__ . '/Model.php');
class Pegawai_model extends Model
{
    public $id;
    public $name;
    public $position;

    protected $users;
    protected $table = 'pegawai';

}
