<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('pangkat');
		if($id !=null) {
			$this->db->where('pangkat_id', $id);
		}
		$this->db->order_by('pangkat_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($pangkat_id)
	{
		$this->db->select('*');
		$this->db->from('pangkat');
		$this->db->where('pangkat_id', $pangkat_id);
		$this->db->order_by('pangkat_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pangkat', $data);
	}

	public function edit($data)
	{
		$this->db->where('pangkat_id', $data['pangkat_id']);
		$this->db->update('pangkat', $data);
	}

	public function del_pangkat($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pangkat');
    }
}