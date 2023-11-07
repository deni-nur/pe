<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['golongan_m','pangkat_m']);
	}

	public function index()
	{
		$golongan = $this->golongan_m->get();

		$data = array(	'golongan'	=> $golongan
				);

		$this->template->load('template', 'master/daftar_pegawai/golongan/golongan_data', $data);
	}

	public function add()
	{
		$golongan = $this->golongan_m->get();
		$pangkat = $this->pangkat_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('gol', 'Golongan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'golongan'	=> $golongan,
						'pangkat'	=> $pangkat
					);
		$this->template->load('template', 'master/daftar_pegawai/golongan/golongan_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pangkat_id'	=>	$i->post('pangkat_id'),
							'gol'			=>	$i->post('gol'),
						);

			$this->golongan_m->add($data);
			$this->session->set_flashdata('success', 'Data Golongan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/golongan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($golongan_id)
	{
		$golongan_id = $this->uri->segment(5);
		$golongan = $this->golongan_m->detail($golongan_id);

		$pangkat = $this->pangkat_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('gol', 'Golongan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'golongan'	=> $golongan,
						'pangkat'	=> $pangkat
					);
		$this->template->load('template', 'master/daftar_pegawai/golongan/golongan_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'golongan_id'	=> $golongan_id,
							'pangkat_id'	=>	$i->post('pangkat_id'),
							'gol'			=>	$i->post('gol'),
						);

			$this->golongan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Golongan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/golongan'), 'refresh');
		// end masuk database
		}
	}

	public function del_golongan()
	{
		$golongan_id = $this->input->post('golongan_id');
		$this->golongan_m->del_golongan(['golongan_id' => $golongan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
