<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_subkeg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['subkeg_m','ik_subkeg_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$subkeg_id = $this->uri->segment(4);

    	$ik_subkeg = $this->ik_subkeg_m->get($subkeg_id);

   		$data = array(  'ik_subkeg' =>  $ik_subkeg
   					);

		$this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/ik_subkeg_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

	    $subkeg_id = $this->uri->segment(4);
	    $subkeg = $this->subkeg_m->detail($subkeg_id);

	    $valid = $this->form_validation;

	    $valid->set_rules('name', 'Nama Indikator', 'required',
	        array(  'required'  =>  '%s harus diisi'));

	    if($valid->run()===FALSE) {

	    $data = array(  'page'    	=> 'add',
	            		'subkeg'	=> $subkeg
	          );
	    $this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/ik_subkeg_add', $data);
	    // masuk database
	    }else{
	      $i = $this->input;
	      $data = array(  'portal_id' 	=> $portal_id,
	                      'subkeg_id'  	=> $subkeg_id,
	                      'name'      	=> $i->post('name'),
	                      'formulasi' 	=> $i->post('formulasi')
	            );

	      $this->ik_subkeg_m->add($data);
	      $this->session->set_flashdata('sukses', 'Data Indikator Sub Kegiatan Telah ditambah');
	      redirect(base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg'), 'refresh');
	    // end masuk database
    	}
	}

	public function edit($ik_subkeg_id)
	{
		$portal_id = $this->uri->segment(2);

	    $subkeg_id = $this->uri->segment(4);

	    $ik_subkeg_id = $this->uri->segment(7);
	    $ik_subkeg = $this->ik_subkeg_m->detail($ik_subkeg_id);

	    $valid = $this->form_validation;

	    $valid->set_rules('name', 'Nama Indikator', 'required',
	        array(  'required'  =>  '%s harus diisi'));

	    if($valid->run()===FALSE) {

	    $data = array(  'page'       	=> 'edit',
	            		'ik_subkeg'		=> $ik_subkeg
	          );
	    $this->template->load('template', 'perencanaan/renstra/subkeg/ik_subkeg/ik_subkeg_edit', $data);
	    // masuk database
	    }else{
	      $i = $this->input;
	      $data = array(  'ik_subkeg_id'  => $ik_subkeg_id,
	                      'portal_id'     => $portal_id,
	                      'subkeg_id'     => $subkeg_id,
	                      'name'          => $i->post('name'),
	                      'formulasi'     => $i->post('formulasi')
	            );

	      $this->ik_subkeg_m->edit($data);
	      $this->session->set_flashdata('sukses', 'Data Indikator Sub Kegiatan Telah diupdate');
	      redirect(base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg'), 'refresh');
	    // end masuk database
    	}
	}

	public function del_ik_subkeg()
	{
	    $ik_subkeg_id = $this->input->post('ik_subkeg_id');
	    $this->ik_subkeg_m->del_ik_subkeg(['ik_subkeg_id' => $ik_subkeg_id]);

	    if($this->db->affected_rows() > 0) {
	      $params = array("success" => true);
	    } else {
	      $params = array("success" => false);
	    }
	    echo json_encode($params);
	}

}

/* End of file Ik_subkeg.php */
/* Location: ./application/controllers/Ik_subkeg.php */