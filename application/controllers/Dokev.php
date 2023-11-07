<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokev extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['dokev_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$dokev = $this->dokev_m->get($portal_id);

		$data = array(	'dokev'	=> $dokev
				);

		$this->template->load('template', 'dokumen/dokev/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);	

		$valid = $this->form_validation;

		$valid->set_rules('nama_dokev', 'Nama Dokumen', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
				$config['upload_path']          = './assets/upload/dokev/';
				$config['allowed_types']        = 'pdf';
                $config['max_size']             = 10000; //dalam kilobyte
                $config['max_width']            = 10000; //dalam pixel
                $config['max_height']           = 10000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upload_dokev')) {

		$data = array(	'page'			=>	'add',
						'error_upload'	=>	$this->upload->display_errors()
					);
		$this->template->load('template', 'dokumen/dokev/add', $data);
		// masuk database
		} else {
			// proses manipulasi gambar
			$upload_data				= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/dokev/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			//$config['new_image']		= './assets/upload/dokev/thumbs/' .$upload_data['uploads']['file_name'];
			//$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 200;
			$config['height']       	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),	
							'jenis_dokev'	=>	$i->post('jenis_dokev'),
							'nama_dokev'	=>	$i->post('nama_dokev'),
							'upload_dokev'	=>	$upload_data['uploads']['file_name'],
						);
			$this->dokev_m->add($data);
			$this->session->set_flashdata('success', 'Data Dokumen Evaluasi sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dokev'), 'refresh');
		// end masuk database
		}}
		$data = array(	'page'			=>	'add'
				);
		$this->template->load('template', 'dokumen/dokev/add', $data);
	}

	public function edit($dokev_id)
	{
		$portal_id = $this->uri->segment(2);
		$dokev_id = $this->uri->segment(5);

		$dokev = $this->dokev_m->detail($dokev_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_dokev', 'Nama Dokumen', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
			//kalau gambar tidak diganti
			if (!empty($_FILES['upload_dokev']['name'])) {

				$config['upload_path']          = './assets/upload/dokev/';
				$config['allowed_types']        = 'pdf';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upload_dokev')) {
			// end validasi

		$data = array(	'page' 			=> 'edit',
						'error_upload'	=> $this->upload->display_errors(),
						'dokev'		=> $dokev,
					);
		$this->template->load('template', 'dokumen/dokev/edit', $data);
		// Masuk Database
		} else {
			// proses manipulasi gambar
			$upload_data		= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/dokev/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			//$config['new_image']	= './assets/upload/lhpd/thumbs/' .$upload_data['uploads']['file_name'];
			//$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 200;
			$config['height']       	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			//hapus gambar lama jika upload gambar baru
			if($dokev->upload_dokev != "")
			{
				unlink('./assets/upload/dokev/'.$dokev->upload_dokev);
				//unlink('./assets/upload/dokev/thumbs/'.$dokev->upload_dokev);
			}
			//END HAPUS GAMBAR
			$data = array(	'dokev_id'		=>	$dokev_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),	
							'jenis_dokev'	=>	$i->post('jenis_dokev'),
							'nama_dokev'	=>	$i->post('nama_dokev'),
							'upload_dokev'	=>	$upload_data['uploads']['file_name'],
							);
			$this->dokev_m->edit($data);
			$this->session->set_flashdata('success', 'Data Dokumen Evaluasi Telah Diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dokev'), 'refresh');
		}}else{
			//update petugas tanpa gambar baru
			$i = $this->input;
			$data = array(	'dokev_id'		=>	$dokev_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),	
							'jenis_dokev'	=>	$i->post('jenis_dokev'),
							'nama_dokev'	=>	$i->post('nama_dokev'),
							//'upload_dokev'	=>	$upload_data['uploads']['file_name'],
							);
			$this->dokev_m->edit($data);
			$this->session->set_flashdata('success', 'Data Dokumen Evaluasi Telah Diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dokev'), 'refresh');
		}}
		// End Masuk Database
		$data = array(	'page' 		=> 'edit',
						'dokev'	=>	$dokev
					);
		$this->template->load('template', 'dokumen/dokev/edit', $data);
	}

	public function del_dokev()
	{
		$dokev_id = $this->input->post('dokev_id');

		$dokev = $this->dokev_m->detail($dokev_id);

		//HAPUS GAMBAR
		if($dokev->upload_dokev != "")
		{
			unlink('./assets/upload/dokev/'.$dokev->upload_dokev);
			//unlink('./assets/upload/dokev/thumbs/'.$dokev->upload_dokev);
		}
		//END HAPUS GAMBAR

		$this->dokev_m->del_dokev(['dokev_id' => $dokev_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
