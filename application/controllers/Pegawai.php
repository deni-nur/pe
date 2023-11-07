<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pegawai_m', 'golongan_m', 'jabatan_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pegawai = $this->pegawai_m->get($portal_id);

		$data = array(	'pegawai'	=> $pegawai
						
					);
		$this->template->load('template', 'master/daftar_pegawai/pegawai/pegawai_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$pegawai = $this->pegawai_m->get($portal_id);

		$golongan = $this->golongan_m->get();
		$jabatan = $this->jabatan_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Pegawai', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'pegawai'	=> $pegawai,
						'golongan'	=> $golongan,
						'jabatan'	=> $jabatan
					);
		$this->template->load('template', 'master/daftar_pegawai/pegawai/pegawai_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'golongan_id'	=> $i->post('golongan_id'),
							'jabatan_id'	=> $i->post('jabatan_id'),
							'nip'			=> $i->post('nip'),
							'name'			=> $i->post('name')
						);

			$this->pegawai_m->add($data);
			$this->session->set_flashdata('success', 'Data Pegawai sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pegawai'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pegawai_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$pegawai_id = $this->uri->segment(5);
		$pegawai = $this->pegawai_m->detail($pegawai_id);

		$golongan = $this->golongan_m->get();
		$jabatan = $this->jabatan_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('name', 'Nama Pegawai', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'pegawai'	=> $pegawai,
						'golongan'	=> $golongan,
						'jabatan'	=> $jabatan,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/daftar_pegawai/pegawai/pegawai_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pegawai_id'	=> $pegawai_id,
							'portal_id'		=> $portal_id,
							'golongan_id'	=> $i->post('golongan_id'),
							'jabatan_id'	=> $i->post('jabatan_id'),
							'nip'			=> $i->post('nip'),
							'name'			=> $i->post('name')
						);

			$this->pegawai_m->edit($data);
			$this->session->set_flashdata('success', 'Data Pegawai Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pegawai'), 'refresh');
		// end masuk database
		}
	}

	public function del_pegawai()
	{
		$pegawai_id = $this->input->post('pegawai_id');
		$this->pegawai_m->del_pegawai(['pegawai_id' => $pegawai_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	function nip_barcode_qrcode($id)
	{
		$data['row'] = $this->pegawai_m->get($id)->row();
		$this->template->load('template', 'master/daftar_pegawai/pegawai/nip_barcode_qrcode', $data);
	}

	function nip_barcode_print($id)
	{
		$data['row'] = $this->pegawai_m->get($id)->row();
		$html = $this->load->view('master/daftar_pegawai/pegawai/nip_barcode_print', $data, TRUE);
		$this->fungsi->PdfGenerator($html, 'nip-'.$data['row']->nip, 'A4', 'landscape');
	}

	function nip_qrcode_print($id)
	{
		$data['row'] = $this->pegawai_m->get($id)->row();
		$html = $this->load->view('master/daftar_pegawai/pegawai/nip_qrcode_print', $data, TRUE);
		$this->fungsi->PdfGenerator($html, 'qrcode-'.$data['row']->nip, 'A4', 'potrait');
	}
}
