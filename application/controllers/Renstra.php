<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renstra extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['renstra_m','rpjmd_m','portal_m']);
	}

	public function index()
	{
		$renstra = $this->renstra_m->get();

		$data = array(	'renstra'	=> $renstra
				);

		$this->template->load('template', 'perencanaan/renstra/renstra_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		
		$renstra = $this->renstra_m->get();
		$rpjmd = $this->rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('k_urusan', 'Kode Urusan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'renstra'	=> $renstra,
						'rpjmd'		=> $rpjmd
					);
		$this->template->load('template', 'perencanaan/renstra/renstra_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=> $portal_id,
							'rpjmd_id'	=> $i->post('rpjmd_id'),
							'k_urusan'	=> $i->post('k_urusan'),
							'b_urusan'	=> $i->post('b_urusan'),
							'sasaran'	=> $i->post('sasaran'),
							'p_jawab'	=> $i->post('p_jawab')
						);

			$this->renstra_m->add($data);
			$this->session->set_flashdata('sukses', 'Data RPJMD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/renstra'), 'refresh');
		// end masuk database
		}
	}

	public function edit($renstra_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$renstra_id = $this->uri->segment(5);
		$renstra = $this->renstra_m->detail($renstra_id);
		$rpjmd = $this->rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('k_urusan', 'Kode Urusan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'renstra'	=> $renstra,
						'portal'	=> $portal,
						'rpjmd'		=> $rpjmd
					);
		$this->template->load('template', 'perencanaan/renstra/renstra_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'renstra_id'	=> $renstra_id,
							'portal_id'		=> $portal_id,
							'rpjmd_id'		=> $i->post('rpjmd_id'),
							'k_urusan'		=> $i->post('k_urusan'),
							'b_urusan'		=> $i->post('b_urusan'),
							'sasaran'		=> $i->post('sasaran'),
							'p_jawab'		=> $i->post('p_jawab')
						);

			$this->renstra_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Renstra Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/renstra'), 'refresh');
		// end masuk database
		}
	}

	public function del_renstra()
	{
		$renstra_id = $this->input->post('renstra_id');
		$this->renstra_m->del_renstra(['renstra_id' => $renstra_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
