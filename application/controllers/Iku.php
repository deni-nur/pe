<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iku extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['portal_m','iku_m','sasaran_m','ttd_m']);
	}

	public function index()
	{
		$iku = $this->iku_m->get();

		$data = array(	'iku'	=> $iku
				);

		$this->template->load('template', 'perencanaan/iku/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		
		$sasaran = $this->sasaran_m->get();
		$ttd = $this->ttd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('sasaran_id', 'Sasaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'sasaran'	=>	$sasaran,
						'ttd'		=>	$ttd
					);
		$this->template->load('template', 'perencanaan/iku/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'user_id'		=> $this->session->userdata('userid'),
							'sasaran_id'	=> $i->post('sasaran_id'),
							'ttd_id'		=> $i->post('ttd_id'),
							'bidang_pj'		=> $i->post('bidang_pj'),
							'tanggal_iku'	=> $i->post('tanggal_iku')
						);

			$this->iku_m->add($data);
			$this->session->set_flashdata('success', 'Data IKU sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/iku'), 'refresh');
		// end masuk database
		}
	}

	public function edit($iku_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$iku_id = $this->uri->segment(5);
		$iku = $this->iku_m->detail($iku_id);
		$sasaran = $this->sasaran_m->get();
		$ttd = $this->ttd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('sasaran_id', 'Sasaran', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'sasaran'	=> $sasaran,
						'ttd'		=> $ttd,
						'iku'		=> $iku
					);
		$this->template->load('template', 'perencanaan/iku/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'iku_id'		=> $iku_id,
							'portal_id'		=> $portal_id,
							'user_id'		=> $this->session->userdata('userid'),
							'sasaran_id'	=> $i->post('sasaran_id'),
							'ttd_id'		=> $i->post('ttd_id'),
							'bidang_pj'		=> $i->post('bidang_pj'),
							'tanggal_iku'	=> $i->post('tanggal_iku')
						);

			$this->iku_m->edit($data);
			$this->session->set_flashdata('success', 'Data IKU Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/iku'), 'refresh');
		// end masuk database
		}
	}

	public function del_iku()
	{
		$iku_id = $this->input->post('iku_id');
		$this->iku_m->del_iku(['iku_id' => $iku_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak()
	{
		$cetak = $this->input->get('tanggal_iku');

		$iku = $this->iku_m->cetak($cetak);

		$data = array(	'title'	=>	'Indikator Kinerja Utama',
						'iku'	=>	$iku,
					);
		$this->load->view('perencanaan/iku/cetak', $data, FALSE);
	}
}