<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['kegiatan_m','ik_kegiatan_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$kegiatan_id = $this->uri->segment(4);

    	$ik_kegiatan = $this->ik_kegiatan_m->get($kegiatan_id);

   		$data = array(  'ik_kegiatan' =>  $ik_kegiatan
   					);

		$this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/ik_kegiatan_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

	    $kegiatan_id = $this->uri->segment(4);
	    $kegiatan = $this->kegiatan_m->detail($kegiatan_id);

	    $valid = $this->form_validation;

	    $valid->set_rules('name', 'Nama Indikator', 'required',
	        array(  'required'  =>  '%s harus diisi'));

	    if($valid->run()===FALSE) {

	    $data = array(  'page'    => 'add',
	            		'kegiatan' => $kegiatan
	          );
	    $this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/ik_kegiatan_add', $data);
	    // masuk database
	    }else{
	      $i = $this->input;
	      $data = array(  'portal_id' 	=> $portal_id,
	                      'kegiatan_id'  => $kegiatan_id,
	                      'name'      	=> $i->post('name'),
	                      'formulasi' 	=> $i->post('formulasi')
	            );

	      $this->ik_kegiatan_m->add($data);
	      $this->session->set_flashdata('sukses', 'Data Indikator Program Telah ditambah');
	      redirect(base_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$this->uri->segment(4).'/ik_kegiatan'), 'refresh');
	    // end masuk database
    	}
	}

	public function edit($ik_kegiatan_id)
	{
		$portal_id = $this->uri->segment(2);

	    $kegiatan_id = $this->uri->segment(4);

	    $ik_kegiatan_id = $this->uri->segment(7);
	    $ik_kegiatan = $this->ik_kegiatan_m->detail($ik_kegiatan_id);

	    $valid = $this->form_validation;

	    $valid->set_rules('name', 'Nama Indikator', 'required',
	        array(  'required'  =>  '%s harus diisi'));

	    if($valid->run()===FALSE) {

	    $data = array(  'page'       => 'edit',
	            		'ik_kegiatan' => $ik_kegiatan
	          );
	    $this->template->load('template', 'perencanaan/renstra/kegiatan/ik_kegiatan/ik_kegiatan_edit', $data);
	    // masuk database
	    }else{
	      $i = $this->input;
	      $data = array(  'ik_kegiatan_id'  => $ik_kegiatan_id,
	                      'portal_id'       => $portal_id,
	                      'kegiatan_id'     => $kegiatan_id,
	                      'name'            => $i->post('name'),
	                      'formulasi'       => $i->post('formulasi')
	            );

	      $this->ik_kegiatan_m->edit($data);
	      $this->session->set_flashdata('sukses', 'Data Indikator Tujuan RPJMD Telah diupdate');
	      redirect(base_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$this->uri->segment(4).'/ik_kegiatan'), 'refresh');
	    // end masuk database
    	}
	}

	public function del_ik_kegiatan()
	{
	    $ik_kegiatan_id = $this->input->post('ik_kegiatan_id');
	    $this->ik_kegiatan_m->del_ik_kegiatan(['ik_kegiatan_id' => $ik_kegiatan_id]);

	    if($this->db->affected_rows() > 0) {
	      $params = array("success" => true);
	    } else {
	      $params = array("success" => false);
	    }
	    echo json_encode($params);
	}

}

/* End of file Ik_kegiatan.php */
/* Location: ./application/controllers/Ik_kegiatan.php */