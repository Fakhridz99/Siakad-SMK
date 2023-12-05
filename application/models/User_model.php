<?php
class User_model extends CI_Model
{
    public function ambil_data($id, $level, $kolom)
    {
        $this->db->where($kolom, $id);
        return $this->db->get($level)->result();
    }
    public function tampil_data()
    {
        return $this->db->get('user');
    }
    public function input_data($data)
    {
        $this->db->insert('user', $data);
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
    public function get_one($table, $idwhere, $id)
    {
        $result = $this->db->where($idwhere, $id)
            ->limit(1)
            ->get($table);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->like('username', $keyword);
        $this->db->or_like('password', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }
}
