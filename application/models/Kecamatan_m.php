<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('kecamatan.*, kabupaten.name as nama_kabupaten ');
		$this->db->from('kecamatan');
		$this->db->join('kabupaten', 'kecamatan.kabupaten_id = kabupaten.kabupaten_id','LEFT');
		if($id !=null) {
			$this->db->where('kecamatan_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function detail($kecamatan_id)
	{
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->where('kecamatan_id', $kecamatan_id);
		$this->db->order_by('kecamatan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('kecamatan', $data);
	}

	public function edit($data)
	{
		$this->db->where('kecamatan_id', $data['kecamatan_id']);
		$this->db->update('kecamatan', $data);
	}

	public function del_kecamatan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('kecamatan');
    }
}