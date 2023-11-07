<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluaran_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('keluaran');
		if($id !=null) {
			$this->db->where('renja_id', $id);
		}
		$this->db->order_by('renja_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($keluaran_id)
	{
		$this->db->select('*');
		$this->db->from('keluaran');
		$this->db->where('keluaran_id', $keluaran_id);
		$this->db->order_by('keluaran_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('keluaran', $data);
	}

	public function edit($data)
	{
		$this->db->where('keluaran_id', $data['keluaran_id']);
		$this->db->update('keluaran', $data);
	}

	public function del($data)
	{
		$this->db->where('keluaran_id', $data['keluaran_id']);
		$this->db->delete('keluaran', $data);
	}

}

/* End of file Keluaran_m.php */
/* Location: ./application/models/Keluaran_m.php */