<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urusan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('urusan_m');
	}

	public function index()
	{
		$urusan = $this->urusan_m->get();

		$data = array(	'urusan'	=> $urusan
				);

		$this->template->load('template', 'perencanaan/urusan/data', $data);
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
		$this->template->load('template', 'perencanaan/urusan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=>	$portal_id,
							'user_id'	=>	$this->session->userdata('userid'),
							'kode'		=>	$i->post('kode'),
							'uraian'	=>	$i->post('uraian')
						);

			$this->urusan_m->add($data);
			$this->session->set_flashdata('success', 'Data Urusan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/urusan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($urusan_id)
	{
		$portal_id = $this->uri->segment(2);

		$urusan_id = $this->uri->segment(5);
		$urusan = $this->urusan_m->detail($urusan_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'urusan'	=> $urusan
					);
		$this->template->load('template', 'perencanaan/urusan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'urusan_id'	=> $urusan_id,
							'portal_id'	=> $portal_id,
							'user_id'	=>	$this->session->userdata('userid'),
							'kode'		=>	$i->post('kode'),
							'uraian'	=>	$i->post('uraian')
						);

			$this->urusan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Urusan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/urusan'), 'refresh');
		// end masuk database
		}
	}

	public function del()
	{
		$urusan_id = $this->input->post('urusan_id');
		$this->urusan_m->del(['urusan_id' => $urusan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
