<?php defined('BASEPATH') OR exit('No direct script access allowed');

class R_belanja_m extends CI_Model {

	public function get($id=null)
	{
		$this->db->select('r_belanja.*, a_belanja.kode_rek, a_belanja.nama_rek, subkeg.nama_subkeg');
		$this->db->from('r_belanja');
		$this->db->join('a_belanja', 'r_belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->join('dpa', 'r_belanja.dpa_id = dpa.dpa_id', 'left');
		$this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
		if($id !=null) {
			$this->db->where('r_belanja.dpa_id', $id);
		}
		$this->db->order_by('r_belanja_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($r_belanja_id)
	{
		$this->db->select('r_belanja.*, a_belanja.kode_rek, a_belanja.nama_rek');
		$this->db->from('r_belanja');
		$this->db->join('a_belanja', 'r_belanja.a_belanja_id = a_belanja.a_belanja_id', 'left');
		$this->db->where('r_belanja_id', $r_belanja_id);
		$this->db->order_by('r_belanja_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function hitung()
	{
      return $this->db->query("SELECT SUM(jumlah) AS total FROM r_belanja");
   	}

	public function add($data)
	{
		$this->db->insert('r_belanja', $data);
	}

	public function edit($data)
	{
		$this->db->where('r_belanja_id', $data['r_belanja_id']);
		$this->db->update('r_belanja', $data);
	}

	public function del_r_belanja($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('r_belanja');
    }
}