<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['konfigurasi_m','dashboard_m']);
	}

	// Halaman utama Website - Homepage
	public function index()
	{
		$site 							= $this->konfigurasi_m->listing();
		$indikator_tujuan 				= $this->dashboard_m->indikator_tujuan();
		$indikator_sasaran_rpjmd		= $this->dashboard_m->indikator_sasaran_rpjmd();
		$indikator_sasaran_pd_1			= $this->dashboard_m->indikator_sasaran_pd_1();
		$indikator_sasaran_pd_2			= $this->dashboard_m->indikator_sasaran_pd_2();
		$indikator_program1				= $this->dashboard_m->indikator_program1();
		$indikator_program2				= $this->dashboard_m->indikator_program2();
		$indikator_program3				= $this->dashboard_m->indikator_program3();
		$indikator_program4				= $this->dashboard_m->indikator_program4();
		$indikator_program5				= $this->dashboard_m->indikator_program5();
		$indikator_program6				= $this->dashboard_m->indikator_program6();
		$pad 							= $this->dashboard_m->pad();
		$pelatihan 						= $this->dashboard_m->pelatihan();
		$pelatihan_kejuruan 			= $this->dashboard_m->pelatihan_kejuruan();
		$kelembagaan 					= $this->dashboard_m->kelembagaan();
		$bkk 							= $this->dashboard_m->bkk();
		$padat_karya 					= $this->dashboard_m->padat_karya();
		$padat_karya_desa 				= $this->dashboard_m->padat_karya_desa();
		$tkm 							= $this->dashboard_m->tkm();
		$tkm_desa 						= $this->dashboard_m->tkm_desa();
		$pmi_tahun 						= $this->dashboard_m->pmi_tahun();
		$ngr_tjuan 						= $this->dashboard_m->ngr_tjuan();
		$pmi_kasus 						= $this->dashboard_m->pmi_kasus();
		$tka 							= $this->dashboard_m->tka();
		$tka_perusahaan 				= $this->dashboard_m->tka_perusahaan();
		$perusahaan						= $this->dashboard_m->perusahaan();
		$umk							= $this->dashboard_m->umk();
		$spsb 							= $this->dashboard_m->spsb();
		$pnp_trans 						= $this->dashboard_m->pnp_trans();
		$translok 						= $this->dashboard_m->translok();

		$data = array(	'site'							=>	$site,
						'indikator_tujuan'				=>	$indikator_tujuan,
						'indikator_sasaran_rpjmd'		=>	$indikator_sasaran_rpjmd,
						'indikator_sasaran_pd_1'		=>	$indikator_sasaran_pd_1,
						'indikator_sasaran_pd_2'		=>	$indikator_sasaran_pd_2,
						'indikator_program1'			=>	$indikator_program1,
						'indikator_program2'			=>	$indikator_program2,
						'indikator_program3'			=>	$indikator_program3,
						'indikator_program4'			=>	$indikator_program4,
						'indikator_program5'			=>	$indikator_program5,
						'indikator_program6'			=>	$indikator_program6,
						'pad'							=>	$pad,
						'pelatihan'						=>	$pelatihan,
						'pelatihan_kejuruan'			=>	$pelatihan_kejuruan,
						'kelembagaan'					=>	$kelembagaan,
						'bkk'							=>	$bkk,
						'padat_karya'					=>	$padat_karya,
						'padat_karya_desa'				=>	$padat_karya_desa,
						'tkm'							=>	$tkm,
						'tkm_desa'						=>	$tkm_desa,
						'pmi_tahun'						=>	$pmi_tahun,
						'ngr_tjuan'						=>	$ngr_tjuan,
						'pmi_kasus'						=>	$pmi_kasus,
						'tka'							=>	$tka,
						'tka_perusahaan'				=>	$tka_perusahaan,
						'perusahaan'					=>	$perusahaan,
						'umk'							=>	$umk,
						'spsb'							=>	$spsb,
						'pnp_trans'						=>	$pnp_trans,
						'translok'						=>	$translok
					);
		$this->load->view('home/list', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */