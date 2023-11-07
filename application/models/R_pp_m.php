<?php defined('BASEPATH') OR exit('No direct script access allowed');

class R_pp_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('r_pp.*, a_belanja.nama_rek, a_belanja.kode_rek, rekening.rek_bank, sppd.tempat_berangkat, rekening.nama_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		if($id !=null) {
			$this->db->where('r_pp.pp_id', $id);
		}
		$this->db->order_by('r_pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function getc($id=null)
	{
		$this->db->select('r_pp.*, a_belanja.nama_rek, a_belanja.kode_rek, rekening.rek_bank, sppd.tempat_berangkat, rekening.nama_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		if($id !=null) {
			$this->db->where('r_pp.pp_id', $id);
		}
		$this->db->order_by('r_pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($r_pp_id)
	{
		$this->db->select('r_pp.*,  a_belanja.nama_rek, sppd.tempat_tujuan, rekening.rek_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->where('r_pp_id', $r_pp_id);
		$this->db->order_by('r_pp_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function get_bel($id=null)
	{
		$this->db->select('r_pp.*,  a_belanja.nama_rek, sppd.tempat_tujuan, sppd.tempat_berangkat, rekening.rek_bank, rekening.nama_pemilik');
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

	public function getpel($id=null)
	{
		$this->db->select('sppd.*, st.maksud, pegawai.name, pegawai.nip, golongan.gol, pangkat.pangkat, jabatan.name as jabatan, ttd_keu.jabatan_ttd_keu');
		$this->db->from('sppd');
		$this->db->join('st', 'sppd.st_id = st.st_id', 'left');
		$this->db->join('ttd_keu', 'sppd.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		if($id !=null) {
			$this->db->where('sppd.sppd_id', $id);
		}
		$this->db->order_by('sppd.sppd_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

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
		if($id !=null) {
			$this->db->where('sppd.sppd_id', $id);
		}
		$this->db->order_by('sppd.sppd_id');
		$query = $this->db->get();
		return $query->result();
    }

	public function getbelanja($id=null)
	{
		$this->db->select('belanja.*, a_belanja.nama_rek, a_belanja.kode_rek, subkeg.nama_subkeg, subkeg.kode_subkeg, kegiatan.kode_kegiatan, program.kode_program');
		$this->db->from('belanja');
		$this->db->join('dpa', 'belanja.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('pp', 'pp.dpa_id = dpa.dpa_id', 'left');
		if($id !=null) {
			$this->db->where('pp.pp_id', $id);
		}
		$this->db->order_by('pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function getdpa($id=null)
	{
		$this->db->select('pp.*, subkeg.nama_subkeg, subkeg.kode_subkeg, kegiatan.nama_kegiatan, kegiatan.kode_kegiatan, program.kode_program');
		$this->db->from('pp');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		if($id !=null) {
			$this->db->where('pp.pp_id', $id);
		}
		$this->db->order_by('pp.pp_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function getsppd($id=null)
	{
		$this->db->select('sppd.*, pegawai.name as ttd_keu_name, pegawai.nip as ttd_keu_nip, ttd_keu.jabatan_ttd_keu, sppd.tempat_berangkat');
		$this->db->from('sppd');
		$this->db->join('ttd_keu', 'sppd.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		if($id !=null) {
			$this->db->where('sppd_id', $id);
		}
		$this->db->order_by('sppd_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function getkwitansi($id=null)
	{
		$this->db->select('r_pp.*, a_belanja.nama_rek, a_belanja.kode_rek, rekening.rek_bank, sppd.tempat_berangkat, rekening.nama_bank, rekening.nama_pemilik');
		$this->db->from('r_pp');
		$this->db->join('belanja', 'r_pp.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('a_belanja', 'belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		if($id !=null) {
			$this->db->where('r_pp.portal_id', $id);
		}
		$this->db->order_by('r_pp.portal_id', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$this->db->insert('r_pp', $data);
	}

	public function edit($data)
	{
		$this->db->where('r_pp_id', $data['r_pp_id']);
		$this->db->update('r_pp', $data);
	}

	public function del_r_pp($data)
	{
		$this->db->where('r_pp_id', $data['r_pp_id']);
		$this->db->delete('r_pp', $data);
	}

	// public function cetak($date)
	// {
	// 	$this->db->select('pp.*, renstra.k_urusan, program.nama_program, program.kode_rek as kode_rek_program, kegiatan.nama_kegiatan, kegiatan.kode_rek as kode_rek_kegiatan, subkeg.nama_subkeg, subkeg.kode_rek as kode_rek_subkeg, a_belanja.nama_rek, a_belanja.kode_rek as kode_rek_belanja, rekening.nama_pemilik, rekening.rek_bank, rekening.nama_bank, sppd.tempat_berangkat');
	// 	$this->db->from('pp');
	// 	$this->db->join('r_belanja', 'pp.r_belanja_id = r_belanja.r_belanja_id', 'left');
	// 	$this->db->join('a_belanja', 'r_belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
	// 	$this->db->join('dpa', 'r_belanja.dpa_id = dpa.dpa_id', 'left');
	// 	$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
	// 	$this->db->join('kegiatan', 'subkeg.kegiatan_id= kegiatan.kegiatan_id', 'left');
	// 	$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
	// 	$this->db->join('renstra', 'program.renstra_id = renstra.renstra_id', 'left');
	// 	$this->db->join('rekening', 'pp.rekening_id = rekening.rekening_id', 'left');
	// 	$this->db->join('sppd', 'pp.sppd_id = sppd.sppd_id', 'left');
	// 	$this->db->join('st', 'pp.st_id = st.st_id', 'left');
	// 	$this->db->where('DATE(tgl_pp)', $date);
 //    	$query = $this->db->get();
 //    	return $query;
 //  	}

	public function getpp($id=null)
	{
		$this->db->select('pp.*, pegawai.name as ttd_keu_name, ttd_keu.jabatan_ttd_keu, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, program.kode_program, program.nama_program, kegiatan.kode_kegiatan, kegiatan.nama_kegiatan, subkeg.kode_subkeg, subkeg.nama_subkeg');
		$this->db->from('pp');
		$this->db->join('r_pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id= kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		if($id !=null) {
			$this->db->where('r_pp.pp_id', $id);
		}
		$this->db->order_by('r_pp.pp_id', 'desc');
		$this->db->group_by('r_pp.pp_id');
    	$query = $this->db->get();
    	return $query;
  	}

  	public function filter($date)
	{
		$this->db->select('r_pp.*, pegawai.name as ttd_keu_name, ttd_keu.jabatan_ttd_keu, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, renstra.k_urusan, program.kode_rek as kode_rek_program, program.nama_program, kegiatan.kode_rek as kode_rek_kegiatan, kegiatan.nama_kegiatan, subkeg.kode_rek as kode_rek_subkeg, subkeg.nama_subkeg, a_belanja.nama_rek, a_belanja.kode_rek as kode_rek_belanja, sppd.tempat_tujuan, sppd.tempat_berangkat, rekening.rek_bank, rekening.nama_pemilik, rekening.nama_bank');
		$this->db->from('r_pp');
		$this->db->join('pp', 'r_pp.pp_id = pp.pp_id', 'left');
		$this->db->join('r_belanja', 'r_pp.r_belanja_id = r_belanja.r_belanja_id', 'left');
		$this->db->join('a_belanja', 'r_belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('ttd_keu', 'pp.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('sppd', 'r_pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('rekening', 'r_pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd_keu.pegawai_id');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id');
		$this->db->join('dpa', 'pp.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id= kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('renstra', 'program.renstra_id = renstra.renstra_id', 'left');
		$this->db->where('DATE(tanggal)', $date);
    	$query = $this->db->get();
    	return $query;

  	}
}