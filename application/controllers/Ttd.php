<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ttd extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pegawai_m', 'golongan_m', 'jabatan_m', 'ttd_m', 'portal_m']);
	}

	public function index()
	{	
		$portal_id = $this->uri->segment(2);

		$ttd = $this->ttd_m->get($portal_id);

		$data = array(	'ttd' => $ttd
					);
		$this->template->load('template', 'master/ttd/ttd_adm/ttd_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$ttd = $this->ttd_m->get($portal_id);

		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('pegawai_id', 'Pejabat Penandatangan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
				$config['upload_path']          = './assets/upload/image/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('foto')) {
			// end validasi

		$data = array(	'error_upload'	=>	$this->upload->display_errors()
					);
		// masuk database
		} else {
			// proses manipulasi gambar
			$upload_data		= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			$config['new_image']	= './assets/upload/image/thumbs/' .$upload_data['uploads']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 200;
			$config['height']       	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
							'jabatan_ttd'	=> $i->post('jabatan_ttd'),
							'foto'			=> $upload_data['uploads']['file_name'],
						);
			$this->ttd_m->add($data);
			$this->session->set_flashdata('success', 'Data Pejabat Penandatangan Berhasil ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ttd'), 'refresh');
		// end masuk database
		}}
		$data = array(	'page'			=>	'add',
						'ttd'			=>	$ttd,
						'pegawai'		=>	$pegawai
					);
		$this->template->load('template', 'master/ttd/ttd_adm/ttd_add', $data);
		// masuk database
	}

	public function edit($ttd_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$ttd_id = $this->uri->segment(5);
		$ttd = $this->ttd_m->detail($ttd_id);

		$pegawai = $this->pegawai_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('pegawai_id', 'Pejabat Penandatangan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
			//kalau gambar tidak diganti
			if (!empty($_FILES['foto']['name'])) {

				$config['upload_path']          = './assets/upload/image/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('foto')) {
			// end validasi

		$data = array(	'error_upload'	=>	$this->upload->display_errors()
					);
		} else {
			// proses manipulasi gambar
			$upload_data		= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			$config['new_image']		= './assets/upload/image/thumbs/' .$upload_data['uploads']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 200;
			$config['height']       	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			//hapus gambar lama jika upload gambar baru
			if($ttd->foto != "")
			{
				unlink('./assets/upload/image/'.$ttd->foto);
				unlink('./assets/upload/image/thumbs/'.$ttd->foto);
			}
			//END HAPUS GAMBAR
			$data = array(	'ttd_id'		=> $ttd_id,
							'portal_id'		=> $portal_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
							'jabatan_ttd'	=> $i->post('jabatan_ttd'),
							'foto'			=> $upload_data['uploads']['file_name'],
							);
			$this->ttd_m->edit($data);
			$this->session->set_flashdata('success', 'Data Pejabat Penandatangan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ttd'), 'refresh');
		}}else{
			//update petugas tanpa gambar baru
			$i = $this->input;
			$data = array(	'ttd_id'		=> $ttd_id,
							'portal_id'		=> $portal_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
							'jabatan_ttd'	=> $i->post('jabatan_ttd'),
							//'foto'			=> $upload_data['uploads']['file_name'],
						);
			$this->ttd_m->edit($data);
			$this->session->set_flashdata('success', 'Data Pejabat Penandatangan Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/ttd'), 'refresh');
		}}
		// end masuk database
		$data = array(	'page'		=> 'edit',
						'ttd'		=> $ttd,
						'pegawai'	=> $pegawai,
						'portal'	=> $portal
					);
		$this->template->load('template', 'master/ttd/ttd_adm/ttd_edit', $data);
	}

	public function del_ttd()
	{
		$ttd = $this->input->post('ttd_id');
		//HAPUS GAMBAR
		if($ttd->foto != "")
		{
			unlink('./assets/upload/image/'.$ttd->foto);
			unlink('./assets/upload/image/thumbs/'.$ttd->foto);
		}
		//END HAPUS GAMBAR

		$this->ttd_m->del_ttd(['ttd_id' => $ttd]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
