<?php
class Guru_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('guru');
    }
    public function input_data($data)
    {
        $this->db->insert('guru', $data);
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
        $this->db->order_by('id_guru', 'DESC');
        $query = $this->db->get('guru');
        return $query;
    }
    public function insert($data)
    {
        $this->db->insert_batch('guru', $data);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->like('username', $keyword);
        $this->db->or_like('nip', $keyword);
        $this->db->or_like('nama_guru', $keyword);
        $this->db->or_like('tanggal_lahir', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('no_tlp', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get()->result();
    }
}
