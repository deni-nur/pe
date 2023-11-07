<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['sppd_m','pengikut_m','st_m','ttd_keu_m','kecamatan_m','provinsi_m','portal_m','subkeg_m','dpa_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$sppd = $this->sppd_m->get($portal_id);

		$data = array(	'sppd'		=>	$sppd
					);

		$this->template->load('template', 'spj/sppd/sppd_data', $data); 
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$sppd = $this->sppd_m->get($portal_id);
		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get($portal_id);
		$kecamatan = $this->kecamatan_m->get();
		$provinsi = $this->provinsi_m->get();
		$dpa = $this->dpa_m->get($portal_id);
		$belanja = $this->dpa_m->getbelanja();
		$subkeg = $this->subkeg_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('tingkat_biaya', 'Tingkat Biaya', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'sppd'		=> $sppd,
						'st'		=> $st,
						'ttd_keu'	=> $ttd_keu,
						'kecamatan'	=> $kecamatan,
						'provinsi'	=> $provinsi,
						'dpa'		=> $dpa,
						'belanja'	=> $belanja,
						'subkeg'	=> $subkeg
					);
		$this->template->load('template', 'spj/sppd/sppd_add', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'portal_id'			=> $portal_id,
						'user_id'			=> $this->session->userdata('userid'),
						'st_id'				=> $i->post('st_id'),
						'ttd_keu_id'		=> $i->post('ttd_keu_id'),
						'belanja_id'		=> $i->post('belanja_id'),
						'kecamatan_id'		=> $i->post('kecamatan_id'),
						'provinsi_id'		=> $i->post('provinsi_id'),
						'tingkat_biaya'		=> $i->post('tingkat_biaya'),
						'alat_angkutan'		=> $i->post('alat_angkutan'),
						'tempat_berangkat'	=> 'Sukabumi',
						'tempat_tujuan'		=> $i->post('tempat_tujuan'),
						'lama_perjalanan'	=> $i->post('lama_perjalanan'),
						'tgl_berangkat'		=> $i->post('tgl_berangkat'),
						'tgl_pulang'		=> $i->post('tgl_pulang'),
						'instansi'			=> 'Dinas Tenaga Kerja dan Transmigrasi Kabupaten Sukabumi'
					);
			$this->sppd_m->add($data);
			$this->session->set_flashdata('success', 'Data SPPD Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/sppd'), 'refresh');
		// end masuk database
		}
	}

	public function edit($sppd_id)
	{
		$portal_id = $this->uri->segment(2);

		$sppd_id = $this->uri->segment(5);
		$sppd = $this->sppd_m->detail($sppd_id);

		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get($portal_id);
		$kecamatan = $this->kecamatan_m->get();
		$provinsi = $this->provinsi_m->get();
		$dpa = $this->dpa_m->get($portal_id);
		$belanja = $this->dpa_m->getbelanja();
		$subkeg = $this->subkeg_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('tingkat_biaya', 'Tingkat Biaya', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'sppd'		=> $sppd,
						'st'		=> $st,
						'ttd_keu'	=> $ttd_keu,
						'kecamatan'	=> $kecamatan,
						'provinsi'	=> $provinsi,
						'dpa'		=> $dpa,
						'belanja'	=> $belanja,
						'subkeg'	=> $subkeg
					);
		$this->template->load('template', 'spj/sppd/sppd_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'sppd_id'			=> $sppd_id,
							'portal_id'			=> $portal_id,
							'user_id'			=> $this->session->userdata('userid'),
							'st_id'				=> $i->post('st_id'),
							'ttd_keu_id'		=> $i->post('ttd_keu_id'),
							'belanja_id'		=> $i->post('belanja_id'),
							'kecamatan_id'		=> $i->post('kecamatan_id'),
							'provinsi_id'		=> $i->post('provinsi_id'),
							'tingkat_biaya'		=> $i->post('tingkat_biaya'),
							'alat_angkutan'		=> $i->post('alat_angkutan'),
							'tempat_berangkat'	=> 'Sukabumi',
							'tempat_tujuan'		=> $i->post('tempat_tujuan'),
							'lama_perjalanan'	=> $i->post('lama_perjalanan'),
							'tgl_berangkat'		=> $i->post('tgl_berangkat'),
							'tgl_pulang'		=> $i->post('tgl_pulang'),
							'instansi'			=> 'Dinas Tenaga Kerja dan Transmigrasi Kabupaten Sukabumi'
						);
			$this->sppd_m->edit($data);
			$this->session->set_flashdata('success', 'Data SPPD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/sppd'), 'refresh');
		// end masuk database
		}
	}

	public function del_sppd()
	{
		$sppd_id = $this->input->post('sppd_id');
		$this->sppd_m->del_sppd(['sppd_id' => $sppd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($sppd_id)
	{
		$portal_id = $this->uri->segment(2);
		$sppd_id = $this->uri->segment(5);

		$datasppd 	= $this->sppd_m->cetak($sppd_id);
		$pengikut 	= $this->pengikut_m->get($this->uri->segment(5))->result();
		$ttd_keu 	= $this->sppd_m->get_ttd_keu($sppd_id);
		
		$data = array(	'pengikut'	=> $pengikut,
						'datasppd'	=> $datasppd,
						'ttd_keu'	=> $ttd_keu
					);
		$this->load->view('spj/sppd/cetak', $data, FALSE);
	}

}

/* End of file Sppd.php */
/* Location: ./application/controllers/Sppd.php */