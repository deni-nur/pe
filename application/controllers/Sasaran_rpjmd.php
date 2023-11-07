<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sasaran_rpjmd extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('sasaran_rpjmd_m');
	}

	public function index()
	{
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$indikator_sasaran_rpjmd = $this->sasaran_rpjmd_m->getindikatorsasaranrpjmd();

		$data = array(	'sasaran_rpjmd'				=> $sasaran_rpjmd,
						'indikator_sasaran_rpjmd'	=>	$indikator_sasaran_rpjmd
				);

		$this->template->load('template', 'perencanaan/sasaran_rpjmd/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$valid = $this->form_validation;

		$valid->set_rules('uraian', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add'
					);
		$this->template->load('template', 'perencanaan/sasaran_rpjmd/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=>	$portal_id,
							'user_id'	=>	$this->session->userdata('userid'),
							'uraian'	=>	$i->post('uraian')
						);

			$this->sasaran_rpjmd_m->add($data);
			$this->session->set_flashdata('success', 'Data Sasaran RPJMD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran_rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function edit($sasaran_rpjmd_id)
	{
		$portal_id = $this->uri->segment(2);

		$sasaran_rpjmd_id = $this->uri->segment(5);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->detail($sasaran_rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=> 'edit',
						'sasaran_rpjmd'	=> $sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/sasaran_rpjmd/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'sasaran_rpjmd_id'	=> $sasaran_rpjmd_id,
							'portal_id'			=> $portal_id,
							'user_id'	=>	$this->session->userdata('userid'),
							'uraian'			=>	$i->post('uraian')
						);

			$this->sasaran_rpjmd_m->edit($data);
			$this->session->set_flashdata('success', 'Data Sasaran RPJMD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran_rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function del()
	{
		$sasaran_rpjmd_id = $this->input->post('sasaran_rpjmd_id');
		$this->sasaran_rpjmd_m->del(['sasaran_rpjmd_id' => $sasaran_rpjmd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_sasaran_rpjmd_add()
	{
		$portal_id = $this->uri->segment(2);

		$sasaran_rpjmd_id = $this->uri->segment(4);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->detail($sasaran_rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_sasaran_rpjmd', 'Indikator Sasaran RPJMD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
					);
		$this->template->load('template', 'perencanaan/sasaran_rpjmd/indikator/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'							=>	$portal_id,
							'user_id'							=>	$this->session->userdata('userid'),	
							'sasaran_rpjmd_id'					=>	$sasaran_rpjmd_id,
							'uraian_indikator_sasaran_rpjmd'	=>	$i->post('uraian_indikator_sasaran_rpjmd'),
							'awal'								=>	$i->post('awal'),
							'satu'								=>	$i->post('satu'),
							'dua'								=>	$i->post('dua'),
							'tiga'								=>	$i->post('tiga'),
							'empat'								=>	$i->post('empat'),
							'lima'								=>	$i->post('lima'),
							'akhir'								=>	$i->post('akhir'),
							'satuan'							=>	$i->post('satuan')
						);
			$this->sasaran_rpjmd_m->indikator_sasaran_rpjmd_add($data);
			$this->session->set_flashdata('success', 'Data Indikator Sasaran RPJMD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran_rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function indikator_sasaran_rpjmd_edit($indikator_sasaran_rpjmd_id)
	{
		$portal_id = $this->uri->segment(2);

		$indikator_sasaran_rpjmd_id = $this->uri->segment(6);
		$indikator_sasaran_rpjmd = $this->sasaran_rpjmd_m->detail_indikator_sasaran_rpjmd($indikator_sasaran_rpjmd_id);
		$sasaran_rpjmd_id = $this->uri->segment(4);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->detail($sasaran_rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_sasaran_rpjmd', 'Indikator Sasaran RPJMD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'						=> 'edit',
						'indikator_sasaran_rpjmd'	=>	$indikator_sasaran_rpjmd,
						'sasaran_rpjmd'				=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/sasaran_rpjmd/indikator/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_sasaran_rpjmd_id'		=>	$indikator_sasaran_rpjmd_id,
							'portal_id'							=>	$portal_id,
							'user_id'							=>	$this->session->userdata('userid'),	
							'sasaran_rpjmd_id'					=>	$sasaran_rpjmd_id,
							'uraian_indikator_sasaran_rpjmd'	=>	$i->post('uraian_indikator_sasaran_rpjmd'),
							'awal'								=>	$i->post('awal'),
							'satu'								=>	$i->post('satu'),
							'dua'								=>	$i->post('dua'),
							'tiga'								=>	$i->post('tiga'),
							'empat'								=>	$i->post('empat'),
							'lima'								=>	$i->post('lima'),
							'akhir'								=>	$i->post('akhir'),
							'satuan'							=>	$i->post('satuan')
						);

			$this->sasaran_rpjmd_m->indikator_sasaran_rpjmd_edit($data);
			$this->session->set_flashdata('success', 'Data Indikator Sasaran RPJMD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran_rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function del_indikator_sasaran_rpjmd()
	{
		$indikator_sasaran_rpjmd_id = $this->input->post('indikator_sasaran_rpjmd_id');
		$this->sasaran_rpjmd_m->del_indikator_sasaran_rpjmd(['indikator_sasaran_rpjmd_id' => $indikator_sasaran_rpjmd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_sasaran_rpjmd_realisasi($indikator_sasaran_rpjmd_id)
	{
		$portal_id = $this->uri->segment(2);

		$indikator_sasaran_rpjmd_id = $this->uri->segment(6);
		$indikator_sasaran_rpjmd = $this->sasaran_rpjmd_m->detail_indikator_sasaran_rpjmd($indikator_sasaran_rpjmd_id);
		$sasaran_rpjmd_id = $this->uri->segment(4);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->detail($sasaran_rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_sasaran_rpjmd', 'Indikator Sasaran RPJMD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'						=> 'Realisasi',
						'indikator_sasaran_rpjmd'	=>	$indikator_sasaran_rpjmd,
						'sasaran_rpjmd'				=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/sasaran_rpjmd/indikator/realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_sasaran_rpjmd_id'	=>	$indikator_sasaran_rpjmd_id,
							'r_awal'						=>	$i->post('r_awal'),
							'r_satu'						=>	$i->post('r_satu'),
							'r_dua'							=>	$i->post('r_dua'),
							'r_tiga'						=>	$i->post('r_tiga'),
							'r_empat'						=>	$i->post('r_empat'),
							'r_lima'						=>	$i->post('r_lima'),
							'r_akhir'						=>	$i->post('r_akhir')
						);
			$this->sasaran_rpjmd_m->indikator_sasaran_rpjmd_realisasi($data);
			$this->session->set_flashdata('success', 'Data Realisasi Indikator Sasaran RPJMD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sasaran_rpjmd'), 'refresh');
		// end masuk database
		}
	}
}
