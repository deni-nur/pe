<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['dpa_m','program_m','kegiatan_m','subkeg_m','sub_rincian_objek_m','bidang_urusan_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$subkeg = $this->subkeg_m->get();
		$kegiatan = $this->kegiatan_m->get();
		$program = $this->program_m->get();
		$bidang_urusan = $this->bidang_urusan_m->get();
		$dpa = $this->dpa_m->get($portal_id);

		$data = array(	'subkeg'		=> $subkeg,
						'kegiatan'		=> $kegiatan,
						'program'		=> $program,
						'bidang_urusan'	=> $bidang_urusan,
						'dpa'			=> $dpa
					);

		$this->template->load('template', 'penganggaran/dpa/subkegiatan/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
			
		$dpa = $this->dpa_m->get();
		$subkeg = $this->subkeg_m->getjoin();

		$valid = $this->form_validation;

		$valid->set_rules('subkeg_id', 'Nama Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'dpa'		=> $dpa,
						'subkeg'	=> $subkeg
					);
		$this->template->load('template', 'penganggaran/dpa/subkegiatan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=> $portal_id,
							'user_id'		=> $this->session->userdata('userid'),
							'subkeg_id'		=> $i->post('subkeg_id'),
							'target'		=> $i->post('target')
						);
			$this->dpa_m->add($data);
			$this->session->set_flashdata('success', 'Data Sub Kegiatan Berhasil ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa'), 'refresh');
		// end masuk database
		}
	}

	public function edit($dpa_id)
	{
		$portal_id = $this->uri->segment(2);

		$dpa_id = $this->uri->segment(5);
		$dpa = $this->dpa_m->detail($dpa_id);

		$subkeg = $this->subkeg_m->getjoin();

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'edit',
						'dpa'		=>	$dpa,
						'subkeg'	=>	$subkeg
					);
		$this->template->load('template', 'penganggaran/dpa/subkegiatan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'dpa_id'		=> $dpa_id,
							'portal_id'		=> $portal_id,
							'user_id'		=> $this->session->userdata('userid'),
							'subkeg_id'		=> $i->post('subkeg_id'),
							'target'		=> $i->post('target')
						);
			$this->dpa_m->edit($data);
			$this->session->set_flashdata('success', 'Data Sub Kegiatan Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa'), 'refresh');
		// end masuk database
		}
	}

	public function del_dpa()
	{
		$dpa_id = $this->input->post('dpa_id');
		$this->dpa_m->del_dpa(['dpa_id' => $dpa_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function belanja()
	{
		$portal_id = $this->uri->segment(2);
		$dpa_id = $this->uri->segment(4);

		$dpa = $this->dpa_m->get($portal_id);
		$belanja = $this->dpa_m->getbelanja($dpa_id);
		$jumlah_pagu_belanja = $this->dpa_m->jumlah_pagu_belanja($dpa_id);
		$jumlah_pagu_pergeseran = $this->dpa_m->jumlah_pagu_pergeseran($dpa_id);
		$jumlah_pagu_perubahan = $this->dpa_m->jumlah_pagu_perubahan($dpa_id);

		$data = array(	'dpa'					    =>	$dpa,
						'belanja'				    =>	$belanja,
						'jumlah_pagu_belanja'	    =>	$jumlah_pagu_belanja,
						'jumlah_pagu_pergeseran'	=>	$jumlah_pagu_pergeseran,
						'jumlah_pagu_perubahan'		=>	$jumlah_pagu_perubahan
					);

		$this->template->load('template', 'penganggaran/dpa/subkegiatan/belanja/data', $data);
	}

	public function belanja_add()
	{
		$portal_id = $this->uri->segment(2);

		$dpa_id = $this->uri->segment(4);
		$dpa = $this->dpa_m->detail($dpa_id);

		$sub_rincian_objek = $this->sub_rincian_objek_m->get();		

		$valid = $this->form_validation;

		$valid->set_rules('sub_rincian_objek_id', 'Belanja Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add',
						'dpa'				=>	$dpa,
						'sub_rincian_objek'	=>	$sub_rincian_objek
					);
		$this->template->load('template', 'penganggaran/dpa/subkegiatan/belanja/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'dpa_id'					=>	$dpa_id,
							'sub_rincian_objek_id'		=>	$i->post('sub_rincian_objek_id'),
							'pagu_belanja'				=>	$i->post('pagu_belanja'),
							'pagu_perubahan'			=>	$i->post('pagu_belanja')
						);
			$this->dpa_m->belanja_add($data);
			$this->session->set_flashdata('success', 'Data Belanja Sub Kegiatan PD sukses ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja'), 'refresh');
		// end masuk database
		}
	}

	public function belanja_edit($belanja_id)
	{
		$portal_id = $this->uri->segment(2);

		$dpa_id = $this->uri->segment(4);
		$dpa = $this->dpa_m->detail($dpa_id);

		$belanja_id = $this->uri->segment(6);
		$belanja = $this->dpa_m->detail_belanja($belanja_id);

		$sub_rincian_objek = $this->sub_rincian_objek_m->get();		

		$valid = $this->form_validation;

		$valid->set_rules('sub_rincian_objek_id', 'Belanja Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add',
						'dpa'				=>	$dpa,
						'sub_rincian_objek'	=>	$sub_rincian_objek,
						'belanja'			=>	$belanja
					);
		$this->template->load('template', 'penganggaran/dpa/subkegiatan/belanja/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'belanja_id'				=>	$belanja_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'dpa_id'					=>	$dpa_id,
							'sub_rincian_objek_id'		=>	$i->post('sub_rincian_objek_id'),
							'pagu_belanja'				=>	$i->post('pagu_belanja'),
							//'pagu_perubahan'			=>	$i->post('pagu_belanja')
						);
			$this->dpa_m->belanja_edit($data);
			$this->session->set_flashdata('success', 'Data Belanja Sub Kegiatan PD sukses diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja'), 'refresh');
		// end masuk database
		}
	}

	public function del_belanja()
	{
		$belanja_id = $this->input->post('belanja_id');
		$this->dpa_m->del_belanja(['belanja_id' => $belanja_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
	
	public function belanja_pergeseran($belanja_id)
	{
		$portal_id = $this->uri->segment(2);

		$dpa_id = $this->uri->segment(4);
		$dpa = $this->dpa_m->detail($dpa_id);

		$belanja_id = $this->uri->segment(6);
		$belanja = $this->dpa_m->detail_belanja($belanja_id);

		$sub_rincian_objek = $this->sub_rincian_objek_m->get();		

		$valid = $this->form_validation;

		$valid->set_rules('sub_rincian_objek_id', 'Belanja Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add',
						'dpa'				=>	$dpa,
						'sub_rincian_objek'	=>	$sub_rincian_objek,
						'belanja'			=>	$belanja
					);
		$this->template->load('template', 'penganggaran/dpa/subkegiatan/belanja/pergeseran', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'belanja_id'				=>	$belanja_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'dpa_id'					=>	$dpa_id,
							'sub_rincian_objek_id'		=>	$i->post('sub_rincian_objek_id'),
							'pagu_belanja'				=>	$i->post('pagu_belanja'),
							'pagu_pergeseran'			=>	$i->post('pagu_pergeseran')
						);
			$this->dpa_m->belanja_pergeseran($data);
			$this->session->set_flashdata('success', 'Data Belanja Sub Kegiatan PD sukses diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja'), 'refresh');
		// end masuk database
		}
	}

	public function belanja_perubahan($belanja_id)
	{
		$portal_id = $this->uri->segment(2);

		$dpa_id = $this->uri->segment(4);
		$dpa = $this->dpa_m->detail($dpa_id);

		$belanja_id = $this->uri->segment(6);
		$belanja = $this->dpa_m->detail_belanja($belanja_id);

		$sub_rincian_objek = $this->sub_rincian_objek_m->get();		

		$valid = $this->form_validation;

		$valid->set_rules('sub_rincian_objek_id', 'Belanja Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add',
						'dpa'				=>	$dpa,
						'sub_rincian_objek'	=>	$sub_rincian_objek,
						'belanja'			=>	$belanja
					);
		$this->template->load('template', 'penganggaran/dpa/subkegiatan/belanja/perubahan', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'belanja_id'				=>	$belanja_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'dpa_id'					=>	$dpa_id,
							'sub_rincian_objek_id'		=>	$i->post('sub_rincian_objek_id'),
							'pagu_belanja'				=>	$i->post('pagu_belanja'),
							'pagu_pergeseran'			=>	$i->post('pagu_pergeseran'),
							'pagu_perubahan'			=>	$i->post('pagu_perubahan')
						);
			$this->dpa_m->belanja_perubahan($data);
			$this->session->set_flashdata('success', 'Data Belanja Sub Kegiatan PD sukses diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/belanja'), 'refresh');
		// end masuk database
		}
	}
}

/* End of file Renja.php */
/* Location: ./application/controllers/Renja.php */