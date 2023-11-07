<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_sasaran_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('ik_sasaran');
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
		$this->db->from('ik_sasaran_realisasi');
		if($id !=null) {
			$this->db->where('ik_sasaran_id', $id);
		}
		$this->db->order_by('ik_sasaran_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_join($rpjmd_id=null)
	{
		$this->db->select('ik_sasaran.*,rpjmd.indikator_sasaran');
		$this->db->from('ik_sasaran');
		$this->db->join('rpjmd', 'ik_sasaran.rpjmd_id = rpjmd.rpjmd_id', 'left');
		if($rpjmd_id !=null) {
			$this->db->where('rpjmd_id', $rpjmd_id);
		}
		$this->db->order_by('rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($ik_sasaran_id)
	{
		$this->db->select('*');
		$this->db->from('ik_sasaran');
		$this->db->where('ik_sasaran_id', $ik_sasaran_id);
		$this->db->order_by('ik_sasaran_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_realisasi($ik_sasaran_id)
	{
		$this->db->select('*');
		$this->db->from('ik_sasaran_realisasi');
		$this->db->where('ik_sasaran_id', $ik_sasaran_id);
		$this->db->order_by('ik_sasaran_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_sasaran', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_sasaran_id', $data['ik_sasaran_id']);
		$this->db->update('ik_sasaran', $data);
	}

	public function del($data)
	{
		$this->db->where('ik_sasaran_id', $data['ik_sasaran_id']);
		$this->db->delete('ik_sasaran', $data);
	}

	public function realisasi($data)
	{
		$this->db->where('ik_sasaran_id', $data['ik_sasaran_id']);
		$this->db->update('ik_sasaran_realisasi', $data);
	}

}

/* End of file Ik_sasaran_m.php */
/* Location: ./application/models/Ik_sasaran_m.php */