<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spsb_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('spsb');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($spsb_id)
	{
		$this->db->select('*');
		$this->db->from('spsb');
		$this->db->where('spsb_id', $spsb_id);
		$this->db->order_by('spsb_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('spsb', $data);
	}

	public function edit($data)
	{
		$this->db->where('spsb_id', $data['spsb_id']);
		$this->db->update('spsb', $data);
	}

	public function del_spsb($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('spsb');
    }

}

/* End of file Spsb_m.php */
/* Location: ./application/models/Spsb_m.php */