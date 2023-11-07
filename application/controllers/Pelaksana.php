<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksana extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['pegawai_m','st_m','pelaksana_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$st_id = $this->uri->segment(3);
		$st = $this->st_m->detail($st_id);
		$pelaksana = $this->pelaksana_m->get($st_id);

		$data = array(	'st'		=>	$st,
						'pelaksana'	=>	$pelaksana
					);
		$this->template->load('template', 'spj/pelaksana/pelaksana_data', $data);
	}

	public function add()
	{
		$st_id = $this->uri->segment(3);
		$st = $this->st_m->detail($st_id);
		$pegawai = $this->pegawai_m->get()->result();

		$valid = $this->form_validation;

		$valid->set_rules('pegawai_id', 'Nama Pegawai', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'st'		=>	$st,
						'pegawai'	=>	$pegawai
					);
		$this->template->load('template', 'spj/pelaksana/pelaksana_form', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'st_id'				=>	$st_id,
							'pegawai_id'		=>	$i->post('pegawai_id'),
						);

			$this->pelaksana_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Pengikut Telah ditambah');
			redirect(base_url('st/pelaksana/'.$st_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
		}
	}

	public function edit($pelaksana_id)
	{
		$st_id = $this->uri->segment(3);
		$st = $this->st_m->detail($st_id);

		$pelaksana_id = $this->uri->segment(5);
		$pelaksana 	= $this->pelaksana_m->detail($pelaksana_id);
		$pegawai 	= $this->pegawai_m->get()->result();

		$valid = $this->form_validation;

		$valid->set_rules('pegawai_id', 'Nama Pegawai', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'pelaksana'	=>	$pelaksana,
						'pegawai'	=>	$pegawai,
						'st'		=>	$st
					);
		$this->template->load('template', 'spj/pelaksana/pelaksana_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pelaksana_id'		=>	$pelaksana_id,
							'pegawai_id'		=>	$i->post('pegawai_id'),
						);

			$this->pelaksana_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Pengikut Telah diupdate');
			redirect(base_url('st/pelaksana/'.$st_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
		}
	}

	public function del($st_id,$pelaksana_id)
	{
		$data = array('pelaksana_id' => $pelaksana_id);
		$this->pelaksana_m->del($data);
		$this->session->set_flashdata('sukses', 'Data Pengikut Telah dihapus');
		redirect(base_url('st/pelaksana/'.$st_id=$this->uri->segment(3)), 'refresh');
	}

}

/* End of file Pelaksana.php */
/* Location: ./application/controllers/Pelaksana.php */