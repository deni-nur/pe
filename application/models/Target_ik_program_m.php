<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_ik_program_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('target_ik_program.*, ik_program.name');
		$this->db->from('target_ik_program');
		$this->db->join('ik_program', 'ik_program.ik_program_id = target_ik_program.ik_program_id', 'left');
		if($id !=null) {
			$this->db->where('target_ik_program.ik_program_id', $id);
		}
		$this->db->order_by('target_ik_program.ik_program_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($target_ik_program_id)
	{
		$this->db->select('*');
		$this->db->from('target_ik_program');
		$this->db->where('target_ik_program_id', $target_ik_program_id);
		$this->db->order_by('target_ik_program_id', 'desc');
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
		$this->db->where('target_ik_program_id', $data['target_ik_program_id']);
		$this->db->update('target_ik_program', $data);
	}

	public function del_target_ik_program($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('target_ik_program');
    }

    public function realisasi($data)
	{
		$this->db->where('target_ik_program_id', $data['target_ik_program_id']);
		$this->db->update('target_ik_program', $data);
	}

}

/* End of file Target_target_ik_tujuan_ik_program_m.php */
/* Location: ./application/models/Target_target_ik_tujuan_ik_program_m.php */