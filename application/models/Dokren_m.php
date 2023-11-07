<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokren_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('dokren');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($dokren_id)
	{
		$this->db->select('*');
		$this->db->from('dokren');
		$this->db->where('dokren_id', $dokren_id);
		$this->db->order_by('dokren_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('dokren', $data);
	}

	public function edit($data)
	{
		$this->db->where('dokren_id', $data['dokren_id']);
		$this->db->update('dokren', $data);
	}

	public function del_dokren($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('dokren');
    }
}