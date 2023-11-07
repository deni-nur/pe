<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pk_kadis_perubahan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pk_kadis_perubahan_m','sasaran_m','pegawai_m','program_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pk_kadis_perubahan = $this->pk_kadis_perubahan_m->get($portal_id);
		
		$data = array(	'pk_kadis_perubahan'	=>	$pk_kadis_perubahan
					);

		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_pihak_pertama', 'Nama Pihak Pertama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'pegawai'	=>	$pegawai
					);
		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'nama_pihak_pertama'	=>	$i->post('nama_pihak_pertama'),
							'jabatan_pihak_pertama'	=>	$i->post('jabatan_pihak_pertama'),
							'nama_pihak_kedua'		=>	$i->post('nama_pihak_kedua'),
							'jabatan_pihak_kedua'	=>	$i->post('jabatan_pihak_kedua'),
							'tanggal_pk'			=>	$i->post('tanggal_pk')
						);

			$this->pk_kadis_perubahan_m->add($data);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Perubahan Esselon II telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pk_kadis_perubahan_id)
	{
		$portal_id = $this->uri->segment(2);

		$pk_kadis_perubahan_id = $this->uri->segment(5);
		$pk_kadis_perubahan 	= $this->pk_kadis_perubahan_m->detail($pk_kadis_perubahan_id);
		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_pihak_pertama', 'Nama Pihak Pertama', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=>	'edit',
						'pk_kadis_perubahan'	=>	$pk_kadis_perubahan,
						'pegawai'				=>	$pegawai
					);
		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pk_kadis_perubahan_id'	=>	$pk_kadis_perubahan_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'nama_pihak_pertama'	=>	$i->post('nama_pihak_pertama'),
							'jabatan_pihak_pertama'	=>	$i->post('jabatan_pihak_pertama'),
							'nama_pihak_kedua'		=>	$i->post('nama_pihak_kedua'),
							'jabatan_pihak_kedua'	=>	$i->post('jabatan_pihak_kedua'),
							'tanggal_pk'			=>	$i->post('tanggal_pk')
						);

			$this->pk_kadis_perubahan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Perubahan Esselon II Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan'), 'refresh');
		// end masuk database
		}
	}

	public function del()
	{
		$pk_kadis_perubahan_id = $this->input->post('pk_kadis_perubahan_id');
		$this->pk_kadis_perubahan_m->del(['pk_kadis_perubahan_id' => $pk_kadis_perubahan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Perjanjian Kinerja Perubahan Esselon II Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($pk_kadis_perubahan_id)
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis_perubahan_id = $this->uri->segment(5);

		$pk_kadis_perubahan = $this->pk_kadis_perubahan_m->cetak($pk_kadis_perubahan_id);
		
		$data = array(	'pk_kadis_perubahan'	=> $pk_kadis_perubahan
					);
		$this->load->view('penganggaran/pk_perubahan/kadis/cetak', $data, FALSE);
	}

	public function lampiran()
	{
		$pk_kadis_perubahan_id = $this->uri->segment(4);
		$lampiran = $this->pk_kadis_perubahan_m->lampiran_get($pk_kadis_perubahan_id);
		
		$data = array(	'lampiran'	=>	$lampiran
					);

		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/lampiran/data', $data);
	}

	public function lampiran_add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis_perubahan_id = $this->uri->segment(4);

		$sasaran = $this->sasaran_m->get();
		$indikator_sasaran = $this->sasaran_m->getindikatorsasaran();

		$valid = $this->form_validation;

		$valid->set_rules('target_tahunan', 'Target Tahunan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add',
						'sasaran'			=>	$sasaran,
						'indikator_sasaran'	=>	$indikator_sasaran
					);
		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/lampiran/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'pk_kadis_perubahan_id'	=>	$pk_kadis_perubahan_id,
							'sasaran_id'			=>	$i->post('sasaran_id'),
							'target_tahunan'		=>	$i->post('target_tahunan'),
							'triwulan_1'			=>	$i->post('triwulan_1'),
							'triwulan_2'			=>	$i->post('triwulan_2'),
							'triwulan_3'			=>	$i->post('triwulan_3'),
							'triwulan_4'			=>	$i->post('triwulan_4')
						);

			$this->pk_kadis_perubahan_m->lampiran_add($data);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kerja Perubahan Esselon II telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$this->uri->segment(4).'/lampiran'), 'refresh');
		// end masuk database
		}
	}

	public function lampiran_edit()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis_perubahan_id = $this->uri->segment(4);

		$sasaran = $this->sasaran_m->get();
		$indikator_sasaran = $this->sasaran_m->getindikatorsasaran();

		$lampiran_pk_kadis_perubahan_id = $this->uri->segment(6);
		$lampiran_pk_kadis_perubahan 	= $this->pk_kadis_perubahan_m->lampiran_detail($lampiran_pk_kadis_perubahan_id);

		$valid = $this->form_validation;

		$valid->set_rules('target_tahunan', 'Target Tahunan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'							=>	'add',
						'sasaran'						=>	$sasaran,
						'indikator_sasaran'				=>	$indikator_sasaran,
						'lampiran_pk_kadis_perubahan'	=>	$lampiran_pk_kadis_perubahan
					);
		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/lampiran/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'lampiran_pk_kadis_perubahan_id'	=>	$lampiran_pk_kadis_perubahan_id,
							'portal_id'							=>	$portal_id,
							'user_id'							=>	$this->session->userdata('userid'),
							'pk_kadis_perubahan_id'				=>	$pk_kadis_perubahan_id,
							'sasaran_id'						=>	$i->post('sasaran_id'),
							'target_tahunan'					=>	$i->post('target_tahunan'),
							'triwulan_1'						=>	$i->post('triwulan_1'),
							'triwulan_2'						=>	$i->post('triwulan_2'),
							'triwulan_3'						=>	$i->post('triwulan_3'),
							'triwulan_4'						=>	$i->post('triwulan_4')
						);

			$this->pk_kadis_perubahan_m->lampiran_edit($data);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kerja Perubahan Esselon II telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$this->uri->segment(4).'/lampiran'), 'refresh');
		// end masuk database
		}
	}

	public function lampiran_del()
	{
		$lampiran_pk_kadis_perubahan_id = $this->input->post('lampiran_pk_kadis_perubahan_id');
		$this->pk_kadis_perubahan_m->lampiran_del(['lampiran_pk_kadis_perubahan_id' => $lampiran_pk_kadis_perubahan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Lampiran Perjanjian Kinerja Perubahan Esselon II Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function program_pk_kadis()
	{
		$lampiran_pk_kadis_perubahan_id = $this->uri->segment(6);
		$program_pk_kadis_perubahan = $this->pk_kadis_perubahan_m->program_pk_kadis_perubahan_get($lampiran_pk_kadis_perubahan_id);
		
		$data = array(	'program_pk_kadis_perubahan'	=>	$program_pk_kadis_perubahan
					);

		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/program/data', $data);
	}

	public function program_pk_kadis_add()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis_perubahan_id = $this->uri->segment(4);
		$lampiran_pk_kadis_perubahan_id = $this->uri->segment(6);

		$program = $this->program_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'program'	=>	$program
					);
		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/program/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'							=>	$portal_id,
							'user_id'							=>	$this->session->userdata('userid'),
							'lampiran_pk_kadis_perubahan_id'	=>	$lampiran_pk_kadis_perubahan_id,
							'program_id'						=>	$i->post('program_id'),
							'pagu_anggaran'						=>	$i->post('pagu_anggaran')
						);

			$this->pk_kadis_perubahan_m->program_pk_kadis_perubahan_add($data);
			$this->session->set_flashdata('success', 'Data Program Perjanjian Kerja Perubahan Esselon II telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kadis'), 'refresh');
		// end masuk database
		}
	}

	public function program_pk_kadis_edit()
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis_perubahan_id = $this->uri->segment(4);
		$lampiran_pk_kadis_perubahan_id = $this->uri->segment(6);

		$program = $this->program_m->get();

		$program_pk_kadis_perubahan_id = $this->uri->segment(8);
		$program_pk_kadis_perubahan 	= $this->pk_kadis_perubahan_m->program_detail($program_pk_kadis_perubahan_id);

		$valid = $this->form_validation;

		$valid->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'							=>	'edit',
						'program'						=>	$program,
						'program_pk_kadis_perubahan'	=>	$program_pk_kadis_perubahan
					);
		$this->template->load('template', 'penganggaran/pk_perubahan/kadis/program/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'program_pk_kadis_perubahan_id'	=>	$program_pk_kadis_perubahan_id,
							'portal_id'						=>	$portal_id,
							'user_id'						=>	$this->session->userdata('userid'),
							'lampiran_pk_kadis_perubahan_id'=>	$lampiran_pk_kadis_perubahan_id,
							'program_id'					=>	$i->post('program_id'),
							'pagu_anggaran'					=>	$i->post('pagu_anggaran')
						);

			$this->pk_kadis_perubahan_m->program_pk_kadis_perubahan_edit($data);
			$this->session->set_flashdata('success', 'Data Program Perjanjian Kinerja Perubahan Esselon II telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan/'.$this->uri->segment(4).'/lampiran/'.$this->uri->segment(6).'/program_pk_kadis'), 'refresh');
		// end masuk database
		}
	}

	public function program_pk_kadis_del()
	{
		$program_pk_kadis_perubahan_id = $this->input->post('program_pk_kadis_perubahan_id');
		$this->pk_kadis_perubahan_m->program_pk_kadis_perubahan_del(['program_pk_kadis_perubahan_id' => $program_pk_kadis_perubahan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Program Perjanjian Kinerja Perubahan Esselon II Telah dihapus');
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak_lampiran($pk_kadis_perubahan_id)
	{
		$portal_id = $this->uri->segment(2);
		$pk_kadis_perubahan_id = $this->uri->segment(5);

		$pk_kadis_perubahan = $this->pk_kadis_perubahan_m->cetak($pk_kadis_perubahan_id);
		$lampiran_pk_kadis_perubahan = $this->pk_kadis_perubahan_m->lampiran_get($pk_kadis_perubahan_id);
		$program_pk_kadis = $this->pk_kadis_perubahan_m->cetak_program_pk_kadis($portal_id);
		$jumlah_pagu_anggaran = $this->pk_kadis_perubahan_m->jumlah_pagu_anggaran($portal_id);

		$data = array(	'pk_kadis_perubahan'				=> 	$pk_kadis_perubahan,
						'lampiran_pk_kadis_perubahan'		=>	$lampiran_pk_kadis_perubahan,
						'program_pk_kadis'					=>	$program_pk_kadis,
						'jumlah_pagu_anggaran'				=>	$jumlah_pagu_anggaran
					);
		$this->load->view('penganggaran/pk_perubahan/kadis/cetak_lampiran', $data, FALSE);
	}
}