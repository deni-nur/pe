<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('kabupaten.*, provinsi.name as nama_provinsi');
		$this->db->from('kabupaten');
		$this->db->join('provinsi', 'kabupaten.provinsi_id = provinsi.provinsi_id','LEFT');
		if($id !=null) {
			$this->db->where('kabupaten_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function detail($kabupaten_id)
	{
		$this->db->select('*');
		$this->db->from('kabupaten');
		$this->db->where('kabupaten_id', $kabupaten_id);
		$this->db->order_by('kabupaten_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('kabupaten', $data);
	}

	public function edit($data)
	{
		$this->db->where('kabupaten_id', $data['kabupaten_id']);
		$this->db->update('kabupaten', $data);
	}

	public function del_kabupaten($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('kabupaten');
    }
}