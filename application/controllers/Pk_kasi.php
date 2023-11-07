<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pk_kasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pk_kasi_m','sasaran_m','pegawai_m','program_m','kegiatan_m','subkeg_m','pk_kadis_m','pk_kabid_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pk_kasi = $this->pk_kasi_m->get($portal_id);
		
		$data = array(	'pk_kasi'	=>	$pk_kasi
					);

		$this->template->load('template', 'penganggaran/pk/kasi/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid = $this->pk_kabid_m->get($portal_id);
		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('sub_bidang', 'Nama Sub Bidang', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'pk_kabid'	=>	$pk_kabid,
						'pegawai'	=>	$pegawai
					);
		$this->template->load('template', 'penganggaran/pk/kasi/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'sub_bidang'			=>	$i->post('sub_bidang'),
							'pk_kabid_id'			=>	$i->post('pk_kabid_id'),
							'nama_pihak_pertama'	=>	$i->post('nama_pihak_pertama'),
							'jabatan_pihak_pertama'	=>	$i->post('jabatan_pihak_pertama')
							// 'nama_pihak_kedua'		=>	$i->post('nama_pihak_kedua'),
							// 'jabatan_pihak_kedua'	=>	$i->post('jabatan_pihak_kedua'),
							// 'tanggal_pk'			=>	$i->post('tanggal_pk')
						);

			$this->pk_kasi_m->add($data);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Esselon IV telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kasi'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pk_kasi_id)
	{
		$portal_id = $this->uri->segment(2);

		$pk_kasi_id = $this->uri->segment(5);
		$pk_kasi 	= $this->pk_kasi_m->detail($pk_kasi_id);
		$pk_kabid = $this->pk_kabid_m->get($portal_id);
		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_pihak_pertama', 'Nama Pihak Pertama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'pk_kasi'	=>	$pk_kasi,
						'pegawai'	=>	$pegawai,
						'pk_kabid'	=>	$pk_kabid
					);
		$this->template->load('template', 'penganggaran/pk/kasi/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pk_kasi_id'			=>	$pk_kasi_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'sub_bidang'			=>	$i->post('sub_bidang'),
							'pk_kabid_id'			=>	$i->post('pk_kabid_id'),
							'nama_pihak_pertama'	=>	$i->post('nama_pihak_pertama'),
							'jabatan_pihak_pertama'	=>	$i->post('jabatan_pihak_pertama')
							// 'nama_pihak_kedua'		=>	$i->post('nama_pihak_kedua'),
							// 'jabatan_pihak_kedua'	=>	$i->post('jabatan_pihak_kedua'),
							// 'tanggal_pk'			=>	$i->post('tanggal_pk')
						);

			$this->pk_kasi_m->edit($data);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Esselon IV Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kasi'), 'refresh');
		// end masuk database
		}
	}

	public function del()
	{
		$pk_kasi_id = $this->input->post('pk_kasi_id');
		$this->pk_kasi_m->del(['pk_kasi_id' => $pk_kasi_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Esselon IV Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function lampiran()
	{
		$pk_kasi_id = $this->uri->segment(4);
		$lampiran = $this->pk_kasi_m->lampiran_get($pk_kasi_id);
		
		$data = array(	'lampiran'	=>	$lampiran
					);

		$this->template->load('template', 'penganggaran/pk/kasi/lampiran/data', $data);
	}

	public function lampiran_add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kasi_id = $this->uri->segment(4);

		$kegiatan = $this->kegiatan_m->get();
		$indikator_kegiatan = $this->kegiatan_m->getindikatorkegiatan();

		$subkeg = $this->subkeg_m->get();
		$indikator_subkeg = $this->subkeg_m->getindikatorsubkeg();

		$valid = $this->form_validation;

		$valid->set_rules('target_tahunan', 'Target Tahunan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=>	'add',
						'kegiatan'				=>	$kegiatan,
						'indikator_kegiatan'	=>	$indikator_kegiatan,
						'subkeg'				=>	$subkeg,
						'indikator_subkeg'		=>	$indikator_subkeg
					);
		$this->template->load('template', 'penganggaran/pk/kasi/lampiran/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'pk_kasi_id'			=>	$pk_kasi_id,
							'indikator_kegiatan_id'	=>	$i->post('indikator_kegiatan_id'),
							'indikator_subkeg_id'	=>	$i->post('indikator_subkeg_id'),
							'target_tahunan'		=>	$i->post('target_tahunan'),
							'triwulan_1'			=>	$i->post('triwulan_1'),
							'triwulan_2'			=>	$i->post('triwulan_2'),
							'triwulan_3'			=>	$i->post('triwulan_3'),
							'triwulan_4'			=>	$i->post('triwulan_4')
						);

			$this->pk_kasi_m->lampiran_add($data);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Esselon IV telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran'), 'refresh');
		// end masuk database
		}
	}

	public function lampiran_edit()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kasi_id = $this->uri->segment(4);

		$kegiatan = $this->kegiatan_m->get();
		$indikator_kegiatan = $this->kegiatan_m->getindikatorkegiatan();

		$subkeg = $this->subkeg_m->get();
		$indikator_subkeg = $this->subkeg_m->getindikatorsubkeg();

		$lampiran_pk_kasi_id = $this->uri->segment(6);
		$lampiran_pk_kasi 	= $this->pk_kasi_m->lampiran_detail($lampiran_pk_kasi_id);

		$valid = $this->form_validation;

		$valid->set_rules('target_tahunan', 'Target Tahunan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=>	'edit',
						'kegiatan'				=>	$kegiatan,
						'indikator_kegiatan'	=>	$indikator_kegiatan,
						'subkeg'				=>	$subkeg,
						'indikator_subkeg'		=>	$indikator_subkeg,
						'lampiran_pk_kasi'		=>	$lampiran_pk_kasi
					);
		$this->template->load('template', 'penganggaran/pk/kasi/lampiran/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'lampiran_pk_kasi_id'	=>	$lampiran_pk_kasi_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'pk_kasi_id'			=>	$pk_kasi_id,
							'indikator_kegiatan_id'	=>	$i->post('indikator_kegiatan_id'),
							'indikator_subkeg_id'	=>	$i->post('indikator_subkeg_id'),
							'target_tahunan'		=>	$i->post('target_tahunan'),
							'triwulan_1'			=>	$i->post('triwulan_1'),
							'triwulan_2'			=>	$i->post('triwulan_2'),
							'triwulan_3'			=>	$i->post('triwulan_3'),
							'triwulan_4'			=>	$i->post('triwulan_4')
						);

			$this->pk_kasi_m->lampiran_edit($data);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Esselon IV telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran'), 'refresh');
		// end masuk database
		}
	}

	public function lampiran_del()
	{
		$lampiran_pk_kasi_id = $this->input->post('lampiran_pk_kasi_id');
		$this->pk_kasi_m->lampiran_del(['lampiran_pk_kasi_id' => $lampiran_pk_kasi_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Esselon IV Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function kegiatan_pk_kasi()
	{
		$lampiran_pk_kasi_id = $this->uri->segment(6);
		$kegiatan_pk_kasi = $this->pk_kasi_m->kegiatan_pk_kasi_get($lampiran_pk_kasi_id);
		
		$data = array(	'kegiatan_pk_kasi'	=>	$kegiatan_pk_kasi
					);

		$this->template->load('template', 'penganggaran/pk/kasi/kegiatan/data', $data);
	}

	public function kegiatan_pk_kasi_add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kasi_id = $this->uri->segment(4);
		$lampiran_pk_kasi_id = $this->uri->segment(6);

		$kegiatan = $this->kegiatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'kegiatan'	=>	$kegiatan
					);
		$this->template->load('template', 'penganggaran/pk/kasi/kegiatan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'lampiran_pk_kasi_id'	=>	$lampiran_pk_kasi_id,
							'kegiatan_id'			=>	$i->post('kegiatan_id'),
							'pagu_anggaran'			=>	$i->post('pagu_anggaran')
						);

			$this->pk_kasi_m->kegiatan_pk_kasi_add($data);
			$this->session->set_flashdata('success', 'Data Kegiatan Perjanjian Kinerja Esselon IV telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/kegiatan_pk_kasi'), 'refresh');
		// end masuk database
		}
	}

	public function kegiatan_pk_kasi_edit()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kasi_id = $this->uri->segment(4);
		$lampiran_pk_kasi_id = $this->uri->segment(6);

		$kegiatan = $this->kegiatan_m->get();

		$kegiatan_pk_kasi_id = $this->uri->segment(8);
		$kegiatan_pk_kasi 	= $this->pk_kasi_m->kegiatan_detail($kegiatan_pk_kasi_id);

		$valid = $this->form_validation;

		$valid->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'edit',
						'kegiatan_pk_kasi'	=>	$kegiatan_pk_kasi,
						'kegiatan'			=>	$kegiatan
					);
		$this->template->load('template', 'penganggaran/pk/kasi/kegiatan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kegiatan_pk_kasi_id'	=>	$kegiatan_pk_kasi_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'lampiran_pk_kasi_id'	=>	$lampiran_pk_kasi_id,
							'kegiatan_id'			=>	$i->post('kegiatan_id'),
							'pagu_anggaran'			=>	$i->post('pagu_anggaran')
						);

			$this->pk_kasi_m->kegiatan_pk_kasi_edit($data);
			$this->session->set_flashdata('success', 'Data Kegiatan Perjanjian Kinerja Esselon IV telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/kegiatan_pk_kasi'), 'refresh');
		// end masuk database
		}
	}

	public function kegiatan_pk_kasi_del()
	{
		$kegiatan_pk_kasi_id = $this->input->post('kegiatan_pk_kasi_id');
		$this->pk_kasi_m->kegiatan_pk_kasi_del(['kegiatan_pk_kasi_id' => $kegiatan_pk_kasi_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Kegiatan Perjanjian Kinerja Esselon IV Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($pk_kasi_id)
	{
		$portal_id = $this->uri->segment(2);
		$pk_kasi_id = $this->uri->segment(5);

		$pk_kasi = $this->pk_kasi_m->cetak($pk_kasi_id);
		
		$data = array(	'pk_kasi'	=> $pk_kasi
					);
		$this->load->view('penganggaran/pk/kasi/cetak', $data, FALSE);
	}

	public function cetak_lampiran($pk_kasi_id)
	{
		$portal_id = $this->uri->segment(2);
		$pk_kasi_id = $this->uri->segment(5);

		$pk_kasi = $this->pk_kasi_m->cetak($pk_kasi_id);
		$lampiran_pk_kasi = $this->pk_kasi_m->lampiran_get($pk_kasi_id);
		$kegiatan_pk_kasi = $this->pk_kasi_m->cetak_kegiatan_pk_kasi($portal_id);
		$jumlah_pagu_anggaran = $this->pk_kasi_m->jumlah_pagu_anggaran($portal_id);

		$data = array(	'pk_kasi'				=> 	$pk_kasi,
						'lampiran_pk_kasi'		=>	$lampiran_pk_kasi,
						'kegiatan_pk_kasi'		=>	$kegiatan_pk_kasi,
						'jumlah_pagu_anggaran'	=>	$jumlah_pagu_anggaran
					);
		$this->load->view('penganggaran/pk/kasi/cetak_lampiran', $data, FALSE);
	}
}