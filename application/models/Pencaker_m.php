<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencaker_m extends CI_Model {

	public function get($id =null)
	{
		$this->db->from('pencaker');
		if($id !=null) {
			$this->db->where('pencaker_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'tahun'			=> $post['tahun'],
			'nama_pencaker'		=> $post['nama_pencaker'],
			'federasi'		=> $post['federasi'],
			'jml_puk'		=> $post['jml_puk'],
			'jml_anggota'	=> $post['jml_anggota'],
			'pencatatan'	=> $post['pencatatan']
		];
		$this->db->insert('pencaker', $params);
	}

	public function edit($post)
	{
		$params = [
			'tahun'			=> $post['tahun'],
			'nama_pencaker'		=> $post['nama_pencaker'],
			'federasi'		=> $post['federasi'],
			'jml_puk'		=> $post['jml_puk'],
			'jml_anggota'	=> $post['jml_anggota'],
			'pencatatan'	=> $post['pencatatan']
		];
		$this->db->where('pencaker_id', $post['id']);
		$this->db->update('pencaker', $params);
	}

	public function del($id)
	{
		$this->db->where('pencaker_id', $id);
		$this->db->delete('pencaker');
	}

}

/* End of file Pencaker_m.php */
/* Location: ./application/models/Pencaker_m.php */