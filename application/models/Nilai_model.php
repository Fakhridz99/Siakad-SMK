<?php
class Nilai_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('nilai');
        return $this->db->get('siswa');
        return $this->db->get('mapel');
    }
    public function tampil_view_data($id)
    {
        // $this->db->select('*');
        // $this->db->from('siswa,jadwal');
        // $this->db->where('id_jurusan', $id);
        //         $this->db->order_by('id_jurusan', 'asc');
        $id_guru = $this->session->userdata('id_guru');
        $query = $this->db->query("SELECT S.id_siswa, S.nis, S.nama_siswa, S.id_jurusan , M.id_mapel,  IFNULL(N.tugas, 0) AS tugas , IFNULL(N.ulangan, 0) as ulangan , IFNULL(N.uts, 0) as uts , IFNULL(N.uas, 0) as uas, IFNULL(N.nilai_akhir, 0) as nilai_akhir, IFNULL(N.capaian_kompetensi, 0) as capaian_kompetensi FROM mapel M , siswa S LEFT JOIN nilai N ON S.id_siswa=N.id_siswa where S.id_jurusan=$id and M.id_guru=$id_guru;");
        return $query->result();
        //return $this->db->get('vnilai');
    }
    public function ambil_data_siswa($id)
    {
        $id_guru = $this->session->userdata('id_guru');
        $query = $this->db->query("SELECT S.id_siswa, S.nis, S.nama_siswa, S.id_jurusan , M.id_mapel, N.id_nilai, N.tugas, N.ulangan, N.uas, N.uts, N.nilai_akhir FROM mapel M , siswa S LEFT JOIN nilai N ON S.id_siswa=N.id_siswa where S.id_jurusan=$id and M.id_guru=$id_guru;");
        return $query->result();
    }
    public function tampil_view_nilai()
    {
        return $this->db->get('vnilai');
    }
    public function tampil_siswa()
    {
        return $this->db->get('vsiswa');
    }
    public function input_data($data)
    {
        $this->db->insert('nilai', $data);
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
        $this->db->order_by('id_nilai', 'DESC');
        $query = $this->db->get('nilai');
        return $query;
    }
    public function insert($data)
    {
        $this->db->insert_batch('nilai', $data);
    }
    public function filter_kelas($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_jurusan', $id);
        //         $this->db->order_by('id_jurusan', 'asc');
        $query = $this->db->get();
        return $query->result();
        // return $this->db->select('*')
        //     ->from('siswa')
        //     ->like('id_jurusan')
        //     ->get()->result();
    }


    public function input_nilai($data)
    {

        $id_siswa = $data['id_siswa'];
        $id_mapel = $data['id_mapel'];
        $id_jurusan = $data['id_jurusan'];
        $tugas = $data['tugas'];
        $ulangan = $data['ulangan'];
        // $tugas3 = $data['tugas3'];
        $uts = $data['uts'];
        $uas = $data['uas'];
        $nilai_akhir = $data['nilai_akhir'];
        $capaian_kompetensi = $data['capaian_kompetensi'];
        $cek = $this->db->query("SELECT * from nilai where id_siswa=$id_siswa and id_mapel=$id_mapel and id_jurusan=$id_jurusan");

        if ($cek->num_rows() > 0) {
            $changed = array('tugas' => $tugas, 'ulangan' => $ulangan, 'uts' => $uts, 'uas' => $uas, 'nilai_akhir' => $nilai_akhir, 'capaian_kompetensi' => $capaian_kompetensi);
            $this->db->update('nilai', $changed, array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_jurusan' => $id_jurusan));
        } else {
            $this->db->insert('nilai', $data);
        }
    }
    // public function export($data)
    // {
    //     $this->db->select(array('id_mapel', 'id_siswa', 'id_jurusan', 'tugas1', 'tugas2', 'tugas3', 'uts', 'uas', 'nilai_akhir'));
    //     $this->db->from('nilai');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function nilai_jurusan()
    {
        return $this->db->query("SELECT * FROM jurusan");
    }

    public function nama_jurusan($id_jurusan)
    {
        return $this->db->query("SELECT * FROM jurusan WHERE id_jurusan=$id_jurusan");
    }

    public function nilai_detail_jadwal($id_jurusan)
    {
        return $this->db->query("SELECT * FROM jadwal
        JOIN jurusan ON jurusan.id_jurusan=jadwal.id_jurusan
        JOIN mapel ON mapel.id_mapel=jadwal.id_mapel
        JOIN guru ON guru.id_guru=mapel.id_guru
        WHERE jadwal.id_jurusan=$id_jurusan");
    }

    public function nilai_detail_kelas($id_mapel)
    {
        return $this->db->query("SELECT * FROM nilai
        JOIN jurusan ON jurusan.id_jurusan=nilai.id_jurusan
        JOIN mapel ON mapel.id_mapel=nilai.id_mapel
        JOIN siswa ON siswa.id_siswa=nilai.id_siswa
        JOIN guru ON guru.id_guru=mapel.id_guru
        WHERE nilai.id_mapel=$id_mapel");
    }

    public function nilai_detail_kelas_guru($id)
    {
        return $this->db->query("SELECT * FROM absen_siswa
        JOIN jurusan ON jurusan.id_jurusan=absen_siswa.id_jurusan
        JOIN mapel ON mapel.id_mapel=absen_siswa.id_mapel
        JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
        JOIN guru ON guru.id_guru=mapel.id_guru
        WHERE absen_siswa.id_jurusan=$id");
    }
    public function nilai_detail_kelas_siswa($id_siswa)
    {
        $id_siswa = $this->session->userdata('id_siswa');
        return $this->db->query("SELECT * FROM nilai
        JOIN jurusan ON jurusan.id_jurusan=nilai.id_jurusan
        JOIN siswa ON siswa.id_siswa=nilai.id_siswa
        WHERE nilai.id_siswa=$id_siswa");
    }
}
