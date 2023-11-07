<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tujuan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('tujuan');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		if($id !=null) {
			$this->db->where('tujuan.tujuan_id', $id);
		}
		$this->db->order_by('tujuan_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($tujuan_id)
	{
		$this->db->select('*');
		$this->db->from('tujuan');
		$this->db->where('tujuan_id', $tujuan_id);
		$this->db->order_by('tujuan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('tujuan', $data);
	}

	public function edit($data)
	{
		$this->db->where('tujuan_id', $data['tujuan_id']);
		$this->db->update('tujuan', $data);
	}

	public function del_tujuan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tujuan');
    }

    public function getindikatortujuan($id = null)
	{
		$this->db->select('*');
		$this->db->from('indikator_tujuan');
		$this->db->join('tujuan', 'indikator_tujuan.tujuan_id = tujuan.tujuan_id', 'left');
		if($id !=null) {
			$this->db->where('indikator_tujuan_id', $id);
		}
		$this->db->order_by('indikator_tujuan_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_indikator_tujuan($indikator_tujuan_id)
	{
		$this->db->select('*');
		$this->db->from('indikator_tujuan');
		$this->db->where('indikator_tujuan_id', $indikator_tujuan_id);
		$this->db->order_by('indikator_tujuan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function indikator_tujuan_add($data)
	{
		$this->db->insert('indikator_tujuan', $data);
	}

	public function indikator_tujuan_edit($data)
	{
		$this->db->where('indikator_tujuan_id', $data['indikator_tujuan_id']);
		$this->db->update('indikator_tujuan', $data);
	}

	public function del_indikator_tujuan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('indikator_tujuan');
    }

    public function indikator_tujuan_realisasi($data)
	{
		$this->db->where('indikator_tujuan_id', $data['indikator_tujuan_id']);
		$this->db->update('indikator_tujuan', $data);
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */