<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kecamatan_m','kabupaten_m']);
	}

	public function index()
	{
		$kabupaten = $this->kabupaten_m->get();
		$kecamatan = $this->kecamatan_m->get();

		$data = array(	'kabupaten'	=> $kabupaten,
						'kecamatan'	=> $kecamatan
				);

		$this->template->load('template', 'master/wilayah/kecamatan/kecamatan_data', $data);
	}

	public function add()
	{
		$kecamatan = $this->kecamatan_m->get();
		$kabupaten = $this->kabupaten_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Kecamatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'kecamatan'	=> $kecamatan,
						'kabupaten'	=> $kabupaten
					);
		$this->template->load('template', 'master/wilayah/kecamatan/kecamatan_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kabupaten_id'	=>	$i->post('kabupaten_id'),
							'name'			=>	$i->post('name'),
						);

			$this->kecamatan_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Kecamatan sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kecamatan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($kecamatan_id)
	{
		$kecamatan_id = $this->uri->segment(5);
		$kecamatan = $this->kecamatan_m->detail($kecamatan_id);
		$kabupaten = $this->kabupaten_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Kecamatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'kecamatan'	=> $kecamatan,
						'kabupaten'	=> $kabupaten
					);
		$this->template->load('template', 'master/wilayah/kecamatan/kecamatan_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kecamatan_id'	=> $kecamatan_id,
							'kabupaten_id'	=>	$i->post('kabupaten_id'),
							'name'			=> $i->post('name'),
						);

			$this->kecamatan_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Kecamatan Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kecamatan'), 'refresh');
		// end masuk database
		}
	}

	public function del_kecamatan()
	{
		$kecamatan_id = $this->input->post('kecamatan_id');
		$this->kecamatan_m->del_kecamatan(['kecamatan_id' => $kecamatan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
