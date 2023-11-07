<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lhpd_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('lhpd.*, st.maksud');
		$this->db->from('lhpd');
		$this->db->join('st', 'lhpd.st_id = st.st_id', 'left');
		if($id !=null) {
			$this->db->where('lhpd.portal_id', $id);
		}
		$this->db->order_by('lhpd.lhpd_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($lhpd_id)
	{
		$this->db->select('lhpd.*, st.maksud');
		$this->db->from('lhpd');
		$this->db->join('st', 'lhpd.st_id = st.st_id', 'left');
		$this->db->where('lhpd_id', $lhpd_id);
		$this->db->order_by('lhpd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('lhpd', $data);
	}

	public function edit($data)
	{
		$this->db->where('lhpd_id', $data['lhpd_id']);
		$this->db->update('lhpd', $data);
	}

	public function del_lhpd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('lhpd');
    }

	public function cetak($cetak)
	{
		$this->db->select('lhpd.*, st.no_st, st.bln_surat, st.maksud, st.alamat, portal.tahun_perencanaan, pegawai.name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('lhpd');
		$this->db->join('st', 'lhpd.st_id = st.st_id', 'left');
		$this->db->join('portal', 'lhpd.portal_id = portal.portal_id', 'left');
		$this->db->join('ttd', 'lhpd.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		$this->db->where('lhpd.st_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

	public function cetak_baru($cetak)
	{
		$this->db->select('lhpd.*, st.no_st, st.bln_surat, st.maksud, st.alamat, pegawai.name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('lhpd');
		$this->db->join('st', 'lhpd.st_id = st.st_id', 'left');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		$this->db->where('lhpd.lhpd_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_ttd($id = null)
    {
        $this->db->select('lhpd.*, pegawai.name as ttd_name, pegawai.nip as ttd_nip, pangkat.pangkat, golongan.gol, ttd.jabatan_ttd');
		$this->db->from('lhpd');
		$this->db->join('ttd', 'lhpd.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'ttd.pegawai_id = pegawai.pegawai_id');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id');
		if($id !=null) {
			$this->db->where('lhpd.st_id', $id);
		}
		$this->db->order_by('lhpd.st_id');
		$query = $this->db->get();
		return $query->row();
    }

    public function get_pengikut($id = null)
    {
        $this->db->select('pengikut.*, pegawai.name as pengikut_name, pegawai.nip as pengikut_nip  ');
		$this->db->from('pengikut');
		$this->db->join('pegawai', 'pengikut.pegawai_id = pegawai.pegawai_id', 'left');
		if($id !=null) {
			$this->db->where('pengikut.st_id', $id);
		}
		$this->db->order_by('pengikut.st_id');
		$query = $this->db->get();
		return $query->result();
    }

    public function getgambar($lhpd_id)
	{
		$this->db->select('*');
		$this->db->from('gambar_lhpd');
		$this->db->where('lhpd_id', $lhpd_id);
		$this->db->order_by('gambar_lhpd_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

    public function detail_gambar($gambar_lhpd_id)
    {
        $this->db->select('*');
        $this->db->from('gambar_lhpd');
        $this->db->where('gambar_lhpd_id', $gambar_lhpd_id);
        $this->db->order_by('gambar_lhpd_id', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function gambar_add($data)
    {
        $this->db->insert('gambar_lhpd', $data);
    }

    public function gambar_edit($data)
    {
        $this->db->where('gambar_lhpd_id', $data['gambar_lhpd_id']);
        $this->db->update('gambar_lhpd', $data);
    }

    public function del_gambar($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('gambar_lhpd');
    }
}

/* End of file Lhpd_m.php */
/* Location: ./application/models/Lhpd_m.php */