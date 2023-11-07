<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_sasaran_renstra_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('ik_sasaran_renstra.*, renstra.k_urusan, renstra.b_urusan, renstra.sasaran, renstra.p_jawab');
		$this->db->from('ik_sasaran_renstra');
		$this->db->join('renstra', 'renstra.renstra_id = ik_sasaran_renstra.renstra_id', 'left');
		if($id !=null) {
			$this->db->where('ik_sasaran_renstra.renstra_id', $id);
		}
		$this->db->order_by('ik_sasaran_renstra.renstra_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($ik_sasaran_renstra_id)
	{
		$this->db->select('*');
		$this->db->from('ik_sasaran_renstra');
		$this->db->where('ik_sasaran_renstra_id', $ik_sasaran_renstra_id);
		$this->db->order_by('ik_sasaran_renstra_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_sasaran_renstra', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_sasaran_renstra_id', $data['ik_sasaran_renstra_id']);
		$this->db->update('ik_sasaran_renstra', $data);
	}

	public function del_ik_sasaran_renstra($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('ik_sasaran_renstra');
    }
}

/* End of file Ik_sasaran_renstra_m.php */
/* Location: ./application/models/Ik_sasaran_renstra_m.php */