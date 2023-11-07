<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('kegiatan.*, program.nama_program');
		$this->db->from('kegiatan');
		$this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
		if($id !=null) {
			$this->db->where('kegiatan.kegiatan_id', $id);
		}
		$this->db->order_by('kegiatan_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($kegiatan_id)
	{
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('kegiatan_id', $kegiatan_id);
		$this->db->order_by('kegiatan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('kegiatan', $data);
	}

	public function edit($data)
	{
		$this->db->where('kegiatan_id', $data['kegiatan_id']);
		$this->db->update('kegiatan', $data);
	}

	public function del_kegiatan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('kegiatan');
    }

    public function getindikatorkegiatan($id = null)
	{
		$this->db->select('indikator_kegiatan.*, kegiatan.nama_kegiatan');
		$this->db->from('indikator_kegiatan');
		$this->db->join('kegiatan', 'indikator_kegiatan.kegiatan_id = kegiatan.kegiatan_id', 'left');
		if($id !=null) {
			$this->db->where('indikator_kegiatan_id', $id);
		}
		$this->db->order_by('indikator_kegiatan_id', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function detail_indikator_kegiatan($indikator_kegiatan_id)
	{
		$this->db->select('*');
		$this->db->from('indikator_kegiatan');
		$this->db->where('indikator_kegiatan_id', $indikator_kegiatan_id);
		$this->db->order_by('indikator_kegiatan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

    public function indikator_kegiatan_add($data)
	{
		$this->db->insert('indikator_kegiatan', $data);
	}

	public function indikator_kegiatan_edit($data)
	{
		$this->db->where('indikator_kegiatan_id', $data['indikator_kegiatan_id']);
		$this->db->update('indikator_kegiatan', $data);
	}

	public function del_indikator_kegiatan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('indikator_kegiatan');
    }
}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */