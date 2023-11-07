<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pad_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$pad = $this->pad_m->get($portal_id);

		$data = array(	'pad'		=> $pad
					);

		$this->template->load('template', 'penganggaran/dpa/pad/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
			
		$pad = $this->pad_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian', 'Nama PAD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'pad'		=> $pad
					);
		$this->template->load('template', 'penganggaran/dpa/pad/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'uraian'		=> $i->post('uraian'),
							'target'		=> $i->post('target')
						);

			$this->pad_m->add($data);
			$this->session->set_flashdata('success', 'Data IMTA sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pad'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pad_id)
	{
		$portal_id = $this->uri->segment(2);

		$pad_id = $this->uri->segment(5);
		$pad = $this->pad_m->detail($pad_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian', 'Nama PAD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'pad'		=> $pad
					);
		$this->template->load('template', 'penganggaran/dpa/pad/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pad_id'		=> $pad_id,
							'portal_id'		=> $portal_id,
							'uraian'		=> $i->post('uraian'),
							'target'		=> $i->post('target')
						);

			$this->pad_m->edit($data);
			$this->session->set_flashdata('success', 'Data IMTA Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pad'), 'refresh');
		// end masuk database
		}
	}

	public function del_pad()
	{
		$pad_id = $this->input->post('pad_id');
		$this->pad_m->del_pad(['pad_id' => $pad_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function realisasi($pad_id)
	{
		$portal_id = $this->uri->segment(2);

		$pad_id = $this->uri->segment(5);
		$pad = $this->pad_m->detail($pad_id);

		$valid = $this->form_validation;

		$valid->set_rules('realisasi', 'Realisasi Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'	=> 'realisasi',
						'pad'	=> $pad
					);
		$this->template->load('template', 'penganggaran/dpa/pad/realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pad_id'		=> $pad_id,
							'portal_id'		=> $portal_id,
							'uraian'		=> $i->post('uraian'),
							'target'		=> $i->post('target'),
							'realisasi'		=> $i->post('realisasi')
						);

			$this->pad_m->realisasi($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Tujuan RPJMD Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pad'), 'refresh');
		// end masuk database
		}
	}
}

/* End of file Renja.php */
/* Location: ./application/controllers/Renja.php */