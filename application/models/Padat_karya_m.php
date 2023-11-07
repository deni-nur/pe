<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Padat_karya_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('padat_karya.*, desa.name as nama_desa, kecamatan.name as nama_kecamatan');
        $this->db->from('padat_karya');
        $this->db->join('desa', 'padat_karya.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        if($id !=null) {
            $this->db->where('padat_karya.portal_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail($padat_karya_id)
	{
		$this->db->select('*');
		$this->db->from('padat_karya');
		$this->db->where('padat_karya_id', $padat_karya_id);
		$this->db->order_by('padat_karya_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('padat_karya', $data);
	}

	public function edit($data)
	{
		$this->db->where('padat_karya_id', $data['padat_karya_id']);
		$this->db->update('padat_karya', $data);
	}

	public function del_padat_karya($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('padat_karya');
    }

	public function get_padat_karya($limit = null, $start = null, $id=null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('padat_karya.*, user.username, desa.name as nama_desa, kecamatan.name as nama_kecamatan, portal.tahun_perencanaan');
        $this->db->from('padat_karya');
        $this->db->join('user', 'padat_karya.user_id = user.user_id');
        $this->db->join('desa', 'padat_karya.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        $this->db->join('portal', 'padat_karya.portal_id = portal.portal_id', 'left');
        if($id !=null) {
            $this->db->where('padat_karya.portal_id', $id);
        }
        if(!empty($post['jenis'])) {
            $this->db->like("jenis", $post['jenis']);
        }
        if(!empty($post['desa'])) {
            $this->db->where("padat_karya.desa_id", $post['desa']);
        }
        if(!empty($post['portal'])) {
            $this->db->where("padat_karya.portal_id", $post['portal']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function view()
    {
        return $this->db->get('padat_karya')->result(); // Tampilkan semua data yang ada di tabel siswa
    }

    // Fungsi untuk melakukan proses upload file
    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './assets/excel/padat_karya/';
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
        $this->db->insert_batch('padat_karya', $data);
    }

}

/* End of file Umk_m.php */
/* Location: ./application/models/Umk_m.php */