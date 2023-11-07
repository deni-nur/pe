<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rpjmd extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['rpjmd_m','portal_m']);
	}

	public function index()
	{
		$rpjmd = $this->rpjmd_m->get();

		$data = array(	'rpjmd'	=> $rpjmd
				);

		$this->template->load('template', 'perencanaan/rpjmd/rpjmd_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$rpjmd = $this->rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('visi', 'Visi', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'rpjmd'		=> $rpjmd,
					);
		$this->template->load('template', 'perencanaan/rpjmd/rpjmd_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=> $portal_id,
							'visi'		=> $i->post('visi'),
							'misi'		=> $i->post('misi'),
							'tujuan'	=> $i->post('tujuan'),
							'sasaran'	=> $i->post('sasaran')
						);

			$this->rpjmd_m->add($data);
			$this->session->set_flashdata('sukses', 'Data RPJMD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function edit($rpjmd_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$rpjmd_id = $this->uri->segment(5);
		$rpjmd = $this->rpjmd_m->detail($rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('visi', 'Visi', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'rpjmd'		=> $rpjmd,
						'portal'	=> $portal
					);
		$this->template->load('template', 'perencanaan/rpjmd/rpjmd_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'rpjmd_id'	=> $rpjmd_id,
							'portal_id'	=> $portal_id,
							'visi'		=> $i->post('visi'),
							'misi'		=> $i->post('misi'),
							'tujuan'	=> $i->post('tujuan'),
							'sasaran'	=> $i->post('sasaran')
						);

			$this->rpjmd_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data RPJMD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function del_rpjmd()
	{
		$rpjmd_id = $this->input->post('rpjmd_id');
		$this->rpjmd_m->del_rpjmd(['rpjmd_id' => $rpjmd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
