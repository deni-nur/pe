<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pk_kadis_perubahan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('pk_kadis_perubahan');
		if($id !=null) {
			$this->db->where('pk_kadis_perubahan.portal_id', $id);
		}
		$this->db->order_by('pk_kadis_perubahan.portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($pk_kadis_perubahan_id)
	{
		$this->db->select('*');
		$this->db->from('pk_kadis_perubahan');
		$this->db->where('pk_kadis_perubahan_id', $pk_kadis_perubahan_id);
		$this->db->order_by('pk_kadis_perubahan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pk_kadis_perubahan', $data);
	}

	// edit
	public function edit($data)
	{
		$this->db->where('pk_kadis_perubahan_id', $data['pk_kadis_perubahan_id']);
		$this->db->update('pk_kadis_perubahan', $data);
	}

	public function del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pk_kadis_perubahan');
    }

    public function lampiran_get($id = null)
	{
		$this->db->select('lampiran_pk_kadis_perubahan.*, sasaran.uraian_sasaran, indikator_sasaran.uraian_indikator_sasaran, indikator_sasaran.satuan');
		$this->db->from('lampiran_pk_kadis_perubahan');
		$this->db->join('pk_kadis_perubahan', 'lampiran_pk_kadis_perubahan.pk_kadis_perubahan_id=pk_kadis_perubahan.pk_kadis_perubahan_id');
		$this->db->join('sasaran', 'lampiran_pk_kadis_perubahan.sasaran_id=sasaran.sasaran_id');
		$this->db->join('indikator_sasaran', 'indikator_sasaran.sasaran_id=sasaran.sasaran_id');
		if($id !=null) {
			$this->db->where('lampiran_pk_kadis_perubahan.pk_kadis_perubahan_id', $id);
		}
		$this->db->order_by('lampiran_pk_kadis_perubahan_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function lampiran_detail($lampiran_pk_kadis_perubahan_id)
	{
		$this->db->select('lampiran_pk_kadis_perubahan.*, sasaran.uraian_sasaran, indikator_sasaran.uraian_indikator_sasaran, indikator_sasaran.satuan');
		$this->db->from('lampiran_pk_kadis_perubahan');
		$this->db->join('sasaran', 'lampiran_pk_kadis_perubahan.sasaran_id=sasaran.sasaran_id');
		$this->db->join('indikator_sasaran', 'indikator_sasaran.sasaran_id=sasaran.sasaran_id');
		$this->db->where('lampiran_pk_kadis_perubahan_id', $lampiran_pk_kadis_perubahan_id);
		$this->db->order_by('lampiran_pk_kadis_perubahan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function lampiran_add($data)
	{
		$this->db->insert('lampiran_pk_kadis_perubahan', $data);
	}

	// edit
	public function lampiran_edit($data)
	{
		$this->db->where('lampiran_pk_kadis_perubahan_id', $data['lampiran_pk_kadis_perubahan_id']);
		$this->db->update('lampiran_pk_kadis_perubahan', $data);
	}

	public function lampiran_del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('lampiran_pk_kadis_perubahan');
    }

    public function program_pk_kadis_perubahan_get($id= null)
	{
		$this->db->select('program_pk_kadis_perubahan.*, program.nama_program');
		$this->db->from('program_pk_kadis_perubahan');
		$this->db->join('program', 'program_pk_kadis_perubahan.program_id=program.program_id');
		if($id !=null) {
			$this->db->where('program_pk_kadis_perubahan.lampiran_pk_kadis_perubahan_id', $id);
		}
		$this->db->order_by('program.program_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function program_detail($program_pk_kadis_perubahan_id)
	{
		$this->db->select('program_pk_kadis_perubahan.*, program.nama_program');
		$this->db->from('program_pk_kadis_perubahan');
		$this->db->join('program', 'program_pk_kadis_perubahan.program_id=program.program_id');
		$this->db->where('program_pk_kadis_perubahan_id', $program_pk_kadis_perubahan_id);
		$this->db->order_by('program_pk_kadis_perubahan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function program_pk_kadis_perubahan_add($data)
	{
		$this->db->insert('program_pk_kadis_perubahan', $data);
	}

	// edit
	public function program_pk_kadis_perubahan_edit($data)
	{
		$this->db->where('program_pk_kadis_perubahan_id', $data['program_pk_kadis_perubahan_id']);
		$this->db->update('program_pk_kadis_perubahan', $data);
	}

	public function program_pk_kadis_perubahan_del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('program_pk_kadis_perubahan');
    }

    public function cetak($cetak)
	{
		$this->db->select('*');
		$this->db->from('pk_kadis_perubahan');
		$this->db->where('pk_kadis_perubahan_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

	public function cetak_program_pk_kadis($id= null)
	{
		$this->db->select('program_pk_kadis_perubahan.*, program.nama_program');
		$this->db->from('program_pk_kadis_perubahan');
		$this->db->join('program', 'program_pk_kadis_perubahan.program_id=program.program_id');
		if($id !=null) {
			$this->db->where('program_pk_kadis_perubahan.portal_id', $id);
		}
		$this->db->order_by('program.program_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function jumlah_pagu_anggaran($id= null)
	{
		$this->db->select('program_pk_kadis_perubahan.*, SUM(pagu_anggaran) as total_pagu_anggaran');
        $this->db->from('program_pk_kadis_perubahan');
        if($id !=null) {
            $this->db->where('portal_id', $id);
            //$this->db->group_by('program_pk_kadis_perubahan_id');
        }
        $query = $this->db->get();
        return $query;
	}
}