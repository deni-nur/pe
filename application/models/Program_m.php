<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('program.*, program.kode_program, bidang_urusan.kode, urusan.kode as kode_urusan, sasaran.uraian_sasaran, bidang_urusan.uraian_bidang_urusan');
		$this->db->from('program');
		$this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		if($id !=null) {
			$this->db->where('program.program_id', $id);
		}
		$this->db->order_by('program_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($program_id)
	{
		$this->db->select('*');
		$this->db->from('program');
		$this->db->where('program_id', $program_id);
		$this->db->order_by('program_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('program', $data);
	}

	public function edit($data)
	{
		$this->db->where('program_id', $data['program_id']);
		$this->db->update('program', $data);
	}

	public function del_program($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('program');
    }

    public function getindikatorprogram($id = null)
	{
		$this->db->select('indikator_program.*, program.nama_program');
		$this->db->from('indikator_program');
		$this->db->join('program', 'indikator_program.program_id = program.program_id', 'left');
		if($id !=null) {
			$this->db->where('indikator_program_id', $id);
		}
		$this->db->order_by('indikator_program_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_indikator_program($indikator_program_id)
	{
		$this->db->select('*');
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$this->db->order_by('indikator_program_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function indikator_program_add($data)
	{
		$this->db->insert('indikator_program', $data);
	}

	public function indikator_program_edit($data)
	{
		$this->db->where('indikator_program_id', $data['indikator_program_id']);
		$this->db->update('indikator_program', $data);
	}

	public function del_indikator_program($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('indikator_program');
    }

    public function indikator_program_realisasi($data)
	{
		$this->db->where('indikator_program_id', $data['indikator_program_id']);
		$this->db->update('indikator_program', $data);
	}
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */