<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spsb extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['spsb_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$spsb = $this->spsb_m->get();

		$data = array(	'spsb'		=> $spsb
				);

		$this->template->load('template', 'tktr/spsb/spsb_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$spsb = $this->spsb_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_spsb', 'Nama SP/SB', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'spsb'		=> $spsb,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/spsb/spsb_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'nama_spsb'		=>	$i->post('nama_spsb'),
							'federasi'		=>	$i->post('federasi'),
							'jml_puk'		=>	$i->post('jml_puk'),
							'jml_anggota'	=>	$i->post('jml_anggota'),
							'pencatatan'	=>	$i->post('pencatatan')
						);

			$this->spsb_m->add($data);
			$this->session->set_flashdata('success', 'Data SP/SB sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/spsb'), 'refresh');
		// end masuk database
		}
	}

	public function edit($spsb_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$spsb_id = $this->uri->segment(5);
		$spsb = $this->spsb_m->detail($spsb_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_spsb', 'Nama SP/SB', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'spsb'		=> $spsb,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/spsb/spsb_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'spsb_id'		=> $spsb_id,
							'portal_id'		=> $portal_id,
							'nama_spsb'		=>	$i->post('nama_spsb'),
							'federasi'		=>	$i->post('federasi'),
							'jml_puk'		=>	$i->post('jml_puk'),
							'jml_anggota'	=>	$i->post('jml_anggota'),
							'pencatatan'	=>	$i->post('pencatatan')
						);

			$this->spsb_m->edit($data);
			$this->session->set_flashdata('success', 'Data SP/SB Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/spsb'), 'refresh');
		// end masuk database
		}
	}

	public function del_spsb()
	{
		$spsb_id = $this->input->post('spsb_id');
		$this->spsb_m->del_spsb(['spsb_id' => $spsb_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

/* End of file Spsb.php */
/* Location: ./application/controllers/Spsb.php */