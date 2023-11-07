<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rpjmd_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('rpjmd');
		if($id !=null) {
			$this->db->where('rpjmd_id', $id);
		}
		$this->db->order_by('rpjmd_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($rpjmd_id)
	{
		$this->db->select('*');
		$this->db->from('rpjmd');
		$this->db->where('rpjmd_id', $rpjmd_id);
		$this->db->order_by('rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('rpjmd', $data);
	}

	public function edit($data)
	{
		$this->db->where('rpjmd_id', $data['rpjmd_id']);
		$this->db->update('rpjmd', $data);
	}

	public function del_rpjmd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('rpjmd');
    }
}