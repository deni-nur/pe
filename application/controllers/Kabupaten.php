<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kabupaten_m','provinsi_m']);
	}

	public function index()
	{
		$provinsi = $this->provinsi_m->get();
		$kabupaten = $this->kabupaten_m->get();

		$data = array(	'provinsi'	=> $provinsi,
						'kabupaten'	=> $kabupaten				
					);

		$this->template->load('template', 'master/wilayah/kabupaten/data', $data);
	}

	public function add()
	{
		$provinsi = $this->provinsi_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Kabupaten', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'provinsi'	=> $provinsi
					);
		$this->template->load('template', 'master/wilayah/kabupaten/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'provinsi_id'	=> $i->post('provinsi_id'),
							'name'			=> $i->post('name')
						);

			$this->kabupaten_m->add($data);
			$this->session->set_flashdata('success', 'Data Kabupaten sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kabupaten'), 'refresh');
		// end masuk database
		}
	}

	public function edit($kabupaten_id)
	{
		$kabupaten_id = $this->uri->segment(5);
		$kabupaten = $this->kabupaten_m->detail($kabupaten_id);

		$provinsi = $this->provinsi_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Kabupaten', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'kabupaten'	=> $kabupaten,
						'provinsi'	=> $provinsi
					);
		$this->template->load('template', 'master/wilayah/kabupaten/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kabupaten_id'	=> $kabupaten_id,
							'provinsi_id'	=> $i->post('provinsi_id'),
							'name'			=> $i->post('name')
						);

			$this->kabupaten_m->edit($data);
			$this->session->set_flashdata('success', 'Data Kabupaten Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kabupaten'), 'refresh');
		// end masuk database
		}
	}

	public function del_kabupaten()
	{
		$kabupaten_id = $this->input->post('kabupaten_id');
		$this->kabupaten_m->del_kabupaten(['kabupaten_id' => $kabupaten_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

}

/* End of file Kabupaten.php */
/* Location: ./application/controllers/Kabupaten.php */