<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sasaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['tujuan_m','bidang_urusan_m','sasaran_m','sasaran_rpjmd_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan = $this->tujuan_m->get();
		$sasaran = $this->sasaran_m->get();
		$indikator_sasaran = $this->sasaran_m->getindikatorsasaran();

		$data = array(	'bidang_urusan'		=>	$bidang_urusan,
						'tujuan'			=>	$tujuan,
						'sasaran'			=>	$sasaran,
						'indikator_sasaran'	=>	$indikator_sasaran
				);

		$this->template->load('template', 'perencanaan/sasaran/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_sasaran', 'Sasaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'tujuan'		=>	$tujuan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/sasaran/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'tujuan_id'			=>	$i->post('tujuan_id'),
							'uraian_sasaran'	=>	$i->post('uraian_sasaran')
						);

			$this->sasaran_m->add($data);
			$this->session->set_flashdata('success', 'Data Sasaran PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran'), 'refresh');
		// end masuk database
		}
	}

	public function edit($sasaran_id)
	{
		$portal_id = $this->uri->segment(2);

		$sasaran_id = $this->uri->segment(7);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_sasaran', 'Sasaran PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=> 'edit',
						'sasaran'		=> $sasaran,
						'bidang_urusan'	=>	$bidang_urusan,
						'tujuan'		=>	$tujuan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/sasaran/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'sasaran_id'		=> $sasaran_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'tujuan_id'			=>	$i->post('tujuan_id'),
							'uraian_sasaran'	=>	$i->post('uraian_sasaran')
						);

			$this->sasaran_m->edit($data);
			$this->session->set_flashdata('success', 'Data Sasaran PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran'), 'refresh');
		// end masuk database
		}
	}

	public function del_sasaran()
	{
		$sasaran_id = $this->input->post('sasaran_id');
		$this->sasaran_m->del_sasaran(['sasaran_id' => $sasaran_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_sasaran_add()
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_sasaran', 'Indikator Sasaran PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'sasaran'		=>	$sasaran,
						'tujuan'		=>	$tujuan
					);
		$this->template->load('template', 'perencanaan/sasaran/indikator/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'sasaran_id'				=>	$sasaran_id,
							'uraian_indikator_sasaran'	=>	$i->post('uraian_indikator_sasaran'),
							'formulasi'					=>	$i->post('formulasi'),
							'awal'						=>	$i->post('awal'),
							'satu'						=>	$i->post('satu'),
							'dua'						=>	$i->post('dua'),
							'tiga'						=>	$i->post('tiga'),
							'empat'						=>	$i->post('empat'),
							'lima'						=>	$i->post('lima'),
							'akhir'						=>	$i->post('akhir'),
							'satuan'					=>	$i->post('satuan')
						);

			$this->sasaran_m->indikator_sasaran_add($data);
			$this->session->set_flashdata('success', 'Data Indikator Sasaran PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran'), 'refresh');
		// end masuk database
		}
	}

	public function indikator_sasaran_edit($indikator_sasaran_id)
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$indikator_sasaran_id = $this->uri->segment(8);
		$indikator_sasaran = $this->sasaran_m->detail_indikator_sasaran($indikator_sasaran_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_sasaran', 'Indikator Sasaran PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'indikator_sasaran'		=>	$indikator_sasaran,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'sasaran'				=>	$sasaran,
						'tujuan'				=>	$tujuan
					);
		$this->template->load('template', 'perencanaan/sasaran/indikator/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_sasaran_id'		=>	$indikator_sasaran_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'sasaran_id'				=>	$sasaran_id,
							'uraian_indikator_sasaran'	=>	$i->post('uraian_indikator_sasaran'),
							'formulasi'					=>	$i->post('formulasi'),
							'awal'						=>	$i->post('awal'),
							'satu'						=>	$i->post('satu'),
							'dua'						=>	$i->post('dua'),
							'tiga'						=>	$i->post('tiga'),
							'empat'						=>	$i->post('empat'),
							'lima'						=>	$i->post('lima'),
							'akhir'						=>	$i->post('akhir'),
							'satuan'					=>	$i->post('satuan')
						);

			$this->sasaran_m->indikator_sasaran_edit($data);
			$this->session->set_flashdata('success', 'Data Indikator Sasaran PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran'), 'refresh');
		// end masuk database
		}
	}

	public function del_indikator_sasaran()
	{
		$indikator_sasaran_id = $this->input->post('indikator_sasaran_id');
		$this->sasaran_m->del_indikator_sasaran(['indikator_sasaran_id' => $indikator_sasaran_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_sasaran_realisasi($indikator_sasaran_id)
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$indikator_sasaran_id = $this->uri->segment(8);
		$indikator_sasaran = $this->sasaran_m->detail_indikator_sasaran($indikator_sasaran_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_sasaran', 'Indikator Sasaran PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'indikator_sasaran'		=>	$indikator_sasaran,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'sasaran'				=>	$sasaran,
						'tujuan'				=>	$tujuan
					);
		$this->template->load('template', 'perencanaan/sasaran/indikator/realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_sasaran_id'	=>	$indikator_sasaran_id,
							'r_awal'				=>	$i->post('r_awal'),
							'r_satu'				=>	$i->post('r_satu'),
							'r_dua'					=>	$i->post('r_dua'),
							'r_tiga'				=>	$i->post('r_tiga'),
							'r_empat'				=>	$i->post('r_empat'),
							'r_lima'				=>	$i->post('r_lima'),
							'r_akhir'				=>	$i->post('r_akhir')
						);

			$this->sasaran_m->indikator_sasaran_realisasi($data);
			$this->session->set_flashdata('success', 'Data Realisasi Indikator Sasaran PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran'), 'refresh');
		// end masuk database
		}
	}
}

/* End of file Sasaran.php */
/* Location: ./application/controllers/Sasaran.php */