<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmi_kasus_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from('pmi_kasus');
		if($id !=null) {
			$this->db->where('portal_id', $id);
		}
		$this->db->order_by('portal_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function detail($pmi_kasus_id)
	{
		$this->db->select('*');
		$this->db->from('pmi_kasus');
		$this->db->where('pmi_kasus_id', $pmi_kasus_id);
		$this->db->order_by('pmi_kasus_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pmi_kasus', $data);
	}

	public function edit($data)
	{
		$this->db->where('pmi_kasus_id', $data['pmi_kasus_id']);
		$this->db->update('pmi_kasus', $data);
	}

	public function del_pmi_kasus($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pmi_kasus');
    }

    public function view()
    {
		return $this->db->get('pmi_kasus')->result(); // Tampilkan semua data yang ada di tabel siswa
	}

    // Fungsi untuk melakukan proses upload file
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './assets/excel/pmi_kasus/';
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
		$this->db->insert_batch('pmi_kasus', $data);
	}

}

/* End of file Pmi_m.php */
/* Location: ./application/models/Pmi_m.php */