<?php
class Mapel_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('mapel');
    }
    public function tampil_guru()
    {
        return $this->db->get('guru')->result();
    }
    public function tampil_view_data()
    {
        return $this->db->get('vmapel');
    }
    public function input_data($data)
    {
        $this->db->insert('mapel', $data);
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
        $this->db->from('mapel');
        $this->db->like('kode_mapel', $keyword);
        $this->db->or_like('nama_mapel', $keyword);
        return $this->db->get()->result();
    }
    public function get_one($table, $id, $idwhere)
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
}
