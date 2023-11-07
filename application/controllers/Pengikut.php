<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengikut extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pegawai_m','st_m','pengikut_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$st_id = $this->uri->segment(4);

		$pengikut = $this->pengikut_m->get($st_id);

		$data = array(	'pengikut'	=>	$pengikut

					);
		$this->template->load('template', 'spj/pengikut/pengikut_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$st_id = $this->uri->segment(4);
		$st = $this->st_m->detail($st_id);

		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('pegawai_id', 'Nama Pegawai', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'st'		=>	$st,
						'pegawai'	=>	$pegawai
					);
		$this->template->load('template', 'spj/pengikut/pengikut_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'st_id'			=> $st_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
						);

			$this->pengikut_m->add($data);
			$this->session->set_flashdata('success', 'Data Pengikut Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/st/'.$this->uri->segment(4).'/pengikut'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pengikut_id)
	{
		$portal_id = $this->uri->segment(2);

		$st_id = $this->uri->segment(4);

		$pengikut_id = $this->uri->segment(7);
		$pengikut = $this->pengikut_m->detail($pengikut_id);

		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('pegawai_id', 'Nama Pegawai', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'pengikut'	=> $pengikut,
						'pegawai'	=> $pegawai
					);
		$this->template->load('template', 'spj/pengikut/pengikut_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pengikut_id'	=> $pengikut_id,
							'portal_id'		=> $portal_id,
							'st_id'			=> $st_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
						);

			$this->pengikut_m->edit($data);
			$this->session->set_flashdata('success', 'Data Surat Tugas Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/st/'.$this->uri->segment(4).'/pengikut'), 'refresh');
		// end masuk database
		}
	}

	public function del_pengikut()
	{
		$pengikut_id = $this->input->post('pengikut_id');
		$this->pengikut_m->del_pengikut(['pengikut_id' => $pengikut_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

}

/* End of file Pengikut.php */
/* Location: ./application/controllers/Pengikut.php */