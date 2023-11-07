<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('portal');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function detail($portal_id)
	{
		$this->db->select('*');
		$this->db->from('portal');
		$this->db->where('portal_id', $portal_id);
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('portal', $data);
	}

	public function edit($data)
	{
		$this->db->where('portal_id', $data['portal_id']);
		$this->db->update('portal', $data);
	}

	public function del_portal($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('portal');
    }

}

/* End of file Portal_m.php */
/* Location: ./application/models/Portal_m.php */