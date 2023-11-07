<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['tujuan_m','bidang_urusan_m','program_m','sasaran_m','sasaran_rpjmd_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan = $this->tujuan_m->get();
		$sasaran = $this->sasaran_m->get();
		$program = $this->program_m->get();
		$indikator_program = $this->program_m->getindikatorprogram();

		$data = array(	'bidang_urusan'			=>	$bidang_urusan,
						'tujuan'				=>	$tujuan,
						'sasaran'				=>	$sasaran,
						'program'				=>	$program,
						'indikator_program'		=>	$indikator_program
				);

		$this->template->load('template', 'perencanaan/program/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_program', 'Program PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran'		=>	$sasaran,
						'tujuan'		=>	$tujuan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd
					);
		$this->template->load('template', 'perencanaan/program/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'sasaran_id'	=>	$sasaran_id,
							'kode_program'	=>	$i->post('kode_program'),
							'nama_program'	=>	$i->post('nama_program')
						);

			$this->program_m->add($data);
			$this->session->set_flashdata('success', 'Data Program PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/program'), 'refresh');
		// end masuk database
		}
	}

	public function edit($program_id)
	{
		$portal_id = $this->uri->segment(2);

		$program_id = $this->uri->segment(9);
		$program = $this->program_m->detail($program_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_program', 'Program PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'edit',
						'program'		=>	$program,
						'bidang_urusan'	=>	$bidang_urusan,
						'tujuan'		=>	$tujuan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'sasaran'		=>	$sasaran
					);
		$this->template->load('template', 'perencanaan/program/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'program_id'	=>	$program_id,
							'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'sasaran_id'	=>	$sasaran_id,
							'kode_program'	=>	$i->post('kode_program'),
							'nama_program'	=>	$i->post('nama_program')
						);

			$this->program_m->edit($data);
			$this->session->set_flashdata('success', 'Data Program PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/program'), 'refresh');
		// end masuk database
		}
	}

	public function del_program()
	{
		$program_id = $this->input->post('program_id');
		$this->program_m->del_program(['program_id' => $program_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_program_add()
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_program', 'Indikator Program PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'program'		=>	$program,
						'tujuan'		=>	$tujuan,
						'sasaran'		=>	$sasaran
					);
		$this->template->load('template', 'perencanaan/program/indikator/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'program_id'				=>	$program_id,
							'uraian_indikator_program'	=>	$i->post('uraian_indikator_program'),
							'awal'						=>	$i->post('awal'),
							'satu'						=>	$i->post('satu'),
							'dua'						=>	$i->post('dua'),
							'tiga'						=>	$i->post('tiga'),
							'empat'						=>	$i->post('empat'),
							'lima'						=>	$i->post('lima'),
							'akhir'						=>	$i->post('akhir'),
							'satuan'					=>	$i->post('satuan'),
							'pagu_satu'					=>	$i->post('pagu_satu'),
							'pagu_dua'					=>	$i->post('pagu_dua'),
							'pagu_tiga'					=>	$i->post('pagu_tiga'),
							'pagu_empat'				=>	$i->post('pagu_empat'),
							'pagu_lima'					=>	$i->post('pagu_lima')
						);
			$this->program_m->indikator_program_add($data);
			$this->session->set_flashdata('success', 'Data Indikator Program PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/program'), 'refresh');
		// end masuk database
		}
	}

	public function indikator_program_edit($indikator_program_id)
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$indikator_program_id = $this->uri->segment(10);
		$indikator_program = $this->program_m->detail_indikator_program($indikator_program_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_program', 'Indikator Program PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'indikator_program'		=>	$indikator_program,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'program'				=>	$program,
						'tujuan'				=>	$tujuan,
						'sasaran'				=>	$sasaran
					);
		$this->template->load('template', 'perencanaan/program/indikator/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_program_id'		=>	$indikator_program_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'program_id'				=>	$program_id,
							'uraian_indikator_program'	=>	$i->post('uraian_indikator_program'),
							'awal'						=>	$i->post('awal'),
							'satu'						=>	$i->post('satu'),
							'dua'						=>	$i->post('dua'),
							'tiga'						=>	$i->post('tiga'),
							'empat'						=>	$i->post('empat'),
							'lima'						=>	$i->post('lima'),
							'akhir'						=>	$i->post('akhir'),
							'satuan'					=>	$i->post('satuan'),
							'pagu_satu'					=>	$i->post('pagu_satu'),
							'pagu_dua'					=>	$i->post('pagu_dua'),
							'pagu_tiga'					=>	$i->post('pagu_tiga'),
							'pagu_empat'				=>	$i->post('pagu_empat'),
							'pagu_lima'					=>	$i->post('pagu_lima')
						);

			$this->program_m->indikator_program_edit($data);
			$this->session->set_flashdata('success', 'Data Indikator Program PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/program'), 'refresh');
		// end masuk database
		}
	}

	public function del_indikator_program()
	{
		$indikator_program_id = $this->input->post('indikator_program_id');
		$this->program_m->del_indikator_program(['indikator_program_id' => $indikator_program_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_program_realisasi($indikator_program_id)
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$indikator_program_id = $this->uri->segment(10);
		$indikator_program = $this->program_m->detail_indikator_program($indikator_program_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_program', 'Indikator Program PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'indikator_program'		=>	$indikator_program,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'program'				=>	$program,
						'tujuan'				=>	$tujuan,
						'sasaran'				=>	$sasaran
					);
		$this->template->load('template', 'perencanaan/program/indikator/realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_program_id'	=>	$indikator_program_id,
							'r_awal'				=>	$i->post('r_awal'),
							'r_satu'				=>	$i->post('r_satu'),
							'r_dua'					=>	$i->post('r_dua'),
							'r_tiga'				=>	$i->post('r_tiga'),
							'r_empat'				=>	$i->post('r_empat'),
							'r_lima'				=>	$i->post('r_lima'),
							'r_akhir'				=>	$i->post('r_akhir')
						);

			$this->program_m->indikator_program_realisasi($data);
			$this->session->set_flashdata('success', 'Data Realisasi Indikator Program PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/program'), 'refresh');
		// end masuk database
		}
	}
}

/* End of file Program PD.php */
/* Location: ./application/controllers/Program PD.php */