<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		//check_admin();
		$this->load->model(['portal_m','konfigurasi_m']);
	}

	public function index()
	{
		$portal = $this->portal_m->get();
		$konfigurasi = $this->konfigurasi_m->listing();

		$data = array(	'portal' 		=> $portal,
						'konfigurasi'	=> $konfigurasi
				);

		$this->load->view('sign_portal', $data);
	}

	public function portal_data()
	{
		check_admin();
		$portal = $this->portal_m->get();

		$data = array(	'portal'	=> $portal
				);

		$this->template->load('template', 'portal/portal_data', $data);
		
	}

	public function add()
	{
		check_admin();
		$portal = $this->portal_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('tahun_perencanaan', 'Tahun Perencanaan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'portal'	=> $portal
					);
		$this->template->load('template', 'portal/portal_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'tahun_perencanaan'	=>	$i->post('tahun_perencanaan')
						);

			$this->portal_m->add($data);
			$this->session->set_flashdata('success', 'Data Tahun Perencanaan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/portal'), 'refresh');
		// end masuk database
		}
	}

	public function edit($portal_id)
	{
		check_admin();
		$portal_id = $this->uri->segment(4);
		$portal = $this->portal_m->detail($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('pangkat', 'Pangkat', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'portal'	=> $portal
					);
		$this->template->load('template', 'portal/portal_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=> $portal_id,
							'tahun_perencanaan'	=>	$i->post('tahun_perencanaan')
						);

			$this->portal_m->edit($data);
			$this->session->set_flashdata('success', 'Data Tahun Perencanaan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/portal'), 'refresh');
		// end masuk database
		}
	}

	public function del_portal()
	{
		check_admin();
		$portal_id = $this->input->post('portal_id');
		$this->portal_m->del_portal(['portal_id' => $portal_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

/* End of file Portal.php */
/* Location: ./application/controllers/Portal.php */