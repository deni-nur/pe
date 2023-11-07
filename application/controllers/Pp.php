<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['subkeg_m','kegiatan_m','program_m','pp_m','st_m','rekening_m','dd_m','ld_m','pp_m','pengikut_m','portal_m','ttd_keu_m','sppd_m','dpa_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pp = $this->pp_m->get($portal_id);
		$realisasi = $this->pp_m->get_realisasi($portal_id);

		$data = array(	'pp'		=>	$pp,
						'realisasi'	=>	$realisasi
					);

		$this->template->load('template', 'spj/pp/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$dpa = $this->dpa_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('dpa_id', 'Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'dpa'		=> $dpa,
						'ttd_keu'	=> $ttd_keu
					);
		$this->template->load('template', 'spj/pp/add', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'portal_id'		=> $portal_id,
						'user_id'		=> $this->session->userdata('userid'),
						'dpa_id'		=> $i->post('dpa_id'),
						'nama_pa'		=> $i->post('nama_pa'),
						'nip_pa'		=> $i->post('nip_pa'),
						'jabatan_pa'	=> $i->post('jabatan_pa'),
						'ttd_keu_id'	=> $i->post('ttd_keu_id'),
						'nama_bpp'		=> $i->post('nama_bpp'),
						'nip_bpp'		=> $i->post('nip_bpp'),
						'jabatan_bpp'	=> $i->post('jabatan_bpp'),
						//'tgl_pp'	    => $i->post('tgl_pp')
					);

			$this->pp_m->add($data);
			$this->session->set_flashdata('success', 'Data Permintaan Pembayaran Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pp'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pp_id)
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(5);

		$pp = $this->pp_m->detail($pp_id);
		$dpa = $this->dpa_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('dpa_id', 'Sub Kegiatan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						'pp'		=> $pp,
						'dpa'		=> $dpa,
						'ttd_keu'	=> $ttd_keu
					);
		$this->template->load('template', 'spj/pp/edit', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'pp_id'			=> $pp_id,
						'portal_id'		=> $portal_id,
						'user_id'		=> $this->session->userdata('userid'),
						'dpa_id'		=> $i->post('dpa_id'),
						'nama_pa'		=> $i->post('nama_pa'),
						'nip_pa'		=> $i->post('nip_pa'),
						'jabatan_pa'	=> $i->post('jabatan_pa'),
						'ttd_keu_id'	=> $i->post('ttd_keu_id'),
						'nama_bpp'		=> $i->post('nama_bpp'),
						'nip_bpp'		=> $i->post('nip_bpp'),
						'jabatan_bpp'	=> $i->post('jabatan_bpp'),
						//'tgl_pp'	    => $i->post('tgl_pp')
					);

			$this->pp_m->edit($data);
			$this->session->set_flashdata('success', 'Data Permintaan Pembayaran Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pp'), 'refresh');
		// end masuk database
		}
	}

	public function del_pp()
	{
		$pp_id = $this->input->post('pp_id');
		$this->pp_m->del_pp(['pp_id' => $pp_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($pp_id)
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(5);

		$pp = $this->pp_m->cetak($pp_id);
		$r_pp = $this->pp_m->getc($pp_id);
		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get($pp_id);
		$belanja = $this->pp_m->get_bel($pp_id);
		$dpa = $this->pp_m->getdpa();
		$sppd = $this->sppd_m->get($pp_id);
		$pengikut = $this->sppd_m->get_pengikut();
		$rekening = $this->rekening_m->get();
		$dd = $this->dd_m->get();
		$ld = $this->ld_m->get();
		$program = $this->program_m->get();
		$kegiatan = $this->kegiatan_m->get();

		$data = array(	'title'		=> 'Permintaan Pembayaran',
						'pp'		=> $pp,
						'r_pp'		=> $r_pp,
						'st'		=> $st,
						'ttd_keu'	=> $ttd_keu,
						'belanja'	=> $belanja,
						'dpa'		=> $dpa,
						'sppd'		=> $sppd,
						'pengikut'	=> $pengikut,
						'rekening'	=> $rekening,
						'dd'		=> $dd,
						'ld'		=> $ld,
						'program'	=> $program,
						'kegiatan'	=> $kegiatan
					);

		$this->load->view('spj/pp/cetak', $data, FALSE);
	}

	public function r_pp_data()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);

		$belanja = $this->pp_m->getbelanja($pp_id);
		$r_pp = $this->pp_m->getrpp($pp_id);

		$data = array(	'belanja'	=>	$belanja,
						'r_pp'		=>	$r_pp
					);

		$this->template->load('template', 'spj/pp/r_pp/data', $data);
	}

	public function r_pp_add()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);

		$r_pp = $this->pp_m->getrpp($portal_id);
		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get();
		$belanja = $this->pp_m->getdpa($pp_id);
		$dpa = $this->dpa_m->get($portal_id);
		$sppd = $this->sppd_m->get($portal_id);
		$pengikut = $this->pp_m->get_pengikut($portal_id);
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
						'user_id'			=> $this->session->userdata('userid'),
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
						'h_pajak'			=> $i->post('biaya') * $i->post('lama_perjalanan') / 100 * $i->post('pajak'),
						'tgl_rpp'			=> $i->post('tgl_rpp')
					);

			$this->pp_m->rpp_add($data);
			$this->session->set_flashdata('success', 'Data Rincian Permintaan Pembayaran Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp_data'), 'refresh');
		// end masuk database
		}
	}

	public function r_pp_edit($r_pp_id)
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);
		$r_pp_id = $this->uri->segment(6);

		$r_pp = $this->pp_m->detail_rpp($r_pp_id);
		$st = $this->st_m->get($portal_id);
		$ttd_keu = $this->ttd_keu_m->get();
		$belanja = $this->pp_m->getdpa($pp_id);
		$dpa = $this->dpa_m->get($portal_id);
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
						'user_id'			=> $this->session->userdata('userid'),
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
						'h_pajak'			=> $i->post('biaya') * $i->post('lama_perjalanan') / 100 * $i->post('pajak'),
						'tgl_rpp'			=> $i->post('tgl_rpp')
					);
			$this->pp_m->rpp_edit($data);
			$this->session->set_flashdata('success', 'Data Rincian Permintaan Pembayaran Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp_data'), 'refresh');
		// end masuk database
		}
	}

	public function del_rpp()
	{
		$r_pp_id = $this->input->post('r_pp_id');
		$this->pp_m->del_rpp(['r_pp_id' => $r_pp_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function nota_dinas()
	{
		$pp_id = $this->uri->segment(4);
		$cetak = $this->input->get('tgl_rpp');

		$pp = $this->pp_m->getpp($pp_id);
		$belanja = $this->pp_m->getbelanja($pp_id);
		$r_pp = $this->pp_m->filter($cetak);

		$data = array(	'title'				=>	'Nota Permintaan Dana',
						'r_pp'				=>	$r_pp,
						'belanja'			=>	$belanja,
						'pp'				=>	$pp
					);

		$this->load->view('spj/pp/r_pp/nota_dinas', $data, FALSE);
	}
	
	public function filter()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);
		$cetak = $this->input->get('tgl_rpp');

		$pp = $this->pp_m->getpp($pp_id);
		$belanja = $this->pp_m->getbelanja($pp_id);
		$r_pp = $this->pp_m->filter($cetak);

		$data = array(	'title'				=>	'Lampiran Nota Permintaan Dana',
						'r_pp'				=>	$r_pp,
						'belanja'			=>	$belanja,
						'pp'				=>	$pp
					);

		$this->load->view('spj/pp/r_pp/cetak', $data, FALSE);
	}
}

/* End of file Pp.php */
/* Location: ./application/controllers/Pp.php */