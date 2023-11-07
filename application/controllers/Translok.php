<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Translok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['translok_m','portal_m','desa_m','kecamatan_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$translok = $this->translok_m->get();

		$data = array(	'translok'		=> $translok
				);

		$this->template->load('template', 'tktr/translok/translok_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$translok = $this->translok_m->get($portal_id);

		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('upt', 'UPT', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'translok'	=> $translok,
						'desa'		=> $desa,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/translok/translok_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'desa_id'		=>	$i->post('desa_id'),
							'upt'			=>	$i->post('upt'),
							'kk'			=>	$i->post('kk'),
							'jiwa'			=>	$i->post('jiwa')
						);

			$this->translok_m->add($data);
			$this->session->set_flashdata('success', 'Data Translok sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/translok'), 'refresh');
		// end masuk database
		}
	}

	public function edit($translok_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$translok_id = $this->uri->segment(5);
		$translok = $this->translok_m->detail($translok_id);

		$desa = $this->desa_m->get();
		$kecamatan = $this->kecamatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('upt', 'UPT', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'translok'	=> $translok,
						'desa'		=> $desa,
						'kecamatan'	=> $kecamatan,
						'portal'	=> $portal
					);
		$this->template->load('template', 'tktr/translok/translok_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'translok_id'	=> $translok_id,
							'portal_id'		=> $portal_id,
							'desa_id'		=>	$i->post('desa_id'),
							'upt'			=>	$i->post('upt'),
							'kk'			=>	$i->post('kk'),
							'jiwa'			=>	$i->post('jiwa')
						);

			$this->translok_m->edit($data);
			$this->session->set_flashdata('success', 'Data Translok Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/translok'), 'refresh');
		// end masuk database
		}
	}

	public function del_translok()
	{
		$translok_id = $this->input->post('translok_id');
		$this->translok_m->del_translok(['translok_id' => $translok_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

}

/* End of file Translok.php */
/* Location: ./application/controllers/Translok.php */