<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iku_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('iku.*, sasaran.uraian_sasaran, pegawai.name as ttd_name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.jabatan_id, jabatan.name as jabatan_name');
		$this->db->from('iku');
		$this->db->join('sasaran', 'iku.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('ttd', 'iku.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		if($id !=null) {
			$this->db->where('iku.iku_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function cetak($date)
	{
		$this->db->select('iku.*, sasaran.uraian_sasaran, indikator_sasaran.uraian_indikator_sasaran, indikator_sasaran.formulasi, pegawai.name as ttd_name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, ttd.jabatan_ttd');
		$this->db->from('iku');
		$this->db->join('sasaran', 'iku.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('indikator_sasaran', 'indikator_sasaran.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('ttd', 'iku.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->where_in('DATE(tanggal_iku)', $date);
		$this->db->order_by('sasaran.sasaran_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($iku_id)
	{
		$this->db->select('*');
		$this->db->from('iku');
		$this->db->where('iku_id', $iku_id);
		$this->db->order_by('iku_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('iku', $data);
	}

	public function edit($data)
	{
		$this->db->where('iku_id', $data['iku_id']);
		$this->db->update('iku', $data);
	}

	public function del_iku($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('iku');
    }
}