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

	public function save()
	{
    //jika button simpan di klik
      if ($this->input->post('submit', TRUE) == 'submit') {
 
         $post = $this->input->post();
 
         foreach ($post['tahun'] as $key => $value) {
            //masukkan data ke variabel array jika kedua form tidak kosong
            if ($post['tahun'][$key] != '' || $post['bulan'][$key] != '' || $post['pendidikan'][$key] != '' || $post['jml_org'][$key] != '')
            {
               $simpan[] = array(
                  'tahun' 		=> $post['tahun'][$key],
                  'bulan'       => $post['bulan'][$key],
                  'pendidikan'  => $post['pendidikan'][$key],
                  'jml_org'     => $post['jml_org'][$key]
               );
            }
         }
 
         //simpan data
         $this->pencaker_pd_m->save_batch('pencaker_pd', $simpan);
         //redirect
         redirect('pencaker_pd');
 
      }
      //ambil data
      $data['data'] = $this->pencaker_pd_m->get();

		$this->template->load('template', 'tktr/pencaker/pencaker_pd_form', $data);
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
			$this->template->load('template', 'tktr/pencaker/pencaker_pd_form', $data);
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
			echo "<script>window.location='".site_url('pencaker_pd')."';</script>";
	}

	public function del($id)
	{
		$this->pencaker_m->del($id);
		if($this->db->affected_rows() > 0) {
		echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='".site_url('pencaker_pd')."';</script>";
	}
}

/* End of file Pencaker.php */
/* Location: ./application/controllers/Pencaker.php */