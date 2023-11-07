<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang_urusan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['bidang_urusan_m','urusan_m']);
	}

	public function index()
	{
		$bidang_urusan = $this->bidang_urusan_m->get();

		$data = array(	'bidang_urusan'	=> $bidang_urusan
				);

		$this->template->load('template', 'perencanaan/bidang_urusan/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$urusan = $this->urusan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_bidang_urusan', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'urusan'	=>	$urusan
					);
		$this->template->load('template', 'perencanaan/bidang_urusan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'kode'					=>	$i->post('kode'),
							'urusan_id'				=>	$i->post('urusan_id'),
							'uraian_bidang_urusan'	=>	$i->post('uraian_bidang_urusan')
						);

			$this->bidang_urusan_m->add($data);
			$this->session->set_flashdata('success', 'Data Bidang Urusan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/bidang_urusan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($bidang_urusan_id)
	{
		$portal_id = $this->uri->segment(2);

		$urusan = $this->urusan_m->get();

		$bidang_urusan_id = $this->uri->segment(5);
		$bidang_urusan = $this->bidang_urusan_m->detail($bidang_urusan_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_bidang_urusan', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'edit',
						'urusan'		=>	$urusan,
						'bidang_urusan'	=>	$bidang_urusan
					);
		$this->template->load('template', 'perencanaan/bidang_urusan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'bidang_urusan_id'		=>	$bidang_urusan_id,
							'portal_id'				=>	$portal_id,
							'user_id'				=>	$this->session->userdata('userid'),
							'kode'					=>	$i->post('kode'),
							'urusan_id'				=>	$i->post('urusan_id'),
							'uraian_bidang_urusan'	=>	$i->post('uraian_bidang_urusan')
						);

			$this->bidang_urusan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Bidang Urusan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/bidang_urusan'), 'refresh');
		// end masuk database
		}
	}

	public function del()
	{
		$bidang_urusan_id = $this->input->post('bidang_urusan_id');
		$this->bidang_urusan_m->del(['bidang_urusan_id' => $bidang_urusan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
