<?php
class Jurusan_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jurusan');
    }
    public function input_data($data)
    {
        $this->db->insert('jurusan', $data);
    }
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function ubah_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->like('kelas_jurusan', $keyword);
        $this->db->or_like('kode_jurusan', $keyword);
        $this->db->or_like('nama_jurusan', $keyword);
        $this->db->or_like('ruang_jurusan', $keyword);
        return $this->db->get()->result();
    }
}
