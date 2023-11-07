<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_ik_tujuan_rpjmd extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['rpjmd_m','portal_m','ik_tujuan_rpjmd_m','target_ik_tujuan_rpjmd_m']);
	}

	public function index()
	{
		$ik_tujuan_rpjmd_id = $this->uri->segment(6);

		$target_ik_tujuan_rpjmd = $this->target_ik_tujuan_rpjmd_m->get($ik_tujuan_rpjmd_id);

		$data = array(	'target_ik_tujuan_rpjmd'	=>	$target_ik_tujuan_rpjmd

					);

		$this->template->load('template', 'perencanaan/rpjmd/ik_tujuan_rpjmd/target_ik_tujuan_rpjmd/target_ik_tujuan_rpjmd_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$ik_tujuan_rpjmd_id = $this->uri->segment(6);

		if ($this->input->post('submit', TRUE) == 'submit') {
 
         $post = $this->input->post();
 
         foreach ($post['tahun'] as $key => $value) {
            //masukkan data ke variabel array jika kedua form tidak kosong
            if ($post['tahun'][$key] != '' || $post['target'][$key] != '' || $post['satuan'][$key] != '')
            {
               $simpan[] = array(
                  'portal_id'			=> $portal_id,
                  'ik_tujuan_rpjmd_id'	=> $ik_tujuan_rpjmd_id,
                  'tahun'     			=> $post['tahun'][$key],
                  'target'     			=> $post['target'][$key],
                  'satuan'     			=> $post['satuan'][$key],
               );
            }
         }
 
         //simpan data
        $this->target_ik_tujuan_rpjmd_m->add('target_ik_tujuan_rpjmd', $simpan);
        $this->session->set_flashdata('sukses', 'Data Target Indikator Tujuan RPJMD Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_tujuan_rpjmd/'.$this->uri->segment(6).'/target_ik_tujuan_rpjmd'), 'refresh');
		// end masuk database
		}

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add'
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_tujuan_rpjmd/target_ik_tujuan_rpjmd/target_ik_tujuan_rpjmd_add', $data);
	}
}

	public function edit($target_ik_tujuan_rpjmd_id)
	{
		$portal_id = $this->uri->segment(2);

		$ik_tujuan_rpjmd_id = $this->uri->segment(6);

		$target_ik_tujuan_rpjmd_id = $this->uri->segment(9);
		$target_ik_tujuan_rpjmd = $this->target_ik_tujuan_rpjmd_m->detail($target_ik_tujuan_rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'						=> 'edit',
						'target_ik_tujuan_rpjmd'	=> $target_ik_tujuan_rpjmd
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_tujuan_rpjmd/target_ik_tujuan_rpjmd/target_ik_tujuan_rpjmd_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'target_ik_tujuan_rpjmd_id'	=> $target_ik_tujuan_rpjmd_id,
							'portal_id'					=> $portal_id,
							'ik_tujuan_rpjmd_id'		=> $ik_tujuan_rpjmd_id,
							'tahun'						=> $i->post('tahun'),
							'target'					=> $i->post('target'),
							'satuan'					=> $i->post('satuan')
						);

			$this->target_ik_tujuan_rpjmd_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Tujuan RPJMD Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_tujuan_rpjmd/'.$this->uri->segment(6).'/target_ik_tujuan_rpjmd'), 'refresh');
		// end masuk database
		}
	}

	public function del_target_ik_tujuan_rpjmd()
	{
		$target_ik_tujuan_rpjmd_id = $this->input->post('target_ik_tujuan_rpjmd_id');
		$this->target_ik_tujuan_rpjmd_m->del_target_ik_tujuan_rpjmd(['target_ik_tujuan_rpjmd_id' => $target_ik_tujuan_rpjmd_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function realisasi($target_ik_tujuan_rpjmd_id)
	{
		$portal_id = $this->uri->segment(2);

		$ik_tujuan_rpjmd_id = $this->uri->segment(6);

		$target_ik_tujuan_rpjmd_id = $this->uri->segment(9);
		$target_ik_tujuan_rpjmd = $this->target_ik_tujuan_rpjmd_m->detail($target_ik_tujuan_rpjmd_id);

		$valid = $this->form_validation;

		$valid->set_rules('realisasi', 'Realisasi Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'						=> 'realisasi',
						'target_ik_tujuan_rpjmd'	=> $target_ik_tujuan_rpjmd
					);
		$this->template->load('template', 'perencanaan/rpjmd/ik_tujuan_rpjmd/target_ik_tujuan_rpjmd/target_ik_tujuan_rpjmd_realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'target_ik_tujuan_rpjmd_id'	=> $target_ik_tujuan_rpjmd_id,
							'portal_id'					=> $portal_id,
							'ik_tujuan_rpjmd_id'		=> $ik_tujuan_rpjmd_id,
							'realisasi'					=> $i->post('realisasi')
						);

			$this->target_ik_tujuan_rpjmd_m->realisasi($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Tujuan RPJMD Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_tujuan_rpjmd/'.$this->uri->segment(6).'/target_ik_tujuan_rpjmd'), 'refresh');
		// end masuk database
		}
	}
}
