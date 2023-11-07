<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lhpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['lhpd_m','st_m','ttd_m','portal_m','pengikut_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$lhpd = $this->lhpd_m->get($portal_id);

		$data = array(	'lhpd'		=>	$lhpd
					);
		$this->template->load('template', 'spj/lhpd/lhpd_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$lhpd = $this->lhpd_m->get($portal_id);

		$st = $this->st_m->get($portal_id);
		$ttd = $this->ttd_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('hasil_keg', 'Hasil Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=> 'add',
						'lhpd'			=> $lhpd,
						'st'			=> $st,
						'ttd'			=> $ttd
					);
		$this->template->load('template', 'spj/lhpd/lhpd_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
			                'user_id'       => $this->session->userdata('userid'),
							'st_id'			=> $i->post('st_id'),
							'ttd_id'		=> $i->post('ttd_id'),
							'hasil_keg'		=> $i->post('hasil_keg'),
							'tgl_lhpd'		=> $i->post('tgl_lhpd'),
							'hari'			=> $i->post('hari'),
							'tgl_kegiatan'	=> $i->post('tgl_kegiatan'),
							'waktu'			=> $i->post('waktu'),
							'tempat'		=> $i->post('tempat')
						);
			$this->lhpd_m->add($data);
			$this->session->set_flashdata('success', 'Data Laporan Hasil Perjalanan Dinas sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/lhpd'), 'refresh');
		}
	}

	public function edit($lhpd_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$lhpd_id = $this->uri->segment(5);
		$lhpd = $this->lhpd_m->detail($lhpd_id);

		$st = $this->st_m->get($portal_id);
		$ttd = $this->ttd_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('hasil_keg', 'Hasil Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'	=> 'edit',
						'lhpd'	=> $lhpd,
						'st'	=> $st,
						'ttd'	=> $ttd
					);
		$this->template->load('template', 'spj/lhpd/lhpd_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'lhpd_id'		=> $lhpd_id,
							'portal_id'		=> $portal_id,
							'user_id'       => $this->session->userdata('userid'),
							'st_id'			=> $i->post('st_id'),
							'ttd_id'		=> $i->post('ttd_id'),
							'hasil_keg'		=> $i->post('hasil_keg'),
							'tgl_lhpd'		=> $i->post('tgl_lhpd'),
							'hari'			=> $i->post('hari'),
							'tgl_kegiatan'	=> $i->post('tgl_kegiatan'),
							'waktu'			=> $i->post('waktu'),
							'tempat'		=> $i->post('tempat')
						);

			$this->lhpd_m->edit($data);
			$this->session->set_flashdata('success', 'Data Laporan Hasil Perjalanan Dinas Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/lhpd'), 'refresh');
		// end masuk database
		}
	}

	public function del_lhpd()
	{
		$lhpd_id = $this->input->post('lhpd_id');
		$this->lhpd_m->del_lhpd(['lhpd_id' => $lhpd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($lhpd_id)
	{
		$portal_id = $this->uri->segment(2);
		$lhpd_id = $this->uri->segment(5);

		$datalhpd 	= $this->lhpd_m->cetak($lhpd_id);
		$pengikut 	= $this->pengikut_m->get($this->uri->segment(5))->result();
		$ttd 		= $this->lhpd_m->get_ttd($lhpd_id);
		
		$data = array(	'pengikut'	=> $pengikut,
						'datalhpd'	=> $datalhpd,
						'ttd'		=> $ttd
					);
		$this->load->view('spj/lhpd/cetak', $data, FALSE);
	}

	public function cetak_baru($lhpd_id)
	{
		$portal_id = $this->uri->segment(2);
		$lhpd_id = $this->uri->segment(5);
        $st_id = $this->uri->segment(6);

		$datalhpd 		= $this->lhpd_m->cetak_baru($lhpd_id);
		$pengikut 		= $this->pengikut_m->get($st_id)->result();
		$gambar_lhpd 	= $this->lhpd_m->getgambar($lhpd_id);
		//$ttd 			= $this->lhpd_m->get_ttd($lhpd_id);
		
		$data = array(	'pengikut'		=> $pengikut,
						'datalhpd'		=> $datalhpd,
						'gambar_lhpd'	=> $gambar_lhpd,
						//'ttd'			=> $ttd
					);
		$this->load->view('spj/lhpd/cetak_baru', $data, FALSE);
	}

	public function gambar_data()
	{
		$portal_id = $this->uri->segment(2);
		$lhpd_id = $this->uri->segment(4);

		$lhpd = $this->lhpd_m->get($portal_id);
		$gambar_lhpd = $this->lhpd_m->getgambar($lhpd_id);

		$data = array(	'lhpd'			=>	$lhpd,
						'gambar_lhpd'	=>	$gambar_lhpd
					);
		$this->template->load('template', 'spj/lhpd/gambar/data', $data);
	}

	public function gambar_add()
	{
		$portal_id = $this->uri->segment(2);
		$lhpd_id = $this->uri->segment(4);

		$lhpd = $this->lhpd_m->detail($lhpd_id);	

		$valid = $this->form_validation;

		$valid->set_rules('lhpd_id', 'Dokumentasi Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
				$config['upload_path']          = './assets/upload/lhpd/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('dokumentasi')) {

		$data = array(	'page'			=>	'add',
						'error_upload'	=>	$this->upload->display_errors(),
						'lhpd'			=>	$lhpd
					);
		$this->template->load('template', 'spj/lhpd/gambar/add', $data);
		// masuk database
		} else {
			// proses manipulasi gambar
			$upload_data				= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/lhpd/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			$config['new_image']		= './assets/upload/lhpd/thumbs/' .$upload_data['uploads']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 200;
			$config['height']       	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),	
							'lhpd_id'		=>	$i->post('lhpd_id'),
							'dokumentasi'	=>	$upload_data['uploads']['file_name'],
						);
			$this->lhpd_m->gambar_add($data);
			$this->session->set_flashdata('success', 'Data Dokumentasi Laporan Hasil Perjalanan Dinas sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/lhpd/'.$this->uri->segment(4).'/gambar_data'), 'refresh');
		// end masuk database
		}}
		$data = array(	'page'			=>	'add',
						'lhpd'			=>	$lhpd
				);
		$this->template->load('template', 'spj/lhpd/gambar/add', $data);
	}

	public function gambar_edit($gambar_lhpd_id)
	{
		$portal_id = $this->uri->segment(2);
		$gambar_lhpd_id = $this->uri->segment(6);
		$lhpd_id = $this->uri->segment(4);

		$lhpd = $this->lhpd_m->detail($lhpd_id);
		$gambar_lhpd = $this->lhpd_m->detail_gambar($gambar_lhpd_id);

		$valid = $this->form_validation;

		$valid->set_rules('lhpd_id', 'Dokumentasi Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if ($valid->run()) {
			//kalau gambar tidak diganti
			if (!empty($_FILES['dokumentasi']['name'])) {

				$config['upload_path']          = './assets/upload/lhpd/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000; //dalam kilobyte
                $config['max_width']            = 5000; //dalam pixel
                $config['max_height']           = 5000; //dalam pixel
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('dokumentasi')) {
			// end validasi

		$data = array(	'page' 			=> 'edit',
						'error_upload'	=> $this->upload->display_errors(),
						'lhpd'			=> $lhpd,
						'gambar_lhpd'	=> $gambar_lhpd,
					);
		$this->template->load('template', 'spj/lhpd/gambar/edit', $data);
		// Masuk Database
		} else {
			// proses manipulasi gambar
			$upload_data		= array('uploads' =>$this->upload->data());
			// gambar asli disimpan di folder assets/upload/image
			// lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/lhpd/' .$upload_data['uploads']['file_name'];
			//gambar versi kecil dipindahkan
			$config['new_image']	= './assets/upload/lhpd/thumbs/' .$upload_data['uploads']['file_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio']	= TRUE;
			$config['width']         	= 200;
			$config['height']       	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$i = $this->input;
			//hapus gambar lama jika upload gambar baru
			if($gambar_lhpd->dokumentasi != "")
			{
				unlink('./assets/upload/lhpd/'.$gambar_lhpd->dokumentasi);
				unlink('./assets/upload/lhpd/thumbs/'.$gambar_lhpd->dokumentasi);
			}
			//END HAPUS GAMBAR
			$data = array(	'gambar_lhpd_id'	=>	$gambar_lhpd_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),	
							'lhpd_id'			=>	$i->post('lhpd_id'),
							'dokumentasi'		=>	$upload_data['uploads']['file_name'],
							);
			$this->lhpd_m->gambar_edit($data);
			$this->session->set_flashdata('success', 'Data Dokumentasi Laporan Hasil Perjalanan Dinas Telah Diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/lhpd/'.$this->uri->segment(4).'/gambar_data'), 'refresh');
		}}else{
			//update petugas tanpa gambar baru
			$i = $this->input;
			$data = array(	'gambar_lhpd_id'	=>	$gambar_lhpd_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),	
							'lhpd_id'			=>	$i->post('lhpd_id')
							//'dokumentasi'		=>	$upload_data['uploads']['file_name'],
							);
			$this->lhpd_m->gambar_edit($data);
			$this->session->set_flashdata('success', 'Data Dokumentasi Laporan Hasil Perjalanan Dinas Telah Diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/lhpd/'.$this->uri->segment(4).'/gambar_data'), 'refresh');
		}}
		// End Masuk Database
		$data = array(	'page' 			=> 'edit',
						'lhpd'			=>	$lhpd,
						'gambar_lhpd'	=>	$gambar_lhpd,
					);
		$this->template->load('template', 'spj/lhpd/gambar/edit', $data);
	}

	public function del_gambarlhpd()
	{
		$gambar_lhpd_id = $this->input->post('gambar_lhpd_id');

		$gambar_lhpd = $this->lhpd_m->detail_gambar($gambar_lhpd_id);

		//HAPUS GAMBAR
		if($gambar_lhpd->dokumentasi != "")
		{
			unlink('./assets/upload/lhpd/'.$gambar_lhpd->dokumentasi);
			unlink('./assets/upload/lhpd/thumbs/'.$gambar_lhpd->dokumentasi);
		}
		//END HAPUS GAMBAR

		$this->lhpd_m->del_gambar(['gambar_lhpd_id' => $gambar_lhpd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

/* End of file lhpd.php */
/* Location: ./application/controllers/lhpd.php */