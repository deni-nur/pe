<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_trans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pnp_trans_m','anggota_trans_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$pnp_trans_id = $this->uri->segment(4);

		$anggota_trans = $this->anggota_trans_m->get($pnp_trans_id);

		$data = array(	'anggota_trans'	=>	$anggota_trans

					);
		$this->template->load('template', 'tktr/pnp_trans/anggota_trans/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$pnp_trans_id = $this->uri->segment(4);
		$pnp_trans = $this->pnp_trans_m->detail($pnp_trans_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota', 'Nama Anggota', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'pnp_trans'	=>	$pnp_trans
					);
		$this->template->load('template', 'tktr/pnp_trans/anggota_trans/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=> $portal_id,
							'user_id'			=> $this->session->userdata('userid'),
							'pnp_trans_id'		=> $pnp_trans_id,
							'nama_anggota'		=> $i->post('nama_anggota'),
							'jk'				=> $i->post('jk'),
							'umur'				=> $i->post('umur'),
							'status'			=> $i->post('status'),
							'hub_kel'			=> $i->post('hub_kel'),
							'pendidikan'		=> $i->post('pendidikan')
						);

			$this->anggota_trans_m->add($data);
			$this->session->set_flashdata('success', 'Data Anggota_trans Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pnp_trans/'.$this->uri->segment(4).'/anggota_trans'), 'refresh');
		// end masuk database
		}
	}

	public function edit($anggota_trans_id)
	{
		$portal_id = $this->uri->segment(2);

		$pnp_trans_id = $this->uri->segment(4);

		$anggota_trans_id = $this->uri->segment(7);
		$anggota_trans = $this->anggota_trans_m->detail($anggota_trans_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_anggota', 'Nama Anggota', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=> 'edit',
						'anggota_trans'	=> $anggota_trans
					);
		$this->template->load('template', 'tktr/pnp_trans/anggota_trans/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'anggota_trans_id'	=> $anggota_trans_id,
							'portal_id'			=> $portal_id,
							'user_id'			=> $this->session->userdata('userid'),
							'pnp_trans_id'		=> $pnp_trans_id,
							'nama_anggota'		=> $i->post('nama_anggota'),
							'jk'				=> $i->post('jk'),
							'umur'				=> $i->post('umur'),
							'status'			=> $i->post('status'),
							'hub_kel'			=> $i->post('hub_kel'),
							'pendidikan'		=> $i->post('pendidikan')
						);

			$this->anggota_trans_m->edit($data);
			$this->session->set_flashdata('success', 'Data Anggota Transmigrasi Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pnp_trans/'.$this->uri->segment(4).'/anggota_trans'), 'refresh');
		// end masuk database
		}
	}

	public function del_anggota_trans()
	{
		$anggota_trans_id = $this->input->post('anggota_trans_id');
		$this->anggota_trans_m->del_anggota_trans(['anggota_trans_id' => $anggota_trans_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

}

/* End of file Anggota_trans.php */
/* Location: ./application/controllers/Anggota_trans.php */