<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umk_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('umk');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($umk_id)
	{
		$this->db->select('*');
		$this->db->from('umk');
		$this->db->where('umk_id', $umk_id);
		$this->db->order_by('umk_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('umk', $data);
	}

	public function edit($data)
	{
		$this->db->where('umk_id', $data['umk_id']);
		$this->db->update('umk', $data);
	}

	public function del_umk($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('umk');
    }

}

/* End of file Umk_m.php */
/* Location: ./application/models/Umk_m.php */