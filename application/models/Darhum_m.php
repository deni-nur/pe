<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Darhum_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('darhum');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($darhum_id)
	{
		$this->db->select('*');
		$this->db->from('darhum');
		$this->db->where('darhum_id', $darhum_id);
		$this->db->order_by('darhum_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('darhum', $data);
	}

	public function edit($data)
	{
		$this->db->where('darhum_id', $data['darhum_id']);
		$this->db->update('darhum', $data);
	}

	public function del_darhum($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('darhum');
    }
}