<?php
class Jadwal_model extends CI_Model
{
    public function tampil_data_jurusan()
    {
        return $this->db->get('jurusan');        
    }
    public function tampil_data_mapel()
    {
        return $this->db->get('mapel');
    }
    public function tampil_data_guru()
    {
        return $this->db->get('guru');
    }
    public function tampil_view_data()
    {
        return $this->db->get('vjadwal');
    }
    public function input_data($data)
    {
        $this->db->insert('jadwal', $data);
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
