<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_sasaran_renstra extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['renstra_m','portal_m','ik_sasaran_renstra_m']);
  }

  public function index()
  {
    $renstra_id = $this->uri->segment(4);

    $ik_sasaran_renstra = $this->ik_sasaran_renstra_m->get($renstra_id);

    $data = array(  'ik_sasaran_renstra' =>  $ik_sasaran_renstra

          );

    $this->template->load('template', 'perencanaan/renstra/ik_sasaran_renstra/ik_sasaran_renstra_data', $data);
  }

  public function add()
  {
    $portal_id = $this->uri->segment(2);

    $renstra_id = $this->uri->segment(4);
    $renstra = $this->renstra_m->detail($renstra_id);

    $valid = $this->form_validation;

    $valid->set_rules('name', 'Nama Indikator', 'required',
        array(  'required'  =>  '%s harus diisi'));

    if($valid->run()===FALSE) {

    $data = array(  'page'    =>  'add',
            'renstra'   =>  $renstra
          );
    $this->template->load('template', 'perencanaan/renstra/ik_sasaran_renstra/ik_sasaran_renstra_add', $data);
    // masuk database
    }else{
      $i = $this->input;
      $data = array(  'portal_id' => $portal_id,
                      'renstra_id'  => $renstra_id,
                      'name'      => $i->post('name'),
                      'formulasi' => $i->post('formulasi')
            );

      $this->ik_sasaran_renstra_m->add($data);
      $this->session->set_flashdata('sukses', 'Data Indikator Tujuan RPJMD Telah ditambah');
      redirect(base_url('portal/'.$this->uri->segment(2).'/renstra/'.$this->uri->segment(4).'/ik_sasaran_renstra'), 'refresh');
    // end masuk database
    }
  }

  public function edit($ik_sasaran_renstra_id)
  {
    $portal_id = $this->uri->segment(2);

    $renstra_id = $this->uri->segment(4);

    $ik_sasaran_renstra_id = $this->uri->segment(7);
    $ik_sasaran_renstra = $this->ik_sasaran_renstra_m->detail($ik_sasaran_renstra_id);

    $valid = $this->form_validation;

    $valid->set_rules('name', 'Nama Indikator', 'required',
        array(  'required'  =>  '%s harus diisi'));

    if($valid->run()===FALSE) {

    $data = array(  'page'        => 'edit',
            'ik_sasaran_renstra' => $ik_sasaran_renstra
          );
    $this->template->load('template', 'perencanaan/renstra/ik_sasaran_renstra/ik_sasaran_renstra_edit', $data);
    // masuk database
    }else{
      $i = $this->input;
      $data = array(  'ik_sasaran_renstra_id'   => $ik_sasaran_renstra_id,
                      'portal_id'             => $portal_id,
                      'renstra_id'              => $renstra_id,
                      'name'                  => $i->post('name'),
                      'formulasi'             => $i->post('formulasi')
            );

      $this->ik_sasaran_renstra_m->edit($data);
      $this->session->set_flashdata('sukses', 'Data Indikator Tujuan RPJMD Telah diupdate');
      redirect(base_url('portal/'.$this->uri->segment(2).'/renstra/'.$this->uri->segment(4).'/ik_sasaran_renstra'), 'refresh');
    // end masuk database
    }
  }

  public function del_ik_sasaran_renstra()
  {
    $ik_sasaran_renstra_id = $this->input->post('ik_sasaran_renstra_id');
    $this->ik_sasaran_renstra_m->del_ik_sasaran_renstra(['ik_sasaran_renstra_id' => $ik_sasaran_renstra_id]);

    if($this->db->affected_rows() > 0) {
      $params = array("success" => true);
    } else {
      $params = array("success" => false);
    }
    echo json_encode($params);
  }
}