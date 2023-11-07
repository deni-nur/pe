<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tujuan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['tujuan_m','bidang_urusan_m','sasaran_rpjmd_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan = $this->tujuan_m->get();
		$indikator_tujuan = $this->tujuan_m->getindikatortujuan();

		$data = array(	'bidang_urusan'		=>	$bidang_urusan,
						'tujuan'			=>	$tujuan,
						'indikator_tujuan'	=>	$indikator_tujuan
				);

		$this->template->load('template', 'perencanaan/tujuan/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_tujuan', 'Tujuan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/tujuan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'bidang_urusan_id'	=>	$i->post('bidang_urusan_id'),
							'sasaran_rpjmd_id'	=>	$i->post('sasaran_rpjmd_id'),
							'uraian_tujuan'		=>	$i->post('uraian_tujuan')
						);

			$this->tujuan_m->add($data);
			$this->session->set_flashdata('success', 'Data Tujuan PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tujuan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($tujuan_id)
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(5);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_tujuan', 'Tujuan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=> 'edit',
						'tujuan'		=> $tujuan,
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/tujuan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'tujuan_id'			=> $tujuan_id,
							'portal_id'			=> $portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'bidang_urusan_id'	=>	$i->post('bidang_urusan_id'),
							'sasaran_rpjmd_id'	=>	$i->post('sasaran_rpjmd_id'),
							'uraian_tujuan'		=>	$i->post('uraian_tujuan')
						);

			$this->tujuan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Tujuan PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tujuan'), 'refresh');
		// end masuk database
		}
	}

	public function del_tujuan()
	{
		$tujuan_id = $this->input->post('tujuan_id');
		$this->tujuan_m->del_tujuan(['tujuan_id' => $tujuan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_tujuan_add()
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_tujuan', 'Indikator Tujuan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'tujuan'		=>	$tujuan
					);
		$this->template->load('template', 'perencanaan/tujuan/indikator/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),
							'tujuan_id'					=>	$tujuan_id,
							'uraian_indikator_tujuan'	=>	$i->post('uraian_indikator_tujuan'),
							'awal'						=>	$i->post('awal'),
							'satu'						=>	$i->post('satu'),
							'dua'						=>	$i->post('dua'),
							'tiga'						=>	$i->post('tiga'),
							'empat'						=>	$i->post('empat'),
							'lima'						=>	$i->post('lima'),
							'akhir'						=>	$i->post('akhir'),
							'satuan'					=>	$i->post('satuan')
						);

			$this->tujuan_m->indikator_tujuan_add($data);
			$this->session->set_flashdata('success', 'Data Indikator Tujuan PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tujuan'), 'refresh');
		// end masuk database
		}
	}

	public function indikator_tujuan_edit($indikator_tujuan_id)
	{
		$portal_id = $this->uri->segment(2);

		$indikator_tujuan_id = $this->uri->segment(6);
		$indikator_tujuan = $this->tujuan_m->detail_indikator_tujuan($indikator_tujuan_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_tujuan', 'Indikator Tujuan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'indikator_tujuan'		=> $indikator_tujuan,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'tujuan'				=>	$tujuan
					);
		$this->template->load('template', 'perencanaan/tujuan/indikator/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_tujuan_id'		=>	$indikator_tujuan_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),
							'tujuan_id'					=>	$tujuan_id,
							'uraian_indikator_tujuan'	=>	$i->post('uraian_indikator_tujuan'),
							'awal'						=>	$i->post('awal'),
							'satu'						=>	$i->post('satu'),
							'dua'						=>	$i->post('dua'),
							'tiga'						=>	$i->post('tiga'),
							'empat'						=>	$i->post('empat'),
							'lima'						=>	$i->post('lima'),
							'akhir'						=>	$i->post('akhir'),
							'satuan'					=>	$i->post('satuan')
						);

			$this->tujuan_m->indikator_tujuan_edit($data);
			$this->session->set_flashdata('success', 'Data Indikator Tujuan PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tujuan'), 'refresh');
		// end masuk database
		}
	}

	public function del_indikator_tujuan()
	{
		$indikator_tujuan_id = $this->input->post('indikator_tujuan_id');
		$this->tujuan_m->del_indikator_tujuan(['indikator_tujuan_id' => $indikator_tujuan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_tujuan_realisasi($indikator_tujuan_id)
	{
		$portal_id = $this->uri->segment(2);

		$indikator_tujuan_id = $this->uri->segment(6);
		$indikator_tujuan = $this->tujuan_m->detail_indikator_tujuan($indikator_tujuan_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_tujuan', 'Indikator Tujuan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'Realisasi',
						'indikator_tujuan'		=> 	$indikator_tujuan,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'tujuan'				=>	$tujuan
					);
		$this->template->load('template', 'perencanaan/tujuan/indikator/realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_tujuan_id'	=>	$indikator_tujuan_id,
							'r_awal'				=>	$i->post('r_awal'),
							'r_satu'				=>	$i->post('r_satu'),
							'r_dua'					=>	$i->post('r_dua'),
							'r_tiga'				=>	$i->post('r_tiga'),
							'r_empat'				=>	$i->post('r_empat'),
							'r_lima'				=>	$i->post('r_lima'),
							'r_akhir'				=>	$i->post('r_akhir')
						);

			$this->tujuan_m->indikator_tujuan_realisasi($data);
			$this->session->set_flashdata('success', 'Data Realisasi Indikator Tujuan PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/tujuan'), 'refresh');
		// end masuk database
		}
	}
}

/* End of file Tujuan.php */
/* Location: ./application/controllers/Tujuan.php */