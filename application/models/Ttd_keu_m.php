<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd_keu_m extends CI_Model {

	public function listing()
	{
		$this->db->select('ttd_keu.*, pegawai.name, pegawai.nip, golongan.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('ttd_keu');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->order_by('ttd_keu', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get($id = null)
    {
        $this->db->select('ttd_keu.*, pegawai.name as ttd_keu_name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('ttd_keu');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		if($id !=null) {
			$this->db->where('ttd_keu.portal_id', $id);
		}
		$this->db->order_by('ttd_keu.portal_id');
		$query = $this->db->get();
		return $query;
    }

    public function detail($ttd_keu_id)
	{
		$this->db->select('*');
		$this->db->from('ttd_keu');
		$this->db->where('ttd_keu_id', $ttd_keu_id);
		$this->db->order_by('ttd_keu_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ttd_keu', $data);
	}

	public function edit($data)
	{
		$this->db->where('ttd_keu_id', $data['ttd_keu_id']);
		$this->db->update('ttd_keu', $data);
	}

	public function del_ttd_keu($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('ttd_keu');
    }
}