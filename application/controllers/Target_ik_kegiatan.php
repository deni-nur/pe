<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_ik_kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kegiatan_m','portal_m','ik_kegiatan_m','target_ik_kegiatan_m']);
	}

	public function index()
	{
		$ik_kegiatan_id = $this->uri->segment(6);

		$target_ik_kegiatan = $this->target_ik_kegiatan_m->get($ik_kegiatan_id);

		$data = array(	'target_ik_kegiatan'	=>	$target_ik_kegiatan

					);

		$this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/target_ik_kegiatan/target_ik_kegiatan_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

		$ik_kegiatan_id = $this->uri->segment(6);

		if ($this->input->post('submit', TRUE) == 'submit') {
 
         $post = $this->input->post();
 
         foreach ($post['tahun'] as $key => $value) {
            //masukkan data ke variabel array jika kedua form tidak kosong
            if ($post['tahun'][$key] != '' || $post['target'][$key] != '' || $post['satuan'][$key] != '')
            {
               $simpan[] = array(
                  'portal_id'		=> $portal_id,
                  'ik_kegiatan_id'	=> $ik_kegiatan_id,
                  'tahun'     		=> $post['tahun'][$key],
                  'target'     		=> $post['target'][$key],
                  'satuan'     		=> $post['satuan'][$key],
                  'pagu'     		=> $post['pagu'][$key],
               );
            }
         }
 
         //simpan data
        $this->target_ik_kegiatan_m->add('target_ik_kegiatan', $simpan);
        $this->session->set_flashdata('sukses', 'Data Target Indikator Kegiatan Telah ditambah');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$this->uri->segment(4).'/ik_kegiatan/'.$this->uri->segment(6).'/target_ik_kegiatan'), 'refresh');
		// end masuk database
		}

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'				=>	'add'
					);
		$this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/target_ik_kegiatan/target_ik_kegiatan_add', $data);
	}
}

	public function edit($target_ik_kegiatan_id)
	{
		$portal_id = $this->uri->segment(2);

		$ik_kegiatan_id = $this->uri->segment(6);

		$target_ik_kegiatan_id = $this->uri->segment(9);
		$target_ik_kegiatan = $this->target_ik_kegiatan_m->detail($target_ik_kegiatan_id);

		$valid = $this->form_validation;

		$valid->set_rules('target', 'Target Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'edit',
						'target_ik_kegiatan'	=> $target_ik_kegiatan
					);
		$this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/target_ik_kegiatan/target_ik_kegiatan_edit', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'target_ik_kegiatan_id'	=> $target_ik_kegiatan_id,
							'portal_id'				=> $portal_id,
							'ik_kegiatan_id'		=> $ik_kegiatan_id,
							'tahun'					=> $i->post('tahun'),
							'target'				=> $i->post('target'),
							'satuan'				=> $i->post('satuan'),
							'pagu'					=> $i->post('pagu')
						);

			$this->target_ik_kegiatan_m->edit($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Kegiatan Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$this->uri->segment(4).'/ik_kegiatan/'.$this->uri->segment(6).'/target_ik_kegiatan'), 'refresh');
		// end masuk database
		}
	}

	public function del_target_ik_kegiatan()
	{
		$target_ik_kegiatan_id = $this->input->post('target_ik_kegiatan_id');
		$this->target_ik_kegiatan_m->del_target_ik_kegiatan(['target_ik_kegiatan_id' => $target_ik_kegiatan_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function realisasi($target_ik_kegiatan_id)
	{
		$portal_id = $this->uri->segment(2);

		$ik_kegiatan_id = $this->uri->segment(6);

		$target_ik_kegiatan_id = $this->uri->segment(9);
		$target_ik_kegiatan = $this->target_ik_kegiatan_m->detail($target_ik_kegiatan_id);

		$valid = $this->form_validation;

		$valid->set_rules('realisasi_ik_kegiatan', 'Realisasi Indikator', 'required',
				array(	'required'	=>	'%s harus diisi'));

		if($valid->run()===FALSE) {

		$data = array(	'page'					=> 'realisasi',
						'target_ik_kegiatan'	=> $target_ik_kegiatan
					);
		$this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/target_ik_kegiatan/target_ik_kegiatan_realisasi', $data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array(	'target_ik_kegiatan_id'	=> $target_ik_kegiatan_id,
							'portal_id'				=> $portal_id,
							'ik_kegiatan_id'		=> $ik_kegiatan_id,
							'realisasi_ik_kegiatan'	=> $i->post('realisasi_ik_kegiatan'),
							'realisasi_pagu'		=> $i->post('realisasi_pagu')
						);

			$this->target_ik_kegiatan_m->realisasi($data);
			$this->session->set_flashdata('sukses', 'Data Target Indikator Kegiatan Telah diupdate');
			redirect(base_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$this->uri->segment(4).'/ik_kegiatan/'.$this->uri->segment(6).'/target_ik_kegiatan'), 'refresh');
		// end masuk database
		}
	}
}
