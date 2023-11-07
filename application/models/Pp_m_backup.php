<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pp_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*, program.nama_program, rekening.nama_pemilik, rekening.rek_bank, rekening.nama_bank, kegiatan.nama_kegiatan, subkeg.nama_subkeg, subkeg.kode_rek');
		$this->db->from('pp');
		$this->db->join('subkeg', 'pp.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('rekening', 'pp.rekening_id = rekening.rekening_id', 'left');
		if($id !=null) {
			$this->db->where('pp_id', $id);
		}
		// $this->db->group_by('rekening_id');
		$this->db->order_by('pp_id', 'asc');
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
		// $params = [
		// 	'belanja_id'		=>	$post['belanja_id'],
		// 	'st_id'				=>	$post['st_id'],
		// 	'name'				=>	$post['name'],
		// 	'rekening_id'		=>	$post['rekening_id'],
		// 	'sppd_id'			=>	$post['sppd_id'],
		// 	'uraian'			=>	$post['uraian'],
		// 	'dd_id'				=>	$post['dd_id'],
		// 	'ld_id'				=>	$post['ld_id'],
		// 	'biaya'				=>	$post['biaya'],
		// 	'lama_perjalanan'	=>	$post['lama_perjalanan'],
		// 	'bruto'				=>	($post['biaya'] * $post['lama_perjalanan']),
		// 	'pajak'				=>	$post['pajak'],
		// 	'persen'			=>	'100',
		// 	'jumlah'			=>	($post['bruto'] / $post['persen'] * $post['pajak']),
		// 	'neto'				=>	($post['bruto'] - $post['jumlah']),
		// 	'total'				=>	$post['neto'],
		// 	'tgl_pp'			=>	$post['tgl_pp'],
		// ];
		$this->db->insert('pp', $data);
	}

	public function edit($post)
	{
		$params = [
			'nama_prog'		=>	$post['nama_prog'],
			'nama_keg'		=>	$post['nama_keg'],
			'nama_belanja'	=>	$post['nama_belanja'],
			'kode_rek'		=>	$post['kode_rek'],
		];
		$this->db->where('pp_id', $post['id']);
		$this->db->update('pp', $params);
	}

	public function del($id)
	{
		$this->db->where('pp_id', $id);
		$this->db->delete('pp');
	}

	public function ttd_pp($pp_id)
	{
		$this->db->select('ttd_pp.*, pegawai.name AS ttd_name, ttd.jabatan_ttd');
		$this->db->from('ttd_pp');
		$this->db->join('ttd', 'ttd.ttd_id = ttd_pp.ttd_id', 'left');
		$this->db->join('pegawai', 'pegawai.pegawai_id = ttd.pegawai_id', 'left');
		$this->db->join('golongan', 'golongan.golongan_id = pegawai.golongan_id', 'left');
		$this->db->join('jabatan', 'jabatan.jabatan_id = pegawai.jabatan_id', 'left');
		$this->db->where('pp_id', $pp_id);
		$this->db->order_by('ttd_pp_id');
		$query = $this->db->get();
		return $query->result();
	}

	// tambah penandatangan
	public function tambah_ttd_pp($data)
	{
		$this->db->insert('ttd_pp', $data);
	}

	// delete penandatangan
	public function delete_ttd_pp($data)
	{
		$this->db->where('ttd_pp_id', $data['ttd_pp_id']);
		$this->db->delete('ttd_pp', $data);
	}

	public function filter($date)
	{
		$this->db->select('pp.*,pp.subkeg_id, pp.tgl_pp, pp.pajak, pp.biaya, pp.lama_perjalanan, (pp.bruto/100*pp.pajak) as h_pajak, program.nama_program, kegiatan.nama_kegiatan, subkeg.nama_subkeg, subkeg.kode_rek, rekening.nama_pemilik, rekening.rek_bank, rekening.nama_bank, sppd.tempat_berangkat, ttd_sppd.pa_kpa, pegawai.name AS ttd_name, pegawai.nip AS ttd_nip');
		$this->db->from('pp');
		$this->db->join('subkeg', 'pp.subkeg_id = subkeg.subkeg_id', 'left');
		$this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		$this->db->join('rekening', 'pp.rekening_id = rekening.rekening_id', 'left');
		$this->db->join('sppd', 'pp.sppd_id = sppd.sppd_id', 'left');
		$this->db->join('st', 'pp.st_id = st.st_id', 'left');
		$this->db->join('ttd_sppd', 'st.st_id = ttd_sppd.st_id', 'left');
		$this->db->join('ttd', 'ttd_sppd.ttd_id = ttd.ttd_id', 'left');
		$this->db->join('pegawai', 'ttd.pegawai_id = pegawai.pegawai_id', 'left');
		$this->db->where('DATE(tgl_pp)', $date);
    	return $this->db->get()->result();
  	}
}