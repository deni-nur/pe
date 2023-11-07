<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ik_program_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('*');
		$this->db->from('ik_program');
		if($id !=null) {
			$this->db->where('program_id', $id);
		}
		$this->db->order_by('program_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_join($program_id=null)
	{
		$this->db->select('ik_program.*,program.indikator_program');
		$this->db->from('ik_program');
		$this->db->join('program', 'ik_program.program_id = program.program_id', 'left');
		if($program_id !=null) {
			$this->db->where('program_id', $program_id);
		}
		$this->db->order_by('program_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($ik_program_id)
	{
		$this->db->select('*');
		$this->db->from('ik_program');
		$this->db->where('ik_program_id', $ik_program_id);
		$this->db->order_by('ik_program_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('ik_program', $data);
	}

	public function edit($data)
	{
		$this->db->where('ik_program_id', $data['ik_program_id']);
		$this->db->update('ik_program', $data);
	}

	public function del_ik_program($data)
	{
		$this->db->where('ik_program_id', $data['ik_program_id']);
		$this->db->delete('ik_program', $data);
	}

}

/* End of file Ik_program_m.php */
/* Location: ./application/models/Ik_program_m.php */