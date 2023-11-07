<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_ik_subkeg extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['subkeg_m','portal_m','ik_subkeg_m','target_ik_subkeg_m']);
	}

	public function index()
	{
		$ik_subkeg_id = $this->uri->segment(6);

		$target_ik_subkeg = $this->target_ik_subkeg_m->get($ik_subkeg_id);

		$data = array(	'target_ik_subkeg'	=>	$target_ik_subkeg

					);

		$this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/target_ik_subkeg/target_ik_subkeg_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$ik_subkeg_id = $this->uri->segment(6);

		if ($this->input->post('submit', TRUE) == 'submit') {
 
         $post = $this->input->post();
 
         foreach ($post['tahun'] as $key => $value) {
            //masukkan data ke variabel array jika kedua form tidak kosong
            if ($post['tahun'][$key] != '' || $post['target'][$key] != '' || $post['satuan'][$key] != '')
            {
               $simpan[] = array(
                  'portal_id'		=> $portal_id,
                  'ik_subkeg_id'	=> $ik_subkeg_id,
                  'tahun'     		=> $post['tahun'][$key],
                  'target'     		=> $post['target'][$key],
                  'satuan'     		=> $post['satuan'][$key],
                  'pagu'     		=> $post['pagu'][$key],
               );
            }
         }
 
         //simpan data
        $this->target_ik_subkeg_m->add('target_ik_subkeg', $simpan);
        $this->session->set_flashdata('sukses', 'Data Target Indikator Kegiatan Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$this->uri->segment(6).'/target_ik_subkeg'), 'refresh');
		// end masuk database
		}

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add'
					);
		$this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/target_ik_subkeg/target_ik_subkeg_add', $data);
	}
}

	public function edit($target_ik_subkeg_id)
	{
		$portal_id = $this->uri->segment(2);

		$ik_subkeg_id = $this->uri->segment(6);

		$target_ik_subkeg_id = $this->uri->segment(9);
		$target_ik_subkeg = $this->target_ik_subkeg_m->detail($target_ik_subkeg_id);

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'target_ik_subkeg'	=> $target_ik_subkeg
					);
		$this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/target_ik_subkeg/target_ik_subkeg_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'target_ik_subkeg_id'	=> $target_ik_subkeg_id,
							'portal_id'				=> $portal_id,
							'ik_subkeg_id'			=> $ik_subkeg_id,
							'tahun'					=> $i->post('tahun'),
							'target'				=> $i->post('target'),
							'satuan'				=> $i->post('satuan'),
							'pagu'					=> $i->post('pagu')
						);

			$this->target_ik_subkeg_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Kegiatan Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$this->uri->segment(6).'/target_ik_subkeg'), 'refresh');
		// end masuk database
		}
	}

	public function del_target_ik_subkeg()
	{
		$target_ik_subkeg_id = $this->input->post('target_ik_subkeg_id');
		$this->target_ik_subkeg_m->del_target_ik_subkeg(['target_ik_subkeg_id' => $target_ik_subkeg_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function realisasi($target_ik_subkeg_id)
	{
		$portal_id = $this->uri->segment(2);

		$ik_subkeg_id = $this->uri->segment(6);

		$target_ik_subkeg_id = $this->uri->segment(9);
		$target_ik_subkeg = $this->target_ik_subkeg_m->detail($target_ik_subkeg_id);

		$valid = $this->form_validation;

		$valid->set_rules('realisasi_ik_subkeg', 'Realisasi Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'realisasi',
						'target_ik_subkeg'	=> $target_ik_subkeg
					);
		$this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/target_ik_subkeg/target_ik_subkeg_realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'target_ik_subkeg_id'	=> $target_ik_subkeg_id,
							'portal_id'				=> $portal_id,
							'ik_subkeg_id'			=> $ik_subkeg_id,
							'realisasi_ik_subkeg'	=> $i->post('realisasi_ik_subkeg'),
							'realisasi_pagu'		=> $i->post('realisasi_pagu')
						);

			$this->target_ik_subkeg_m->realisasi($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Kegiatan Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$this->uri->segment(6).'/target_ik_subkeg'), 'refresh');
		// end masuk database
		}
	}
}
