<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_sasaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['rpjmd_m','ik_sasaran_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$rpjmd_id = $this->uri->segment(3);
		$ik_sasaran_id = $this->uri->segment(5);
		$rpjmd = $this->rpjmd_m->detail($rpjmd_id);
		$ik_sasaran = $this->ik_sasaran_m->get($rpjmd_id);
		$ik_sasaran_realisasi = $this->ik_sasaran_m->get_realisasi($ik_sasaran_id);

		$data = array(	'rpjmd'			=>	$rpjmd,
						'ik_sasaran'	=>	$ik_sasaran,
						'ik_sasaran_realisasi'	=>	$ik_sasaran_realisasi
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_sasaran/ik_sasaran_data', $data);
	}

	public function add()
	{
		$rpjmd_id = $this->uri->segment(3);
		$rpjmd = $this->rpjmd_m->detail($rpjmd_id);
		$ik_sasaran 	= $this->ik_sasaran_m->get($rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('awal_target', 'Target Awal', 'required',
				array(	'required'	=>	'%s harus diisi'));
		$valid->set_rules('satu_target', 'Target 1', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=> 'add',
						'rpjmd'			=> $rpjmd,
						'ik_sasaran'	=> $ik_sasaran
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_sasaran/ik_sasaran_add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'rpjmd_id'			=>	$rpjmd_id,
							'nama_ik_sasaran'	=>	$i->post('nama_ik_sasaran'),
							'formulasi'		=>	$i->post('formulasi'),
							'awal_target'	=>	$i->post('awal_target'),
							'satu_target'	=>	$i->post('satu_target'),
							'dua_target'	=>	$i->post('dua_target'),
							'tiga_target'	=>	$i->post('tiga_target'),
							'empat_target'	=>	$i->post('empat_target'),
							'lima_target'	=>	$i->post('lima_target'),
							'akhir_target'	=>	$i->post('akhir_target'),
							'awal_satuan'	=>	$i->post('awal_satuan'),
							'satu_satuan'	=>	$i->post('satu_satuan'),
							'dua_satuan'	=>	$i->post('dua_satuan'),
							'tiga_satuan'	=>	$i->post('tiga_satuan'),
							'empat_satuan'	=>	$i->post('empat_satuan'),
							'lima_satuan'	=>	$i->post('lima_satuan'),
							'akhir_satuan'	=>	$i->post('akhir_satuan')
						);

			$this->ik_sasaran_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Indikator Sasaran Telah ditambah');
			redirect(base_url('rpjmd/ik_sasaran/'.$rpjmd_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
		}
	}

	public function edit($ik_sasaran_id)
	{
		$rpjmd_id = $this->uri->segment(3);
		$rpjmd = $this->rpjmd_m->detail($rpjmd_id);

		$ik_sasaran_id = $this->uri->segment(5);
		$ik_sasaran 	= $this->ik_sasaran_m->detail($ik_sasaran_id);

		$valid = $this->form_validation;

		$valid->set_rules('awal_target', 'Target Awal', 'required',
				array(	'required'	=>	'%s harus diisi'));
		$valid->set_rules('satu_target', 'Target 1', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'edit',
						'rpjmd'			=>	$rpjmd,
						'ik_sasaran'	=>	$ik_sasaran
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_sasaran/ik_sasaran_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'ik_sasaran_id'	=>	$ik_sasaran_id,
							'rpjmd_id'		=>	$rpjmd_id,
							'nama_ik_sasaran'	=>	$i->post('nama_ik_sasaran'),
							'formulasi'		=>	$i->post('formulasi'),
							'awal_target'	=>	$i->post('awal_target'),
							'satu_target'	=>	$i->post('satu_target'),
							'dua_target'	=>	$i->post('dua_target'),
							'tiga_target'	=>	$i->post('tiga_target'),
							'empat_target'	=>	$i->post('empat_target'),
							'lima_target'	=>	$i->post('lima_target'),
							'akhir_target'	=>	$i->post('akhir_target'),
							'awal_satuan'	=>	$i->post('awal_satuan'),
							'satu_satuan'	=>	$i->post('satu_satuan'),
							'dua_satuan'	=>	$i->post('dua_satuan'),
							'tiga_satuan'	=>	$i->post('tiga_satuan'),
							'empat_satuan'	=>	$i->post('empat_satuan'),
							'lima_satuan'	=>	$i->post('lima_satuan'),
							'akhir_satuan'	=>	$i->post('akhir_satuan')
						);

			$this->ik_sasaran_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Indikator Tujuan Telah diupdate');
			redirect(base_url('rpjmd/ik_sasaran/'.$rpjmd_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
		}
	}

	public function del($rpjmd_id,$ik_sasaran_id)
	{
		$data = array('ik_sasaran_id' => $ik_sasaran_id);
		$this->ik_sasaran_m->del($data);
		$this->session->set_flashdata('sukses', 'Data Target Indikator Tujuan Telah dihapus');
		redirect(base_url('rpjmd/ik_sasaran/'.$rpjmd_id=$this->uri->segment(3)), 'refresh');
	}

	public function realisasi()
	{
		$rpjmd_id = $this->uri->segment(3);
		$rpjmd = $this->rpjmd_m->detail($rpjmd_id);

		$ik_sasaran_id = $this->uri->segment(5);
		$ik_sasaran 	= $this->ik_sasaran_m->detail($ik_sasaran_id);
		$ik_sasaran_realisasi 	= $this->ik_sasaran_m->detail_realisasi($ik_sasaran_id);

		$realisasi = new stdClass();
		$realisasi->ik_sasaran_id = null;
		$realisasi->rpjmd_id = null;
		$realisasi->awal_realisasi = null;
		$realisasi->satu_realisasi = null;
		$realisasi->dua_realisasi = null;
		$realisasi->tiga_realisasi = null;
		$realisasi->empat_realisasi = null;
		$realisasi->lima_realisasi = null;
		$realisasi->akhir_realisasi = null;
		
		$valid = $this->form_validation;

		$valid->set_rules('awal_target', 'Target Awal', 'required',
				array(	'required'	=>	'%s harus diisi'));
		$valid->set_rules('satu_target', 'Target 1', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'realisasi',
						'rpjmd'			=>	$rpjmd,
						'ik_sasaran'	=>	$ik_sasaran,
						'realisasi'		=>	$realisasi,
						'ik_sasaran_realisasi'	=>	$ik_sasaran_realisasi
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_sasaran/ik_sasaran_realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'ik_sasaran_id'	=>	$ik_sasaran_id,
							'rpjmd_id'		=>	$rpjmd_id,
							'awal_realisasi'	=>	$i->post('awal_realisasi'),
							'satu_realisasi'	=>	$i->post('satu_realisasi'),
							'dua_realisasi'		=>	$i->post('dua_realisasi'),
							'tiga_realisasi'	=>	$i->post('tiga_realisasi'),
							'empat_realisasi'	=>	$i->post('empat_realisasi'),
							'lima_realisasi'	=>	$i->post('lima_realisasi'),
							'akhir_realisasi'	=>	$i->post('akhir_realisasi')
						);
			$this->ik_sasaran_m->realisasi($data);
			$this->session->set_flashdata('sukses', 'Data Realisasi Tujuan Telah diupdate');
			redirect(base_url('rpjmd/ik_sasaran/'.$rpjmd_id=$this->uri->segment(3)), 'refresh');
		// end masuk database
		}
	}	
}

/* End of file Ik_sasaran.php */
/* Location: ./application/controllers/Ik_sasaran.php */