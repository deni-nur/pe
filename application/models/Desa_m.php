<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Desa_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('desa.*, kecamatan.name as nama_kecamatan');
		$this->db->from('desa');
		$this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id','LEFT');
		if($id !=null) {
			$this->db->where('desa_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function detail($desa_id)
	{
		$this->db->select('*');
		$this->db->from('desa');
		$this->db->where('desa_id', $desa_id);
		$this->db->order_by('desa_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('desa', $data);
	}

	public function edit($data)
	{
		$this->db->where('desa_id', $data['desa_id']);
		$this->db->update('desa', $data);
	}

	public function del_desa($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('desa');
    }
}