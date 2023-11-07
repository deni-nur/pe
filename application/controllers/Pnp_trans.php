<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pnp_trans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pnp_trans_m','desa_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$portal_id = $this->uri->segment(2);

		$pnp_trans = $this->pnp_trans_m->get($portal_id);

		$data = array(	'pnp_trans'	=>	$pnp_trans
					);
		
		$this->template->load('template', 'tktr/pnp_trans/data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);
		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=>	'add',
						'desa'		=>	$desa
					);
		$this->template->load('template', 'tktr/pnp_trans/add', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'portal_id'			=> $portal_id,
							'user_id'			=> $this->session->userdata('userid'),
							'desa_id'			=> $i->post('desa_id'),
							'desa_luar_id'		=> $i->post('desa_luar_id'),
							'nama_kk'			=> $i->post('nama_kk'),
							'jk'				=> $i->post('jk'),
							'umur'				=> $i->post('umur'),
							'status'			=> $i->post('status'),
							'hub_kel'			=> $i->post('hub_kel'),
							'pendidikan'		=> $i->post('pendidikan'),
							'pekerjaan_pokok'	=> $i->post('pekerjaan_pokok'),
							'keterampilan'		=> $i->post('keterampilan'),
							'agama'				=> $i->post('agama'),
							'tgl_berangkat'		=> $i->post('tgl_berangkat'),
							'tgl_tiba'			=> $i->post('tgl_tiba'),
							'jenis_trans'		=> $i->post('jenis_trans'),
							'perubahan_mutasi'	=> $i->post('perubahan_mutasi'),
							'ket'				=> $i->post('ket')
						);
			$this->pnp_trans_m->add($data);
			$this->session->set_flashdata('success', 'Data Penempatan Transmigrasi sukses ditambah');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pnp_trans'), 'refresh');
		// end masuk database
		}
	}

	public function edit($pnp_trans_id)
	{
		$portal_id = $this->uri->segment(2);

		$pnp_trans_id = $this->uri->segment(5);
		$pnp_trans = $this->pnp_trans_m->detail($pnp_trans_id);
		$desa = $this->desa_m->get();

		$valid = $this->form_validation;

		$valid->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'		=> 'edit',
						'pnp_trans'	=> $pnp_trans,
						'desa'		=> $desa
					);
		$this->template->load('template', 'tktr/pnp_trans/edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'pnp_trans_id'	=> $pnp_trans_id,
							'portal_id'			=> $portal_id,
							'user_id'			=> $this->session->userdata('userid'),
							'desa_id'			=> $i->post('desa_id'),
							'desa_luar_id'		=> $i->post('desa_luar_id'),
							'nama_kk'			=> $i->post('nama_kk'),
							'jk'				=> $i->post('jk'),
							'umur'				=> $i->post('umur'),
							'status'			=> $i->post('status'),
							'hub_kel'			=> $i->post('hub_kel'),
							'pendidikan'		=> $i->post('pendidikan'),
							'pekerjaan_pokok'	=> $i->post('pekerjaan_pokok'),
							'keterampilan'		=> $i->post('keterampilan'),
							'agama'				=> $i->post('agama'),
							'tgl_berangkat'		=> $i->post('tgl_berangkat'),
							'tgl_tiba'			=> $i->post('tgl_tiba'),
							'jenis_trans'		=> $i->post('jenis_trans'),
							'perubahan_mutasi'	=> $i->post('perubahan_mutasi'),
							'ket'				=> $i->post('ket')
						);
			$this->pnp_trans_m->edit($data);
			$this->session->set_flashdata('success', 'Data Penempatan Transmigrasi Telah diupdate');
			redirect(base_url('portal/'.$portal_id=$this->uri->segment(2).'/pnp_trans'), 'refresh');
		// end masuk database
		}
	}

	public function del_pnp_trans()
	{
		$pnp_trans_id = $this->input->post('pnp_trans_id');
		$this->pnp_trans_m->del_pnp_trans(['pnp_trans_id' => $pnp_trans_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($pnp_trans_id)
	{
		$portal_id = $this->uri->segment(2);
		$pnp_trans_id = $this->uri->segment(5);

		$datapnp_trans = $this->pnp_trans_m->cetak($pnp_trans_id);
		$darhum = $this->darhum_m->get($portal_id);
		$pengikut = $this->pengikut_m->get($pnp_trans_id);
		$ttd = $this->pnp_trans_m->get_ttd($pnp_trans_id);
		
		$data = array(	'datapnp_trans'	=> $datapnp_trans,
						'darhum'	=> $darhum,
						'pengikut'	=> $pengikut,
						'ttd'		=> $ttd
					);
		$this->load->view('spj/spt/cetak', $data, FALSE);
	}
}

/* End of file Penempatan_transmigrasi.php */
/* Location: ./application/controllers/Penempatan_transmigrasi.php */