<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('kwitansi.*, r_pp.uraian, r_pp.name, r_pp.biaya, r_pp.lama_perjalanan, r_pp.h_pajak, pp.nama_pa, pp.nip_pa, pp.jabatan_pa, ttd_keu.jabatan_ttd_keu, pegawai.name as ttd_keu_name, pegawai.nip, rekening.nama_pemilik');
		$this->db->from('kwitansi');
		$this->db->join('r_pp', 'kwitansi.r_pp_id = r_pp.r_pp_id', 'left');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'ttd_keu.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		if($id !=null) {
			$this->db->where('belanja.belanja_id', $id);
		}
		$this->db->order_by('r_pp.uraian', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function listing($id = null)
	{
		$this->db->select('dpa.*, program.kode_program, bidang_urusan.kode, urusan.kode as kode_urusan, program.nama_program, kegiatan.nama_kegiatan, subkeg.nama_subkeg, subkeg.kode_subkeg, kegiatan.kode_kegiatan, indikator_subkeg.uraian_indikator_subkeg, indikator_subkeg.satuan, SUM(pagu_belanja) as jumlah_pagu_subkeg');
        $this->db->from('dpa');
        $this->db->join('belanja', 'belanja.dpa_id = dpa.dpa_id', 'left');
        $this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
        $this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
        $this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
        $this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
        $this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
        $this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
        $this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
        $this->db->join('indikator_subkeg', 'indikator_subkeg.subkeg_id = subkeg.subkeg_id', 'left');
        if($id !=null) {
            $this->db->where('dpa.portal_id', $id);
            //$this->db->where('dpa.dpa_id', $id);
            $this->db->group_by('dpa_id');
        }
        $query = $this->db->get();
        return $query;
	}

	public function get_realisasi_subkeg($id = null)
    {
        $this->db->select('r_pp.*, pp.dpa_id, SUM(biaya) as jumlah_realisasi_subkeg');
        $this->db->from('r_pp');
        $this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
        $this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
        $this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
        if($id !=null) {
            $this->db->where('dpa.portal_id', $id);
            //$this->db->where('dpa.dpa_id', $id);
            $this->db->group_by('dpa_id');
        }
        $query = $this->db->get();
        return $query;
    }

    public function getbelanjadata($id=null)
	{
		$this->db->select('r_pp.*, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, SUM(biaya) as jumlah_biaya');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		if($id !=null) {
			$this->db->where('r_pp.pp_id', $id);
			$this->db->group_by('r_pp.belanja_id');
		}
		$this->db->order_by('belanja.belanja_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($kwitansi_id)
	{
		$this->db->select('kwitansi.*, r_pp.uraian');
		$this->db->from('kwitansi');
		$this->db->join('r_pp', 'kwitansi.r_pp_id = r_pp.r_pp_id', 'left');
		$this->db->where('kwitansi_id', $kwitansi_id);
		$this->db->order_by('kwitansi_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('kwitansi', $data);
	}

	public function edit($data)
	{
		$this->db->where('kwitansi_id', $data['kwitansi_id']);
		$this->db->update('kwitansi', $data);
	}

	public function del_kwitansi($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('kwitansi');
    }

	public function cetak($cetak)
	{
		$this->db->select('kwitansi.*, bidang_urusan.kode, urusan.kode as kode_urusan, sasaran.uraian_sasaran, bidang_urusan.uraian_bidang_urusan, subkeg.nama_subkeg, program.kode_program, program.nama_program, kegiatan.kode_kegiatan, kegiatan.nama_kegiatan, subkeg.kode_subkeg, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, r_pp.uraian, r_pp.name, r_pp.nip, r_pp.pangkat, r_pp.golongan, r_pp.jabatan, r_pp.biaya, r_pp.lama_perjalanan, r_pp.h_pajak, pp.nama_pa, pp.nip_pa, pp.jabatan_pa, pp.nama_bpp, pp.nip_bpp, pp.jabatan_bpp, rekening.nama_pemilik, pegawai.name as ttd_pptk_name, pegawai.nip  as ttd_pptk_nip, pangkat.pangkat as pangkat_pptk, golongan.gol as gol_pptk, ttd_keu.jabatan_ttd_keu as jabatan_pptk, (r_pp.lama_perjalanan * r_pp.biaya) as jumlah_biaya_perjadin_luar, sppd.tempat_tujuan');
		$this->db->from('kwitansi');
		$this->db->join('r_pp', 'kwitansi.r_pp_id = r_pp.r_pp_id', 'left');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'ttd_keu.pegawai_id = pegawai.pegawai_id');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->where('kwitansi_id', $cetak);
    	$query = $this->db->get();
    	return $query->row();
  	}

  	public function get_ttd_keu($id = null)
    {
        $this->db->select('kwitansi.*, pegawai.name as ttd_keu_name, pegawai.nip as ttd_keu_nip, pangkat.pangkat, golongan.gol, ttd_keu.jabatan_ttd_keu');
		$this->db->from('kwitansi');
		$this->db->join('ttd_keu', 'kwitansi.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'ttd_keu.pegawai_id = pegawai.pegawai_id');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id');
		if($id !=null) {
			$this->db->where('kwitansi.kwitansi_id', $id);
		}
		$this->db->order_by('kwitansi.kwitansi_id');
		$query = $this->db->get();
		return $query;
    }

   	public function getkwitansi($id=null)
	{
		$this->db->select('pp.*, r_pp.uraian, r_pp.biaya, r_pp.lama_perjalanan, r_pp.h_pajak, r_pp.r_pp_id, r_pp.tgl_rpp, rekening.nama_pemilik, subkeg.nama_subkeg, bidang_urusan.kode, urusan.kode as kode_urusan, program.kode_program, kegiatan.kode_kegiatan, subkeg.kode_subkeg, pegawai.name');
		$this->db->from('pp');
		$this->db->join('r_pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'ttd_keu.pegawai_id = pegawai.pegawai_id', 'left');
		if($id !=null) {
			$this->db->where('belanja.belanja_id', $id);
		}
		$this->db->order_by('r_pp.uraian', 'ASC');
		$this->db->order_by('r_pp.tgl_rpp', 'ASC');
		$query = $this->db->get();
		return $query;
	}

}

/* End of file Kwitansi_m.php */
/* Location: ./application/models/Kwitansi_m.php */