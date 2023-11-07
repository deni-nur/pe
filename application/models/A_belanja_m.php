<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_belanja_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('a_belanja');
		if($id !=null) {
			$this->db->where('a_belanja_id', $id);
		}
		$this->db->order_by('a_belanja_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($a_belanja_id)
	{
		$this->db->select('*');
		$this->db->from('a_belanja');
		$this->db->where('a_belanja_id', $a_belanja_id);
		$this->db->order_by('a_belanja_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('a_belanja', $data);
	}

	public function edit($data)
	{
		$this->db->where('a_belanja_id', $data['a_belanja_id']);
		$this->db->update('a_belanja', $data);
	}

	public function del_a_belanja($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('a_belanja');
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */