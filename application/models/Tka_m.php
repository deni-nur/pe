<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tka_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('tka');
		if($id !=null) {
			$this->db->where('perusahaan_id', $id);
		}
		$this->db->order_by('perusahaan_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($tka_id)
	{
		$this->db->select('*');
		$this->db->from('tka');
		$this->db->where('tka_id', $tka_id);
		$this->db->order_by('tka_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('tka', $data);
	}

	public function edit($data)
	{
		$this->db->where('tka_id', $data['tka_id']);
		$this->db->update('tka', $data);
	}

	public function del_tka($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tka');
    }

    public function view()
    {
		return $this->db->get('tka')->result(); // Tampilkan semua data yang ada di tabel siswa
	}

    // Fungsi untuk melakukan proses upload file
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './assets/excel/tka/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data)
	{
		$this->db->insert_batch('tka', $data);
	}

}

/* End of file Tka_m.php */
/* Location: ./application/models/Tka_m.php */