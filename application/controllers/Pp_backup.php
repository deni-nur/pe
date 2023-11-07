<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pp extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pp_m','program_m','kegiatan_m','subkeg_m','belanja_m','st_m','sppd_m','rekening_m','pelaksana_m','pengikut_m','dd_m','ld_m','ttd_m']);
	}

	public function index()
	{
		// $pp = $this->pp_m->get()->result();
		// $program = $this->program_m->get();
		// $kegiatan = $this->kegiatan_m->get();
		// $subkeg 	= $this->subkeg_m->get();

		// $data = array(	'pp'		=>	$pp,
		// 				'program'	=>	$program,
		// 				'kegiatan'	=>	$kegiatan,
		// 				'subkeg'	=>	$subkeg
		// 			);

		// $this->template->load('template', 'spj/pp/pp_data', $data);
		$data['row'] = $this->pp_m->get();
		$this->template->load('template', 'spj/pp/pp_data', $data);
	}

	public function add()
	{
		$st_id 		= $this->input->get('st_id');
		$belanja 	= $this->belanja_m->get()->result();
		$st 		= $this->st_m->get()->result();
		$sppd 		= $this->sppd_m->get_join($st_id);
		$sppd_p 	= $this->sppd_m->get_join_p($st_id);
		$pelaksana 	= $this->pelaksana_m->get_join($st_id);
		$pengikut 	= $this->pengikut_m->get_join($st_id);
		$rekening	= $this->rekening_m->get()->result();
		$dd 		= $this->dd_m->get_join()->result();
		$ld 		= $this->ld_m->get_join()->result();
		$pp 		= $this->pp_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('tgl_pp', 'PP', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'pp'		=>	$pp,
						'belanja'	=>	$belanja,
						'st'		=>	$st,
						'sppd'		=>	$sppd,
						'sppd_p'	=>	$sppd_p,
						'pelaksana'	=>	$pelaksana,
						'pengikut'	=>	$pengikut,
						'rekening'	=>	$rekening,
						'dd'		=>	$dd,
						'ld'		=>	$ld
					);
		$this->template->load('template', 'spj/pp/pp_form', $data);
		// masuk database
		}else{
		$i = $this->input;
		$data = array(	'subkeg_id'			=>	$i->post('subkeg_id'),
						'st_id'				=>	$i->post('st_id'),
						'pelaksana_id'		=>	$i->post('pelaksana_id'),
						'pengikut_id'		=>	$i->post('pengikut_id'),
						'name'				=>	$i->post('name'),
						'rekening_id'		=>	$i->post('rekening_id'),
						'sppd_id'			=>	$i->post('sppd_id'),
						'uraian'			=>	$i->post('uraian'),
						'dd_id'				=>	$i->post('dd_id'),
						'ld_id'				=>	$i->post('ld_id'),
						'biaya'				=>	$i->post('biaya'),
						'lama_perjalanan'	=>	$i->post('lama_perjalanan'),
						// 'bruto'				=>	($i->post('biaya') * $i->post('lama_perjalanan')),
						'pajak'				=>	$i->post('pajak'),
						// 'persen'			=>	'100',
						// 'jumlah'			=>	('bruto'/'100') * $i->post('pajak'),
						// 'neto'				=>	('bruto'-'jumlah'),
						// 'total'				=>	('neto'),
						'tgl_pp'			=>	$i->post('tgl_pp'),
					);

			$this->pp_m->add($data);
			$this->session->set_flashdata('sukses', 'Data PP Telah ditambah');
			redirect(base_url('pp'), 'refresh');
		// end masuk database
		}
	}

	// 	$pp = new stdClass();
	// 	$pp->pp_id = null;
	// 	$pp->belanja_id = null;
	// 	$pp->st_id = null;
	// 	$pp->name = null;
	// 	$pp->rekening_id = null;
	// 	$pp->sppd_id = null;
	// 	$pp->uraian = null;
	// 	$pp->dd_id = null;
	// 	$pp->ld_id = null;
	// 	$pp->biaya = null;
	// 	$pp->lama_perjalanan = null;
	// 	$pp->bruto = null;
	// 	$pp->pajak = null;
	// 	$pp->persen = null;
	// 	$pp->jumlah = null;
	// 	$pp->neto = null;
	// 	$pp->total = null;
	// 	$pp->tgl_pp = null;

	// 	$st_id 		= $this->input->post('st_id');
	// 	$belanja 	= $this->belanja_m->get()->result();
	// 	$st 		= $this->st_m->get()->result();
	// 	$sppd 		= $this->sppd_m->get_join($st_id);
	// 	$pelaksana 	= $this->pelaksana_m->get_join($st_id);
	// 	$pengikut 	= $this->pengikut_m->get_join($st_id);
	// 	$rekening	= $this->rekening_m->get()->result();
	// 	$dd 		= $this->dd_m->get_join()->result();
	// 	$ld 		= $this->ld_m->get_join()->result();

	// 	$data = array(	'page'	 	=> 'add',
	// 					'row'		=>	$pp,
	// 					'belanja'	=>	$belanja,
	// 					'st'		=>	$st,
	// 					'sppd'		=>	$sppd,
	// 					'pelaksana'	=>	$pelaksana,
	// 					'pengikut'	=>	$pengikut,
	// 					'rekening'	=>	$rekening,
	// 					'dd'		=>	$dd,
	// 					'ld'		=>	$ld
	// 	);
	// 	$this->template->load('template', 'spj/pp/pp_form', $data);
	// }

	public function edit($id)
	{
		$query = $this->pp_m->get($id);
		if($query->num_rows() > 0) {
			$pp = $query->row();
			$data = array(
				'page'	=>	'edit',
				'row'	=>	$pp
			);
			$this->template->load('template', 'spj/pp/pp_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('pp')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->pp_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->pp_m->edit($post);
		}
		
		if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			// echo "<script>window.location='".site_url('pp')."';</script>";
	}

	public function del($id)
	{
		$this->pp_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0) {
			$this->session->set_flashdata('error', 'Data Tidak Dapat Dihapus (sudah berelasi)');
			// echo "<script>alert('Data Tidak Dapat Dihapus (sudah berelasi)');</script>";
		}else {	
			echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('pp')."';</script>";
	}

	public function ttd_pp($pp_id)
	{

		// $st 	= $this->st_m->detail($pp_id);
		$ttd_pp = $this->pp_m->ttd_pp($pp_id);
		$ttd 	= $this->ttd_m->get();
		$pp = $this->pp_m->detail($pp_id);

		$valid = $this->form_validation;

		$valid->set_rules('ttd_id', 'Nama Penandatangan', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	
						'ttd_pp'	=>	$ttd_pp,
						'ttd'		=>	$ttd,
						'pp'		=>	$pp
					);
		$this->template->load('template', 'spj/pp/ttd_pp', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pp_id'		=>	$pp_id,
							'ttd_id'	=>	$i->post('ttd_id')
						);
			$this->pp_m->tambah_ttd_pp($data);
			$this->session->set_flashdata('sukses', 'Data Penandatangan Telah ditambah');
			redirect(base_url('pp/ttd_pp/'.$pp_id), 'refresh');
		// end masuk database
		}
	}

	public function delete_ttd_pp($pp_id,$ttd_pp_id)
	{
		$data = array('ttd_pp_id' => $ttd_pp_id);
		$this->pp_m->delete_ttd_pp($data);
		$this->session->set_flashdata('sukses', 'Data Penandatangan Telah dihapus');
		redirect(base_url('pp/ttd_pp/'.$pp_id), 'refresh');
	}

	public function filter()
	{
		$filter = $this->input->get('tgl_pp');
		$pp_id = $this->input->get('pp_id');

		$pp = $this->pp_m->filter($filter);
		$program = $this->program_m->get('program_id');
		$ttd_pp = $this->pp_m->ttd_pp($pp_id);

		$data = array(	'title'		=>	'Permintaan Pembayaran',
						'pp'		=>	$pp,
						'program'	=>	$program,
						'ttd_pp'	=>	$ttd_pp
					);

		$this->load->view('spj/pp/cetak', $data, FALSE);
	}
}
