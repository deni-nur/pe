<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksana_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('pelaksana.*, pegawai.name, pegawai.nip, golongan.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('pelaksana');
		$this->db->join('pegawai', 'pegawai.pegawai_id = pelaksana.pegawai_id', 'left');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id', 'left');
		if($id !=null) {
			$this->db->where('st_id', $id);
		}
		$this->db->order_by('st_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_join($st_id=null)
	{
		$this->db->select('pelaksana.*,st.maksud, pegawai.name');
		$this->db->from('pelaksana');
		$this->db->join('st', 'pelaksana.st_id = st.st_id', 'left');
		$this->db->join('pegawai', 'pelaksana.pegawai_id = pegawai.pegawai_id', 'left');
		if($st_id !=null) {
			$this->db->where('st_id', $st_id);
		}
		$this->db->order_by('st_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($pelaksana_id)
	{
		$this->db->select('*');
		$this->db->from('pelaksana');
		$this->db->where('pelaksana_id', $pelaksana_id);
		$this->db->order_by('pelaksana_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pelaksana', $data);
	}

	public function edit($data)
	{
		$this->db->where('pelaksana_id', $data['pelaksana_id']);
		$this->db->update('pelaksana', $data);
	}

	public function del($data)
	{
		$this->db->where('pelaksana_id', $data['pelaksana_id']);
		$this->db->delete('pelaksana', $data);
	}	

}

/* End of file Pelaksana_m.php */
/* Location: ./application/models/Pelaksana_m.php */