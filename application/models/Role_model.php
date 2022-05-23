<?php
require_once(__DIR__.'/Model.php');
class Role_model extends Model
{
    public $id;
    public $name;

    protected $roles;
    protected $table = 'roles';
    
}
