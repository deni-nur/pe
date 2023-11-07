<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sasaran_rpjmd_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('sasaran_rpjmd');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($sasaran_rpjmd_id)
	{
		$this->db->select('*');
		$this->db->from('sasaran_rpjmd');
		$this->db->where('sasaran_rpjmd_id', $sasaran_rpjmd_id);
		$this->db->order_by('sasaran_rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('sasaran_rpjmd', $data);
	}

	public function edit($data)
	{
		$this->db->where('sasaran_rpjmd_id', $data['sasaran_rpjmd_id']);
		$this->db->update('sasaran_rpjmd', $data);
	}

	public function del($params = null)
    {
        if($params != null) {
        $this->db->where($params);
        }
       	$this->db->delete('sasaran_rpjmd');
    }

    public function getindikatorsasaranrpjmd($id = null)
	{
		$this->db->select('*');
		$this->db->from('indikator_sasaran_rpjmd');
		$this->db->join('sasaran_rpjmd', 'indikator_sasaran_rpjmd.sasaran_rpjmd_id = sasaran_rpjmd.sasaran_rpjmd_id', 'left');
		if($id !=null) {
			$this->db->where('indikator_sasaran_rpjmd_id', $id);
		}
		$this->db->order_by('indikator_sasaran_rpjmd_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_indikator_sasaran_rpjmd($indikator_sasaran_rpjmd_id)
	{
		$this->db->select('*');
		$this->db->from('indikator_sasaran_rpjmd');
		$this->db->where('indikator_sasaran_rpjmd_id', $indikator_sasaran_rpjmd_id);
		$this->db->order_by('indikator_sasaran_rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function indikator_sasaran_rpjmd_add($data)
	{
		$this->db->insert('indikator_sasaran_rpjmd', $data);
	}

	public function indikator_sasaran_rpjmd_edit($data)
	{
		$this->db->where('indikator_sasaran_rpjmd_id', $data['indikator_sasaran_rpjmd_id']);
		$this->db->update('indikator_sasaran_rpjmd', $data);
	}

	public function del_indikator_sasaran_rpjmd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('indikator_sasaran_rpjmd');
    }

    public function indikator_sasaran_rpjmd_realisasi($data)
	{
		$this->db->where('indikator_sasaran_rpjmd_id', $data['indikator_sasaran_rpjmd_id']);
		$this->db->update('indikator_sasaran_rpjmd', $data);
	}
}