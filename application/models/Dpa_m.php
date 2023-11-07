<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpa_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('dpa.*, program.kode_program, bidang_urusan.kode, urusan.kode as kode_urusan, program.nama_program, kegiatan.nama_kegiatan, subkeg.nama_subkeg, subkeg.kode_subkeg, kegiatan.kode_kegiatan, indikator_subkeg.uraian_indikator_subkeg, indikator_subkeg.satuan, SUM(pagu_belanja) as jumlah_pagu_subkeg, SUM(pagu_perubahan) as jumlah_pagu_perubahan');
        $this->db->from('dpa');
        $this->db->join('belanja', 'belanja.dpa_id = dpa.dpa_id', 'left');
        $this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
        $this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
        $this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
        $this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
        $this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
        $this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
        $this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
        $this->db->join('indikator_subkeg', 'indikator_subkeg.subkeg_id = subkeg.subkeg_id', 'left');
        if($id !=null) {
            $this->db->where('dpa.portal_id', $id);
            //$this->db->where('dpa.dpa_id', $id);
            $this->db->group_by('dpa_id');
        }
        $this->db->order_by('subkeg.subkeg_id', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function detail($dpa_id)
    {
        $this->db->select('dpa.*, program.nama_program, kegiatan.nama_kegiatan, subkeg.nama_subkeg, indikator_subkeg.uraian_indikator_subkeg, indikator_subkeg.satuan, subkeg.kode_subkeg, kegiatan.kode_kegiatan, program.kode_program, bidang_urusan.kode, urusan.kode as kode_urusan');
        $this->db->from('dpa');
        $this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
        $this->db->join('kegiatan', 'subkeg.kegiatan_id = kegiatan.kegiatan_id', 'left');
        $this->db->join('program', 'kegiatan.program_id = program.program_id', 'left');
        $this->db->join('sasaran', 'program.sasaran_id = sasaran.sasaran_id', 'left');
        $this->db->join('tujuan', 'sasaran.tujuan_id = tujuan.tujuan_id', 'left');
        $this->db->join('bidang_urusan', 'tujuan.bidang_urusan_id = bidang_urusan.bidang_urusan_id', 'left');
        $this->db->join('urusan', 'bidang_urusan.urusan_id = urusan.urusan_id', 'left');
        $this->db->join('indikator_subkeg', 'indikator_subkeg.subkeg_id = subkeg.subkeg_id', 'left');
        $this->db->where('dpa_id', $dpa_id);
        $this->db->order_by('dpa_id', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function jumlah_pagu_subkeg()
    {
       $this->db->select('belanja.*, dpa.dpa_id, SUM(pagu_belanja) as jumlah_pagu_subkeg');
       $this->db->from('belanja');
       $this->db->join('dpa', 'belanja.dpa_id = dpa.dpa_id', 'left');
       $this->db->where('dpa.dpa_id');
       $this->db->group_by('dpa.dpa_id');
       $query = $this->db->get();
       return $query;
    }

    public function jumlah_pagu_belanja($dpa_id)
    {
        $this->db->select('SUM(pagu_belanja) as jumlah_pagu_belanja');
        $this->db->from('belanja');
        $this->db->where('dpa_id', $dpa_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function jumlah_pagu_pergeseran($dpa_id)
    {
        $this->db->select('SUM(pagu_pergeseran) as jumlah_pagu_pergeseran');
        $this->db->from('belanja');
        $this->db->where('dpa_id', $dpa_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function jumlah_pagu_perubahan($dpa_id)
    {
        $this->db->select('SUM(pagu_perubahan) as jumlah_pagu_perubahan');
        $this->db->from('belanja');
        $this->db->where('dpa_id', $dpa_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('dpa', $data);
    }

    public function edit($data)
    {
        $this->db->where('dpa_id', $data['dpa_id']);
        $this->db->update('dpa', $data);
    }

    public function del_dpa($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('dpa');
    }

    public function getbelanja($id = null)
    {
        $this->db->select('belanja.*, subkeg.nama_subkeg, akun.kode_akun, kelompok.kode_kelompok, jenis.kode_jenis, objek.kode_objek, rincian_objek.kode_rincian_objek, sub_rincian_objek.kode_sub_rincian_objek, sub_rincian_objek.nama_sub_rincian_objek');
        $this->db->from('belanja');
        $this->db->join('dpa', 'belanja.dpa_id = dpa.dpa_id', 'left');
        $this->db->join('subkeg', 'dpa.subkeg_id = subkeg.subkeg_id', 'left');
        $this->db->join('sub_rincian_objek', 'belanja.sub_rincian_objek_id = sub_rincian_objek.sub_rincian_objek_id', 'left');
        $this->db->join('rincian_objek', 'sub_rincian_objek.rincian_objek_id = rincian_objek.rincian_objek_id', 'left');
        $this->db->join('objek', 'rincian_objek.objek_id = objek.objek_id', 'left');
        $this->db->join('jenis', 'objek.jenis_id = jenis.jenis_id', 'left');
        $this->db->join('kelompok', 'jenis.kelompok_id = kelompok.kelompok_id', 'left');
        $this->db->join('akun', 'kelompok.akun_id = akun.akun_id', 'left');
        if($id !=null) {
            $this->db->where('belanja.dpa_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function detail_belanja($belanja_id)
    {
        $this->db->select('*');
        $this->db->from('belanja');
        $this->db->where('belanja_id', $belanja_id);
        $this->db->order_by('belanja_id', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function belanja_add($data)
    {
        $this->db->insert('belanja', $data);
    }

    public function belanja_edit($data)
    {
        $this->db->where('belanja_id', $data['belanja_id']);
        $this->db->update('belanja', $data);
    }

    public function del_belanja($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('belanja');
    }
    
    public function belanja_pergeseran($data)
    {
        $this->db->where('belanja_id', $data['belanja_id']);
        $this->db->update('belanja', $data);
    }

    public function belanja_perubahan($data)
    {
        $this->db->where('belanja_id', $data['belanja_id']);
        $this->db->update('belanja', $data);
    }
}

/* End of file Renja_m.php */
/* Location: ./application/models/Renja_m.php */