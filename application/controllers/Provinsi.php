<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('provinsi_m');
	}

	public function index()
	{
		$provinsi = $this->provinsi_m->get();

		$data = array(	'provinsi'	=> $provinsi
				);

		$this->template->load('template', 'master/wilayah/provinsi/provinsi_data', $data);
	}

	public function add()
	{
		$provinsi = $this->provinsi_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Provinsi', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'provinsi'	=> $provinsi
					);
		$this->template->load('template', 'master/wilayah/provinsi/provinsi_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'name'	=>	$i->post('name'),
						);

			$this->provinsi_m->add($data);
			$this->session->set_flashdata('success', 'Data Provinsi sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/provinsi'), 'refresh');
		// end masuk database
		}
	}

	public function edit($provinsi_id)
	{
		$provinsi_id = $this->uri->segment(5);
		$provinsi = $this->provinsi_m->detail($provinsi_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Provinsi', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'provinsi'	=> $provinsi
					);
		$this->template->load('template', 'master/wilayah/provinsi/provinsi_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'provinsi_id'	=> $provinsi_id,
							'name'			=> $i->post('name'),
						);

			$this->provinsi_m->edit($data);
			$this->session->set_flashdata('success', 'Data Provinsi Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/provinsi'), 'refresh');
		// end masuk database
		}
	}

	public function del_provinsi()
	{
		$provinsi_id = $this->input->post('provinsi_id');
		$this->provinsi_m->del_provinsi(['provinsi_id' => $provinsi_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
