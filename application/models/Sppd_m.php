<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd_m extends CI_Model {

	public function get($id=null)
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
			$this->db->where('sppd.portal_id', $id);
		}
		$this->db->order_by('sppd.portal_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($sppd_id)
	{
		$this->db->select('sppd.*, st.maksud, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek');
		$this->db->from('sppd');
		$this->db->join('st', 'sppd.st_id = st.st_id', 'left');
		$this->db->join('belanja', 'sppd.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('kecamatan', 'sppd.kecamatan_id = kecamatan.kecamatan_id', 'left');
		$this->db->join('provinsi', 'sppd.provinsi_id = provinsi.provinsi_id', 'left');
		$this->db->where('sppd_id', $sppd_id);
		$this->db->order_by('sppd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function getbelanja($id = null)
	{
		$this->db->select('belanja.*, subkeg.nama_subkeg, subkeg.pagu_subkeg, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek');
		$this->db->from('belanja');
		$this->db->join('dpa', 'belanja.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		if($id !=null) {
			$this->db->where('belanja.portal_id', $id);
		}
		$this->db->order_by('sub_rincian_objek.kode_sub_rincian_objek', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function getdpa($id=null)
	{
		$this->db->select('belanja.*, subkeg.nama_subkeg, subkeg.kode_subkeg, kegiatan.kode_kegiatan, program.kode_program');
		$this->db->from('belanja');
		$this->db->join('subkeg', 'belanja.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		if($id !=null) {
			$this->db->where('subkeg.portal_id', $id);
		}
		$this->db->group_by('subkeg.subkeg_id');
		$this->db->order_by('subkeg.subkeg_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$this->db->insert('sppd', $data);
	}

	public function edit($data)
	{
		$this->db->where('sppd_id', $data['sppd_id']);
		$this->db->update('sppd', $data);
	}

	public function del_sppd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('sppd');
    }

	public function cetak($cetak)
	{
		$this->db->select('sppd.*, st.no_st, st.bln_surat, st.maksud, st.alamat, portal.tahun_perencanaan, pegawai.name, pegawai.nip, pangkat.pangkat, golongan.gol, jabatan.name as jabatan_name, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek, subkeg.kode_subkeg, kegiatan.kode_kegiatan, program.kode_program, bidang_urusan.kode as kode_bidang_urusan, urusan.kode as kode_urusan');
		$this->db->from('sppd');
		$this->db->join('st', 'sppd.st_id = st.st_id', 'left');
		$this->db->join('portal', 'sppd.portal_id = portal.portal_id', 'left');
		$this->db->join('ttd_keu', 'sppd.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'st.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id', 'left');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id', 'left');
		$this->db->join('belanja', 'sppd.belanja_id = belanja.belanja_id', 'left');
		$this->db->join('dpa', 'belanja.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id','LEFT');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
		$this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
		$this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
		$this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
		$this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
		$this->db->where('sppd.st_id', $cetak);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_ttd_keu($id = null)
    {
        $this->db->select('sppd.*, pegawai.name as ttd_keu_name, pegawai.nip as ttd_keu_nip, pangkat.pangkat, golongan.gol, ttd_keu.jabatan_ttd_keu');
		$this->db->from('sppd');
		$this->db->join('ttd_keu', 'sppd.ttd_keu_id = ttd_keu.ttd_keu_id', 'left');
		$this->db->join('pegawai', 'ttd_keu.pegawai_id = pegawai.pegawai_id');
		$this->db->join('golongan', 'pegawai.golongan_id = golongan.golongan_id');
		$this->db->join('pangkat', 'golongan.pangkat_id = pangkat.pangkat_id', 'left');
		$this->db->join('jabatan', 'pegawai.jabatan_id = jabatan.jabatan_id');
		if($id !=null) {
			$this->db->where('sppd.st_id', $id);
		}
		$this->db->order_by('sppd.st_id');
		$query = $this->db->get();
		return $query->row();
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
			$this->db->where('pengikut.portal_id', $id);
		}
		$this->db->order_by('pengikut.st_id');
		$query = $this->db->get();
		return $query->result();
    }
}

/* End of file Sppd_m.php */
/* Location: ./application/models/Sppd_m.php */