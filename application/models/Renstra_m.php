<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Renstra_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('renstra.*, rpjmd.tujuan, rpjmd.sasaran as sasaran_daerah');
		$this->db->from('renstra');
		$this->db->join('rpjmd', 'renstra.rpjmd_id = rpjmd.rpjmd_id', 'left');
		if($id !=null) {
			$this->db->where('renstra_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function detail($renstra_id)
	{
		$this->db->select('*');
		$this->db->from('renstra');
		$this->db->where('renstra_id', $renstra_id);
		$this->db->order_by('renstra_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('renstra', $data);
	}

	public function edit($data)
	{
		$this->db->where('renstra_id', $data['renstra_id']);
		$this->db->update('renstra', $data);
	}

	public function del_renstra($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('renstra');
    }
}