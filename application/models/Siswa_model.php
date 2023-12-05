<?php
class Siswa_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('siswa');
        return $this->db->get('jurusan');
    }
    public function tampil_view_data()
    {
        return $this->db->get('vsiswa');
    }
    public function input_data($data)
    {
        $this->db->insert('siswa', $data);
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
    public function select()
    {
        $this->db->order_by('id_siswa', 'DESC');
        $query = $this->db->get('siswa');
        return $query;
    }
    public function insert($data)
    {
        $this->db->insert_batch('siswa', $data);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('vsiswa');
        $this->db->like('username', $keyword);
        $this->db->or_like('nis', $keyword);
        $this->db->or_like('nama_siswa', $keyword);
        $this->db->or_like('tgl_lahir_siswa', $keyword);
        $this->db->or_like('jk_siswa', $keyword);
        $this->db->or_like('tlp_siswa', $keyword);
        $this->db->or_like('alamat_siswa', $keyword);
        // $this->db->or_like('id_jurusan_siswa', $keyword);
        return $this->db->get()->result();
    }
    public function find_by_nis($nis)
    {
        $this->db->select('id_siswa');
        $this->db->from('siswa');
        $this->db->where('nis', $nis);
        return $this->db->get()->result();
    }
}
