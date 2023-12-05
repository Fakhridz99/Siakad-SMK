<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('nilai_model');
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
    $data['nilai'] = $this->nilai_model->edit_data($id_guru, 'vjadwal')->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('guru/nilai', $data);
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
    $this->load->view('guru/nilai_form', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function ubah($id)
  {
    $id_nilai = ['id_nilai' => $id];
    $id_guru = ['id_guru' => $this->session->userdata('id_guru')];
    $data = array(
      'nilai' => $this->nilai_model->edit_data($id_nilai, 'vnilai')->result(),
      'siswa' => $this->siswa_model->tampil_view_data()->result(),
      'mapel' => $this->mapel_model->edit_data($id_guru, 'vmapel')->result(),
      'jurusan' => $this->jurusan_model->tampil_data()->result(),
    );
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('guru/nilai_ubah', $data);
    $this->load->view('templates_administrator/footer');
  }
  public function ubah_aksi()
  {
    $id_nilai = $this->input->post('id_nilai');
    $id_jurusan = $this->input->post('id_jurusan');
    // $id_jurusan = $this->input->post('id_jurusan');
    $id_mapel = $this->input->post('mapel');
    $id_siswa = $this->input->post('id_siswa');
    $tugas = $this->input->post('tugas');
    $ulangan = $this->input->post('ulangan');
    // $tugas3 = $this->input->post('tugas3');
    $uts = $this->input->post('uts');
    $uas = $this->input->post('uas');
    $capaian_kompetensi = $this->input->post('capaian_kompetensi');


    $nilai_akhir = $this->input->post('nilai_akhir');
    $nilai_akhir = ((($tugas + $ulangan) / 3) * 0.35) + ($uts * 0.25) + ($uas * 0.40);
    $data = array(
      'id_jurusan' => $id_jurusan,
      'id_mapel' => $id_mapel,
      'id_siswa' => $id_siswa,
      'tugas' => $tugas,
      'ulangan' => $ulangan,
      // 'tugas3' => $tugas3,
      'uts' => $uts,
      'uas' => $uas,
      'nilai_akhir' => $nilai_akhir,
      'capaian_kompetensi' => $capaian_kompetensi,


    );
    $where = array(
      'id_nilai' => $id_nilai
    );
    $this->nilai_model->ubah_data($where, $data, 'nilai');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data nilai berhasil diubah!
        </div>
      </div>');
    redirect('guru/nilai');
  }
  public function import($id)
  {
    $data['id'] = $id;
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('guru/nilai_import', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function fetch()
  {
    $data = $this->nilai_model->select();

    $output = "<h3 align='center'>Total Data -" . $data->num_rows() . "</h3>
           <table class='table table-bordered'>
           <thead>
           <tr>
               <th>ID Nilai</th>
               <th>ID Mapel</th>
               <th>ID Siswa</th>
               <th>ID Jurusan</th>
               <th>Tugas 1</th>
               <th>Tugas 2</th>
               <th>Tugas 3</th>
               <th>UTS</th>
               <th>UAS</th>
               <th>Nilai Akhir</th>
           </tr>
           </thead>
           <tbody>";
    foreach ($data->result_array() as $row) {
      $output .= "<td>" . $row['id_nilai'] . "</td>";
      $output .= "<td>" . $row['id_mapel'] . "</td>";
      $output .= "<td>" . $row['id_jurusan'] . "</td>";
      $output .= "<td>" . $row['tugas1'] . "</td>";
      $output .= "<td>" . $row['tugas2'] . "</td>";
      $output .= "<td>" . $row['tugas3'] . "</td>";
      $output .= "<td>" . $row['uts'] . "</td>";
      $output .= "<td>" . $row['uas'] . "</td>";
      $output .= "<td>" . $row['nilai_akhir'] . "</td>";
      $output .= "</tr>";
    }

    $output .= "</tbody>
             </table>";

    echo $output;
  }

  // export format excel 
  public function export_aksi()
  {
    $data = $this->nilai_model->ambil_data_siswa($this->input->post('id_kelas'));
    foreach ($data as $key => $value) {
      $data_csv[] = [
        $value->id_nilai,
        $value->id_mapel,
        $value->id_siswa,
        $value->id_jurusan,
        $value->nama_siswa,
        $value->tugas,
        $value->ulangan,
        $value->uts,
        $value->uas,
        $value->nilai_akhir,
      ];
    }
    $data_csv_baru =
      ['ID_NILAI', 'ID_MAPEL', 'ID_SISWA', 'ID JURUSAN', 'NAMA SISWA', 'TUGAS', 'ULANGAN', 'UTS', 'UAS', 'NILAI AKHIR', "CAPAIAN KOMPETISI"];
    array_unshift($data_csv, $data_csv_baru);
    echo '<H1> Proses Export Data Nilai</H1>';
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js'></script>";
    echo "<script>";
    echo "var data = " . json_encode($data_csv) . ";";
    echo "var ws = XLSX.utils.aoa_to_sheet(data);";
    echo "var wb = XLSX.utils.book_new();";
    echo "XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');";
    echo "XLSX.writeFile(wb, 'nilai.xlsx');";
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
          $id_nilai = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $id_mapel = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $id_siswa = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $id_jurusan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $tugas = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $ulangan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $uts = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
          $uas = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
          $nilai_akhir = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
          $capaian_kompetensi = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
          $data[] = array(
            'id_nilai' => $id_nilai,
            'id_mapel' => $id_mapel,
            'id_siswa' => $id_siswa,
            'id_jurusan' => $id_jurusan,
            'tugas' => $tugas,
            'ulangan' => $ulangan,
            'uts' => $uts,
            'uas' => $uas,
            'nilai_akhir' => $nilai_akhir,
            'capaian_kompetensi' => $capaian_kompetensi,
          );
        }
      }

      foreach ($data as $key) {
        $this->db->delete('nilai', array('id_nilai' => $key['id_nilai']));
      }
      $this->nilai_model->insert($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            Import Data Nilai berhasil!
          </div>
        </div>');

      redirect('guru/nilai');
    }
  }


  // public function export()
  // {
  //   $fileName = 'data-' . time() . '.xlsx';
  //   // load excel library
  //   //    $this->load->library('excel');
  //   $this->nilai_model->export($data);
  //   $objPHPExcel = new PHPExcel();
  //   $objPHPExcel->setActiveSheetIndex(0);
  //   // set Header
  //   $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'id_mapel');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'id_siswa');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'id_jurusan');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'tugas1');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'tugas2');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'tugas3');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'uts');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'uas');
  //   $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'nilai_akhir');

  //   // set Row
  //   $rowCount = 2;
  //   foreach ($data as $list) {
  //     $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_mapel);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->id_siswa);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->id_jurusan);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->tugas1);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->tugas2);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->tugas3);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->uts);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->uas);
  //     $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->nilai_akhir);

  //     $rowCount++;
  //   }
  //   $filename = "tutsmake" . date("Y-m-d-H-i-s") . ".csv";
  //   header('Content-Type: application/vnd.ms-excel');
  //   header('Content-Disposition: attachment;filename="' . $filename . '"');
  //   header('Cache-Control: max-age=0');
  //   $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
  //   $objWriter->save('php://output');
  // }
  public function lihat($id)
  {
    // var_dump($id)
    // die;
    // $data = array(
    //   'id_siswa' => set_value('id_siswa'),
    //   'nis' => set_value('nis'),
    //   'nama_siswa' => set_value('nama_siswa'),
    //   'tugas' => set_value('tugas'),
    //   'ulangan' => set_value('ulangan'),
    //   // 'tugas3' => set_value('tugas3'),
    //   'uts' => set_value('uts'),
    //   'uas' => set_value('uas'),
    //   'nilai_akhir' => set_value('nilai_akhir'),
    //   'capaian_kompetensi' => set_value('capaian_kompetensi'),

    // );

    //    $data['nilai'] = $this->nilai_model->filter_kelas($id);
    $data = [
      'nilai_detail_kelas_guru' => $this->nilai_model->nilai_detail_kelas_guru($id)->result()
      // 'nilai' => $this->nilai_model->tampil_view_data($id)
    ];
    $data['nilai'] = $this->nilai_model->edit_data($id, 'vjadwal')->result();
    $data['nilai'] = $this->nilai_model->tampil_view_data($id);
    $data['id'] = $id;
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('guru/nilai_lihat', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function tambah_nilai()
  {
    // menghitung nilai akhir
    $id_jurusan = $this->input->post('id_jurusan', TRUE);
    $tugas = $this->input->post('tugas', TRUE);
    $ulangan = $this->input->post('ulangan', TRUE);
    // $tugas3 = $this->input->post('tugas3', TRUE);
    $uts = $this->input->post('uts', TRUE);
    $uas = $this->input->post('uas', TRUE);
    // $nilai_akhir = ((($tugas + $ulangan) / 3) * 0.35) + ($uts * 0.25) + ($uas * 0.40);
    $nilai_akhir = ($tugas * 0.40) + ($ulangan * 0.40) + ($uts * 0.05) + ($uas * 0.15);
    $capaian_kompetensi = $this->input->post('capaian_kompetensi', TRUE);


    $data = array(
      'id_jurusan' => $this->input->post('id_jurusan', TRUE),
      'id_mapel' => $this->input->post('id_mapel', TRUE),
      'id_siswa' => $this->input->post('id_siswa', TRUE),
      'tugas' => $this->input->post('tugas', TRUE),
      'ulangan' => $this->input->post('ulangan', TRUE),
      // 'tugas3' => $this->input->post('tugas3', TRUE),
      'uts' => $this->input->post('uts', TRUE),
      'uas' => $this->input->post('uas', TRUE),
      'nilai_akhir' => $nilai_akhir,
      'capaian_kompetensi' => $this->input->post('capaian_kompetensi', TRUE),
    );
    // foreach ($data as $key) {
    $this->db->delete('nilai', array('id_nilai' => $key['id_nilai']));
    // }
    $this->nilai_model->input_nilai($data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data nilai berhasil ditambahkan!
            </div>
          </div>');
    redirect('guru/nilai/lihat/' . $id_jurusan);
  }
  // public function lihat_aksi()
  // {
  //   $this->_rules();
  //   if ($this->form_validation->run() == FALSE) {
  //     $this->input();
  //   } else {

  //     // //mengambil data id_siswa
  //     // $id_siswa = $this->input->post('nama', TRUE);
  //     // $id_siswa = explode(",", $id_siswa);
  //     // $id_siswa = $id_siswa[1];

  //     // menghitung nilai akhir
  //     $tugas = $this->input->post('tugas', TRUE);
  //     $ulangan = $this->input->post('ulangan', TRUE);
  //     // $tugas3 = $this->input->post('tugas3', TRUE);
  //     $uts = $this->input->post('uts', TRUE);
  //     $uas = $this->input->post('uas', TRUE);
  //     // $nilai_akhir = ((($tugas + $ulangan) / 3) * 0.35) + ($uts * 0.25) + ($uas * 0.40);
  //     $nilai_akhir = ($tugas * 0.40) + ($ulangan * 0.40) + ($uts * 0.05) + ($uas * 0.15);
  //     $capaian_kompetensi = $this->input->post('capaian_kompetensi', TRUE);

  //     $data = array(
  //       //        'id_jurusan' => $this->input->post('id_jurusan', TRUE),
  //       //        'id_mapel' => $this->input->post('mapel', TRUE),
  //       //        'id_siswa' => $this->input->post('id_siswa', TRUE),
  //       'tugas' => $this->input->post('tugas', TRUE),
  //       'ulangan' => $this->input->post('ulangan', TRUE),
  //       // 'tugas3' => $this->input->post('tugas3', TRUE),
  //       'uts' => $this->input->post('uts', TRUE),
  //       'uas' => $this->input->post('uas', TRUE),
  //       'capaian_kompetensi' => $this->input->post('capaian_kompetensi', TRUE),
  //       'nilai_akhir' => $nilai_akhir

  //     );
  //     // var_dump($data);
  //     // die;
  //     $data['nilai'] = $this->nilai_model->filter_kelas($id);
  //     $this->nilai_model->input_data($data);
  //     $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
  //           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  //           <div>
  //             Data nilai berhasil ditambahkan!
  //           </div>
  //         </div>');
  //     redirect('guru/nilai_lihat');
  //   }
  // }
  public function _rules()
  {
    $this->form_validation->set_rules('tugas', 'tugas', 'required', ['required' => 'Tugas wajib diisi!']);
    $this->form_validation->set_rules('ulangan', 'ulangan', 'required', ['required' => 'Ulangan wajib diisi!']);
    // $this->form_validation->set_rules('tugas3', 'tugas3', 'required', ['required' => 'Tugas 3 wajib diisi!']);
    $this->form_validation->set_rules('uts', 'uts', 'required', ['required' => 'UTS wajib diisi!']);
    $this->form_validation->set_rules('uas', 'uas', 'required', ['required' => 'UAS wajib diisi!']);
  }
  public function hapus($id)
  {
    $where = array('id_nilai' => $id);
    $this->nilai_model->hapus_data($where, 'nilai');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Nilai berhasil dihapus!
        </div>
      </div>');
    redirect('guru/nilai');
  }
}
