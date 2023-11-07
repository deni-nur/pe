<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_belanja extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['a_belanja_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$a_belanja = $this->a_belanja_m->get();

		$data = array(	'portal'	=> $portal,
						'a_belanja'	=> $a_belanja
				);

		$this->template->load('template', 'master/a_belanja/belanja_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$a_belanja = $this->a_belanja_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('kode_rek', 'Kode Rekening', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'a_belanja'	=> $a_belanja
					);
		$this->template->load('template', 'master/a_belanja/belanja_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'kode_rek'		=>	$i->post('kode_rek'),
							'nama_rek'		=>	$i->post('nama_rek')
						);

			$this->a_belanja_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Akun Belanja sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/a_belanja'), 'refresh');
		// end masuk database
		}
	}

	public function edit($a_belanja_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);

		$a_belanja_id = $this->uri->segment(5);
		$a_belanja = $this->a_belanja_m->detail($a_belanja_id);

		$valid = $this->form_validation;

		$valid->set_rules('kode_rek', 'Kode Rekening', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'a_belanja'	=> $a_belanja,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/a_belanja/belanja_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'a_belanja_id'	=> $a_belanja_id,
							'portal_id'		=> $portal_id,
							'kode_rek'		=> $i->post('kode_rek'),
							'nama_rek'		=> $i->post('nama_rek')
						);

			$this->a_belanja_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Akun Belanja Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/a_belanja'), 'refresh');
		// end masuk database
		}
	}

	public function del_a_belanja()
	{
		$a_belanja_id = $this->input->post('a_belanja_id');
		$this->a_belanja_m->del_a_belanja(['a_belanja_id' => $a_belanja_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

/* End of file A_belanja.php */
/* Location: ./application/controllers/A_belanja.php */