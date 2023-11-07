<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('pelatihan.*, desa.name as nama_desa, kecamatan.name as nama_kecamatan');
        $this->db->from('pelatihan');
        $this->db->join('desa', 'pelatihan.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        if($id !=null) {
            $this->db->where('pelatihan.portal_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail($pelatihan_id)
	{
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->where('pelatihan_id', $pelatihan_id);
		$this->db->order_by('pelatihan_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('pelatihan', $data);
	}

	public function edit($data)
	{
		$this->db->where('pelatihan_id', $data['pelatihan_id']);
		$this->db->update('pelatihan', $data);
	}

	public function del_pelatihan($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('pelatihan');
    }

	public function get_pelatihan($limit = null, $start = null, $id=null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('pelatihan.*, user.username, desa.name as nama_desa, kecamatan.name as nama_kecamatan, portal.tahun_perencanaan');
        $this->db->from('pelatihan');
        $this->db->join('user', 'pelatihan.user_id = user.user_id');
        $this->db->join('desa', 'pelatihan.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        $this->db->join('portal', 'pelatihan.portal_id = portal.portal_id', 'left');
        if($id !=null) {
            $this->db->where('pelatihan.portal_id', $id);
        }
        if(!empty($post['jenis'])) {
            $this->db->like("jenis", $post['jenis']);
        }
        if(!empty($post['desa'])) {
            $this->db->where("pelatihan.desa_id", $post['desa']);
        }
        if(!empty($post['portal'])) {
            $this->db->where("pelatihan.portal_id", $post['portal']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function view()
    {
        return $this->db->get('pelatihan')->result(); // Tampilkan semua data yang ada di tabel siswa
    }

    // Fungsi untuk melakukan proses upload file
    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './assets/excel/pelatihan/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
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
        $this->db->insert_batch('pelatihan', $data);
    }

}

/* End of file Umk_m.php */
/* Location: ./application/models/Umk_m.php */