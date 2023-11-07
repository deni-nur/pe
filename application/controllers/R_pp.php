<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R_pp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['renstra_m','subkeg_m','kegiatan_m','program_m','pp_m','st_m','rekening_m','dd_m','ld_m','pp_m','pengikut_m','portal_m','ttd_keu_m','sppd_m','dpa_m','r_belanja_m','a_belanja_m','r_pp_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);

		$r_pp = $this->r_pp_m->getc($pp_id);

		$data = array(	'r_pp'		=>	$r_pp
					);

		$this->template->load('template', 'spj/pp/r_pp/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);

		$r_pp = $this->r_pp_m->get($portal_id);
		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get();
		$belanja = $this->r_pp_m->getbelanja($pp_id);
		$dpa = $this->r_pp_m->getdpa($pp_id);
		$sppd = $this->sppd_m->get($portal_id);
		$pengikut = $this->sppd_m->get_pengikut();
		$rekening = $this->rekening_m->get();
		$dd = $this->dd_m->get($portal_id);
		$ld = $this->ld_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('belanja_id', 'Rincian Belanja', 'required',
				array(	'required'	=>	'%s harus diisi'));

		$valid->set_rules('uraian', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'r_pp'		=> $r_pp,
						'st'		=> $st,
						'ttd_keu'	=> $ttd_keu,
						'belanja'	=> $belanja,
						'dpa'		=> $dpa,
						'sppd'		=> $sppd,
						'pengikut'	=> $pengikut,
						'rekening'	=> $rekening,
						'dd'		=> $dd,
						'ld'		=> $ld
					);
		$this->template->load('template', 'spj/pp/r_pp/add', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'portal_id'			=> $portal_id,
						'pp_id'				=> $pp_id,
						'belanja_id'		=> $i->post('belanja_id'),
						'st_id'				=> $i->post('st_id'),
						'pengikut_id'		=> $i->post('pengikut_id'),
						'sppd_id'			=> $i->post('sppd_id'),
						'rekening_id'		=> $i->post('rekening_id'),
						'uraian'			=> $i->post('uraian'),
						'name'				=> $i->post('name'),
						'nip'				=> $i->post('nip'),
						'pangkat'			=> $i->post('pangkat'),
						'golongan'			=> $i->post('golongan'),
						'jabatan'			=> $i->post('jabatan'),
						'biaya'				=> $i->post('biaya'),
						'lama_perjalanan'	=> $i->post('lama_perjalanan'),
						'pajak'				=> $i->post('pajak'),
						'h_pajak'			=> $i->post('biaya') * $i->post('lama_perjalanan') / 100 * $i->post('pajak')
					);

			$this->r_pp_m->add($data);
			$this->session->set_flashdata('sukses', 'Data Rincian Permintaan Pembayaran Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp'), 'refresh');
		// end masuk database
		}
	}

	public function edit($r_pp_id)
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);
		$r_pp_id = $this->uri->segment(7);

		$r_pp = $this->r_pp_m->detail($r_pp_id);
		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get();
		$belanja = $this->r_pp_m->getbelanja($pp_id);
		$dpa = $this->r_pp_m->getdpa();
		$sppd = $this->sppd_m->get();
		$pengikut = $this->sppd_m->get_pengikut();
		$rekening = $this->rekening_m->get();
		$dd = $this->dd_m->get($portal_id);
		$ld = $this->ld_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('belanja_id', 'Rincian Belanja', 'required',
				array(	'required'	=>	'%s harus diisi'));

		$valid->set_rules('uraian', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'r_pp'		=> $r_pp,
						'st'		=> $st,
						'ttd_keu'	=> $ttd_keu,
						'belanja'	=> $belanja,
						'dpa'		=> $dpa,
						'sppd'		=> $sppd,
						'pengikut'	=> $pengikut,
						'rekening'	=> $rekening,
						'dd'		=> $dd,
						'ld'		=> $ld
					);
		$this->template->load('template', 'spj/pp/r_pp/edit', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'r_pp_id'			=> $r_pp_id,
						'portal_id'			=> $portal_id,
						'pp_id'				=> $pp_id,
						'belanja_id'		=> $i->post('belanja_id'),
						'st_id'				=> $i->post('st_id'),
						'pengikut_id'		=> $i->post('pengikut_id'),
						'sppd_id'			=> $i->post('sppd_id'),
						'rekening_id'		=> $i->post('rekening_id'),
						'uraian'			=> $i->post('uraian'),
						'name'				=> $i->post('name'),
						'nip'				=> $i->post('nip'),
						'pangkat'			=> $i->post('pangkat'),
						'golongan'			=> $i->post('golongan'),
						'jabatan'			=> $i->post('jabatan'),
						'biaya'				=> $i->post('biaya'),
						'lama_perjalanan'	=> $i->post('lama_perjalanan'),
						'pajak'				=> $i->post('pajak'),
						'h_pajak'			=> $i->post('biaya') * $i->post('lama_perjalanan') / 100 * $i->post('pajak')
					);

			$this->r_pp_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Rincian Permintaan Pembayaran Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp'), 'refresh');
		// end masuk database
		}
	}

	public function del_r_pp()
	{
		$r_pp_id = $this->input->post('r_pp_id');
		$this->r_pp_m->del_r_pp(['r_pp_id' => $r_pp_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	// public function cetak($subkeg_id)
	// {
	// 	$pp 	= $this->pp_m->cetak($subkeg_id);
	// 	// $program = $this->program_m->get_join($subkeg_id);

	// 	$data = array(	'title'		=>	'Permintaan Pembayaran',
	// 					'pp'		=>	$pp,
	// 					// 'program'	=>	$program
	// 				);

	// 	$this->load->view('spj/pp/cetak', $data, FALSE);
	// }

	public function cetak()
	{
		$cetak = $this->input->get('tgl_pp');
		$pp_id = $this->input->get('pp_id');

		$pp = $this->pp_m->cetak($cetak);
		$renstra = $this->renstra_m->get();
		$program = $this->program_m->get();
		$kegiatan = $this->kegiatan_m->get();
		$subkeg = $this->subkeg_m->get();
		$dpa = $this->dpa_m->get();
		$belanja = $this->belanja_m->get();
		$a_belanja = $this->a_belanja_m->get();

		$data = array(	'title'		=> 'Permintaan Pembayaran',
						'pp'		=> $pp,
						'renstra'	=> $renstra,
						'program'	=> $program,
						'kegiatan'	=> $kegiatan,
						'subkeg'	=> $subkeg,
						'dpa'		=> $dpa,
						'belanja'	=> $belanja,
						'a_belanja'	=> $a_belanja
					);

		$this->load->view('spj/pp/cetak', $data, FALSE);
	}

	public function filter()
	{
		$filter = $this->input->get('tanggal');
		$r_pp_id = $this->input->get('r_pp_id');
		$pp_id = $this->uri->segment(4);

		$r_pp = $this->r_pp_m->filter($filter);
		$pp = $this->r_pp_m->getpp($pp_id);
		$renstra = $this->renstra_m->get();
		$program = $this->program_m->get();
		$kegiatan = $this->kegiatan_m->get();
		$subkeg = $this->subkeg_m->get();
		$dpa = $this->dpa_m->get();
		$r_belanja = $this->r_belanja_m->get();
		$a_belanja = $this->a_belanja_m->get();

		$data = array(	'title'		=>	'Permintaan Pembayaran',
						'r_pp'		=>	$r_pp,
						'pp'		=> $pp,
						'renstra'	=> $renstra,
						'program'	=> $program,
						'kegiatan'	=> $kegiatan,
						'subkeg'	=> $subkeg,
						'dpa'		=> $dpa,
						'r_belanja'	=> $r_belanja,
						'a_belanja'	=> $a_belanja
					);

		$this->load->view('spj/pp/r_pp/cetak', $data, FALSE);
	}
}

/* End of file Pp.php */
/* Location: ./application/controllers/Pp.php */