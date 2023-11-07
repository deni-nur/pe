<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['renja_m','keluaran_m']);
	}

	public function index()
	{
		$renja_id = $this->uri->segment(3);
		$renja = $this->renja_m->detail($renja_id);
		$keluaran = $this->keluaran_m->get($renja_id);

		$data = array(	'renja'		=>	$renja,
						'keluaran'	=>	$keluaran
					);
		$this->template->load('template', 'perencanaan/rkpd/renja/keluaran/keluaran_data', $data);
	}

	public function add()
	{
		$renja_id = $this->uri->segment(3);
		$renja = $this->renja_m->detail($renja_id);
		$keluaran 	= $this->keluaran_m->get($renja_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_indikator', 'Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page' 		=> 'add',
						'renja'		=>	$renja,
						'keluaran'	=>	$keluaran
					);
		$this->template->load('template', 'perencanaan/rkpd/renja/keluaran/keluaran_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'renja_id'		=>	$renja_id,
							'nama_indikator'=>	$i->post('nama_indikator'),
							'target'		=>	$i->post('target'),
							'satuan'		=>	$i->post('satuan')
						);
			$this->keluaran_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Output Telah ditambah');
			redirect(base_url('renja/keluaran/'.$renja_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
         }
	}

	public function edit($r_belanja_id)
	{
		$renja_id = $this->uri->segment(3);
		$renja = $this->renja_m->detail($renja_id);

		$keluaran_id = $this->uri->segment(5);
		$keluaran 	= $this->keluaran_m->detail($keluaran_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_indikator', 'Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page' 		=> 'edit',
						'keluaran'	=>	$keluaran,
						'renja'		=>	$renja
					);
		$this->template->load('template', 'perencanaan/rkpd/renja/keluaran/keluaran_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'keluaran_id'		=>	$keluaran_id,
							'renja_id'			=>	$renja_id,
							'nama_indikator'	=>	$i->post('nama_indikator'),
							'target'			=>	$i->post('target'),
							'satuan'			=>	$i->post('satuan')
						);
			$this->keluaran_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Output Telah diupdate');
			redirect(base_url('renja/keluaran/'.$renja_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
		}
	}

	public function del($renja_id,$keluaran_id)
	{
		$data = array('keluaran_id' => $keluaran_id);
		$this->keluaran_m->del($data);
		$this->session->set_flashdata('sukses', 'Data Output Telah dihapus');
		redirect(base_url('renja/keluaran/'.$renja_id=$this->uri->segment(3)), 'refresh');
	}

}

/* End of file Keluaran.php */
/* Location: ./application/controllers/Keluaran.php */