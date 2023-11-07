<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencaker_pd extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('pencaker_pd_m');
	}

	public function index()
	{
		$data['row'] = $this->pencaker_pd_m->get();

		$this->template->load('template', 'tktr/pencaker/pencaker_pd_data', $data);
	}

	public function add()
	{
		$pencaker_pd = new stdClass();
		$pencaker_pd->pencaker_pd_id = null;
		$pencaker_pd->tahun = null;
		$pencaker_pd->pendidikan = null;

		$data = array(
			'page' 	=> 'add',
			'row'	=>	$pencaker_pd
		);
		$this->template->load('template', 'tktr/pencaker/pencaker_pd_form', $data);
	}

	public function save()
	{
		$pencaker_pd_jml = new stdClass();
		$pencaker_pd_jml->pencaker_pd_id = null;
		$pencaker_pd_jml->bulan = null;
		$pencaker_pd_jml->jml_org = null;

		$data = array(
			'page' 	=> 'save',
			'row'	=>	$pencaker_pd_jml
		);
		$this->template->load('template', 'tktr/pencaker/pencaker_pd_jml_form', $data);
	}

	public function edit($id)
	{
		$query = $this->pencaker_pd_m->get($id);
		if($query->num_rows() > 0) {
			$pencaker_pd = $query->row();
			$data = array(
				'page'	=>	'edit',
				'row'	=>	$pencaker_pd
			);
			$this->template->load('template', 'tktr/pencaker/pencaker_pd_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('pencaker_pd')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->pencaker_pd_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->pencaker_pd_m->edit($post);
		}
		
		if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('pencaker_pd')."';</script>";
	}	

	public function del($id)
	{
		$this->pencaker_pd_m->del($id);
		if($this->db->affected_rows() > 0) {
		echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('pencaker_pd')."';</script>";
	}
}

/* End of file Pencaker.php */
/* Location: ./application/controllers/Pencaker.php */