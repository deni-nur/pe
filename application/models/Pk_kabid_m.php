<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pk_kabid_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('pk_kabid.*, pk_kadis.nama_pihak_pertama as nama_pihak_kedua, pk_kadis.jabatan_pihak_pertama as jabatan_pihak_kedua, pk_kadis.tanggal_pk ');
		$this->db->from('pk_kabid');
		$this->db->join('pk_kadis', 'pk_kabid.pk_kadis_id=pk_kadis.pk_kadis_id');
		if($id !=null) {
			$this->db->where('pk_kabid.portal_id', $id);
		}
		$this->db->order_by('pk_kabid.portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($pk_kabid_id)
	{
		$this->db->select('*');
		$this->db->from('pk_kabid');
		$this->db->where('pk_kabid_id', $pk_kabid_id);
		$this->db->order_by('pk_kabid_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pk_kabid', $data);
	}

	// edit
	public function edit($data)
	{
		$this->db->where('pk_kabid_id', $data['pk_kabid_id']);
		$this->db->update('pk_kabid', $data);
	}

	public function del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pk_kabid');
    }

    public function lampiran_get($id = null)
	{
		$this->db->select('lampiran_pk_kabid.*, indikator_program.uraian_indikator_program, indikator_kegiatan.uraian_indikator_kegiatan, indikator_kegiatan.satuan');
		$this->db->from('lampiran_pk_kabid');
		$this->db->join('pk_kabid', 'lampiran_pk_kabid.pk_kabid_id=pk_kabid.pk_kabid_id');
		$this->db->join('indikator_program', 'lampiran_pk_kabid.indikator_program_id=indikator_program.indikator_program_id');
		$this->db->join('indikator_kegiatan', 'lampiran_pk_kabid.indikator_kegiatan_id=indikator_kegiatan.indikator_kegiatan_id');
		if($id !=null) {
			$this->db->where('lampiran_pk_kabid.pk_kabid_id', $id);
		}
		$this->db->order_by('lampiran_pk_kabid_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function lampiran_detail($lampiran_pk_kabid_id)
	{
		$this->db->select('lampiran_pk_kabid.*, indikator_program.uraian_indikator_program, indikator_kegiatan.uraian_indikator_kegiatan, indikator_kegiatan.satuan');
		$this->db->from('lampiran_pk_kabid');
		$this->db->join('indikator_program', 'lampiran_pk_kabid.indikator_program_id=indikator_program.indikator_program_id');
		$this->db->join('indikator_kegiatan', 'lampiran_pk_kabid.indikator_kegiatan_id=indikator_kegiatan.indikator_kegiatan_id');
		$this->db->where('lampiran_pk_kabid_id', $lampiran_pk_kabid_id);
		$this->db->order_by('lampiran_pk_kabid_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function lampiran_add($data)
	{
		$this->db->insert('lampiran_pk_kabid', $data);
	}

	// edit
	public function lampiran_edit($data)
	{
		$this->db->where('lampiran_pk_kabid_id', $data['lampiran_pk_kabid_id']);
		$this->db->update('lampiran_pk_kabid', $data);
	}

	public function lampiran_del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('lampiran_pk_kabid');
    }

    public function program_pk_kabid_get($id= null)
	{
		$this->db->select('program_pk_kabid.*, program.nama_program, program_pk_kadis.pagu_anggaran');
		$this->db->from('program_pk_kabid');
		$this->db->join('program_pk_kadis', 'program_pk_kabid.program_pk_kadis_id=program_pk_kadis.program_pk_kadis_id');
		$this->db->join('program', 'program_pk_kadis.program_id=program.program_id');
		if($id !=null) {
			$this->db->where('program_pk_kabid.lampiran_pk_kabid_id', $id);
		}
		$this->db->order_by('program.program_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function program_detail($program_pk_kabid_id)
	{
		$this->db->select('program_pk_kabid.*, program.nama_program, program_pk_kadis.pagu_anggaran');
		$this->db->from('program_pk_kabid');
		$this->db->join('program_pk_kadis', 'program_pk_kabid.program_pk_kadis_id=program_pk_kadis.program_pk_kadis_id');
		$this->db->join('program', 'program_pk_kadis.program_id=program.program_id');
		$this->db->where('program_pk_kabid_id', $program_pk_kabid_id);
		$this->db->order_by('program_pk_kabid_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function program_pk_kabid_add($data)
	{
		$this->db->insert('program_pk_kabid', $data);
	}

	// edit
	public function program_pk_kabid_edit($data)
	{
		$this->db->where('program_pk_kabid_id', $data['program_pk_kabid_id']);
		$this->db->update('program_pk_kabid', $data);
	}

	public function program_pk_kabid_del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('program_pk_kabid');
    }

    public function cetak($cetak)
	{
		$this->db->select('pk_kabid.*, pk_kadis.nama_pihak_pertama as nama_pihak_kedua, pk_kadis.jabatan_pihak_pertama as jabatan_pihak_kedua, pk_kadis.tanggal_pk');
		$this->db->from('pk_kabid');
		$this->db->join('pk_kadis', 'pk_kabid.pk_kadis_id=pk_kadis.pk_kadis_id');
		$this->db->where('pk_kabid_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

	public function cetak_program_pk_kabid($id= null)
	{
		$this->db->select('program_pk_kabid.*, program.nama_program, program_pk_kadis.pagu_anggaran');
		$this->db->from('program_pk_kabid');
		$this->db->join('program_pk_kadis', 'program_pk_kabid.program_pk_kadis_id=program_pk_kadis.program_pk_kadis_id');
		$this->db->join('program', 'program_pk_kadis.program_id=program.program_id');
		if($id !=null) {
			$this->db->where('program_pk_kabid.portal_id', $id);
		}
		$this->db->order_by('program.program_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function jumlah_pagu_anggaran($id= null)
	{
		$this->db->select('program_pk_kabid.*, SUM(program_pk_kadis.pagu_anggaran) as total_pagu_anggaran');
        $this->db->from('program_pk_kabid');
        $this->db->join('program_pk_kadis', 'program_pk_kabid.program_pk_kadis_id=program_pk_kadis.program_pk_kadis_id');
        if($id !=null) {
            $this->db->where('program_pk_kabid.portal_id', $id);
            //$this->db->group_by('program_pk_kabid_id');
        }
        $query = $this->db->get();
        return $query;
	}
}