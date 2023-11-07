<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pk_kasi_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('pk_kasi.*, pk_kabid.nama_pihak_pertama as nama_pihak_kedua, pk_kabid.jabatan_pihak_pertama as jabatan_pihak_kedua, pk_kadis.tanggal_pk, pk_kabid.bidang');
		$this->db->from('pk_kasi');
		$this->db->join('pk_kabid', 'pk_kasi.pk_kabid_id=pk_kabid.pk_kabid_id');
		$this->db->join('pk_kadis', 'pk_kabid.pk_kadis_id=pk_kadis.pk_kadis_id');
		if($id !=null) {
			$this->db->where('pk_kasi.portal_id', $id);
		}
		$this->db->order_by('pk_kasi.portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($pk_kasi_id)
	{
		$this->db->select('*');
		$this->db->from('pk_kasi');
		$this->db->where('pk_kasi_id', $pk_kasi_id);
		$this->db->order_by('pk_kasi_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pk_kasi', $data);
	}

	// edit
	public function edit($data)
	{
		$this->db->where('pk_kasi_id', $data['pk_kasi_id']);
		$this->db->update('pk_kasi', $data);
	}

	public function del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pk_kasi');
    }

    public function lampiran_get($id = null)
	{
		$this->db->select('lampiran_pk_kasi.*, indikator_kegiatan.uraian_indikator_kegiatan, indikator_subkeg.uraian_indikator_subkeg, indikator_subkeg.satuan');
		$this->db->from('lampiran_pk_kasi');
		$this->db->join('pk_kasi', 'lampiran_pk_kasi.pk_kasi_id=pk_kasi.pk_kasi_id');
		$this->db->join('indikator_kegiatan', 'lampiran_pk_kasi.indikator_kegiatan_id=indikator_kegiatan.indikator_kegiatan_id');
		$this->db->join('indikator_subkeg', 'lampiran_pk_kasi.indikator_subkeg_id=indikator_subkeg.indikator_subkeg_id');
		if($id !=null) {
			$this->db->where('lampiran_pk_kasi.pk_kasi_id', $id);
		}
		$this->db->order_by('lampiran_pk_kasi_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function lampiran_detail($lampiran_pk_kasi_id)
	{
		$this->db->select('lampiran_pk_kasi.*, indikator_kegiatan.uraian_indikator_kegiatan, indikator_subkeg.uraian_indikator_subkeg, indikator_subkeg.satuan');
		$this->db->from('lampiran_pk_kasi');
		$this->db->join('indikator_kegiatan', 'lampiran_pk_kasi.indikator_kegiatan_id=indikator_kegiatan.indikator_kegiatan_id');
		$this->db->join('indikator_subkeg', 'lampiran_pk_kasi.indikator_subkeg_id=indikator_subkeg.indikator_subkeg_id');
		$this->db->where('lampiran_pk_kasi_id', $lampiran_pk_kasi_id);
		$this->db->order_by('lampiran_pk_kasi_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function lampiran_add($data)
	{
		$this->db->insert('lampiran_pk_kasi', $data);
	}

	// edit
	public function lampiran_edit($data)
	{
		$this->db->where('lampiran_pk_kasi_id', $data['lampiran_pk_kasi_id']);
		$this->db->update('lampiran_pk_kasi', $data);
	}

	public function lampiran_del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('lampiran_pk_kasi');
    }

    public function kegiatan_pk_kasi_get($id= null)
	{
		$this->db->select('*');
		$this->db->from('kegiatan_pk_kasi');
		$this->db->join('kegiatan', 'kegiatan_pk_kasi.kegiatan_id=kegiatan.kegiatan_id');
		if($id !=null) {
			$this->db->where('kegiatan_pk_kasi.lampiran_pk_kasi_id', $id);
		}
		$this->db->order_by('kegiatan.kegiatan_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function kegiatan_detail($kegiatan_pk_kasi_id)
	{
		$this->db->select('kegiatan_pk_kasi.*, kegiatan.nama_kegiatan');
		$this->db->from('kegiatan_pk_kasi');
		$this->db->join('kegiatan', 'kegiatan_pk_kasi.kegiatan_id=kegiatan.kegiatan_id');
		$this->db->where('kegiatan_pk_kasi_id', $kegiatan_pk_kasi_id);
		$this->db->order_by('kegiatan_pk_kasi_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function kegiatan_pk_kasi_add($data)
	{
		$this->db->insert('kegiatan_pk_kasi', $data);
	}

	// edit
	public function kegiatan_pk_kasi_edit($data)
	{
		$this->db->where('kegiatan_pk_kasi_id', $data['kegiatan_pk_kasi_id']);
		$this->db->update('kegiatan_pk_kasi', $data);
	}

	public function kegiatan_pk_kasi_del($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('kegiatan_pk_kasi');
    }

    public function cetak($cetak)
	{
		$this->db->select('pk_kasi.*, pk_kabid.nama_pihak_pertama as nama_pihak_kedua, pk_kabid.jabatan_pihak_pertama as jabatan_pihak_kedua, pk_kadis.tanggal_pk, pk_kabid.bidang');
		$this->db->from('pk_kasi');
		$this->db->join('pk_kabid', 'pk_kasi.pk_kabid_id=pk_kabid.pk_kabid_id');
		$this->db->join('pk_kadis', 'pk_kabid.pk_kadis_id=pk_kadis.pk_kadis_id');
		$this->db->where('pk_kasi_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

	public function cetak_kegiatan_pk_kasi($id= null)
	{
		$this->db->select('kegiatan_pk_kasi.*, kegiatan.nama_kegiatan');
		$this->db->from('kegiatan_pk_kasi');
		$this->db->join('kegiatan', 'kegiatan_pk_kasi.kegiatan_id=kegiatan.kegiatan_id');
		if($id !=null) {
			$this->db->where('kegiatan_pk_kasi.portal_id', $id);
		}
		$this->db->order_by('kegiatan.kegiatan_id','asc');
		$query=$this->db->get();
		return $query;
	}

	public function jumlah_pagu_anggaran($id= null)
	{
		$this->db->select('kegiatan_pk_kasi.*, SUM(pagu_anggaran) as total_pagu_anggaran');
        $this->db->from('kegiatan_pk_kasi');
        if($id !=null) {
            $this->db->where('kegiatan_pk_kasi.portal_id', $id);
        }
        $query = $this->db->get();
        return $query;
	}
}