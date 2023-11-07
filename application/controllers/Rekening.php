<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['rekening_m']);
	}

	public function index()
	{
		$rekening = $this->rekening_m->get();

		$data = array(	'rekening'	=> $rekening
				);

		$this->template->load('template', 'master/rekening/rekening_data', $data);
	}

	public function add()
	{
		$rekening = $this->rekening_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('rek_bank', 'Rekening Bank', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'rekening'	=> $rekening
					);
		$this->template->load('template', 'master/rekening/rekening_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'rek_bank'		=>	$i->post('rek_bank'),
							'nama_bank'		=>	$i->post('nama_bank'),
							'nama_pemilik'	=>	$i->post('nama_pemilik')
						);

			$this->rekening_m->add($data);
			$this->session->set_flashdata('success', 'Data Rekening sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/rekening'), 'refresh');
		// end masuk database
		}
	}

	public function edit($rekening_id)
	{
		$rekening_id = $this->uri->segment(5);
		$rekening = $this->rekening_m->detail($rekening_id);

		$valid = $this->form_validation;

		$valid->set_rules('rek_bank', 'Rekening Bank', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'rekening'	=> $rekening
					);
		$this->template->load('template', 'master/rekening/rekening_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'rekening_id'	=> $rekening_id,
							'rek_bank'		=>	$i->post('rek_bank'),
							'nama_bank'		=>	$i->post('nama_bank'),
							'nama_pemilik'	=>	$i->post('nama_pemilik')
						);

			$this->rekening_m->edit($data);
			$this->session->set_flashdata('success', 'Data Rekening Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/rekening'), 'refresh');
		// end masuk database
		}
	}

	public function del_rekening()
	{
		$rekening_id = $this->input->post('rekening_id');
		$this->rekening_m->del_rekening(['rekening_id' => $rekening_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
