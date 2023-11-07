<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_kegiatan_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('ik_kegiatan');
		if($id !=null) {
			$this->db->where('kegiatan_id', $id);
		}
		$this->db->order_by('kegiatan_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_join($kegiatan_id=null)
	{
		$this->db->select('ik_kegiatan.*,kegiatan.indikator_kegiatan');
		$this->db->from('ik_kegiatan');
		$this->db->join('kegiatan', 'ik_kegiatan.kegiatan_id = kegiatan.kegiatan_id', 'left');
		if($kegiatan_id !=null) {
			$this->db->where('kegiatan_id', $kegiatan_id);
		}
		$this->db->order_by('kegiatan_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($ik_kegiatan_id)
	{
		$this->db->select('*');
		$this->db->from('ik_kegiatan');
		$this->db->where('ik_kegiatan_id', $ik_kegiatan_id);
		$this->db->order_by('ik_kegiatan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_kegiatan', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_kegiatan_id', $data['ik_kegiatan_id']);
		$this->db->update('ik_kegiatan', $data);
	}

	public function del_ik_kegiatan($data)
	{
		$this->db->where('ik_kegiatan_id', $data['ik_kegiatan_id']);
		$this->db->delete('ik_kegiatan', $data);
	}

}

/* End of file Ik_kegiatan_m.php */
/* Location: ./application/models/Ik_kegiatan_m.php */