<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('golongan');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		if($id !=null) {
			$this->db->where('golongan_id', $id);
		}
		$this->db->order_by('golongan_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($golongan_id)
	{
		$this->db->select('*');
		$this->db->from('golongan');
		$this->db->where('golongan_id', $golongan_id);
		$this->db->order_by('golongan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('golongan', $data);
	}

	public function edit($data)
	{
		$this->db->where('golongan_id', $data['golongan_id']);
		$this->db->update('golongan', $data);
	}

	public function del_golongan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('golongan');
    }
}