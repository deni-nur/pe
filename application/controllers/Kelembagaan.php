<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kelembagaan_m','portal_m']);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$valid = $this->form_validation;

		$valid->set_rules('nama_kelembagaan', 'Nama Kelembagaan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=> 'add'
					);
		$this->template->load('template', 'tktr/kelembagaan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),
							'lembaga'					=>	$i->post('lembaga'),
							'nama_kelembagaan'			=>	$i->post('nama_kelembagaan'),
							'no_izin'					=>	$i->post('no_izin'),
							'nib'						=>	$i->post('nib'),
							'alamat'					=>	$i->post('alamat'),
							'no_tlp'					=>	$i->post('no_tlp'),
							'nama'						=>	$i->post('nama'),
							'jabatan'					=>	$i->post('jabatan'),
							'no_hp'						=>	$i->post('no_hp'),
							'jml_pelatihan'				=>	$i->post('jml_pelatihan'),
							'pelatihan_terakreditasi'	=>	$i->post('pelatihan_terakreditasi'),
							'verif'						=>	$i->post('verif')
						);

			$this->kelembagaan_m->add($data);
			$this->session->set_flashdata('success', 'Data Kelembagaan sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/kelembagaan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($kelembagaan_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$kelembagaan_id = $this->uri->segment(5);
		$kelembagaan = $this->kelembagaan_m->detail($kelembagaan_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_kelembagaan', 'Nama Kelembagaan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=> 'edit',
						'kelembagaan'		=> $kelembagaan,
						'portal'			=> $portal
					);
		$this->template->load('template', 'tktr/kelembagaan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kelembagaan_id'			=> 	$kelembagaan_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),
							'lembaga'					=>	$i->post('lembaga'),
							'nama_kelembagaan'			=>	$i->post('nama_kelembagaan'),
							'no_izin'					=>	$i->post('no_izin'),
							'nib'						=>	$i->post('nib'),
							'alamat'					=>	$i->post('alamat'),
							'no_tlp'					=>	$i->post('no_tlp'),
							'nama'						=>	$i->post('nama'),
							'jabatan'					=>	$i->post('jabatan'),
							'no_hp'						=>	$i->post('no_hp'),
							'jml_pelatihan'				=>	$i->post('jml_pelatihan'),
							'pelatihan_terakreditasi'	=>	$i->post('pelatihan_terakreditasi'),
							'verif'						=>	$i->post('verif')
						);

			$this->kelembagaan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Kelembagaan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/kelembagaan'), 'refresh');
		// end masuk database
		}
	}

	public function del_kelembagaan()
	{
		$kelembagaan_id = $this->input->post('kelembagaan_id');
		$this->kelembagaan_m->del_kelembagaan(['kelembagaan_id' => $kelembagaan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function lembaga()
	{
		if(isset($_POST['reset'])) {
			$this->session->unset_userdata('search');
		}
		if(isset($_POST['filter'])) {
			$post = $this->input->post(null, TRUE);
			$this->session->set_userdata('search', $post);
		} else {
			$post = $this->session->userdata('search');
		}
		$data['row'] = $this->kelembagaan_m->get_lembaga_pagination();
		$data['post'] = $post;
		$this->template->load('template', 'tktr/kelembagaan/data', $data);
	}

	public function cetak()
	{
		$data['row'] = $this->kelembagaan_m->get_lembaga_pagination();
		$this->load->view('tktr/kelembagaan/cetak', $data);
	}
}

/* End of file Umk.php */
/* Location: ./application/controllers/Umk.php */