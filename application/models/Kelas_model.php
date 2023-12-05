<?php
class Kelas_model extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('jurusan', 'jurusan.id_jurusan=kelas.id_jurusan');
        return $this->db->get();
        //        $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan', 'left');
        //        return $this->db->get('jurusan');
    }
    public function input_data($data)
    {
        $this->db->insert('kelas', $data);
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
}
