<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_sasaran_rpjmd extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['rpjmd_m','portal_m','ik_sasaran_rpjmd_m']);
  }

  public function index()
  {
    $rpjmd_id = $this->uri->segment(4);

    $ik_sasaran_rpjmd = $this->ik_sasaran_rpjmd_m->get($rpjmd_id);

    $data = array(  'ik_sasaran_rpjmd' =>  $ik_sasaran_rpjmd

          );

    $this->template->load('template', 'perencanaan/rpjmd/ik_sasaran_rpjmd/ik_sasaran_rpjmd_data', $data);
  }

  public function add()
  {
    $portal_id = $this->uri->segment(2);

    $rpjmd_id = $this->uri->segment(4);
    $rpjmd = $this->rpjmd_m->detail($rpjmd_id);

    $valid = $this->form_validation;

    $valid->set_rules('name', 'Nama Indikator', 'required',
        array(  'required'  =>  '%s harus diisi'));

    if($valid->run()===FALSE) {

    $data = array(  'page'    =>  'add',
            'rpjmd'   =>  $rpjmd
          );
    $this->template->load('template', 'perencanaan/rpjmd/ik_sasaran_rpjmd/ik_sasaran_rpjmd_add', $data);
    // masuk database
    }else{
      $i = $this->input;
      $data = array(  'portal_id' => $portal_id,
                      'rpjmd_id'  => $rpjmd_id,
                      'name'      => $i->post('name'),
                      'formulasi' => $i->post('formulasi')
            );

      $this->ik_sasaran_rpjmd_m->add($data);
      $this->session->set_flashdata('sukses', 'Data Indikator Tujuan RPJMD Telah ditambah');
      redirect(base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd'), 'refresh');
    // end masuk database
    }
  }

  public function edit($ik_sasaran_rpjmd_id)
  {
    $portal_id = $this->uri->segment(2);

    $rpjmd_id = $this->uri->segment(4);

    $ik_sasaran_rpjmd_id = $this->uri->segment(7);
    $ik_sasaran_rpjmd = $this->ik_sasaran_rpjmd_m->detail($ik_sasaran_rpjmd_id);

    $valid = $this->form_validation;

    $valid->set_rules('name', 'Nama Indikator', 'required',
        array(  'required'  =>  '%s harus diisi'));

    if($valid->run()===FALSE) {

    $data = array(  'page'        => 'edit',
            'ik_sasaran_rpjmd' => $ik_sasaran_rpjmd
          );
    $this->template->load('template', 'perencanaan/rpjmd/ik_sasaran_rpjmd/ik_sasaran_rpjmd_edit', $data);
    // masuk database
    }else{
      $i = $this->input;
      $data = array(  'ik_sasaran_rpjmd_id'   => $ik_sasaran_rpjmd_id,
                      'portal_id'             => $portal_id,
                      'rpjmd_id'              => $rpjmd_id,
                      'name'                  => $i->post('name'),
                      'formulasi'             => $i->post('formulasi')
            );

      $this->ik_sasaran_rpjmd_m->edit($data);
      $this->session->set_flashdata('sukses', 'Data Indikator Tujuan RPJMD Telah diupdate');
      redirect(base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd'), 'refresh');
    // end masuk database
    }
  }

  public function del_ik_sasaran_rpjmd()
  {
    $ik_sasaran_rpjmd_id = $this->input->post('ik_sasaran_rpjmd_id');
    $this->ik_sasaran_rpjmd_m->del_ik_sasaran_rpjmd(['ik_sasaran_rpjmd_id' => $ik_sasaran_rpjmd_id]);

    if($this->db->affected_rows() > 0) {
      $params = array("success" => true);
    } else {
      $params = array("success" => false);
    }
    echo json_encode($params);
  }
}