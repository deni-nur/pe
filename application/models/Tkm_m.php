<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkm_m extends CI_Model {

	public function get($id = null)
    {
        $this->db->select('tkm.*, desa.name as nama_desa, kecamatan.name as nama_kecamatan');
        $this->db->from('tkm');
        $this->db->join('desa', 'tkm.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        if($id !=null) {
            $this->db->where('tkm.portal_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail($tkm_id)
	{
		$this->db->select('*');
		$this->db->from('tkm');
		$this->db->where('tkm_id', $tkm_id);
		$this->db->order_by('tkm_id', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('tkm', $data);
	}

	public function edit($data)
	{
		$this->db->where('tkm_id', $data['tkm_id']);
		$this->db->update('tkm', $data);
	}

	public function del_tkm($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('tkm');
    }

	public function get_tkm($limit = null, $start = null, $id=null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('tkm.*, user.username, desa.name as nama_desa, kecamatan.name as nama_kecamatan, portal.tahun_perencanaan');
        $this->db->from('tkm');
        $this->db->join('user', 'tkm.user_id = user.user_id');
        $this->db->join('desa', 'tkm.desa_id = desa.desa_id', 'left');
        $this->db->join('kecamatan', 'desa.kecamatan_id = kecamatan.kecamatan_id', 'left');
        $this->db->join('portal', 'tkm.portal_id = portal.portal_id', 'left');
        if($id !=null) {
            $this->db->where('tkm.portal_id', $id);
        }
        if(!empty($post['jenis'])) {
            $this->db->like("jenis", $post['jenis']);
        }
        if(!empty($post['desa'])) {
            $this->db->where("tkm.desa_id", $post['desa']);
        }
        if(!empty($post['portal'])) {
            $this->db->where("tkm.portal_id", $post['portal']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function view()
    {
        return $this->db->get('tkm')->result(); // Tampilkan semua data yang ada di tabel siswa
    }

    // Fungsi untuk melakukan proses upload file
    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload
        
        $config['upload_path'] = './assets/excel/tkm/';
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
        $this->db->insert_batch('tkm', $data);
    }

}

/* End of file Umk_m.php */
/* Location: ./application/models/Umk_m.php */