<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Darhum extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['darhum_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$darhum = $this->darhum_m->get($portal_id);

		$data = array(	'portal'	=> $portal,
						'darhum'	=> $darhum
				);

		$this->template->load('template', 'master/darhum/darhum_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$darhum = $this->darhum_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Dasar Hukum', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'darhum'	=> $darhum,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/darhum/darhum_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=>	$portal_id,
							'name'		=>	$i->post('name'),
						);

			$this->darhum_m->add($data);
			$this->session->set_flashdata('success', 'Data Dasar Hukum sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/darhum'), 'refresh');
		// end masuk database
		}
	}

	public function edit($darhum_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$darhum_id = $this->uri->segment(5);
		$darhum = $this->darhum_m->detail($darhum_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Dasar Hukum', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'darhum'	=> $darhum,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/darhum/darhum_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'darhum_id'	=> $darhum_id,
							'portal_id'	=> $portal_id,
							'name'		=> $i->post('name'),
						);

			$this->darhum_m->edit($data);
			$this->session->set_flashdata('success', 'Data Dasar Hukum Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/darhum'), 'refresh');
		// end masuk database
		}
	}

	public function del_darhum()
	{
		$darhum_id = $this->input->post('darhum_id');
		$this->darhum_m->del_darhum(['darhum_id' => $darhum_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
