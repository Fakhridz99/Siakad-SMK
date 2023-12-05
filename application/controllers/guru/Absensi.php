<?php
class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_model');
        if (!isset($this->session->userdata['id_guru'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
			<div>
			  Anda Belum Login!
			</div>
		  </div>');
            redirect('administrator/auth');
        }
    }
    public function index()
    {
        $id_guru = ['id_guru' => $this->session->userdata('id_guru')];
        //        $data['absensi'] = $this->absensi_model->edit_data($id_guru, 'vabsensi')->result();
        // $data['absensi'] = $this->absensi_model->tampil_view_absensi()->result();
        $data['absensi'] = $this->absensi_model->edit_data($id_guru, 'vjadwal')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/absensi', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $id_guru = ['id_guru' => $this->session->userdata('id_guru')];
        $data = array(
            'siswa' => $this->siswa_model->tampil_view_data()->result(),
            'mapel' => $this->mapel_model->edit_data($id_guru, 'vmapel')->result(),
            'jurusan' => $this->jurusan_model->tampil_data()->result(),
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/absensi_form', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $data = array(
                'id_mapel' => $this->input->post('id_mapel', TRUE),
                'id_siswa' => $this->input->post('id_siswa', TRUE),
                'hadir' => $this->input->post('hadir', TRUE),
                'izin' => $this->input->post('izin', TRUE),
                'sakit' => $this->input->post('sakit', TRUE),
                'alpha' => $this->input->post('alpha', TRUE),
            );
            // var_dump($data);
            // die;
            $this->absensi_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data absensi berhasil ditambahkan!
            </div>
          </div>');
            redirect('guru/absensi');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('hadir', 'hadir', 'required', ['required' => 'Jumlah hadir wajib diisi!']);
        $this->form_validation->set_rules('izin', 'izin', 'required', ['required' => 'Jumlah izin wajib diisi!']);
        $this->form_validation->set_rules('sakit', 'sakit', 'required', ['required' => 'Jumlah sakit wajib diisi!']);
        $this->form_validation->set_rules('alpha', 'alpha', 'required', ['required' => 'Jumlah alpha wajib diisi!']);
    }
    public function ubah($id)
    {
        $where = array('id_absen_siswa' => $id);
        $data['absensi'] = $this->absensi_model->edit_data($where, 'absen_siswa')->result();

        $id_guru = ['id_guru' => $this->session->userdata('id_guru')];
        $data['siswa'] = $this->siswa_model->tampil_view_data()->result();
        $data['mapel'] = $this->mapel_model->edit_data($id_guru, 'vmapel')->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/absensi_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {

        $id = $this->input->post('id_absen_siswa');
        $id_mapel = $this->input->post('id_mapel');
        $id_siswa = $this->input->post('id_siswa');
        $hadir = $this->input->post('hadir');
        $izin = $this->input->post('izin');
        $sakit = $this->input->post('sakit');
        $alpha = $this->input->post('alpha');

        $data = array(
            'id_mapel' => $id_mapel,
            'id_siswa' => $id_siswa,
            'hadir' => $hadir,
            'izin' => $izin,
            'sakit' => $sakit,
            'alpha' => $alpha

        );

        // var_dump($data);
        // die;
        $where = array(
            'id_absen_siswa' => $id
        );
        $this->siswa_model->ubah_data($where, $data, 'absen_siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data absensi berhasil diubah!
        </div>
      </div>');
        redirect('guru/absensi');
    }
    public function import($id)
    {
        $data['id'] = $id;
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/absensi_import', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function fetch()
    {
        $data = $this->absensi_model->select();

        $output = "<h3 align='center'>Total Data -" . $data->num_rows() . "</h3>
             <table class='table table-bordered'>
             <thead>
             <tr>
                 <th>ID Absen Siswa</th>
                 <th>ID Mapel</th>
                 <th>ID Siswa</th>
                 <th>ID Jurusan</th>
                 <th>Hadir</th>
                 <th>Izin</th>
                 <th>Sakit</th>
                 <th>Alpha</th>
             </tr>
             </thead>
             <tbody>";
        foreach ($data->result_array() as $row) {
            $output .= "<td>" . $row['id_absen_siswa'] . "</td>";
            $output .= "<td>" . $row['id_mapel'] . "</td>";
            $output .= "<td>" . $row['id_siswa'] . "</td>";
            $output .= "<td>" . $row['id_jurusan'] . "</td>";
            $output .= "<td>" . $row['hadir'] . "</td>";
            $output .= "<td>" . $row['izin'] . "</td>";
            $output .= "<td>" . $row['sakit'] . "</td>";
            $output .= "<td>" . $row['alpha'] . "</td>";
            $output .= "</tr>";
        }

        $output .= "</tbody>
               </table>";

        echo $output;
    }

    // export format excel 
    public function export_aksi()
    {
        $data = $this->absensi_model->ambil_data_siswa($this->input->post('id_absen'));
        foreach ($data as $key => $value) {
            $data_csv[] = [
                $value->id_absen_siswa,
                $value->id_mapel,
                $value->id_siswa,
                $value->id_jurusan,
                $value->nama_siswa,
                // $value->hadir,
                $value->izin,
                $value->sakit,
                $value->alpha,
            ];
        }
        $data_csv_baru =
            ['ID_ABSEN_SISWA', 'ID_MAPEL', 'ID_SISWA', 'ID JURUSAN', 'NAMA SISWA', 'IZIN', 'SAKIT', 'ALPHA'];
        array_unshift($data_csv, $data_csv_baru);
        echo '<H1> Proses Export Data Presensi</H1>';
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js'></script>";
        echo "<script>";
        echo "var data = " . json_encode($data_csv) . ";";
        echo "var ws = XLSX.utils.aoa_to_sheet(data);";
        echo "var wb = XLSX.utils.book_new();";
        echo "XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');";
        echo "XLSX.writeFile(wb, 'presensi.xlsx');";
        echo "setTimeout(() => { history.back(); }, 10);";
        echo "</script>";
    }

    public function import_aksi()
    {
        error_reporting(0);
        if (isset($_FILES['file']['name'])) {
            $path = $_FILES['file']['tmp_name'];
            //create a class PHPExcel_IOFactory::load($path)
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                //get highest worksheet row
                $highestRow = $worksheet->getHighestRow();
                //get highest worksheet column
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $id_absen_siswa = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $id_mapel = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $id_siswa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $id_jurusan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    // $hadir = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $izin = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $sakit = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $alpha = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $data[] = array(
                        'id_absen_siswa' => $id_absen_siswa,
                        'id_mapel' => $id_mapel,
                        'id_siswa' => $id_siswa,
                        'id_jurusan' => $id_jurusan,
                        // 'hadir' => $hadir,
                        'izin' => $izin,
                        'sakit' => $sakit,
                        'alpha' => $alpha,
                    );
                }
            }
            foreach ($data as $key) {
                $this->db->delete('absen_siswa', array('id_absen_siswa' => $key['id_absen_siswa']));
            }
            $this->absensi_model->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Import Data Presensi berhasil!
            </div>
          </div>');

            redirect('guru/absensi');
        }
    }
    public function lihat($id)
    {
        //$data['absensi'] = $this->absensi_model->filter_kelas($id);
        $data = array(
            'id_siswa' => set_value('id_siswa'),
            'nis' => set_value('nis'),
            'nama_siswa' => set_value('nama_siswa'),
            'hadir' => set_value('hadir'),
            'izin' => set_value('izin'),
            'sakit' => set_value('sakit'),
            'alfa' => set_value('alfa'),
        );
        $data = [
            'absensi_detail_kelas' => $this->absensi_model->absensi_detail_kelas_guru($id)->result(),
            'absensi' => $this->absensi_model->tampil_view_absensi($id)
        ];
        $data['id'] = $id;
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/absensi_lihat', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_absen()
    {
        $id_jurusan = $this->input->post('id_jurusan', TRUE);
        $data = array(
            'id_jurusan' => $this->input->post('id_jurusan', TRUE),
            'id_mapel' => $this->input->post('id_mapel', TRUE),
            'id_siswa' => $this->input->post('id_siswa', TRUE),
            // 'presensi1' => $this->input->post('presensi1', TRUE),
            // 'presensi2' => $this->input->post('presensi2', TRUE),
            // 'presensi3' => $this->input->post('presensi3', TRUE),
            // 'presensi4' => $this->input->post('presensi4', TRUE),
            // 'presensi5' => $this->input->post('presensi5', TRUE),
            // 'presensi6' => $this->input->post('presensi6', TRUE),
            // 'presensi7' => $this->input->post('presensi7', TRUE),
            // 'presensi8' => $this->input->post('presensi8', TRUE),
            // 'presensi9' => $this->input->post('presensi9', TRUE),
            // 'presensi10' => $this->input->post('presensi10', TRUE),
            // 'presensi11' => $this->input->post('presensi11', TRUE),

            'hadir' => $this->input->post('hadir', TRUE),
            'izin' => $this->input->post('izin', TRUE),
            'sakit' => $this->input->post('sakit', TRUE),
            'alpha' => $this->input->post('alpha', TRUE),
        );
        // var_dump($data);
        // die;
        $this->absensi_model->input_absen($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data Absen berhasil disimpan ' . $this->input->post('simpan') . '!
            </div>
          </div>');


        redirect('guru/absensi/lihat/' . $id_jurusan);
    }

    public function delete_absen($id, $idm, $idj)
    {
        $data = array(
            'id_jurusan' => $idj,
            'id_mapel' => $idm,
            'id_siswa' => $id,
            'mode' => 'delete',
        );
        // var_dump($data);
        // die;
        $this->absensi_model->input_absen($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data Absen berhasil dihapus !
            </div>
          </div>');

        redirect('guru/absensi/lihat/' . $idj);
    }

    public function hapus($id)
    {
        $where = array('id_absen_siswa' => $id);
        $this->absensi_model->hapus_data($where, 'absen_siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data absensi berhasil dihapus!
        </div>
      </div>');
        redirect('guru/absensi');
    }
}
