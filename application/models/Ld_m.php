<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ld_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('ld.*, golongan.gol, provinsi.name');
		$this->db->from('ld');
		$this->db->join('golongan', 'ld.golongan_id = golongan.golongan_id','LEFT');
		$this->db->join('provinsi', 'ld.provinsi_id = provinsi.provinsi_id', 'left');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($ld_id)
	{
		$this->db->select('*');
		$this->db->from('ld');
		$this->db->where('ld_id', $ld_id);
		$this->db->order_by('ld_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ld', $data);
	}

	public function edit($data)
	{
		$this->db->where('ld_id', $data['ld_id']);
		$this->db->update('ld', $data);
	}

	public function del_ld($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('ld');
    }
}