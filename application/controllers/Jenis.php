<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['jenis_m','kelompok_m']);
	}

	public function index()
	{
		$jenis = $this->jenis_m->get();

		$data = array(	'jenis'	=> $jenis
				);

		$this->template->load('template', 'master/neraca/jenis/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$jenis = $this->jenis_m->get();
		$kelompok = $this->kelompok_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('kode_jenis', 'Kode Jenis', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'jenis'	=> $jenis,
						'kelompok'		=> $kelompok
					);
		$this->template->load('template', 'master/neraca/jenis/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'kelompok_id'			=>	$i->post('kelompok_id'),
							'kode_jenis'		=>	$i->post('kode_jenis'),
							'nama_jenis'		=>	$i->post('nama_jenis')
						);

			$this->jenis_m->add($data);
			$this->session->set_flashdata('success', 'Data Jenis Berhasil ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/jenis'), 'refresh');
		// end masuk database
		}
	}

	public function edit($jenis_id)
	{
		$portal_id = $this->uri->segment(2);

		$jenis_id = $this->uri->segment(5);
		$jenis = $this->jenis_m->detail($jenis_id);

		$kelompok = $this->kelompok_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('kode_jenis', 'Kode Jenis', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'jenis'	=> $jenis,
						'kelompok'		=> $kelompok
					);
		$this->template->load('template', 'master/neraca/jenis/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'jenis_id'		=>  $jenis_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'kelompok_id'			=>	$i->post('kelompok_id'),
							'kode_jenis'		=>	$i->post('kode_jenis'),
							'nama_jenis'		=>	$i->post('nama_jenis')
						);

			$this->jenis_m->edit($data);
			$this->session->set_flashdata('success', 'Data Jenis Berhasil diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/jenis'), 'refresh');
		// end masuk database
		}
	}

	public function del_jenis()
	{
		$jenis_id = $this->input->post('jenis_id');
		$this->jenis_m->del_jenis(['jenis_id' => $jenis_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Jenis Berhasil dihapus');
		} else {
			$params = array("success" => false);
			$this->session->set_flashdata('success', 'Data Jenis Tidak Berhasil dihapus');
		}
		echo json_encode($params);
	}
}

/* End of file A_belanja.php */
/* Location: ./application/controllers/A_belanja.php */