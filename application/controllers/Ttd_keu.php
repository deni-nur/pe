<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd_keu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pegawai_m', 'golongan_m', 'jabatan_m', 'ttd_keu_m', 'portal_m']);
	}

	public function index()
	{	
		$portal_id = $this->uri->segment(2);

		$ttd_keu = $this->ttd_keu_m->get($portal_id);

		$data = array(	'ttd_keu' => $ttd_keu
					);
		$this->template->load('template', 'master/ttd/ttd_keu/ttd_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$ttd_keu = $this->ttd_keu_m->get($portal_id);

		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('jabatan_ttd_keu', 'Pejabat Penandatangan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'ttd_keu'	=> $ttd_keu,
						'pegawai'	=> $pegawai
					);
		$this->template->load('template', 'master/ttd/ttd_keu/ttd_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=> $portal_id,
							'pegawai_id'		=> $i->post('pegawai_id'),
							'jabatan_ttd_keu'	=> $i->post('jabatan_ttd_keu')
						);

			$this->ttd_keu_m->add($data);
			$this->session->set_flashdata('success', 'Data Pejabat Penandatangan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ttd_keu'), 'refresh');
		// end masuk database
		}
	}

	public function edit($ttd_keu_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$ttd_keu_id = $this->uri->segment(5);
		$ttd_keu = $this->ttd_keu_m->detail($ttd_keu_id);

		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('jabatan_ttd_keu', 'Pejabat Penandatangan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'ttd_keu'	=> $ttd_keu,
						'pegawai'	=> $pegawai,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/ttd/ttd_keu/ttd_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'ttd_keu_id'		=> $ttd_keu_id,
							'portal_id'			=> $portal_id,
							'pegawai_id'		=> $i->post('pegawai_id'),
							'jabatan_ttd_keu'	=> $i->post('jabatan_ttd_keu')
						);

			$this->ttd_keu_m->edit($data);
			$this->session->set_flashdata('success', 'Data Pejabat Penandatangan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ttd_keu'), 'refresh');
		// end masuk database
		}
	}

	public function del_ttd_keu()
	{
		$ttd_keu_id = $this->input->post('ttd_keu_id');
		$this->ttd_keu_m->del_ttd_keu(['ttd_keu_id' => $ttd_keu_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
