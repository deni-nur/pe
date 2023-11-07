<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_subkeg_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('ik_subkeg');
		if($id !=null) {
			$this->db->where('subkeg_id', $id);
		}
		$this->db->order_by('subkeg_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_join($subkeg_id=null)
	{
		$this->db->select('ik_subkeg.*,subkeg.indikator_subkeg');
		$this->db->from('ik_subkeg');
		$this->db->join('subkeg', 'ik_subkeg.subkeg_id = subkeg.subkeg_id', 'left');
		if($subkeg_id !=null) {
			$this->db->where('subkeg_id', $subkeg_id);
		}
		$this->db->order_by('subkeg_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($ik_subkeg_id)
	{
		$this->db->select('*');
		$this->db->from('ik_subkeg');
		$this->db->where('ik_subkeg_id', $ik_subkeg_id);
		$this->db->order_by('ik_subkeg_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_subkeg', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_subkeg_id', $data['ik_subkeg_id']);
		$this->db->update('ik_subkeg', $data);
	}

	public function del_ik_subkeg($data)
	{
		$this->db->where('ik_subkeg_id', $data['ik_subkeg_id']);
		$this->db->delete('ik_subkeg', $data);
	}

}

/* End of file Ik_subkeg_m.php */
/* Location: ./application/models/Ik_subkeg_m.php */