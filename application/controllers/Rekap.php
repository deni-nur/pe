<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['rekap_m','st_m','dpa_m','pp_m','akun_m','kelompok_m','jenis_m','objek_m','rincian_objek_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$rekap = $this->rekap_m->get($portal_id);
		$realisasi = $this->rekap_m->get_realisasi_subkeg($portal_id);

		$data = array(	'rekap'		=> $rekap,
						'realisasi'	=> $realisasi
					);
		
		$this->template->load('template', 'spj/rekap/data', $data);
	}

	public function cetak_rincian()
	{
		$dpa_id = $this->uri->segment(5);
		$pp_id = $this->uri->segment(6);

		$pp = $this->rekap_m->getpp($pp_id);
		$belanja = $this->rekap_m->getbelanja($pp_id);
		$r_pp = $this->rekap_m->filter($pp_id);	

		$data = array(	'title'				=>	'Laporan Realisasi Anggaran Tahun '.$this->fungsi->tahun_login()->tahun_perencanaan,
						'r_pp'				=>	$r_pp,
						'belanja'			=>	$belanja,
						'pp'				=>	$pp	
					);

		$this->load->view('spj/rekap/cetak_rincian', $data, FALSE);
	}

	public function cetak_belanja()
	{
		$portal_id = $this->uri->segment(2);
		$dpa_id = $this->uri->segment(5);
		$pp_id = $this->uri->segment(6);

		$pp = $this->rekap_m->getpp($pp_id);
		$belanja = $this->rekap_m->getbelanja($pp_id);
		$r_pp = $this->rekap_m->getrpp($pp_id);
		$realisasi = $this->rekap_m->get_realisasi_subkegiatan($pp_id);

		$data = array(	'title'		=> 'Laporan Realisasi Anggaran Tahun '.$this->fungsi->tahun_login()->tahun_perencanaan,
						'pp'		=> $pp,
						'belanja'	=> $belanja,
						'r_pp'		=> $r_pp,
						'realisasi'	=> $realisasi
					);
		
		$this->load->view('spj/rekap/cetak_belanja', $data, FALSE);
	}

	public function belanja_data()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);

		$belanja = $this->rekap_m->getbelanjadata($pp_id);
		$rincian_pp = $this->rekap_m->getrincianbelanja($pp_id);

		$data = array(	'belanja'		=>	$belanja,
						'rincian_pp'	=>	$rincian_pp
					);

		$this->template->load('template', 'spj/rekap/belanja/data', $data);
	}

	public function rincian_belanja_data()
	{
		$portal_id = $this->uri->segment(2);
		$pp_id = $this->uri->segment(4);
		$belanja_id = $this->uri->segment(6);

		$belanja = $this->rekap_m->getobjekbelanja($belanja_id);
		$rincian_pp = $this->rekap_m->getrincianbelanja($pp_id);

		$data = array(	'rincian_pp'	=>	$rincian_pp,
						'belanja'		=>	$belanja
					);

		$this->template->load('template', 'spj/rekap/belanja/rincian/data', $data);
	}

	public function cetak_rincian_belanja_dinas_biasa()
	{
		$pp_id = $this->uri->segment(4);
		$belanja_id = $this->uri->segment(6);
		$cetak = $this->input->get('tanggal');

		$pp = $this->rekap_m->getpp($pp_id);
		$belanja = $this->rekap_m->getobjekbelanja($belanja_id);
		$r_pp = $this->rekap_m->cetak_rekap_rincian_belanja($cetak);
		$objekbelanja = $this->rekap_m->getobjekbelanja($belanja_id);
		$rincian = $this->rekap_m->cetak_rekap_rincian_belanja($cetak);

		$data = array(	'title'			=>	'Rekapitulasi',
						'pp'			=>	$pp,
						'belanja'		=>	$belanja,
						'r_pp'			=>	$r_pp,
						'objekbelanja'	=>	$objekbelanja,
						'rincian'		=>	$rincian
					);

		$this->load->view('spj/rekap/belanja/rincian/cetak_dinas_biasa', $data, FALSE);
	}

	public function cetak_rincian_belanja_dalam_kota()
	{
		$pp_id = $this->uri->segment(4);
		$belanja_id = $this->uri->segment(6);
		$cetak = $this->input->get('tanggal');

		$pp = $this->rekap_m->getpp($pp_id);
		$belanja = $this->rekap_m->getobjekbelanja($belanja_id);
		$r_pp = $this->rekap_m->cetak_rekap_rincian_belanja($cetak);
		$objekbelanja = $this->rekap_m->getobjekbelanja($belanja_id);
		$rincian = $this->rekap_m->cetak_rekap_rincian_belanja($cetak);

		$data = array(	'title'			=>	'Rekapitulasi',
						'pp'			=>	$pp,
						'belanja'		=>	$belanja,
						'r_pp'			=>	$r_pp,
						'objekbelanja'	=>	$objekbelanja,
						'rincian'		=>	$rincian
					);

		$this->load->view('spj/rekap/belanja/rincian/cetak_dalam_kota', $data, FALSE);
	}

	public function cetak_rekap_perkode_rekening()
	{
		$pp_id = $this->uri->segment(4);
		//$belanja_id = $this->uri->segment(6);
		$date1 = $this->input->get('date1');
		$date2 = $this->input->get('date2');

		$pp = $this->rekap_m->getpp($pp_id);
		$akun = $this->rekap_m->getbelanja($pp_id);
		$kelompok = $this->rekap_m->getbelanja($pp_id);
		$jenis = $this->rekap_m->getbelanja($pp_id);
		$objek = $this->rekap_m->getbelanja($pp_id);
		$rincian_objek = $this->rekap_m->getbelanja($pp_id);
		$sub_rincian_objek = $this->rekap_m->getbelanja($pp_id);
		$rincian = $this->rekap_m->cetak_rekap_rincian_belanja_bulan($date1, $date2);

		$data = array(	'title'				=>	'Rekapitulasi',
						'pp'				=>	$pp,
						'akun'				=>	$akun,
						'kelompok'			=>	$kelompok,
						'jenis'				=>	$jenis,
						'objek'				=>	$objek,
						'rincian_objek'		=>	$rincian_objek,
						'sub_rincian_objek'	=>	$sub_rincian_objek,
						'rincian'			=>	$rincian
					);

		$this->load->view('spj/rekap/belanja/cetak_rekap_perkode_rekening', $data, FALSE);
	}
}
