<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pad_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('pad');
        if($id !=null) {
            $this->db->where('pad.portal_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail($pad_id)
    {
        $this->db->select('*');
        $this->db->from('pad');
        $this->db->where('pad_id', $pad_id);
        $this->db->order_by('pad_id', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('pad', $data);
    }

    public function edit($data)
    {
        $this->db->where('pad_id', $data['pad_id']);
        $this->db->update('pad', $data);
    }

    public function del_pad($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pad');
    }

    public function realisasi($data)
    {
        $this->db->where('pad_id', $data['pad_id']);
        $this->db->update('pad', $data);
    }
}

/* End of file Renja_m.php */
/* Location: ./application/models/Renja_m.php */