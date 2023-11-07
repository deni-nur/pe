<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['jabatan_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$jabatan = $this->jabatan_m->get($portal_id);

		$data = array(	'portal'	=> $portal,
						'jabatan'	=> $jabatan
				);

		$this->template->load('template', 'master/daftar_pegawai/jabatan/jabatan_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$jabatan = $this->jabatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Jabatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'jabatan'	=> $jabatan,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/daftar_pegawai/jabatan/jabatan_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=> $portal_id,
							'name'		=> $i->post('name')
						);

			$this->jabatan_m->add($data);
			$this->session->set_flashdata('success', 'Data Jabatan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/jabatan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($jabatan_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$jabatan_id = $this->uri->segment(5);
		$jabatan = $this->jabatan_m->detail($jabatan_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Jabatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'jabatan'	=> $jabatan,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/daftar_pegawai/jabatan/jabatan_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'jabatan_id'	=> $jabatan_id,
							'portal_id'		=> $portal_id,
							'name'			=> $i->post('name')
						);

			$this->jabatan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Jabatan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/jabatan'), 'refresh');
		// end masuk database
		}
	}

	public function del_jabatan()
	{
		$jabatan_id = $this->input->post('jabatan_id');
		$this->jabatan_m->del_jabatan(['jabatan_id' => $jabatan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
