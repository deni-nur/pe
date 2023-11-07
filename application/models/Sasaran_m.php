<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sasaran_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('sasaran');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		if($id !=null) {
			$this->db->where('sasaran.sasaran_id', $id);
		}
		$this->db->order_by('sasaran_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($sasaran_id)
	{
		$this->db->select('*');
		$this->db->from('sasaran');
		$this->db->where('sasaran_id', $sasaran_id);
		$this->db->order_by('sasaran_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('sasaran', $data);
	}

	public function edit($data)
	{
		$this->db->where('sasaran_id', $data['sasaran_id']);
		$this->db->update('sasaran', $data);
	}

	public function del_sasaran($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('sasaran');
    }

    public function getindikatorsasaran($id = null)
	{
		$this->db->select('*');
		$this->db->from('indikator_sasaran');
		$this->db->join('sasaran', 'indikator_sasaran.sasaran_id = sasaran.sasaran_id', 'left');
		if($id !=null) {
			$this->db->where('indikator_sasaran_id', $id);
		}
		$this->db->order_by('indikator_sasaran_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_indikator_sasaran($indikator_sasaran_id)
	{
		$this->db->select('*');
		$this->db->from('indikator_sasaran');
		$this->db->where('indikator_sasaran_id', $indikator_sasaran_id);
		$this->db->order_by('indikator_sasaran_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function indikator_sasaran_add($data)
	{
		$this->db->insert('indikator_sasaran', $data);
	}

	public function indikator_sasaran_edit($data)
	{
		$this->db->where('indikator_sasaran_id', $data['indikator_sasaran_id']);
		$this->db->update('indikator_sasaran', $data);
	}

	public function del_indikator_sasaran($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('indikator_sasaran');
    }

    public function indikator_sasaran_realisasi($data)
	{
		$this->db->where('indikator_sasaran_id', $data['indikator_sasaran_id']);
		$this->db->update('indikator_sasaran', $data);
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */