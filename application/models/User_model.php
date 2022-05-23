<?php
require_once(__DIR__ . '/Model.php');
class User_model extends Model
{
    public $id;
    public $username;
    public $password;
    public $role_id;
    public $role_name;

    protected $users;
    protected $table = 'users';

    public function paginate()
    {
        $raw = parent::paginate();
        $result = array_map(function ($item) {
            return (new self)->fill($item);
        }, $raw);
        return $result;
    }


    public function findByUsername($username)
    {
        $user = $this->db->get_where('users', ['username' => $username])->row();
        foreach ($user as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    public function joinRole()
    {
        $this->users = $this->db->select('users.*, roles.name as role_name')->join('roles', 'roles.id = users.role_id');
        return $this;
    }
}
