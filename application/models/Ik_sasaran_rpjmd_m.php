<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_sasaran_rpjmd_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('ik_sasaran_rpjmd.*, rpjmd.tujuan, rpjmd.sasaran');
		$this->db->from('ik_sasaran_rpjmd');
		$this->db->join('rpjmd', 'rpjmd.rpjmd_id = ik_sasaran_rpjmd.rpjmd_id', 'left');
		if($id !=null) {
			$this->db->where('ik_sasaran_rpjmd.rpjmd_id', $id);
		}
		$this->db->order_by('ik_sasaran_rpjmd.rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($ik_sasaran_rpjmd_id)
	{
		$this->db->select('*');
		$this->db->from('ik_sasaran_rpjmd');
		$this->db->where('ik_sasaran_rpjmd_id', $ik_sasaran_rpjmd_id);
		$this->db->order_by('ik_sasaran_rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_sasaran_rpjmd', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_sasaran_rpjmd_id', $data['ik_sasaran_rpjmd_id']);
		$this->db->update('ik_sasaran_rpjmd', $data);
	}

	public function del_ik_sasaran_rpjmd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('ik_sasaran_rpjmd');
    }
}

/* End of file Ik_sasaran_rpjmd_m.php */
/* Location: ./application/models/Ik_sasaran_rpjmd_m.php */