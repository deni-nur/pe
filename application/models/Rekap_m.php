<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_m extends CI_Model {

	public function get($id = null)
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

    public function getpp($id=null)
	{
		$this->db->select('pp.*, bidang_urusan.kode, urusan.kode as kode_urusan, sasaran.uraian_sasaran, bidang_urusan.uraian_bidang_urusan, subkeg.nama_subkeg, program.kode_program, program.nama_program, kegiatan.kode_kegiatan, kegiatan.nama_kegiatan, subkeg.kode_subkeg, pegawai.name, SUM(belanja.pagu_belanja) as jumlah_pagu_subkeg, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, belanja.belanja_id');
		$this->db->from('pp');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('belanja', 'belanja.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
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
			$this->db->where('pp.pp_id', $id);
			$this->db->group_by('dpa.dpa_id');	
		}
		$this->db->order_by('pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

    public function getbelanja($id=null)
	{
		$this->db->select('belanja.*, akun.kode_akun, akun.nama_akun, kelompok.kode_kelompok, kelompok.nama_kelompok, jenis.kode_jenis, jenis.nama_jenis, objek.kode_objek, objek.nama_objek, rincian_objek.kode_rincian_objek, rincian_objek.nama_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, SUM(biaya) as jumlah_realisasi_subkeg, pp.pp_id, akun.akun_id, kelompok.kelompok_id, jenis.jenis_id');
		$this->db->from('belanja');
		$this->db->join('dpa', 'belanja.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('pp', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('r_pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		if($id !=null) {
			$this->db->where('pp.pp_id', $id);
			$this->db->group_by('belanja_id');
		}
		$this->db->order_by('dpa.dpa_id', 'asc');
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

    public function get_realisasi_subkegiatan($id = null)
    {
        $this->db->select('r_pp.*, pp.dpa_id, SUM(biaya) as jumlah_realisasi_subkeg');
        $this->db->from('r_pp');
        $this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
        $this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
        $this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
        if($id !=null) {
            $this->db->where('pp.pp_id', $id);
            //$this->db->where('dpa.dpa_id', $id);
            $this->db->group_by('dpa_id');
        }
        $query = $this->db->get();
        return $query;
    }

    public function filter($date)
	{
		$this->db->select('r_pp.*, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, rekening.nama_pemilik, rekening.rek_bank, rekening.nama_bank, sppd.tempat_berangkat, r_pp.uraian as uraian_rpp, pp.nama_pa, pp.nip_pa, pp.jabatan_pa, pegawai.name as ttd_keu_name, ttd_keu.jabatan_ttd_keu, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, pp.nama_bpp, pp.nip_bpp, pp.jabatan_bpp');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('st', 'r_pp.st_id = st.st_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->where('pp.pp_id', $date);
		$this->db->order_by('r_pp.uraian', 'asc');
    	$query = $this->db->get();
    	return $query;
  	}

	public function getrpp($id=null)
	{
		$this->db->select('r_pp.*, SUM(biaya) as jumlah_realisasi_belanja');
		$this->db->from('r_pp');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		if($id !=null) {
			$this->db->where('pp.pp_id', $id);
			$this->db->group_by('belanja_id');
		}
		$this->db->order_by('pp.pp_id', 'asc');
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

  	public function getobjekbelanja($id=null)
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
			$this->db->where('r_pp.belanja_id', $id);
			$this->db->group_by('r_pp.belanja_id');
		}
		$this->db->order_by('belanja.belanja_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function getrincianbelanja($id=null)
	{
		$this->db->select('r_pp.*, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, kwitansi.tanggal as tgl_kwitansi');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('kwitansi', 'kwitansi.r_pp_id = r_pp.r_pp_id', 'left');
		if($id !=null) {
			$this->db->where('r_pp.pp_id', $id);
		}
		$this->db->order_by('r_pp.uraian', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function cetak_rekap_rincian_belanja($date)
	{
		$this->db->select('r_pp.*, st.no_st, sppd.tgl_berangkat, sppd.tgl_pulang, sppd.tempat_tujuan, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, rekening.nama_pemilik, rekening.rek_bank, rekening.nama_bank, sppd.tempat_berangkat, r_pp.uraian as uraian_rpp, pp.nama_pa, pp.nip_pa, pp.jabatan_pa, pegawai.name as ttd_keu_name, ttd_keu.jabatan_ttd_keu, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, pp.nama_bpp, pp.nip_bpp, pp.jabatan_bpp, kwitansi.tanggal as tgl_kwitansi');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('st', 'r_pp.st_id = st.st_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->join('kwitansi', 'kwitansi.r_pp_id = r_pp.r_pp_id', 'left');
		$this->db->where('DATE(kwitansi.tanggal)', $date);
		$this->db->order_by('r_pp.uraian', 'asc');
    	$query = $this->db->get();
    	return $query;
  	}

  	public function cetak_rekap_rincian_belanja_bulan($date1, $date2)
	{
		$date1 = $this->db->escape($date1);
        $date2 = $this->db->escape($date2);

		$this->db->select('r_pp.*, st.no_st, sppd.tgl_berangkat, sppd.tgl_pulang, sppd.tempat_tujuan, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, rekening.nama_pemilik, rekening.rek_bank, rekening.nama_bank, sppd.tempat_berangkat, r_pp.uraian as uraian_rpp, pp.nama_pa, pp.nip_pa, pp.jabatan_pa, pegawai.name as ttd_keu_name, ttd_keu.jabatan_ttd_keu, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, pp.nama_bpp, pp.nip_bpp, pp.jabatan_bpp, kwitansi.tanggal as tgl_kwitansi, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('st', 'r_pp.st_id = st.st_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->join('kwitansi', 'kwitansi.r_pp_id = r_pp.r_pp_id', 'left');
        $this->db->where('DATE(kwitansi.tanggal) BETWEEN '.$date1.' AND '.$date2);
		$this->db->order_by('r_pp.uraian', 'asc');
    	$query = $this->db->get();
    	return $query;
  	}
}