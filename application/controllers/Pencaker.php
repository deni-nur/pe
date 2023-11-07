<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencaker extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('pencaker_m');
	}

	public function index()
	{
		$data['row'] = $this->pencaker_m->get();

		$this->template->load('template', 'tktr/pencaker/pencaker_data', $data);
	}

	public function add()
	{
		$pencaker = new stdClass();
		$pencaker->pencaker_id = null;
		$pencaker->tahun = null;
		$pencaker->bulan = null;
		$pencaker->jk = null;
		$pencaker->pendidikan = null;

		$data = array(
			'page' 	=> 'add',
			'row'	=>	$pencaker
		);
		$this->template->load('template', 'tktr/pencaker/pencaker_form', $data);
	}

	public function edit($id)
	{
		$query = $this->pencaker_m->get($id);
		if($query->num_rows() > 0) {
			$pencaker = $query->row();

			$data = array(
				'page'	=>	'edit',
				'row'	=>	$pencaker
			);
			$this->template->load('template', 'tktr/pencaker/pencaker_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('pencaker')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->pencaker_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->pencaker_m->edit($post);
		}
		
		if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('pencaker')."';</script>";
	}

	public function del($id)
	{
		$this->pencaker_m->del($id);
		if($this->db->affected_rows() > 0) {
		echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('pencaker')."';</script>";
	}
}

/* End of file Pencaker.php */
/* Location: ./application/controllers/Pencaker.php */