<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkk_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('bkk.*, portal.tahun_perencanaan, desa.name as nama_desa, kecamatan.name as nama_kecamatan');
        $this->db->from('bkk');
        $this->db->join('portal', 'bkk.portal_id = portal.portal_id', 'left');
        $this->db->join('desa', 'bkk.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        if($id !=null) {
            $this->db->where('bkk.portal_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail($bkk_id)
	{
		$this->db->select('*');
		$this->db->from('bkk');
		$this->db->where('bkk_id', $bkk_id);
		$this->db->order_by('bkk_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('bkk', $data);
	}

	public function edit($data)
	{
		$this->db->where('bkk_id', $data['bkk_id']);
		$this->db->update('bkk', $data);
	}

	public function del_bkk($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('bkk');
    }

	public function get_bkk($limit = null, $start = null, $id=null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('bkk.*, user.username, desa.name as nama_desa, kecamatan.name as nama_kecamatan, portal.tahun_perencanaan');
        $this->db->from('bkk');
        $this->db->join('user', 'bkk.user_id = user.user_id');
        $this->db->join('desa', 'bkk.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        $this->db->join('portal', 'bkk.portal_id = portal.portal_id', 'left');
        if($id !=null) {
            $this->db->where('bkk.portal_id', $id);
        }
        if(!empty($post['jenis'])) {
            $this->db->like("jenis", $post['jenis']);
        }
        if(!empty($post['desa'])) {
            $this->db->where("bkk.desa_id", $post['desa']);
        }
        if(!empty($post['portal'])) {
            $this->db->where("bkk.portal_id", $post['portal']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function view()
    {
        return $this->db->get('bkk')->result(); // Tampilkan semua data yang ada di tabel siswa
    }

    // Fungsi untuk melakukan proses upload file
    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './assets/excel/bkk/';
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
        $this->db->insert_batch('bkk', $data);
    }

}

/* End of file Umk_m.php */
/* Location: ./application/models/Umk_m.php */