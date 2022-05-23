<?php
class Model extends CI_Model
{
    protected $table;

    public function fill($item)
    {
        foreach ($item as $key => $value) {
            $this->$key = $value;
        }
        return $this;
    }

    public function count()
    {
        return $this->db->count_all($this->table);
    }

    public function limit($limit, $offset = null)
    {
        $tableName = $this->table;
        $this->$tableName = $this->db->get($this->table, $limit, $offset);
        return $this;
    }

    public function get()
    {
        $tableName = $this->table;
        $this->$tableName = $this->$tableName ?: $this->db->get($tableName);
        $users = [];
        foreach ($this->$tableName->result() as $item) {
            $users[] = (new self)->fill($item);
        }
        return $users;
    }

    public function find($id)
    {
        $this->fill($this->db->get_where($this->table, ['id' => $id])->row());
        return $this;
    }

    public function all()
    {
        return array_map(function ($item) {
            return (new self)->fill($item);
        }, (array) $this->db->get($this->table)->result());
    }

    public function create($data)
    {
        $filled = (new self)->fill($data);
        $data = $this->db->insert($this->table, $filled);
        $filled->id = $this->db->insert_id();
        return $filled;
    }

    public function update($data)
    {
        $this->db->where('id', $this->id);
        $this->db->update($this->table, $data);
        $this->fill($data);
        return $this;
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function paginate()
    {
        $this->load->library('pagination');
        $per_page = $this->input->get('per_page');
        $show = 10;
        $offset = $per_page ? ($show * $per_page) - $show : 0;
        $users = $this->limit($show, $offset)->get();
        $this->pagination->initialize($this->pagination->getBootstrapConfig($show, $this->count()));
        $this->links = $this->pagination->create_links();
        return $users;
    }

    public function where_not_null($column)
    {
        $this->db->where("{$column} IS NOT NULL");
        return $this;
    }

    public function where_null($column)
    {
        $this->db->where("{$column} IS NULL");
        return $this;
    }

    public function sum($column)
    {
        $this->db->select_sum($column);
        return $this;
    }
}
