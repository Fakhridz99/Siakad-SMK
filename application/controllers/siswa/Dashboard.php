<?php
class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
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
    $id_siswa = $this->session->userdata('id_siswa');
    $id_jurusan = $this->session->userdata('id_jurusan');

    $qjadwal = "SELECT COUNT(*) AS hasil FROM vjadwal WHERE id_jurusan = '$id_jurusan'";
    $data['jadwal'] = $this->db->query($qjadwal)->row_array();

    $qnilai = "SELECT COUNT(*) AS hasil FROM vnilai WHERE id_siswa = '$id_siswa'";
    $data['nilai'] = $this->db->query($qnilai)->row_array();

    $qabsensi = "SELECT COUNT(*) AS hasil FROM vabsensi WHERE id_siswa = '$id_siswa'";
    $data['absensi'] = $this->db->query($qabsensi)->row_array();

    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('siswa/dashboard', $data);
    $this->load->view('templates_administrator/footer');
  }

  public function logout()
    {
        $this->session->sess_destroy();
        redirect('administrator/auth');
    }
}
