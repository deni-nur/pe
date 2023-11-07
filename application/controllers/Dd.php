<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dd extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['dd_m','golongan_m','kecamatan_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$dd = $this->dd_m->get($portal_id);

		$data = array(	'dd'	=> $dd
						
					);
		$this->template->load('template', 'master/perjadin/dd/dd_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$dd = $this->dd_m->get($portal_id);

		$golongan = $this->golongan_m->get();
		$kecamatan = $this->kecamatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('biaya', 'Biaya', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'dd'		=> $dd,
						'golongan'	=> $golongan,
						'kecamatan'	=> $kecamatan
					);
		$this->template->load('template', 'master/perjadin/dd/dd_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'golongan_id'	=> $i->post('golongan_id'),
							'kecamatan_id'	=> $i->post('kecamatan_id'),
							'biaya'			=> $i->post('biaya')
						);

			$this->dd_m->add($data);
			$this->session->set_flashdata('success', 'Data Perjadin Dalam Daerah sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/dd'), 'refresh');
		// end masuk database
		}
	}

	public function edit($dd_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$dd_id = $this->uri->segment(5);
		$dd = $this->dd_m->detail($dd_id);

		$golongan = $this->golongan_m->get();
		$kecamatan = $this->kecamatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('biaya', 'Biaya', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'dd'		=> $dd,
						'golongan'	=> $golongan,
						'kecamatan'	=> $kecamatan,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/perjadin/dd/dd_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'dd_id'			=> $dd_id,
							'portal_id'		=> $portal_id,
							'golongan_id'	=> $i->post('golongan_id'),
							'kecamatan_id'	=> $i->post('kecamatan_id'),
							'biaya'			=> $i->post('biaya')
						);

			$this->dd_m->edit($data);
			$this->session->set_flashdata('success', 'Data Perjadin Dalam Daerah Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/dd'), 'refresh');
		// end masuk database
		}
	}

	public function del_dd()
	{
		$dd_id = $this->input->post('dd_id');
		$this->dd_m->del_dd(['dd_id' => $dd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
