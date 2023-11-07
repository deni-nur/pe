<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_ik_sasaran_renstra_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('target_ik_sasaran_renstra.*, ik_sasaran_renstra.name');
		$this->db->from('target_ik_sasaran_renstra');
		$this->db->join('ik_sasaran_renstra', 'ik_sasaran_renstra.ik_sasaran_renstra_id = target_ik_sasaran_renstra.ik_sasaran_renstra_id', 'left');
		if($id !=null) {
			$this->db->where('target_ik_sasaran_renstra.ik_sasaran_renstra_id', $id);
		}
		$this->db->order_by('target_ik_sasaran_renstra.ik_sasaran_renstra_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($target_ik_sasaran_renstra_id)
	{
		$this->db->select('*');
		$this->db->from('target_ik_sasaran_renstra');
		$this->db->where('target_ik_sasaran_renstra_id', $target_ik_sasaran_renstra_id);
		$this->db->order_by('target_ik_sasaran_renstra_id', 'desc');
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
		$this->db->where('target_ik_sasaran_renstra_id', $data['target_ik_sasaran_renstra_id']);
		$this->db->update('target_ik_sasaran_renstra', $data);
	}

	public function del_target_ik_sasaran_renstra($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('target_ik_sasaran_renstra');
    }

    public function realisasi($data)
	{
		$this->db->where('target_ik_sasaran_renstra_id', $data['target_ik_sasaran_renstra_id']);
		$this->db->update('target_ik_sasaran_renstra', $data);
	}

}

/* End of file Target_target_ik_tujuan_ik_sasaran_renstra_m.php */
/* Location: ./application/models/Target_target_ik_tujuan_ik_sasaran_renstra_m.php */