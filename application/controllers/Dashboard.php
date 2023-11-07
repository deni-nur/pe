<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['portal_m','dashboard_m']);
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);
		$portal = $this->portal_m->detail($portal_id);
		//$portal = $this->input->post('portal_id');

		$dpa = $this->dashboard_m->dpaget($portal_id);
		$st = $this->dashboard_m->stget($portal_id);
		$sppd = $this->dashboard_m->sppdget($portal_id);
		$lhpd = $this->dashboard_m->lhpdget($portal_id);
		$pp = $this->dashboard_m->ppget($portal_id);
		$kwitansi = $this->dashboard_m->kwitansiget($portal_id);

		// $realisasi_tujuan = $this->dashboard_m->realisasi_tujuan();
		// $realisasi_sasaran = $this->dashboard_m->realisasi_sasaran();
		// $realisasi_renstra = $this->dashboard_m->realisasi_renstra();
		// $umk = $this->dashboard_m->umk();
		// $spsb = $this->dashboard_m->spsb();
		// $pmi = $this->dashboard_m->ngr_tujuan();
		// $translok = $this->dashboard_m->translok();

		$data = array(	'dpa'				=>	''.count($dpa).'',
						'st'				=> 	''.count($st).'',
						'sppd'				=> 	''.count($sppd).'',
						'lhpd'				=> 	''.count($lhpd).'',
						'pp'				=> 	''.count($pp).'',
						'kwitansi'			=> 	''.count($kwitansi).'',
						'portal'			=>	$portal,
						// 'realisasi_tujuan'	=>	$realisasi_tujuan,
						// 'realisasi_sasaran'	=>	$realisasi_sasaran,
						// 'realisasi_renstra'	=>	$realisasi_renstra,
						// 'umk'				=>	$umk,
						// 'spsb'				=>	$spsb,
						// 'pmi'				=>	$pmi,
						// 'translok'			=>	$translok
					);

		// $query = $this->db->query("SELECT st.portal_id, (SELECT SUM(st.maksud)) AS total
		// 	FROM st
		// 	INNER JOIN t_sale ON st.sale_id = t_sale.sale_id
		// 	INNER JOIN p_item ON st.portal_id = p_item.portal_id
		// 	GROUP BY st.portal_id
		// 	ORDER BY sold DESC
		// 	LIMIT 10");

		// $data['st'] = $query->result();

		$this->template->load('template', 'dashboard', $data);
	}
}
