<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pangkat_m']);
	}

	public function index()
	{
		$pangkat = $this->pangkat_m->get();

		$data = array(	'pangkat'	=> $pangkat
				);

		$this->template->load('template', 'master/daftar_pegawai/pangkat/pangkat_data', $data);
	}

	public function add()
	{
		$pangkat = $this->pangkat_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('pangkat', 'Pangkat', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'pangkat'	=> $pangkat
					);
		$this->template->load('template', 'master/daftar_pegawai/pangkat/pangkat_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pangkat'	=>	$i->post('pangkat'),
						);

			$this->pangkat_m->add($data);
			$this->session->set_flashdata('success', 'Data Pangkat sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pangkat'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pangkat_id)
	{
		$pangkat_id = $this->uri->segment(5);
		$pangkat = $this->pangkat_m->detail($pangkat_id);

		$valid = $this->form_validation;

		$valid->set_rules('pangkat', 'Pangkat', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'pangkat'	=> $pangkat
					);
		$this->template->load('template', 'master/daftar_pegawai/pangkat/pangkat_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pangkat_id'	=> $pangkat_id,
							'pangkat'		=>	$i->post('pangkat'),
						);

			$this->pangkat_m->edit($data);
			$this->session->set_flashdata('success', 'Data Pangkat Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pangkat'), 'refresh');
		// end masuk database
		}
	}

	public function del_pangkat()
	{
		$pangkat_id = $this->input->post('pangkat_id');
		$this->pangkat_m->del_pangkat(['pangkat_id' => $pangkat_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
