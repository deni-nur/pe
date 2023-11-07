<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_tujuan_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('ik_tujuan');
		if($id !=null) {
			$this->db->where('rpjmd_id', $id);
		}
		$this->db->order_by('rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_realisasi($id=null)
	{
		$this->db->select('*');
		$this->db->from('ik_tujuan_realisasi');
		if($id !=null) {
			$this->db->where('ik_tujuan_id', $id);
		}
		$this->db->order_by('ik_tujuan_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($ik_tujuan_id)
	{
		$this->db->select('*');
		$this->db->from('ik_tujuan');
		$this->db->where('ik_tujuan_id', $ik_tujuan_id);
		$this->db->order_by('ik_tujuan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_realisasi($ik_tujuan_id)
	{
		$this->db->select('*');
		$this->db->from('ik_tujuan_realisasi');
		$this->db->where('ik_tujuan_id', $ik_tujuan_id);
		$this->db->order_by('ik_tujuan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_tujuan', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_tujuan_id', $data['ik_tujuan_id']);
		$this->db->update('ik_tujuan', $data);
	}

	public function del($data)
	{
		$this->db->where('ik_tujuan_id', $data['ik_tujuan_id']);
		$this->db->delete('ik_tujuan', $data);
	}

	public function realisasi($data)
	{
		$this->db->where('ik_tujuan_id', $data['ik_tujuan_id']);
		$this->db->update('ik_tujuan_realisasi', $data);
	}

}

/* End of file Ik_tujuan_m.php */
/* Location: ./application/models/Ik_tujuan_m.php */