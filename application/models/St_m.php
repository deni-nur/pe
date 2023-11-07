<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class St_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('st.*, pegawai.name');
		$this->db->from('st');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		if($id !=null) {
			$this->db->where('st.portal_id', $id);
		}
		$this->db->order_by('st.st_id', 'desc');
		$query = $this->db->get();
		return $query;
    }

    // Detail st
	public function detail($st_id)
	{
		$this->db->select('*');
		$this->db->from('st');
		$this->db->where('st_id', $st_id);
		$this->db->order_by('st_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('st', $data);
	}

	public function edit($data)
	{
		$this->db->where('st_id', $data['st_id']);
		$this->db->update('st', $data);
	}

	public function del_st($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('st');
    }

	public function get_ttd($id = null)
    {
        $this->db->select('st.*, pegawai.name as ttd_name, pegawai.nip as ttd_nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_ttd_name, ttd.jabatan_ttd, ttd.foto');
		$this->db->from('st');
		$this->db->join('ttd', 'st.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'ttd.pegawai_id = pegawai.pegawai_id');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id');
		if($id !=null) {
			$this->db->where('st_id', $id);
		}
		$this->db->order_by('st_id');
		$query = $this->db->get();
		return $query->row();
    }

	public function cetak($cetak)
	{
		$this->db->select('st.*, pegawai.name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, portal.tahun_perencanaan');
		$this->db->from('st');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		$this->db->join('portal', 'st.portal_id = portal.portal_id', 'left');
		$this->db->where('st_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file St_m.php */
/* Location: ./application/models/St_m.php */