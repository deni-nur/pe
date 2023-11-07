<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['umk_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$umk = $this->umk_m->get($portal_id);

		$data = array(	'umk'		=> $umk
				);

		$this->template->load('template', 'tktr/umk/umk_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$umk = $this->umk_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('jml_umk', 'Jumlah UMK', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'umk'		=> $umk,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/umk/umk_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'	=>	$portal_id,
							'jml_umk'	=>	$i->post('jml_umk'),
						);

			$this->umk_m->add($data);
			$this->session->set_flashdata('success', 'Data UMK sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/umk'), 'refresh');
		// end masuk database
		}
	}

	public function edit($umk_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$umk_id = $this->uri->segment(5);
		$umk = $this->umk_m->detail($umk_id);

		$valid = $this->form_validation;

		$valid->set_rules('jml_umk', 'Nama UMK', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'umk'		=> $umk,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/umk/umk_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'umk_id'	=> $umk_id,
							'portal_id'	=> $portal_id,
							'jml_umk'	=> $i->post('jml_umk'),
						);

			$this->umk_m->edit($data);
			$this->session->set_flashdata('success', 'Data UMK Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/umk'), 'refresh');
		// end masuk database
		}
	}

	public function del_umk()
	{
		$umk_id = $this->input->post('umk_id');
		$this->umk_m->del_umk(['umk_id' => $umk_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

/* End of file Umk.php */
/* Location: ./application/controllers/Umk.php */