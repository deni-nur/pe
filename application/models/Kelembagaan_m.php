<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelembagaan_m extends CI_Model {

	public function detail($kelembagaan_id)
	{
		$this->db->select('*');
		$this->db->from('kelembagaan');
		$this->db->where('kelembagaan_id', $kelembagaan_id);
		$this->db->order_by('kelembagaan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('kelembagaan', $data);
	}

	public function edit($data)
	{
		$this->db->where('kelembagaan_id', $data['kelembagaan_id']);
		$this->db->update('kelembagaan', $data);
	}

	public function del_kelembagaan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('kelembagaan');
    }

	public function get_lembaga_pagination($limit = null, $start = null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('*, user.username');
        $this->db->from('kelembagaan');
        $this->db->join('user', 'kelembagaan.user_id = user.user_id');
        if(!empty($post['lembaga'])) {
            $this->db->like("lembaga", $post['lembaga']);
        }
        if(!empty($post['verif'])) {
            $this->db->like("verif", $post['verif']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('nama_kelembagaan', 'asc');
        $query = $this->db->get();
        return $query;
    }

}

/* End of file Umk_m.php */
/* Location: ./application/models/Umk_m.php */