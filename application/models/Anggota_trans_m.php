<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_trans_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('anggota_trans');
		if($id !=null) {
			$this->db->where('anggota_trans.pnp_trans_id', $id);
		}
		$this->db->order_by('anggota_trans.pnp_trans_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function get_join($pnp_trans_id=null)
	{
		$this->db->select('anggota_trans.*, pnp_trans.nama_kk');
		$this->db->from('anggota_trans');
		$this->db->join('pnp_trans', 'anggota_trans.pnp_trans_id = pnp_trans.pnp_trans_id', 'left');
		if($pnp_trans_id !=null) {
			$this->db->where('pnp_trans_id', $pnp_trans_id);
		}
		$this->db->order_by('pnp_trans_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($anggota_trans_id)
	{
		$this->db->select('*');
		$this->db->from('anggota_trans');
		$this->db->where('anggota_trans_id', $anggota_trans_id);
		$this->db->order_by('anggota_trans_id', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('anggota_trans', $data);
	}

	public function edit($data)
	{
		$this->db->where('anggota_trans_id', $data['anggota_trans_id']);
		$this->db->update('anggota_trans', $data);
	}

	public function del_anggota_trans($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('anggota_trans');
    }

}

/* End of file Anggota_trans_m.php */
/* Location: ./application/models/Anggota_trans_m.php */