<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class St extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pegawai_m','st_m','ttd_m','darhum_m','pengikut_m','portal_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$st = $this->st_m->get($portal_id);
		$pengikut = $this->pengikut_m->get_join();

		$data = array(	'st'		=>	$st,
						'pengikut'	=> $pengikut
					);
		$this->template->load('template', 'spj/spt/st_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$st = $this->st_m->get($portal_id);

		$pegawai = $this->pegawai_m->get($portal_id);
		$ttd = $this->ttd_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('maksud', 'Maksud Perjadin', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'st'		=> $st,
						'pegawai'	=> $pegawai,
						'ttd'		=> $ttd
					);
		$this->template->load('template', 'spj/spt/st_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
							'ttd_id'		=> $i->post('ttd_id'),
							'no_st'			=> $i->post('no_st'),
							'darsur'		=> $i->post('darsur'),
							'maksud'		=> $i->post('maksud'),
							'alamat'		=> $i->post('alamat'),
							'bln_surat'		=> $i->post('bln_surat'),
							'tanggal_surat'	=> $i->post('tanggal_surat')
						);
			$this->st_m->add($data);
			$this->session->set_flashdata('success', 'Data Surat Tugas sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/st'), 'refresh');
		// end masuk database
		}
	}

	public function edit($st_id)
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->get($portal_id);

		$st_id = $this->uri->segment(5);
		$st = $this->st_m->detail($st_id);

		$pegawai = $this->pegawai_m->get($portal_id);
		$ttd = $this->ttd_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('maksud', 'Maksud Perjadin', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'st'		=> $st,
						'portal'	=> $portal,
						'pegawai'	=> $pegawai,
						'ttd'		=> $ttd
					);
		$this->template->load('template', 'spj/spt/st_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'st_id'			=> $st_id,
							'portal_id'		=> $portal_id,
							'pegawai_id'	=> $i->post('pegawai_id'),
							'ttd_id'		=> $i->post('ttd_id'),
							'no_st'			=> $i->post('no_st'),
							'darsur'		=> $i->post('darsur'),
							'maksud'		=> $i->post('maksud'),
							'alamat'		=> $i->post('alamat'),
							'bln_surat'		=> $i->post('bln_surat'),
							'tanggal_surat'	=> $i->post('tanggal_surat')
						);

			$this->st_m->edit($data);
			$this->session->set_flashdata('success', 'Data Surat Tugas Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/st'), 'refresh');
		// end masuk database
		}
	}

	public function del_st()
	{
		$st_id = $this->input->post('st_id');
		$this->st_m->del_st(['st_id' => $st_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($st_id)
	{
		$portal_id = $this->uri->segment(2);
		$st_id = $this->uri->segment(5);

		$datast = $this->st_m->cetak($st_id);
		$darhum = $this->darhum_m->get($portal_id);
		$pengikut = $this->pengikut_m->get($st_id);
		$ttd = $this->st_m->get_ttd($st_id);
		
		$data = array(	'datast'	=> $datast,
						'darhum'	=> $darhum,
						'pengikut'	=> $pengikut,
						'ttd'		=> $ttd
					);
		$this->load->view('spj/spt/cetak', $data, FALSE);
	}

	public function cetak2($st_id)
	{
		$portal_id = $this->uri->segment(2);
		$st_id = $this->uri->segment(5);

		$datast = $this->st_m->cetak($st_id);
		$darhum = $this->darhum_m->get($portal_id);
		$pengikut = $this->pengikut_m->get($st_id);
		$ttd = $this->st_m->get_ttd($st_id);
		
		$data = array(	'datast'	=> $datast,
						'darhum'	=> $darhum,
						'pengikut'	=> $pengikut,
						'ttd'		=> $ttd
					);
		$this->load->view('spj/spt/cetak2', $data, FALSE);
	}
}

/* End of file St.php */
/* Location: ./application/controllers/St.php */