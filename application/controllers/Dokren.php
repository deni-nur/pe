<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokren extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['dokren_m','portal_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$dokren = $this->dokren_m->get($portal_id);

		$data = array(	'dokren'	=> $dokren
				);

		$this->template->load('template', 'dokumen/dokren/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);	

		$valid = $this->form_validation;

		$valid->set_rules('nama_dokren', 'Nama Dokumen', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
				$config['upload_path']          = './assets/upload/dokren/';
				$config['allowed_types']        = 'pdf';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upload_dokren')) {

		$data = array(	'page'			=>	'add',
						'error_upload'	=>	$this->upload->display_errors()
					);
		$this->template->load('template', 'dokumen/dokren/add', $data);
		// masuk database
		} else {
			// proses manipulasi gambar
			$upload_data				= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/dokren/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			//$config['new_image']		= './assets/upload/dokren/thumbs/' .$upload_data['uploads']['file_name'];
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
							'jenis_dokren'	=>	$i->post('jenis_dokren'),
							'nama_dokren'	=>	$i->post('nama_dokren'),
							'upload_dokren'	=>	$upload_data['uploads']['file_name'],
						);
			$this->dokren_m->add($data);
			$this->session->set_flashdata('success', 'Data Dokumen Perencanaan sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dokren'), 'refresh');
		// end masuk database
		}}
		$data = array(	'page'			=>	'add'
				);
		$this->template->load('template', 'dokumen/dokren/add', $data);
	}

	public function edit($dokren_id)
	{
		$portal_id = $this->uri->segment(2);
		$dokren_id = $this->uri->segment(5);

		$dokren = $this->dokren_m->detail($dokren_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_dokren', 'Nama Dokumen', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
			//kalau gambar tidak diganti
			if (!empty($_FILES['upload_dokren']['name'])) {

				$config['upload_path']          = './assets/upload/dokren/';
				$config['allowed_types']        = 'pdf';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upload_dokren')) {
			// end validasi

		$data = array(	'page' 			=> 'edit',
						'error_upload'	=> $this->upload->display_errors(),
						'dokren'		=> $dokren,
					);
		$this->template->load('template', 'dokumen/dokren/edit', $data);
		// Masuk Database
		} else {
			// proses manipulasi gambar
			$upload_data		= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/dokren/' .$upload_data['uploads']['file_name'];
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
			if($dokren->upload_dokren != "")
			{
				unlink('./assets/upload/dokren/'.$dokren->upload_dokren);
				//unlink('./assets/upload/dokren/thumbs/'.$dokren->upload_dokren);
			}
			//END HAPUS GAMBAR
			$data = array(	'dokren_id'		=>	$dokren_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),	
							'jenis_dokren'	=>	$i->post('jenis_dokren'),
							'nama_dokren'	=>	$i->post('nama_dokren'),
							'upload_dokren'	=>	$upload_data['uploads']['file_name'],
							);
			$this->dokren_m->edit($data);
			$this->session->set_flashdata('success', 'Data Dokumen Perencanaan Telah Diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dokren'), 'refresh');
		}}else{
			//update petugas tanpa gambar baru
			$i = $this->input;
			$data = array(	'dokren_id'		=>	$dokren_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),	
							'jenis_dokren'	=>	$i->post('jenis_dokren'),
							'nama_dokren'	=>	$i->post('nama_dokren'),
							//'upload_dokren'	=>	$upload_data['uploads']['file_name'],
							);
			$this->dokren_m->edit($data);
			$this->session->set_flashdata('success', 'Data Dokumen Perencanaan Telah Diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dokren'), 'refresh');
		}}
		// End Masuk Database
		$data = array(	'page' 		=> 'edit',
						'dokren'	=>	$dokren
					);
		$this->template->load('template', 'dokumen/dokren/edit', $data);
	}

	public function del_dokren()
	{
		$dokren_id = $this->input->post('dokren_id');

		$dokren = $this->dokren_m->detail($dokren_id);

		//HAPUS GAMBAR
		if($dokren->upload_dokren != "")
		{
			unlink('./assets/upload/dokren/'.$dokren->upload_dokren);
			//unlink('./assets/upload/dokren/thumbs/'.$dokren->upload_dokren);
		}
		//END HAPUS GAMBAR

		$this->dokren_m->del_dokren(['dokren_id' => $dokren_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
