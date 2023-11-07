<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dd_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('dd.*, golongan.gol, kecamatan.name');
		$this->db->from('dd');
		$this->db->join('golongan', 'dd.golongan_id = golongan.golongan_id','LEFT');
		$this->db->join('kecamatan', 'dd.kecamatan_id = kecamatan.kecamatan_id', 'left');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($dd_id)
	{
		$this->db->select('*');
		$this->db->from('dd');
		$this->db->where('dd_id', $dd_id);
		$this->db->order_by('dd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('dd', $data);
	}

	public function edit($data)
	{
		$this->db->where('dd_id', $data['dd_id']);
		$this->db->update('dd', $data);
	}

	public function del_dd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('dd');
    }
}