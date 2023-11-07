<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengikut_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('pengikut.*, pegawai.name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('pengikut');
		$this->db->join('pegawai', 'pegawai.pegawai_id = pengikut.pegawai_id', 'left');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id', 'left');
		if($id !=null) {
			$this->db->where('pengikut.st_id', $id);
		}
		$this->db->order_by('pengikut.st_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function get_join($st_id=null)
	{
		$this->db->select('pengikut.*,st.maksud, pegawai.name');
		$this->db->from('pengikut');
		$this->db->join('st', 'pengikut.st_id = st.st_id', 'left');
		$this->db->join('pegawai', 'pengikut.pegawai_id = pegawai.pegawai_id', 'left');
		if($st_id !=null) {
			$this->db->where('st_id', $st_id);
		}
		$this->db->order_by('st_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($pengikut_id)
	{
		$this->db->select('*');
		$this->db->from('pengikut');
		$this->db->where('pengikut_id', $pengikut_id);
		$this->db->order_by('pengikut_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pengikut', $data);
	}

	public function edit($data)
	{
		$this->db->where('pengikut_id', $data['pengikut_id']);
		$this->db->update('pengikut', $data);
	}

	public function del_pengikut($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pengikut');
    }

}

/* End of file Pengikut_m.php */
/* Location: ./application/models/Pengikut_m.php */