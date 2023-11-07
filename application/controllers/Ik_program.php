<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_program extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['program_m','ik_program_m']);
		$this->load->helper('fungsi_helper');
	}

	public function index()
	{
		$program_id = $this->uri->segment(4);

    	$ik_program = $this->ik_program_m->get($program_id);

   		$data = array(  'ik_program' =>  $ik_program
   					);

		$this->template->load('template', 'perencanaan/renstra/program/ik_program/ik_program_data', $data);
	}

	public function add()
	{
		$portal_id = $this->uri->segment(2);

	    $program_id = $this->uri->segment(4);
	    $program = $this->program_m->detail($program_id);

	    $valid = $this->form_validation;

	    $valid->set_rules('name', 'Nama Indikator', 'required',
	        array(  'required'  =>  '%s harus diisi'));

	    if($valid->run()===FALSE) {

	    $data = array(  'page'    => 'add',
	            		'program' => $program
	          );
	    $this->template->load('template', 'perencanaan/renstra/program/ik_program/ik_program_add', $data);
	    // masuk database
	    }else{
	      $i = $this->input;
	      $data = array(  'portal_id' 	=> $portal_id,
	                      'program_id'  => $program_id,
	                      'name'      	=> $i->post('name'),
	                      'formulasi' 	=> $i->post('formulasi')
	            );

	      $this->ik_program_m->add($data);
	      $this->session->set_flashdata('sukses', 'Data Indikator Program Telah ditambah');
	      redirect(base_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program'), 'refresh');
	    // end masuk database
    	}
	}

	public function edit($ik_program_id)
	{
		$portal_id = $this->uri->segment(2);

	    $program_id = $this->uri->segment(4);

	    $ik_program_id = $this->uri->segment(7);
	    $ik_program = $this->ik_program_m->detail($ik_program_id);

	    $valid = $this->form_validation;

	    $valid->set_rules('name', 'Nama Indikator', 'required',
	        array(  'required'  =>  '%s harus diisi'));

	    if($valid->run()===FALSE) {

	    $data = array(  'page'       => 'edit',
	            		'ik_program' => $ik_program
	          );
	    $this->template->load('template', 'perencanaan/renstra/program/ik_program/ik_program_edit', $data);
	    // masuk database
	    }else{
	      $i = $this->input;
	      $data = array(  'ik_program_id'   => $ik_program_id,
	                      'portal_id'       => $portal_id,
	                      'program_id'      => $program_id,
	                      'name'            => $i->post('name'),
	                      'formulasi'       => $i->post('formulasi')
	            );

	      $this->ik_program_m->edit($data);
	      $this->session->set_flashdata('sukses', 'Data Indikator Tujuan RPJMD Telah diupdate');
	      redirect(base_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program'), 'refresh');
	    // end masuk database
    	}
	}

	public function del_ik_program()
	{
	    $ik_program_id = $this->input->post('ik_program_id');
	    $this->ik_program_m->del_ik_program(['ik_program_id' => $ik_program_id]);

	    if($this->db->affected_rows() > 0) {
	      $params = array("success" => true);
	    } else {
	      $params = array("success" => false);
	    }
	    echo json_encode($params);
	}

}

/* End of file Ik_program.php */
/* Location: ./application/controllers/Ik_program.php */