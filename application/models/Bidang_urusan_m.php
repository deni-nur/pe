<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_urusan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('bidang_urusan.*, urusan.kode as kode_urusan, urusan.uraian');
		$this->db->from('bidang_urusan');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		if($id !=null) {
			$this->db->where('bidang_urusan.bidang_urusan_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($bidang_urusan_id)
	{
		$this->db->select('*');
		$this->db->from('bidang_urusan');
		$this->db->where('bidang_urusan_id', $bidang_urusan_id);
		$this->db->order_by('bidang_urusan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('bidang_urusan', $data);
	}

	public function edit($data)
	{
		$this->db->where('bidang_urusan_id', $data['bidang_urusan_id']);
		$this->db->update('bidang_urusan', $data);
	}

	public function del($params = null)
    {
        if($params != null) {
        $this->db->where($params);
        }
       	$this->db->delete('bidang_urusan');
    }
}