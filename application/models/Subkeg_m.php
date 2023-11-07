<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkeg_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('subkeg.*, kegiatan.nama_kegiatan, kegiatan.kode_kegiatan');
		$this->db->from('subkeg');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		if($id !=null) {
			$this->db->where('subkeg.subkeg_id', $id);
		}
		$this->db->order_by('subkeg_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function getjoin($id = null)
	{
		$this->db->select('subkeg.*, kegiatan.nama_kegiatan, kegiatan.kode_kegiatan, program.kode_program, bidang_urusan.kode, urusan.kode as kode_urusan, indikator_subkeg.uraian_indikator_subkeg, indikator_subkeg.satuan, indikator_subkeg.awal, indikator_subkeg.satu, indikator_subkeg.dua, indikator_subkeg.tiga, indikator_subkeg.empat, indikator_subkeg.lima');
		$this->db->from('subkeg');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		$this->db->join('indikator_subkeg', 'indikator_subkeg.subkeg_id = subkeg.subkeg_id');
		if($id !=null) {
			$this->db->where('subkeg_id', $id);
		}
		$this->db->order_by('subkeg.kegiatan_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($subkeg_id)
	{
		$this->db->select('*');
		$this->db->from('subkeg');
		$this->db->where('subkeg_id', $subkeg_id);
		$this->db->order_by('subkeg_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('subkeg', $data);
	}

	public function edit($data)
	{
		$this->db->where('subkeg_id', $data['subkeg_id']);
		$this->db->update('subkeg', $data);
	}

	public function del_subkeg($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('subkeg');
    }

    public function getindikatorsubkeg($id = null)
	{
		$this->db->select('indikator_subkeg.*, subkeg.nama_subkeg');
		$this->db->from('indikator_subkeg');
		$this->db->join('subkeg', 'indikator_subkeg.subkeg_id = subkeg.subkeg_id', 'left');
		if($id !=null) {
			$this->db->where('indikator_subkeg_id', $id);
		}
		$this->db->order_by('indikator_subkeg_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_indikator_subkeg($indikator_subkeg_id)
	{
		$this->db->select('*');
		$this->db->from('indikator_subkeg');
		$this->db->where('indikator_subkeg_id', $indikator_subkeg_id);
		$this->db->order_by('indikator_subkeg_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function indikator_subkeg_add($data)
	{
		$this->db->insert('indikator_subkeg', $data);
	}

	public function indikator_subkeg_edit($data)
	{
		$this->db->where('indikator_subkeg_id', $data['indikator_subkeg_id']);
		$this->db->update('indikator_subkeg', $data);
	}

	public function del_indikator_subkeg($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('indikator_subkeg');
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */