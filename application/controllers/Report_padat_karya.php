<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_padat_karya extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['padat_karya_m','desa_m','portal_m']);
	}

	public function pakar()
	{
		if(isset($_POST['reset'])) {
			$this->session->unset_userdata('search');
		}
		if(isset($_POST['filter'])) {
			$post = $this->input->post(null, TRUE);
			$this->session->set_userdata('search', $post);
		} else {
			$post = $this->session->userdata('search');
		}
		$data['desa'] = $this->desa_m->get()->result();
		$data['portal'] = $this->portal_m->get()->result();
		$data['row'] = $this->padat_karya_m->get_padat_karya();
		$data['post'] = $post;
		$this->template->load('template', 'report/padat_karya/data', $data);
	}

	public function cetak()
	{
		$data['row'] = $this->padat_karya_m->get_padat_karya();
		$this->load->view('report/padat_karya/cetak', $data);
	}
}

/* End of file Padat_karya.php */
/* Location: ./application/controllers/Padat_karya.php */