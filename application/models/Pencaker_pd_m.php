<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencaker_pd_m extends CI_Model {

	public function get($id =null)
	{
		$this->db->from('pencaker_pd');
		if($id !=null) {
			$this->db->where('pencaker_pd_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'tahun'			=> $post['tahun'],
			'pendidikan'	=> $post['pendidikan']
		];
		$this->db->insert('pencaker_pd', $params);
	}

	public function edit($post)
	{
		$params = [
			'tahun'			=> $post['tahun'],
			'pendidikan'	=> $post['pendidikan']
		];
		$this->db->where('pencaker_pd_id', $post['id']);
		$this->db->update('pencaker_pd', $params);
	}

	public function del($id)
	{
		$this->db->where('pencaker_pd_id', $id);
		$this->db->delete('pencaker_pd');
	}

}

/* End of file Pencaker_m.php */
/* Location: ./application/models/Pencaker_m.php */