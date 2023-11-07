<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Translok_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('translok.*, desa.name as nama_desa, kecamatan.name as nama_kecamatan');
		$this->db->from('translok');
		$this->db->join('desa', 'translok.desa_id = desa.desa_id','LEFT');
		$this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
		if($id !=null) {
			$this->db->where('translok.portal_id', $id);
		}
		$this->db->order_by('translok.portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function get_join($id=null)
	{
		$this->db->select('translok.*, desa.nama_desa, kecamatan.name as nama_kecamatan');
		$this->db->from('translok');
		$this->db->join('desa', 'translok.desa_id = desa.desa_id','LEFT');
		$this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
		if($id !=null) {
			$this->db->where('desa_id', $id);
		}
		$this->db->order_by('desa_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing()
	{
		$this->db->select('translok.*, desa.nama_desa, kecamatan.name as nama_kecamatan');
		$this->db->from('translok');
		$this->db->join('desa', 'translok.desa_id = desa.desa_id','LEFT');
		$this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
		$this->db->order_by('translok_id','asc');
		$query=$this->db->get();
		return $query->result();
	}

	public function detail($translok_id)
	{
		$this->db->select('*');
		$this->db->from('translok');
		$this->db->where('translok_id', $translok_id);
		$this->db->order_by('translok_id', 'asc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('translok', $data);
	}

	public function edit($data)
	{
		$this->db->where('translok_id', $data['translok_id']);
		$this->db->update('translok', $data);
	}

	public function del_translok($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('translok');
    }
}