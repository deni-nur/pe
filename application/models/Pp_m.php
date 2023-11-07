<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pp_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('pp.*, bidang_urusan.kode, urusan.kode as kode_urusan, sasaran.uraian_sasaran, bidang_urusan.uraian_bidang_urusan, subkeg.nama_subkeg, program.kode_program, kegiatan.kode_kegiatan, subkeg.kode_subkeg, pegawai.name, SUM(pagu_belanja) as jumlah_pagu_subkeg, SUM(pagu_perubahan) as jumlah_pagu_subkeg_perubahan');
		$this->db->from('pp');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('belanja', 'belanja.dpa_id = dpa.dpa_id', 'left');
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
			$this->db->where('pp.portal_id', $id);
			$this->db->group_by('dpa_id');
		}
		$this->db->order_by('subkeg.subkeg_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function get_realisasi($id = null)
    {
        $this->db->select('r_pp.*, pp.pp_id, pp.dpa_id, SUM(biaya) as jumlah_realisasi');
        $this->db->from('r_pp');
        $this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
        $this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
        $this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
        if($id !=null) {
            $this->db->where('dpa.portal_id', $id);
            $this->db->group_by('dpa_id');
        }
        $query = $this->db->get();
        return $query;
    }

	public function detail($pp_id)
	{
		$this->db->select('*');
		$this->db->from('pp');
		$this->db->where('pp_id', $pp_id);
		$this->db->order_by('pp_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pp', $data);
	}

	public function edit($data)
	{
		$this->db->where('pp_id', $data['pp_id']);
		$this->db->update('pp', $data);
	}

	public function del_pp($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pp');
    }

    public function cetak($cetak)
	{
		$this->db->select('pp.*, program.nama_program, program.kode_program, kegiatan.nama_kegiatan, kegiatan.kode_kegiatan, subkeg.nama_subkeg, subkeg.kode_subkeg, sasaran.uraian_sasaran, bidang_urusan.uraian_bidang_urusan, bidang_urusan.kode, urusan.kode as kode_urusan, urusan.uraian, pegawai.name as ttd_keu_name, ttd_keu.jabatan_ttd_keu, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name');
		$this->db->from('pp');
		//$this->db->join('r_pp', 'r_pp.pp_id = pp.pp_id', 'left');
		//$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		//$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id= kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		//$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		//$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		//$this->db->join('st', 'r_pp.st_id = st.st_id', 'left');
        $this->db->where('pp.pp_id', $cetak);
    	$query = $this->db->get();
    	return $query->row();
  	}

 	public function getc($date=null)
	{
		$this->db->select('r_pp.*, a_belanja.nama_rek, a_belanja.kode_rek, rekening.rek_bank, sppd.tempat_berangkat, rekening.nama_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		if($date !=null) {
			$this->db->where('r_pp.pp_id', $date);
		}
		$this->db->order_by('r_pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function get_bel($id=null)
	{
		$this->db->select('r_pp.*,  a_belanja.nama_rek, sppd.tempat_tujuan, sppd.tempat_berangkat, rekening.rek_bank, rekening.nama_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		if($id !=null) {
		$this->db->where('r_pp.pp_id', $id);
		}
		$this->db->order_by('r_pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function getdpa($id=null)
	{
		$this->db->select('pp.*, belanja.belanja_id, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, subkeg.nama_subkeg, subkeg.kode_subkeg, kegiatan.nama_kegiatan, kegiatan.kode_kegiatan, program.kode_program, belanja.pagu_belanja');
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
		if($id !=null) {
			$this->db->where('pp.pp_id', $id);
		}
		$this->db->order_by('pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function getpp($id=null)
	{
		$this->db->select('pp.*, bidang_urusan.kode, urusan.kode as kode_urusan, sasaran.uraian_sasaran, bidang_urusan.uraian_bidang_urusan, subkeg.nama_subkeg, program.kode_program, program.nama_program, kegiatan.kode_kegiatan, kegiatan.nama_kegiatan, subkeg.kode_subkeg, pegawai.name');
		$this->db->from('pp');
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
			$this->db->where('pp.pp_id', $id);
		}
		$this->db->order_by('pp.pp_id', 'desc');
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
		$this->db->where('DATE(r_pp.tgl_rpp)', $date);
		$this->db->order_by('r_pp.uraian', 'asc');
    	$query = $this->db->get();
    	return $query;
  	}

  	public function getbelanja($id=null)
	{
		$this->db->select('r_pp.*, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, SUM(biaya) as jumlah_biaya, SUM(h_pajak) as jumlah_pajak');
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

	public function getrpp($id=null)
	{
		$this->db->select('*');
		$this->db->from('r_pp');
		if($id !=null) {
			$this->db->where('r_pp.pp_id', $id);
		}
		$this->db->order_by('r_pp.uraian', 'asc');
		$query = $this->db->get();
		return $query;
	}

	// public function jumlah_biaya($pp_id)
 //    {
 //        $this->db->select('SUM(biaya) as jumlah_biaya');
 //        $this->db->from('r_pp');
 //        $this->db->where('r_pp.pp_id', $pp_id);
 //        $this->db->group_by('tgl_rpp');
 //        $query = $this->db->get();
 //        return $query->row();
 //    }

	public function get_pengikut($id = null)
    {
        $this->db->select('pengikut.*, pegawai.name as pengikut_name, pegawai.nip as pengikut_nip, golongan.gol as pengikut_gol, pangkat.pangkat as pengikut_pangkat, jabatan.name as pengikut_jabatan, st.maksud, sppd.sppd_id, sppd.lama_perjalanan, sppd.tempat_tujuan');
		$this->db->from('pengikut');
		$this->db->join('pegawai', 'pengikut.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		$this->db->join('st', 'pengikut.st_id = st.st_id', 'left');
		$this->db->join('sppd', 'sppd.st_id = st.st_id', 'left');
		$this->db->join('portal', 'pengikut.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('pengikut.portal_id', $id);
			$this->db->where('sppd.portal_id', $id);
		}
		$this->db->order_by('pengikut.st_id');
		$query = $this->db->get();
		return $query->result();
    }

	public function detail_rpp($r_pp_id)
	{
		$this->db->select('r_pp.*,  akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, sppd.tempat_tujuan, rekening.rek_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->where('r_pp_id', $r_pp_id);
		$this->db->order_by('r_pp_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function rpp_add($data)
	{
		$this->db->insert('r_pp', $data);
	}

	public function rpp_edit($data)
	{
		$this->db->where('r_pp_id', $data['r_pp_id']);
		$this->db->update('r_pp', $data);
	}

	public function del_rpp($data)
	{
		$this->db->where('r_pp_id', $data['r_pp_id']);
		$this->db->delete('r_pp', $data);
	}
}