<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pk_kabid extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pk_kabid_m','sasaran_m','pegawai_m','program_m','kegiatan_m','pk_kadis_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pk_kabid = $this->pk_kabid_m->get($portal_id);
		
		$data = array(	'pk_kabid'	=>	$pk_kabid
					);

		$this->template->load('template', 'penganggaran/pk/kabid/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis = $this->pk_kadis_m->get($portal_id);
		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('bidang', 'Nama Bidang', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'pk_kadis'	=>	$pk_kadis,
						'pegawai'	=>	$pegawai
					);
		$this->template->load('template', 'penganggaran/pk/kabid/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'bidang'				=>	$i->post('bidang'),
							'pk_kadis_id'			=>	$i->post('pk_kadis_id'),
							'nama_pihak_pertama'	=>	$i->post('nama_pihak_pertama'),
							'jabatan_pihak_pertama'	=>	$i->post('jabatan_pihak_pertama')
							// 'nama_pihak_kedua'		=>	$i->post('nama_pihak_kedua'),
							// 'jabatan_pihak_kedua'	=>	$i->post('jabatan_pihak_kedua'),
							// 'tanggal_pk'			=>	$i->post('tanggal_pk')
						);

			$this->pk_kabid_m->add($data);
			$this->session->set_flashdata('success', 'Data Perjanjian Kerja Esselon III telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kabid'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pk_kabid_id)
	{
		$portal_id = $this->uri->segment(2);

		$pk_kabid_id = $this->uri->segment(5);
		$pk_kabid 	= $this->pk_kabid_m->detail($pk_kabid_id);
		$pk_kadis = $this->pk_kadis_m->get($portal_id);
		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_pihak_pertama', 'Nama Pihak Pertama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'pk_kabid'	=>	$pk_kabid,
						'pegawai'	=>	$pegawai,
						'pk_kadis'	=>	$pk_kadis
					);
		$this->template->load('template', 'penganggaran/pk/kabid/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pk_kabid_id'			=>	$pk_kabid_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'bidang'				=>	$i->post('bidang'),
							'pk_kadis_id'			=>	$i->post('pk_kadis_id'),
							'nama_pihak_pertama'	=>	$i->post('nama_pihak_pertama'),
							'jabatan_pihak_pertama'	=>	$i->post('jabatan_pihak_pertama')
							// 'nama_pihak_kedua'		=>	$i->post('nama_pihak_kedua'),
							// 'jabatan_pihak_kedua'	=>	$i->post('jabatan_pihak_kedua'),
							// 'tanggal_pk'			=>	$i->post('tanggal_pk')
						);

			$this->pk_kabid_m->edit($data);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Esselon III Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kabid'), 'refresh');
		// end masuk database
		}
	}

	public function del()
	{
		$pk_kabid_id = $this->input->post('pk_kabid_id');
		$this->pk_kabid_m->del(['pk_kabid_id' => $pk_kabid_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Esselon III Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function lampiran()
	{
		$pk_kabid_id = $this->uri->segment(4);
		$lampiran = $this->pk_kabid_m->lampiran_get($pk_kabid_id);
		
		$data = array(	'lampiran'	=>	$lampiran
					);

		$this->template->load('template', 'penganggaran/pk/kabid/lampiran/data', $data);
	}

	public function lampiran_add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid_id = $this->uri->segment(4);

		$program = $this->program_m->get();
		$indikator_program = $this->program_m->getindikatorprogram();

		$kegiatan = $this->kegiatan_m->get();
		$indikator_kegiatan = $this->kegiatan_m->getindikatorkegiatan();

		$valid = $this->form_validation;

		$valid->set_rules('target_tahunan', 'Target Tahunan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=>	'add',
						'program'				=>	$program,
						'indikator_program'		=>	$indikator_program,
						'kegiatan'				=>	$kegiatan,
						'indikator_kegiatan'	=>	$indikator_kegiatan
					);
		$this->template->load('template', 'penganggaran/pk/kabid/lampiran/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'pk_kabid_id'			=>	$pk_kabid_id,
							'indikator_program_id'	=>	$i->post('indikator_program_id'),
							'indikator_kegiatan_id'	=>	$i->post('indikator_kegiatan_id'),
							'target_tahunan'		=>	$i->post('target_tahunan'),
							'triwulan_1'			=>	$i->post('triwulan_1'),
							'triwulan_2'			=>	$i->post('triwulan_2'),
							'triwulan_3'			=>	$i->post('triwulan_3'),
							'triwulan_4'			=>	$i->post('triwulan_4')
						);

			$this->pk_kabid_m->lampiran_add($data);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Esselon III telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran'), 'refresh');
		// end masuk database
		}
	}

	public function lampiran_edit()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid_id = $this->uri->segment(4);

		$program = $this->program_m->get();
		$indikator_program = $this->program_m->getindikatorprogram();

		$kegiatan = $this->kegiatan_m->get();
		$indikator_kegiatan = $this->kegiatan_m->getindikatorkegiatan();

		$lampiran_pk_kabid_id = $this->uri->segment(6);
		$lampiran_pk_kabid 	= $this->pk_kabid_m->lampiran_detail($lampiran_pk_kabid_id);

		$valid = $this->form_validation;

		$valid->set_rules('target_tahunan', 'Target Tahunan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=>	'edit',
						'program'				=>	$program,
						'indikator_program'		=>	$indikator_program,
						'kegiatan'				=>	$kegiatan,
						'indikator_kegiatan'	=>	$indikator_kegiatan,
						'lampiran_pk_kabid'		=>	$lampiran_pk_kabid
					);
		$this->template->load('template', 'penganggaran/pk/kabid/lampiran/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'lampiran_pk_kabid_id'	=>	$lampiran_pk_kabid_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'pk_kabid_id'			=>	$pk_kabid_id,
							'indikator_program_id'	=>	$i->post('indikator_program_id'),
							'indikator_kegiatan_id'	=>	$i->post('indikator_kegiatan_id'),
							'target_tahunan'		=>	$i->post('target_tahunan'),
							'triwulan_1'			=>	$i->post('triwulan_1'),
							'triwulan_2'			=>	$i->post('triwulan_2'),
							'triwulan_3'			=>	$i->post('triwulan_3'),
							'triwulan_4'			=>	$i->post('triwulan_4')
						);

			$this->pk_kabid_m->lampiran_edit($data);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Esselon III telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran'), 'refresh');
		// end masuk database
		}
	}

	public function lampiran_del()
	{
		$lampiran_pk_kabid_id = $this->input->post('lampiran_pk_kabid_id');
		$this->pk_kabid_m->lampiran_del(['lampiran_pk_kabid_id' => $lampiran_pk_kabid_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Esselon III Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function program_pk_kabid()
	{
		$lampiran_pk_kabid_id = $this->uri->segment(6);
		$program_pk_kabid = $this->pk_kabid_m->program_pk_kabid_get($lampiran_pk_kabid_id);
		
		$data = array(	'program_pk_kabid'	=>	$program_pk_kabid
					);

		$this->template->load('template', 'penganggaran/pk/kabid/program/data', $data);
	}

	public function program_pk_kabid_add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid_id = $this->uri->segment(4);
		$lampiran_pk_kabid_id = $this->uri->segment(6);

		$program_pk_kadis = $this->pk_kadis_m->program_pk_kadis_join($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add',
						'program_pk_kadis'	=>	$program_pk_kadis
					);
		$this->template->load('template', 'penganggaran/pk/kabid/program/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),
							'lampiran_pk_kabid_id'		=>	$lampiran_pk_kabid_id,
							'program_pk_kadis_id'		=>	$i->post('program_pk_kadis_id')
						);

			$this->pk_kabid_m->program_pk_kabid_add($data);
			$this->session->set_flashdata('success', 'Data Program Perjanjian Kinerja Esselon III telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kabid'), 'refresh');
		// end masuk database
		}
	}

	public function program_pk_kabid_edit()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid_id = $this->uri->segment(4);
		$lampiran_pk_kabid_id = $this->uri->segment(6);

		$program_pk_kadis = $this->pk_kadis_m->program_pk_kadis_join($portal_id);

		$program_pk_kabid_id = $this->uri->segment(8);
		$program_pk_kabid 	= $this->pk_kabid_m->program_detail($program_pk_kabid_id);

		$valid = $this->form_validation;

		$valid->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'edit',
						'program_pk_kadis'	=>	$program_pk_kadis,
						'program_pk_kabid'	=>	$program_pk_kabid
					);
		$this->template->load('template', 'penganggaran/pk/kabid/program/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'program_pk_kabid_id'		=>	$program_pk_kabid_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),
							'lampiran_pk_kabid_id'		=>	$lampiran_pk_kabid_id,
							'program_pk_kadis_id'		=>	$i->post('program_pk_kadis_id')
						);

			$this->pk_kabid_m->program_pk_kabid_edit($data);
			$this->session->set_flashdata('success', 'Data Program Perjanjian Kinerja Esselon III telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kabid/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kabid'), 'refresh');
		// end masuk database
		}
	}

	public function program_pk_kabid_del()
	{
		$program_pk_kabid_id = $this->input->post('program_pk_kabid_id');
		$this->pk_kabid_m->program_pk_kabid_del(['program_pk_kabid_id' => $program_pk_kabid_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Program Perjanjian Kinerja Esselon III Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($pk_kabid_id)
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid_id = $this->uri->segment(5);

		$pk_kabid = $this->pk_kabid_m->cetak($pk_kabid_id);
		
		$data = array(	'pk_kabid'	=> $pk_kabid
					);
		$this->load->view('penganggaran/pk/kabid/cetak', $data, FALSE);
	}

	public function cetak_lampiran($pk_kabid_id)
	{
		$portal_id = $this->uri->segment(2);
		$pk_kabid_id = $this->uri->segment(5);

		$pk_kabid = $this->pk_kabid_m->cetak($pk_kabid_id);
		$lampiran_pk_kabid = $this->pk_kabid_m->lampiran_get($pk_kabid_id);
		$program_pk_kabid = $this->pk_kabid_m->cetak_program_pk_kabid($portal_id);
		$jumlah_pagu_anggaran = $this->pk_kabid_m->jumlah_pagu_anggaran($portal_id);

		$data = array(	'pk_kabid'				=> 	$pk_kabid,
						'lampiran_pk_kabid'		=>	$lampiran_pk_kabid,
						'program_pk_kabid'		=>	$program_pk_kabid,
						'jumlah_pagu_anggaran'	=>	$jumlah_pagu_anggaran
					);
		$this->load->view('penganggaran/pk/kabid/cetak_lampiran', $data, FALSE);
	}
}