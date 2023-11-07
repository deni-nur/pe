<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Urusan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('urusan');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($urusan_id)
	{
		$this->db->select('*');
		$this->db->from('urusan');
		$this->db->where('urusan_id', $urusan_id);
		$this->db->order_by('urusan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('urusan', $data);
	}

	public function edit($data)
	{
		$this->db->where('urusan_id', $data['urusan_id']);
		$this->db->update('urusan', $data);
	}

	public function del($params = null)
    {
        if($params != null) {
        $this->db->where($params);
        }
       	$this->db->delete('urusan');
    }
}