<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_belanja extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['r_belanja_m','dpa_m','a_belanja_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$dpa_id = $this->uri->segment(4);

		$r_belanja = $this->r_belanja_m->get($dpa_id);

		$data = array(	'r_belanja'	=>	$r_belanja
					);

		$this->template->load('template', 'perencanaan/renja/dpa/r_belanja/belanja_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$dpa_id = $this->uri->segment(4);

		$r_belanja 	= $this->r_belanja_m->get($dpa_id);
		$a_belanja = $this->a_belanja_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('jumlah', 'Jumlah', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page' 		=> 'add',
						'r_belanja'	=>	$r_belanja,
						'a_belanja'	=>	$a_belanja
					);
		$this->template->load('template', 'perencanaan/renja/dpa/r_belanja/belanja_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'dpa_id'		=> $dpa_id,
							'a_belanja_id'	=> $i->post('a_belanja_id'),
							'jumlah'		=> $i->post('jumlah')
						);
			$this->r_belanja_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Rincian Belanja Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/r_belanja'), 'refresh');
		// end masuk database
         }
	}

	public function edit($r_belanja_id)
	{
		$portal_id = $this->uri->segment(2);
		$dpa_id = $this->uri->segment(4);
		$r_belanja_id = $this->uri->segment(7);

		$r_belanja 	= $this->r_belanja_m->detail($r_belanja_id);
		$a_belanja = $this->a_belanja_m->get($r_belanja_id);

		$valid = $this->form_validation;

		$valid->set_rules('jumlah', 'Jumlah', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page' 		=> 'edit',
						'r_belanja'	=>	$r_belanja,
						'a_belanja'	=>	$a_belanja
					);
		$this->template->load('template', 'perencanaan/renja/dpa/r_belanja/belanja_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'r_belanja_id'	=> $r_belanja_id,
							'portal_id'		=> $portal_id,
							'dpa_id'		=> $dpa_id,
							'a_belanja_id'	=> $i->post('a_belanja_id'),
							'jumlah'		=> $i->post('jumlah')
						);
			$this->r_belanja_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Rincian Belanja Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/r_belanja'), 'refresh');
		// end masuk database
		}
	}

	public function del_r_belanja()
	{
		$r_belanja_id = $this->input->post('r_belanja_id');
		$this->r_belanja_m->del_r_belanja(['r_belanja_id' => $r_belanja_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	// public function keluaran()
	// {
	// 	$dpa_id = $this->uri->segment(3);
	// 	$dpa = $this->dpa_m->detail($dpa_id);
	// 	$r_belanja = $this->r_belanja_m->get($dpa_id);

	// 	$data = array(	'dpa'		=>	$dpa,
	// 					'r_belanja'	=>	$r_belanja
	// 				);
	// 	$this->template->load('template', 'perencanaan/renja/dpa/r_belanja/keluaran_data', $data);
	// }
}
