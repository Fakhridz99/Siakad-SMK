<?php
class Absensi_model extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('absen_siswa');
        return $this->db->get('vmapel');
        return $this->db->get('vsiswa');
    }
    public function tampil_view_absensi($id)
    {
        $id_guru = $this->session->userdata('id_guru');
        $query = $this->db->query("SELECT S.id_siswa, S.nis, S.nama_siswa, S.id_jurusan , M.id_mapel ,IFNULL(A.hadir, 0) AS hadir, IFNULL(A.izin, 0) AS izin, IFNULL(A.sakit, 0) AS sakit, IFNULL(A.alpha, 0) AS alpha FROM mapel M , siswa S LEFT JOIN absen_siswa A ON S.id_siswa=A.id_siswa where S.id_jurusan=$id and M.id_guru=$id_guru");
        return $query->result();
    }
    public function tampil_view_data()
    {
        return $this->db->get('vabsensi');
    }

    public function nama_jurusan($id_jurusan)
    {
        return $this->db->query("SELECT * FROM jurusan WHERE id_jurusan=$id_jurusan");
    }

    public function absensi_jurusan()
    {
        return $this->db->query("SELECT * FROM jurusan");
    }

    public function absensi_detail_jadwal($id_jurusan)
    {
        return $this->db->query("SELECT * FROM jadwal
        JOIN jurusan ON jurusan.id_jurusan=jadwal.id_jurusan
        JOIN mapel ON mapel.id_mapel=jadwal.id_mapel
        JOIN guru ON guru.id_guru=mapel.id_guru
        WHERE jadwal.id_jurusan=$id_jurusan");
    }

    public function absensi_detail_kelas($id_mapel)
    {
        return $this->db->query("SELECT * FROM absen_siswa
        JOIN jurusan ON jurusan.id_jurusan=absen_siswa.id_jurusan
        JOIN mapel ON mapel.id_mapel=absen_siswa.id_mapel
        JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
        JOIN guru ON guru.id_guru=mapel.id_guru
        WHERE absen_siswa.id_mapel=$id_mapel");
    }

    public function absensi_detail_kelas_guru($id)
    {
        return $this->db->query("SELECT * FROM absen_siswa
        JOIN jurusan ON jurusan.id_jurusan=absen_siswa.id_jurusan
        JOIN mapel ON mapel.id_mapel=absen_siswa.id_mapel
        JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
        JOIN guru ON guru.id_guru=mapel.id_guru
        WHERE absen_siswa.id_jurusan=$id");
    }

    public function ambil_data_siswa($id)
    {
        $id_absen = $this->session->userdata('id_jurusan');
        $id_guru = $this->session->userdata('id_guru');
        $query = $this->db->query("SELECT A.id_absen_siswa, S.id_siswa, S.nis, S.nama_siswa, S.id_jurusan , M.id_mapel, A.hadir, A.izin, A.sakit, A.alpha FROM mapel M , siswa S LEFT JOIN absen_siswa A ON S.id_siswa=A.id_siswa where S.id_jurusan=$id and M.id_guru=$id_guru;");
        return $query->result();
    }

    public function input_data($data)
    {
        $this->db->insert('absen_siswa', $data);
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
        $this->db->order_by('id_absen_siswa', 'DESC');
        $query = $this->db->get('absen_siswa');
        return $query;
    }
    public function insert($data)
    {
        $this->db->insert_batch('absen_siswa', $data);
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

    public function input_absen($data)
    {
        // $mode = $data['mode'];
        // if ($mode === 'simpan') {
        $id_siswa = $data['id_siswa'];
        $id_mapel = $data['id_mapel'];
        $id_jurusan = $data['id_jurusan'];
        $hadir = $data['hadir'];
        $izin = $data['izin'];
        $sakit = $data['sakit'];
        $alpha = $data['alpha'];
        $cek = $this->db->query("SELECT * from absen_siswa where id_siswa=$id_siswa and id_mapel=$id_mapel and id_jurusan=$id_jurusan");

        if ($cek->num_rows() > 0) {
            // $changed = array('hadir' => $hadir, 'izin' => $izin, 'sakit' => $sakit, 'alpha' => $alpha);
            $changed = array('hadir' => $hadir, 'izin' => $izin, 'sakit' => $sakit, 'alpha' => $alpha);

            $this->db->update('absen_siswa', $changed, array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_jurusan' => $id_jurusan));
        } else {
            $this->db->insert('absen_siswa', $data);
        }
        // }
        // else {
        //     $id_siswa = $data['id_siswa'];
        //     $id_mapel = $data['id_mapel'];
        //     $id_jurusan = $data['id_jurusan'];
        //     $presensi1 = 0;
        //     $presensi2 = 0;
        //     $presensi3 = 0;
        //     $presensi4 = 0;
        //     $presensi5 = 0;
        //     $presensi6 = 0;
        //     $presensi7 = 0;
        //     $presensi8 = 0;
        //     $presensi9 = 0;
        //     $presensi10 = 0;
        //     $presensi11 = 0;

        //     // $izin = 0;
        //     // $sakit = 0;
        //     // $alpha = 0;
        //     $cek = $this->db->query("SELECT * from absen_siswa where id_siswa=$id_siswa and id_mapel=$id_mapel and id_jurusan=$id_jurusan");

        //     if ($cek->num_rows() > 0) {
        //         // $changed = array('hadir' => $hadir, 'izin' => $izin, 'sakit' => $sakit, 'alpha' => $alpha);
        //         // $changed = array('presensi' => $presensi);
        //         $changed = array('presensi1' => $presensi1, 'presensi2' => $presensi2, 'presensi3' => $presensi3, 'presensi4' => $presensi4, 'presensi5' => $presensi5, 'presensi6' => $presensi6, 'presensi7' => $presensi7, 'presensi8' => $presensi8, 'presensi9' => $presensi9, 'presensi10' => $presensi10, 'presensi11' => $presensi11);


        //         $this->db->update('absen_siswa', $changed, array('id_siswa' => $id_siswa, 'id_mapel' => $id_mapel, 'id_jurusan' => $id_jurusan));
        //     } else {
        //         $this->db->insert('absen_siswa', $data);
        //     }
        // }
    }
    public function hitung_absen($data, $id_siswa)
    {

        $this->db->select('*');
        $this->db->from('absen_siswa');
        $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data2 = 0;
            $index = 1;
            foreach ($query->result() as $row) {
                if ($row->hadir == $data) {
                    $data2++;
                }
                if ($row->izin == $data) {
                    $data2++;
                }
                if ($row->sakit == $data) {
                    $data2++;
                }
                if ($row->alpha == $data) {
                    $data2++;
                }
                // if ($row->presensi5 == $data) {
                //     $data2++;
                // }
                // if ($row->presensi6 == $data) {
                //     $data2++;
                // }
                // if ($row->presensi7 == $data) {
                //     $data2++;
                // }
                // if ($row->presensi8 == $data) {
                //     $data2++;
                // }
                // if ($row->presensi9 == $data) {
                //     $data2++;
                // }
                // if ($row->presensi10 == $data) {
                //     $data2++;
                // }
                // if ($row->presensi11 == $data) {
                //     $data2++;
                // }

                $index++;
            }
            return $data2;
        } else {
            return 0;
        }
    }
}
