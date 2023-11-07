<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['desa_m','kecamatan_m']);
	}

	public function index()
	{
		$kecamatan = $this->kecamatan_m->get();
		$desa = $this->desa_m->get();

		$data = array(	'kecamatan'	=> $kecamatan,
						'desa'		=> $desa
						
					);

		$this->template->load('template', 'master/wilayah/desa/desa_data', $data);
	}

	public function add()
	{
		$kecamatan = $this->kecamatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Desa', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'kecamatan'	=> $kecamatan
					);
		$this->template->load('template', 'master/wilayah/desa/desa_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kecamatan_id'	=> $i->post('kecamatan_id'),
							'name'			=> $i->post('name')
						);

			$this->desa_m->add($data);
			$this->session->set_flashdata('success', 'Data Desa sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/desa'), 'refresh');
		// end masuk database
		}
	}

	public function edit($desa_id)
	{
		$desa_id = $this->uri->segment(5);
		$desa = $this->desa_m->detail($desa_id);

		$kecamatan = $this->kecamatan_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Desa', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'desa'		=> $desa,
						'kecamatan'	=> $kecamatan
					);
		$this->template->load('template', 'master/wilayah/desa/desa_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'desa_id'		=> $desa_id,
							'kecamatan_id'	=> $i->post('kecamatan_id'),
							'name'			=> $i->post('name')
						);

			$this->desa_m->edit($data);
			$this->session->set_flashdata('success', 'Data Desa Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/desa'), 'refresh');
		// end masuk database
		}
	}

	public function del_desa()
	{
		$desa_id = $this->input->post('desa_id');
		$this->desa_m->del_desa(['desa_id' => $desa_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

}

/* End of file Desa.php */
/* Location: ./application/controllers/Desa.php */