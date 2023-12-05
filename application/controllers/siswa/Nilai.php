<?php
class Nilai extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('absensi_model');
    if (!isset($this->session->userdata['id_siswa'])) {
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
    $id_siswa = ['id_siswa' => $this->session->userdata('id_siswa')];
    $data = [
      'nilai_detail_siswa' => $this->nilai_model->nilai_detail_kelas_siswa($id_siswa)->result()
    ];
    $data['nilai'] = $this->nilai_model->edit_data($id_siswa, 'vnilai')->result();
    $data['absensi'] = $this->absensi_model->edit_data($id_siswa, 'vabsensi')->result();
    //mendapatkan jumlah absensi
    // $data['hadir'] = $this->absensi_model->hitung_absen('hadir', $this->session->userdata('id_siswa'));
    // $data['izin'] = $this->absensi_model->hitung_absen('izin', $this->session->userdata('id_siswa'));
    // $data['sakit'] = $this->absensi_model->hitung_absen('sakit', $this->session->userdata('id_siswa'));
    // $data['alpha'] = $this->absensi_model->hitung_absen('alpha', $this->session->userdata('id_siswa'));
    // $absensi = "SELECT COUNT(*) AS hadir FROM vabsensi WHERE id_siswa = '$id_siswa'";
    // // $data['absensi'] = $this->db->query($qabsensi)->row_array();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('siswa/nilai', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function print_rapot_siswa()
  {
    $id_siswa = ['id_siswa' => $this->session->userdata('id_siswa')];
    $data['nilai'] = $this->nilai_model->edit_data($id_siswa, 'vnilai')->result();
    $data['absensi'] = $this->absensi_model->edit_data($id_siswa, 'vabsensi')->result();
    //mendapatkan jumlah absensi
    $data['alpha'] = $this->absensi_model->hitung_absen('alpha', $this->session->userdata('id_siswa'));
    $data['sakit'] = $this->absensi_model->hitung_absen('sakit', $this->session->userdata('id_siswa'));
    $data['izin'] = $this->absensi_model->hitung_absen('izin', $this->session->userdata('id_siswa'));
    $data['hadir'] = $this->absensi_model->hitung_absen('hadir', $this->session->userdata('id_siswa'));

    $this->load->view('siswa/print_rapot_siswa', $data);
  }
}
