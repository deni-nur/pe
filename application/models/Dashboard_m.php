<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model {

	public function stget($id = null)
    {
        $this->db->select('*');
		$this->db->from('st');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    public function kwitansiget($id = null)
    {
        $this->db->select('*');
		$this->db->from('kwitansi');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    public function ppget($id = null)
    {
        $this->db->select('*');
		$this->db->from('pp');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    public function lhpdget($id = null)
    {
        $this->db->select('*');
		$this->db->from('lhpd');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    public function sppdget($id = null)
    {
        $this->db->select('*');
		$this->db->from('sppd');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    public function dpaget($id = null)
    {
        $this->db->select('*');
		$this->db->from('dpa');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
    }

    public function indikator_tujuan($indikator_tujuan_id = 1)
	{
		$this->db->from('indikator_tujuan');
		$this->db->where('indikator_tujuan_id', $indikator_tujuan_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function indikator_sasaran_rpjmd($indikator_sasaran_rpjmd_id= 1)
	{
		$this->db->from('indikator_sasaran_rpjmd');
		$this->db->where('indikator_sasaran_rpjmd_id', $indikator_sasaran_rpjmd_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function indikator_sasaran_pd_1($indikator_sasaran_id= 1)
	{
		$this->db->from('indikator_sasaran');
		$this->db->where('indikator_sasaran_id', $indikator_sasaran_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function indikator_sasaran_pd_2($indikator_sasaran_id= 2)
	{
		$this->db->from('indikator_sasaran');
		$this->db->where('indikator_sasaran_id', $indikator_sasaran_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function indikator_program1($indikator_program_id= 11)
	{
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function indikator_program2($indikator_program_id= 12)
	{
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function indikator_program3($indikator_program_id= 13)
	{
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function indikator_program4($indikator_program_id= 14)
	{
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function indikator_program5($indikator_program_id= 15)
	{
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function indikator_program6($indikator_program_id= 16)
	{
		$this->db->from('indikator_program');
		$this->db->where('indikator_program_id', $indikator_program_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function pad($id =null)
	{
		$this->db->select('pad.*, portal.tahun_perencanaan');
		$this->db->from('pad');
		$this->db->join('portal', 'pad.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function pelatihan()
	{
		$sql = $this->db->query(" SELECT b.portal_id, b.tahun_perencanaan, SUM(b.APBD) AS APBD, SUM(b.APBN) AS APBN FROM
		(SELECT a.sumber_dana,a.portal_id,a.tahun_perencanaan,
		(CASE WHEN a.sumber_dana='APBD' THEN JJK ELSE 0 END) AS APBD,
		(CASE WHEN a.sumber_dana='APBN' THEN JJK ELSE 0 END) AS APBN
		FROM
		(SELECT sumber_dana, portal.portal_id, portal.tahun_perencanaan, COUNT(sumber_dana) AS JJK FROM pelatihan INNER JOIN portal ON pelatihan.portal_id=portal.portal_id GROUP BY sumber_dana, portal.portal_id) a
		WHERE a.JJK>0) b
		GROUP BY b.portal_id ");
		return $sql->result();
	}

	public function pelatihan_kejuruan()
	{
		$sql = $this->db->query(" SELECT b.kejuruan, SUM(b.APBD) AS APBD, SUM(b.APBN) AS APBN FROM
		(SELECT a.sumber_dana,a.kejuruan,
		(CASE WHEN a.sumber_dana='APBD' THEN JJK ELSE 0 END) AS APBD,
		(CASE WHEN a.sumber_dana='APBN' THEN JJK ELSE 0 END) AS APBN
		FROM
		(SELECT sumber_dana, kejuruan, COUNT(sumber_dana) AS JJK FROM pelatihan GROUP BY sumber_dana) a
		WHERE a.JJK>0) b
		GROUP BY b.kejuruan ");
		return $sql->result();
	}

	public function kelembagaan()
	{
		$sql = $this->db->query(" SELECT b.lembaga, SUM(b.LPKSTERDAFTAR) AS LPKSTERDAFTAR, SUM(b.LPKSBELUMTERDAFTAR) AS LPKSBELUMTERDAFTAR, SUM(b.BLKKTERDAFTAR) AS BLKKTERDAFTAR, SUM(b.BLKKBELUMTERDAFTAR) AS BLKKBELUMTERDAFTAR FROM
		(SELECT a.lembaga,
		(CASE WHEN a.verif='YA' AND a.jabatan='Kepala LPKS' THEN JJK ELSE 0 END) AS LPKSTERDAFTAR,
		(CASE WHEN a.verif='YA' AND a.jabatan='Kepala BLKK' THEN JJK ELSE 0 END) AS BLKKTERDAFTAR,
		(CASE WHEN a.verif='TIDAK' AND a.jabatan='Kepala LPKS' THEN JJK ELSE 0 END) AS LPKSBELUMTERDAFTAR,
		(CASE WHEN a.verif='TIDAK' AND a.jabatan='Kepala BLKK' THEN JJK ELSE 0 END) AS BLKKBELUMTERDAFTAR
		FROM
		(SELECT lembaga, COUNT(lembaga) AS JJK, verif, jabatan 
		FROM kelembagaan
		GROUP BY lembaga, verif, lembaga) a
		WHERE a.JJK>0) b
		GROUP BY b.lembaga ");
		return $sql->result();
	}

	public function bkk($id =null)
	{
		$this->db->select('bkk.*, COUNT(nama) as nama_bkk, portal.tahun_perencanaan');
		$this->db->from('bkk');
		$this->db->join('portal', 'bkk.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('bkk_id', $id);
		}
		$this->db->order_by('bkk_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function padat_karya()
	{
		$sql = $this->db->query(" SELECT b.portal_id, b.tahun_perencanaan, SUM(b.PERKERASANJALAN) AS PERKERASANJALAN, SUM(b.RABATBETON) AS RABATBETON, SUM(b.PIPANISASI) AS PIPANISASI, SUM(b.TPT) AS TPT FROM
		(SELECT a.jenis,a.portal_id,a.tahun_perencanaan,
		(CASE WHEN a.jenis='PERKERASAN JALAN' THEN JJK ELSE 0 END) AS PERKERASANJALAN,
		(CASE WHEN a.jenis='RABAT BETON' THEN JJK ELSE 0 END) AS RABATBETON,
		(CASE WHEN a.jenis='PIPANISASI' THEN JJK ELSE 0 END) AS PIPANISASI,
		(CASE WHEN a.jenis='TEMBOK PENAHAN TANAH' THEN JJK ELSE 0 END) AS TPT
		FROM
		(SELECT jenis, portal.portal_id, portal.tahun_perencanaan, COUNT(jenis) AS JJK FROM padat_karya INNER JOIN portal ON padat_karya.portal_id=portal.portal_id GROUP BY jenis, portal.portal_id) a
		WHERE a.JJK>0) b
		GROUP BY b.portal_id ");
		return $sql->result();
	}

	public function padat_karya_desa()
	{
		$sql = $this->db->query(" SELECT b.desa_id, b.name, SUM(b.PERKERASANJALAN) AS PERKERASANJALAN, SUM(b.RABATBETON) AS RABATBETON, SUM(b.PIPANISASI) AS PIPANISASI, SUM(b.TPT) AS TPT FROM
		(SELECT a.jenis,a.desa_id,a.name,
		(CASE WHEN a.jenis='PERKERASAN JALAN' THEN JJK ELSE 0 END) AS PERKERASANJALAN,
		(CASE WHEN a.jenis='RABAT BETON' THEN JJK ELSE 0 END) AS RABATBETON,
		(CASE WHEN a.jenis='PIPANISASI' THEN JJK ELSE 0 END) AS PIPANISASI,
		(CASE WHEN a.jenis='TEMBOK PENAHAN TANAH' THEN JJK ELSE 0 END) AS TPT
		FROM
		(SELECT jenis, desa.desa_id, desa.name, COUNT(jenis) AS JJK FROM padat_karya INNER JOIN desa ON padat_karya.desa_id=desa.desa_id GROUP BY jenis, desa.desa_id) a
		WHERE a.JJK>0) b
		GROUP BY b.desa_id ");
		return $sql->result();
	}

	public function tkm()
	{
		$sql = $this->db->query(" SELECT b.portal_id, b.tahun_perencanaan, SUM(b.BPD) AS BPD, SUM(b.BENGKELLAS) AS BENGKELLAS, SUM(b.MENJAHIT) AS MENJAHIT, SUM(b.PHP) AS PHP, SUM(b.SABLON) AS SABLON, SUM(b.BIK) AS BIK, SUM(b.BENGKELBUBUT) AS BENGKELBUBUT FROM
		(SELECT a.kelompok,a.portal_id,a.tahun_perencanaan,
		(CASE WHEN a.kelompok='BUDIDAYA PERIKANAN DARAT' THEN JJK ELSE 0 END) AS BPD,
		(CASE WHEN a.kelompok='BENGKEL LAS' THEN JJK ELSE 0 END) AS BENGKELLAS,
		(CASE WHEN a.kelompok='MENJAHIT' THEN JJK ELSE 0 END) AS MENJAHIT,
		(CASE WHEN a.kelompok='PENGOLAHAN HASIL PERTANIAN' THEN JJK ELSE 0 END) AS PHP,
		(CASE WHEN a.kelompok='SABLON' THEN JJK ELSE 0 END) AS SABLON,
		(CASE WHEN a.kelompok='BUDIDAYA IKAN KOI' THEN JJK ELSE 0 END) AS BIK,
		(CASE WHEN a.kelompok='BENGKEL BUBUT' THEN JJK ELSE 0 END) AS BENGKELBUBUT
		FROM
		(SELECT kelompok, portal.portal_id, portal.tahun_perencanaan, COUNT(kelompok) AS JJK FROM tkm INNER JOIN portal ON tkm.portal_id=portal.portal_id GROUP BY kelompok, portal.portal_id) a
		WHERE a.JJK>0) b
		GROUP BY b.portal_id ");
		return $sql->result();
	}

	public function tkm_desa()
	{
		$sql = $this->db->query(" SELECT b.desa_id, b.name, SUM(b.BPD) AS BPD, SUM(b.BENGKELLAS) AS BENGKELLAS, SUM(b.MENJAHIT) AS MENJAHIT, SUM(b.PHP) AS PHP, SUM(b.SABLON) AS SABLON, SUM(b.BIK) AS BIK, SUM(b.BENGKELBUBUT) AS BENGKELBUBUT FROM
		(SELECT a.kelompok,a.desa_id,a.name,
		(CASE WHEN a.kelompok='BUDIDAYA PERIKANAN DARAT' THEN JJK ELSE 0 END) AS BPD,
		(CASE WHEN a.kelompok='BENGKEL LAS' THEN JJK ELSE 0 END) AS BENGKELLAS,
		(CASE WHEN a.kelompok='MENJAHIT' THEN JJK ELSE 0 END) AS MENJAHIT,
		(CASE WHEN a.kelompok='PENGOLAHAN HASIL PERTANIAN' THEN JJK ELSE 0 END) AS PHP,
		(CASE WHEN a.kelompok='SABLON' THEN JJK ELSE 0 END) AS SABLON,
		(CASE WHEN a.kelompok='BUDIDAYA IKAN KOI' THEN JJK ELSE 0 END) AS BIK,
		(CASE WHEN a.kelompok='BENGKEL BUBUT' THEN JJK ELSE 0 END) AS BENGKELBUBUT
		FROM
		(SELECT kelompok, desa.desa_id, desa.name, COUNT(kelompok) AS JJK FROM tkm INNER JOIN desa ON tkm.desa_id=desa.desa_id GROUP BY kelompok, desa.desa_id) a
		WHERE a.JJK>0) b
		GROUP BY b.desa_id ");
		return $sql->result();
	}

	public function pmi_tahun()
    {
    	$sql = $this->db->query(" SELECT b.portal_id, b.tahun_perencanaan, SUM(b.LFormal) AS LFormal, SUM(b.PFormal) AS PFormal, SUM(b.LFormal)+SUM(b.PFormal) AS SUMFormal,
		SUM(b.LInformal) AS LInformal, SUM(b.PInformal) AS PInformal, SUM(b.LInformal)+SUM(b.PInformal) AS SUMInformal, SUM(b.LFormal)+ SUM(b.LInformal) AS LJumlah, 
		SUM(b.PFormal)+SUM(b.PInformal) AS PJumlah,SUM(b.LFormal)+SUM(b.LInformal)+SUM(b.PFormal)+SUM(b.PInformal) AS SUMJUMLAH FROM
		(SELECT a.sktor_pkrjaan,a.portal_id,a.tahun_perencanaan,
		(CASE WHEN a.sktor_pkrjaan='FORMAL' AND a.jk='L' THEN JJK ELSE 0 END) AS LFormal,
		(CASE WHEN a.sktor_pkrjaan='FORMAL' AND a.jk='P' THEN JJK ELSE 0 END) AS PFormal,
		(CASE WHEN a.sktor_pkrjaan='INFORMAL' AND a.jk='L' THEN JJK ELSE 0 END) AS LInformal,
		(CASE WHEN a.sktor_pkrjaan='INFORMAL' AND a.jk='P' THEN JJK ELSE 0 END) AS PInformal
		FROM
		(SELECT portal.portal_id, portal.tahun_perencanaan, COUNT(jk) AS JJK, sktor_pkrjaan, jk FROM pmi INNER JOIN portal ON pmi.portal_id=portal.portal_id
		GROUP BY sktor_pkrjaan, jk, portal.portal_id) a
		WHERE a.JJK>0) b
		GROUP BY b.portal_id ");
    	return $sql->result();
    }

	public function ngr_tjuan()
    {
    	$sql = $this->db->query(" SELECT b.ngr_tjuan, SUM(b.LFormal) AS LFormal, SUM(b.PFormal) AS PFormal, SUM(b.LFormal)+SUM(b.PFormal) AS SUMFormal,
		SUM(b.LInformal) AS LInformal, SUM(b.PInformal) AS PInformal, SUM(b.LInformal)+SUM(b.PInformal) AS SUMInformal, SUM(b.LFormal)+ SUM(b.LInformal) AS LJumlah, 
		SUM(b.PFormal)+SUM(b.PInformal) AS PJumlah,SUM(b.LFormal)+SUM(b.LInformal)+SUM(b.PFormal)+SUM(b.PInformal) AS SUMJUMLAH FROM
		(SELECT a.ngr_tjuan,
		(CASE WHEN a.sktor_pkrjaan='FORMAL' AND a.jk='L' THEN JJK ELSE 0 END) AS LFormal,
		(CASE WHEN a.sktor_pkrjaan='FORMAL' AND a.jk='P' THEN JJK ELSE 0 END) AS PFormal,
		(CASE WHEN a.sktor_pkrjaan='INFORMAL' AND a.jk='L' THEN JJK ELSE 0 END) AS LInformal,
		(CASE WHEN a.sktor_pkrjaan='INFORMAL' AND a.jk='P' THEN JJK ELSE 0 END) AS PInformal
		FROM
		(SELECT ngr_tjuan, COUNT(jk) AS JJK, sktor_pkrjaan, jk 
		FROM pmi
		GROUP BY ngr_tjuan, sktor_pkrjaan, jk) a
		WHERE a.JJK>0) b
		GROUP BY b.ngr_tjuan");
    	return $sql->result();
    }

    public function pmi_kasus()
	{
		$sql = $this->db->query(" SELECT b.portal_id, b.tahun_perencanaan, SUM(b.ALJAZAIR) AS ALJAZAIR, SUM(b.BAHRAIN) AS BAHRAIN, SUM(b.BRUNAIDARUSALAM) AS BRUNAIDARUSALAM, SUM(b.HONGKONG) AS HONGKONG, SUM(b.MALAYSIA) AS MALAYSIA, SUM(b.OMAN) AS OMAN, SUM(b.QATAR) AS QATAR, SUM(b.SAUDIARABIA) AS SAUDIARABIA, SUM(b.SINGAPURA) AS SINGAPURA, SUM(b.TAIWAN) AS TAIWAN, SUM(b.UNIEMIRATESARAB) AS UNIEMIRATESARAB, SUM(b.JEPANG) AS JEPANG, SUM(b.KOREASELATAN) AS KOREASELATAN, SUM(b.NIGERIA) AS NIGERIA, SUM(b.KUWAIT) AS KUWAIT, SUM(b.VIETNAM) AS VIETNAM FROM
		(SELECT a.negara_penempatan,a.portal_id,a.tahun_perencanaan,
		(CASE WHEN a.negara_penempatan='ALJAZAIR' THEN JJK ELSE 0 END) AS ALJAZAIR,
		(CASE WHEN a.negara_penempatan='BAHRAIN' THEN JJK ELSE 0 END) AS BAHRAIN,
		(CASE WHEN a.negara_penempatan='BRUNAI DARUSALAM' THEN JJK ELSE 0 END) AS BRUNAIDARUSALAM,
		(CASE WHEN a.negara_penempatan='HONGKONG' THEN JJK ELSE 0 END) AS HONGKONG,
		(CASE WHEN a.negara_penempatan='MALAYSIA' THEN JJK ELSE 0 END) AS MALAYSIA,
		(CASE WHEN a.negara_penempatan='OMAN' THEN JJK ELSE 0 END) AS OMAN,
		(CASE WHEN a.negara_penempatan='QATAR' THEN JJK ELSE 0 END) AS QATAR,
		(CASE WHEN a.negara_penempatan='SAUDI ARABIA' THEN JJK ELSE 0 END) AS SAUDIARABIA,
		(CASE WHEN a.negara_penempatan='SINGAPURA' THEN JJK ELSE 0 END) AS SINGAPURA,
		(CASE WHEN a.negara_penempatan='TAIWAN' THEN JJK ELSE 0 END) AS TAIWAN,
		(CASE WHEN a.negara_penempatan='UNI EMIRATES ARAB' THEN JJK ELSE 0 END) AS UNIEMIRATESARAB,
		(CASE WHEN a.negara_penempatan='JEPANG' THEN JJK ELSE 0 END) AS JEPANG,
		(CASE WHEN a.negara_penempatan='KOREA SELATAN' THEN JJK ELSE 0 END) AS KOREASELATAN,
		(CASE WHEN a.negara_penempatan='NIGERIA' THEN JJK ELSE 0 END) AS NIGERIA,
		(CASE WHEN a.negara_penempatan='KUWAIT' THEN JJK ELSE 0 END) AS KUWAIT,
		(CASE WHEN a.negara_penempatan='VIETNAM' THEN JJK ELSE 0 END) AS VIETNAM
		FROM
		(SELECT negara_penempatan, portal.portal_id, portal.tahun_perencanaan, COUNT(negara_penempatan) AS JJK FROM pmi_kasus INNER JOIN portal ON pmi_kasus.portal_id=portal.portal_id GROUP BY negara_penempatan, portal.portal_id) a
		WHERE a.JJK>0) b
		GROUP BY b.portal_id ");
		return $sql->result();
	}

	public function tka($id =null)
	{
		$this->db->select('tka.*, COUNT(nama_tka) as nama_tka, portal.tahun_perencanaan');
		$this->db->from('tka');
		$this->db->join('portal', 'tka.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('tka.portal_id', $id);
		}
		$this->db->order_by('tka_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tka_perusahaan($id =null)
	{
		$this->db->select('tka.*, COUNT(nama_tka) as nama_tka, perusahaan.nama_perusahaan');
		$this->db->from('tka');
		$this->db->join('perusahaan', 'tka.perusahaan_id = perusahaan.perusahaan_id', 'left');
		if($id !=null) {
			$this->db->where('tka_id', $id);
		}
		$this->db->order_by('tka_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function perusahaan($id =null)
	{
		$this->db->select('perusahaan.*, COUNT(nama_perusahaan) as nama_perusahaan, portal.tahun_perencanaan');
		$this->db->from('perusahaan');
		$this->db->join('portal', 'perusahaan.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('perusahaan_id', $id);
		}
		$this->db->order_by('perusahaan_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function umk($id =null)
	{
		$this->db->select('umk.*, portal.tahun_perencanaan');
		$this->db->from('umk');
		$this->db->join('portal', 'umk.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function spsb($id =null)
	{
		$this->db->select('spsb.*, portal.tahun_perencanaan');
		$this->db->from('spsb');
		$this->db->join('portal', 'spsb.portal_id = portal.portal_id', 'left');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function pnp_trans()
	{
		$sql = $this->db->query(" SELECT b.portal_id, b.tahun_perencanaan, SUM(b.KK) AS KK FROM
		(SELECT a.hub_kel,a.portal_id,a.tahun_perencanaan,
		(CASE WHEN a.hub_kel='Kepala Keluarga' THEN JJK ELSE 0 END) AS KK
		FROM
		(SELECT hub_kel, portal.portal_id, portal.tahun_perencanaan, COUNT(hub_kel) AS JJK FROM pnp_trans INNER JOIN portal ON pnp_trans.portal_id=portal.portal_id GROUP BY hub_kel, portal.portal_id) a
		WHERE a.JJK>0) b
		GROUP BY b.portal_id ");
		return $sql->result();
	}	

	public function translok()
    {
    	$this->db->select('*');
    	$this->db->from('translok');
    	$this->db->order_by('upt', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Dashboard_m.php */
/* Location: ./application/models/Dashboard_m.php */