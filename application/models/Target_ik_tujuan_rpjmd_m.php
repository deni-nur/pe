<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_ik_tujuan_rpjmd_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('target_ik_tujuan_rpjmd.*, ik_tujuan_rpjmd.name');
		$this->db->from('target_ik_tujuan_rpjmd');
		$this->db->join('ik_tujuan_rpjmd', 'ik_tujuan_rpjmd.ik_tujuan_rpjmd_id = target_ik_tujuan_rpjmd.ik_tujuan_rpjmd_id', 'left');
		if($id !=null) {
			$this->db->where('target_ik_tujuan_rpjmd.ik_tujuan_rpjmd_id', $id);
		}
		$this->db->order_by('target_ik_tujuan_rpjmd.ik_tujuan_rpjmd_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($target_ik_tujuan_rpjmd_id)
	{
		$this->db->select('*');
		$this->db->from('target_ik_tujuan_rpjmd');
		$this->db->where('target_ik_tujuan_rpjmd_id', $target_ik_tujuan_rpjmd_id);
		$this->db->order_by('target_ik_tujuan_rpjmd_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($table = null, $data = array())
	{
		$jumlah = count($data);
 
      	if ($jumlah > 0)
      	{
        	$this->db->insert_batch($table, $data);
      	}
	}

	public function edit($data)
	{
		$this->db->where('target_ik_tujuan_rpjmd_id', $data['target_ik_tujuan_rpjmd_id']);
		$this->db->update('target_ik_tujuan_rpjmd', $data);
	}

	public function del_target_ik_tujuan_rpjmd($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('target_ik_tujuan_rpjmd');
    }

    public function realisasi($data)
	{
		$this->db->where('target_ik_tujuan_rpjmd_id', $data['target_ik_tujuan_rpjmd_id']);
		$this->db->update('target_ik_tujuan_rpjmd', $data);
	}

}

/* End of file Target_target_ik_tujuan_ik_tujuan_rpjmd_m.php */
/* Location: ./application/models/Target_target_ik_tujuan_ik_tujuan_rpjmd_m.php */