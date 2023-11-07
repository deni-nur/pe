<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('pegawai.*, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('pegawai');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id','LEFT');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id','LEFT');
		if($id !=null) {
			$this->db->where('pegawai.portal_id', $id);
		}
		$this->db->order_by('pegawai.portal_id', 'asc');
		$query = $this->db->get();
		return $query;
    }

    public function detail($pegawai_id)
	{
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('pegawai_id', $pegawai_id);
		$this->db->order_by('pegawai_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pegawai', $data);
	}

	public function edit($data)
	{
		$this->db->where('pegawai_id', $data['pegawai_id']);
		$this->db->update('pegawai', $data);
	}

	public function del_pegawai($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pegawai');
    }

	function check_nip($nip, $id = null)
	{
		$this->db->from('pegawai');
		$this->db->where('nip', $nip);
		if($id != null) {
			$this->db->where('pegawai_id !=', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}