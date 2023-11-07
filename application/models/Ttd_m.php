<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd_m extends CI_Model {

	public function listing()
	{
		$this->db->select('ttd.*, pegawai.pegawai_id, pegawai.name, pegawai.nip, golongan.golongan_id, golongan.pangkat, golongan.gol, jabatan.jabatan_id, jabatan.name as jabatan_name');
		$this->db->from('ttd');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->order_by('ttd', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get($id = null)
    {
        $this->db->select('ttd.*, pegawai.name as ttd_name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.jabatan_id, jabatan.name as jabatan_name');
		$this->db->from('ttd');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		if($id !=null) {
			$this->db->where('ttd.portal_id', $id);
		}
		$this->db->order_by('ttd.portal_id');
		$query = $this->db->get();
		return $query;
    }

    public function detail($ttd_id)
	{
		$this->db->select('*');
		$this->db->from('ttd');
		$this->db->where('ttd_id', $ttd_id);
		$this->db->order_by('ttd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ttd', $data);
	}

	public function edit($data)
	{
		$this->db->where('ttd_id', $data['ttd_id']);
		$this->db->update('ttd', $data);
	}

	public function del_ttd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('ttd');
    }
}