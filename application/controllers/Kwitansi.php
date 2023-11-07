<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kwitansi_m', 'pegawai_m', 'st_m', 'ttd_keu_m', 'sppd_m','pp_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$kwitansi = $this->kwitansi_m->listing($portal_id);
		$realisasi = $this->kwitansi_m->get_realisasi_subkeg($portal_id);

		$data = array(	'kwitansi'		=> $kwitansi,
						'realisasi'		=> $realisasi
					);

		$this->template->load('template', 'spj/kwitansi/list', $data);
	}

	public function belanja()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);

		$belanja = $this->kwitansi_m->getbelanjadata($pp_id);

		$data = array(	'belanja'		=> $belanja
					);

		$this->template->load('template', 'spj/kwitansi/belanja', $data);
	}

	public function data()
	{
		$portal_id = $this->uri->segment(2);
		$belanja_id = $this->uri->segment(6);

		$kwitansi = $this->kwitansi_m->get($belanja_id);

		$data = array(	'kwitansi'		=> $kwitansi
					);

		$this->template->load('template', 'spj/kwitansi/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$belanja_id = $this->uri->segment(6);

		//$pp = $this->kwitansi_m->getkwitansi($portal_id);
		$r_pp = $this->kwitansi_m->getkwitansi($belanja_id);
		//$ttd_keu = $this->ttd_keu_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('r_pp_id', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'add',
						//'pp'		=> $pp,
						'r_pp'		=> $r_pp,
						//'ttd_keu'	=> $ttd_keu
					);
		$this->template->load('template', 'spj/kwitansi/add', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'portal_id'		=> $portal_id,
						'user_id'		=> $this->session->userdata('userid'),
						'r_pp_id'		=> $i->post('r_pp_id'),
						//'ttd_keu_id'	=> $i->post('ttd_keu_id'),
						'nomor_bukti'	=> $i->post('nomor_bukti'),
						'tanggal'		=> $i->post('tanggal')
					);

			$this->kwitansi_m->add($data);
			$this->session->set_flashdata('success', 'Data Kwitansi Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/data'), 'refresh');
		// end masuk database
		}
	}

	public function edit($kwitansi_id)
	{
		$portal_id = $this->uri->segment(2);
		$belanja_id = $this->uri->segment(6);
		$kwitansi_id = $this->uri->segment(8);

		$kwitansi = $this->kwitansi_m->detail($kwitansi_id);
		//$pp = $this->kwitansi_m->getkwitansi($portal_id);
		$r_pp = $this->kwitansi_m->getkwitansi($belanja_id);
		//$ttd_keu = $this->ttd_keu_m->get($portal_id);

		$valid = $this->form_validation;

		$valid->set_rules('r_pp_id', 'Uraian', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'kwitansi'	=> $kwitansi,
						//'pp'		=> $pp,
						'r_pp'		=> $r_pp,
						//'ttd_keu'	=> $ttd_keu
					);
		$this->template->load('template', 'spj/kwitansi/edit', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'kwitansi_id'	=> $kwitansi_id,
						'portal_id'		=> $portal_id,
						'user_id'		=> $this->session->userdata('userid'),
						'r_pp_id'		=> $i->post('r_pp_id'),
						//'ttd_keu_id'	=> $i->post('ttd_keu_id'),
						'nomor_bukti'	=> $i->post('nomor_bukti'),
						'tanggal'		=> $i->post('tanggal')
					);

			$this->kwitansi_m->edit($data);
			$this->session->set_flashdata('success', 'Data Kwitansi Telah diUpdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kwitansi/'.$this->uri->segment(4).'/belanja/'.$this->uri->segment(6).'/data'), 'refresh');
		// end masuk database
		}
	}

	public function del_kwitansi()
	{
		$kwitansi_id = $this->input->post('kwitansi_id');
		$this->kwitansi_m->del_kwitansi(['kwitansi_id' => $kwitansi_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
			$this->session->set_flashdata('success', 'Data Kwitansi Telah dihapus');
		} else {
			$params = array("success" => false);
			$this->session->set_flashdata('success', 'Data Kwitansi gagal dihapus!');
		}
		echo json_encode($params);
	}

	public function cetak($kwitansi_id)
	{
		$portal_id = $this->uri->segment(2);
		$kwitansi_id = $this->uri->segment(8);

		$kwitansi = $this->kwitansi_m->cetak($kwitansi_id);
		//$pp = $this->kwitansi_m->getkwitansi($kwitansi_id);
		//$r_pp = $this->kwitansi_m->getkwitansi($kwitansi_id);
		//$ttd_keu = $this->kwitansi_m->get_ttd_keu($kwitansi_id);

		$data = array(	'title'		=> 'Kwitansi',
						'kwitansi'	=> $kwitansi,
						//'pp'		=> $pp,
						//'r_pp'		=> $r_pp,
						//'ttd_keu'	=> $ttd_keu
					);

		$this->load->view('spj/kwitansi/cetak', $data, FALSE);
	}

	public function cetak2($kwitansi_id)
	{
		$portal_id = $this->uri->segment(2);
		$kwitansi_id = $this->uri->segment(8);

		$kwitansi = $this->kwitansi_m->cetak($kwitansi_id);
		//$pp = $this->kwitansi_m->getkwitansi($kwitansi_id);
		//$r_pp = $this->kwitansi_m->getkwitansi($kwitansi_id);
		//$ttd_keu = $this->kwitansi_m->get_ttd_keu($kwitansi_id);

		$data = array(	'title'		=> 'Kwitansi',
						'kwitansi'	=> $kwitansi,
						//'pp'		=> $pp,
						//'r_pp'		=> $r_pp,
						//'ttd_keu'	=> $ttd_keu
					);

		$this->load->view('spj/kwitansi/cetak2', $data, FALSE);
	}

	public function cetak_dinas_biasa($kwitansi_id)
	{
		$portal_id = $this->uri->segment(2);
		$kwitansi_id = $this->uri->segment(8);

		$kwitansi = $this->kwitansi_m->cetak($kwitansi_id);
		//$pp = $this->kwitansi_m->getkwitansi($kwitansi_id);
		//$r_pp = $this->kwitansi_m->getkwitansi($kwitansi_id);
		//$ttd_keu = $this->kwitansi_m->get_ttd_keu($kwitansi_id);

		$data = array(	'title'		=> 'Kwitansi',
						'kwitansi'	=> $kwitansi,
						//'pp'		=> $pp,
						//'r_pp'		=> $r_pp,
						//'ttd_keu'	=> $ttd_keu
					);

		$this->load->view('spj/kwitansi/cetak_dinas_biasa', $data, FALSE);
	}
}

/* End of file Kwitansi.php */
/* Location: ./application/controllers/Kwitansi.php */