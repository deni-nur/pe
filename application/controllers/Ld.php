<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ld extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['ld_m','golongan_m','provinsi_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$ld = $this->ld_m->get($portal_id);

		$data = array(	'ld'	=> $ld
						
					);
		$this->template->load('template', 'master/perjadin/ld/ld_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$ld = $this->ld_m->get($portal_id);

		$golongan = $this->golongan_m->get();
		$provinsi = $this->provinsi_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('biaya', 'Biaya', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'ld'		=> $ld,
						'golongan'	=> $golongan,
						'provinsi'	=> $provinsi
					);
		$this->template->load('template', 'master/perjadin/ld/ld_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'golongan_id'	=> $i->post('golongan_id'),
							'provinsi_id'	=> $i->post('provinsi_id'),
							'biaya'			=> $i->post('biaya')
						);
			$this->ld_m->add($data);
			$this->session->set_flashdata('success', 'Data Perjadin Luar Daerah sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ld'), 'refresh');
		// end masuk database
		}
	}

	public function edit($ld_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$ld_id = $this->uri->segment(5);
		$ld = $this->ld_m->detail($ld_id);

		$golongan = $this->golongan_m->get();
		$provinsi = $this->provinsi_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('biaya', 'Biaya', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'ld'		=> $ld,
						'golongan'	=> $golongan,
						'provinsi'	=> $provinsi,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/perjadin/ld/ld_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'ld_id'			=> $ld_id,
							'portal_id'		=> $portal_id,
							'golongan_id'	=> $i->post('golongan_id'),
							'provinsi_id'	=> $i->post('provinsi_id'),
							'biaya'			=> $i->post('biaya')
						);
			$this->ld_m->edit($data);
			$this->session->set_flashdata('success', 'Data Perjadin Luar Daerah Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ld'), 'refresh');
		// end masuk database
		}
	}

	public function del_ld()
	{
		$ld_id = $this->input->post('ld_id');
		$this->ld_m->del_ld(['ld_id' => $ld_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
