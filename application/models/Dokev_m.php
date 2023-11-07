<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokev_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('dokev');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($dokev_id)
	{
		$this->db->select('*');
		$this->db->from('dokev');
		$this->db->where('dokev_id', $dokev_id);
		$this->db->order_by('dokev_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('dokev', $data);
	}

	public function edit($data)
	{
		$this->db->where('dokev_id', $data['dokev_id']);
		$this->db->update('dokev', $data);
	}

	public function del_dokev($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('dokev');
    }
}