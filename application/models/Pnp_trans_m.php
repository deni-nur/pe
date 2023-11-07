<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pnp_trans_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('*');
		$this->db->from('pnp_trans');
		if($id !=null) {
			$this->db->where('pnp_trans.portal_id', $id);
		}
		$this->db->order_by('pnp_trans.pnp_trans_id', 'asc');
		$query = $this->db->get();
		return $query;
    }

    // Detail pnp_trans
	public function detail($pnp_trans_id)
	{
		$this->db->select('*');
		$this->db->from('pnp_trans');
		$this->db->where('pnp_trans_id', $pnp_trans_id);
		$this->db->order_by('pnp_trans_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pnp_trans', $data);
	}

	public function edit($data)
	{
		$this->db->where('pnp_trans_id', $data['pnp_trans_id']);
		$this->db->update('pnp_trans', $data);
	}

	public function del_pnp_trans($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pnp_trans');
    }

	public function get_ttd($id = null)
    {
        $this->db->select('pnp_trans.*, pegawai.name as ttd_name, pegawai.nip as ttd_nip, pangkat.pangkat, golongan.gol, ttd.jabatan_ttd');
		$this->db->from('pnp_trans');
		$this->db->join('ttd', 'pnp_trans.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'ttd.pegawai_id = pegawai.pegawai_id');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id');
		if($id !=null) {
			$this->db->where('pnp_trans_id', $id);
		}
		$this->db->order_by('pnp_trans_id');
		$query = $this->db->get();
		return $query->row();
    }

	public function cetak($cetak)
	{
		$this->db->select('pnp_trans.*, pegawai.name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, portal.tahun_perencanaan');
		$this->db->from('pnp_trans');
		$this->db->join('pegawai', 'pnp_trans.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		$this->db->join('portal', 'pnp_trans.portal_id = portal.portal_id', 'left');
		$this->db->where('pnp_trans_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Pnp_trans.php */
/* Location: ./application/models/Pnp_trans.php */