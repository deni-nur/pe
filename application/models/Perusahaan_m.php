<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($perusahaan_id)
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->where('perusahaan_id', $perusahaan_id);
		$this->db->order_by('perusahaan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('perusahaan', $data);
	}

	public function edit($data)
	{
		$this->db->where('perusahaan_id', $data['perusahaan_id']);
		$this->db->update('perusahaan', $data);
	}

	public function del_perusahaan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('perusahaan');
    }

    public function view()
    {
		return $this->db->get('perusahaan')->result(); // Tampilkan semua data yang ada di tabel siswa
	}

    // Fungsi untuk melakukan proses upload file
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './assets/excel/perusahaan/';
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
		$this->db->insert_batch('perusahaan', $data);
	}

}

/* End of file Perusahaan_m.php */
/* Location: ./application/models/Perusahaan_m.php */