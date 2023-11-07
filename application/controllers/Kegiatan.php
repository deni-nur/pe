<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['tujuan_m','bidang_urusan_m','sasaran_m','sasaran_rpjmd_m','program_m','kegiatan_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$tujuan = $this->tujuan_m->get();
		$sasaran = $this->sasaran_m->get();
		$program = $this->program_m->get();
		$indikator_program = $this->program_m->getindikatorprogram();
		$kegiatan = $this->kegiatan_m->get();
		$indikator_kegiatan = $this->kegiatan_m->getindikatorkegiatan();

		$data = array(	'bidang_urusan'			=>	$bidang_urusan,
						'tujuan'				=>	$tujuan,
						'sasaran'				=>	$sasaran,
						'program'				=>	$program,
						'indikator_program'		=>	$indikator_program,
						'kegiatan'				=>	$kegiatan,
						'indikator_kegiatan'	=>	$indikator_kegiatan
				);

		$this->template->load('template', 'perencanaan/kegiatan/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$program = $this->program_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan', 'Kegiatan PD', 'required|is_unique[kegiatan.nama_kegiatan]',
				array(	'required'	=>	'%s harus diisi'));

		$this->form_validation->set_message('is_unique', '{field} sudah ada, silahkan ganti');

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran'		=>	$sasaran,
						'tujuan'		=>	$tujuan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'program'		=>	$program
					);
		$this->template->load('template', 'perencanaan/kegiatan/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'		=>	$portal_id,
							'user_id'		=>	$this->session->userdata('userid'),
							'program_id'	=>	$program_id,
							'kode_kegiatan'	=>	$i->post('kode_kegiatan'),
							'nama_kegiatan'	=>	$i->post('nama_kegiatan')
						);

			$this->kegiatan_m->add($data);
			$this->session->set_flashdata('success', 'Data Kegiatan PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/kegiatan'), 'refresh');
		// end masuk database
		}
	}

	public function edit($kegiatan_id)
	{
		$portal_id = $this->uri->segment(2);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$kegiatan_id = $this->uri->segment(11);
		$kegiatan = $this->kegiatan_m->detail($kegiatan_id);

		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan', 'Kegiatan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		$this->form_validation->set_message('is_unique', '{field} sudah ada, silahkan ganti');

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'edit',
						'bidang_urusan'	=>	$bidang_urusan,
						'tujuan'		=>	$tujuan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'sasaran'		=>	$sasaran,
						'program'		=>	$program,
						'kegiatan'		=>	$kegiatan
					);
		$this->template->load('template', 'perencanaan/kegiatan/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'kegiatan_id'		=>	$kegiatan_id,
							'portal_id'			=>	$portal_id,
							'user_id'			=>	$this->session->userdata('userid'),
							'program_id'		=>	$program_id,
							'kode_kegiatan'		=>	$i->post('kode_kegiatan'),
							'nama_kegiatan'		=>	$i->post('nama_kegiatan')
						);

			$this->kegiatan_m->edit($data);
			$this->session->set_flashdata('success', 'Data Kegiatan PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/kegiatan'), 'refresh');
		// end masuk database
		}
	}

	public function del_kegiatan()
	{
		$kegiatan_id = $this->input->post('kegiatan_id');
		$this->kegiatan_m->del_kegiatan(['kegiatan_id' => $kegiatan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function indikator_kegiatan_add()
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$kegiatan_id = $this->uri->segment(10);
		$kegiatan = $this->kegiatan_m->detail($kegiatan_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_kegiatan', 'Indikator Kegiatan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'			=>	'add',
						'bidang_urusan'	=>	$bidang_urusan,
						'sasaran_rpjmd'	=>	$sasaran_rpjmd,
						'tujuan'		=>	$tujuan,
						'sasaran'		=>	$sasaran,
						'program'		=>	$program,
						'kegiatan'		=>	$kegiatan
					);
		$this->template->load('template', 'perencanaan/kegiatan/indikator/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'kegiatan_id'				=>	$kegiatan_id,
							'uraian_indikator_kegiatan'	=>	$i->post('uraian_indikator_kegiatan'),
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
			$this->kegiatan_m->indikator_kegiatan_add($data);
			$this->session->set_flashdata('success', 'Data Indikator Kegiatan PD sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/kegiatan'), 'refresh');
		// end masuk database
		}
	}

	public function indikator_kegiatan_edit($indikator_kegiatan_id)
	{
		$portal_id = $this->uri->segment(2);

		$tujuan_id = $this->uri->segment(4);
		$tujuan = $this->tujuan_m->detail($tujuan_id);

		$sasaran_id = $this->uri->segment(6);
		$sasaran = $this->sasaran_m->detail($sasaran_id);

		$bidang_urusan = $this->bidang_urusan_m->get();
		$sasaran_rpjmd = $this->sasaran_rpjmd_m->get();
		$program = $this->program_m->get();
		$kegiatan = $this->kegiatan_m->get();

		$program_id = $this->uri->segment(8);
		$program = $this->program_m->detail($program_id);

		$kegiatan_id = $this->uri->segment(10);
		$kegiatan = $this->kegiatan_m->detail($kegiatan_id);

		$indikator_kegiatan_id = $this->uri->segment(12);
		$indikator_kegiatan = $this->kegiatan_m->detail_indikator_kegiatan($indikator_kegiatan_id);

		$valid = $this->form_validation;

		$valid->set_rules('uraian_indikator_kegiatan', 'Indikator Kegiatan PD', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'indikator_kegiatan'	=>	$indikator_kegiatan,
						'bidang_urusan'			=>	$bidang_urusan,
						'sasaran_rpjmd'			=>	$sasaran_rpjmd,
						'program'				=>	$program,
						'tujuan'				=>	$tujuan,
						'sasaran'				=>	$sasaran,
						'program'				=>	$program,
						'kegiatan'				=>	$kegiatan,
						'kegiatan'				=>	$kegiatan
					);
		$this->template->load('template', 'perencanaan/kegiatan/indikator/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'indikator_kegiatan_id'		=>	$indikator_kegiatan_id,
							'portal_id'					=>	$portal_id,
							'user_id'					=>	$this->session->userdata('userid'),	
							'kegiatan_id'				=>	$kegiatan_id,
							'uraian_indikator_kegiatan'	=>	$i->post('uraian_indikator_kegiatan'),
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

			$this->kegiatan_m->indikator_kegiatan_edit($data);
			$this->session->set_flashdata('success', 'Data Indikator Kegiatan PD Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/kegiatan'), 'refresh');
		// end masuk database
		}
	}

	public function del_indikator_kegiatan()
	{
		$indikator_kegiatan_id = $this->input->post('indikator_kegiatan_id');
		$this->kegiatan_m->del_indikator_kegiatan(['indikator_kegiatan_id' => $indikator_kegiatan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}

/* End of file Program PD.php */
/* Location: ./application/controllers/Program PD.php */