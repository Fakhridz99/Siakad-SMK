<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['id_user'])) {
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
        $quser = 'SELECT COUNT(*) AS hasil FROM user';
        $data['user'] = $this->db->query($quser)->row_array();

        $qsiswa = 'SELECT COUNT(*) AS hasil FROM siswa';
        $data['siswa'] = $this->db->query($qsiswa)->row_array();

        $qguru = 'SELECT COUNT(*) AS hasil FROM guru';
        $data['guru'] = $this->db->query($qguru)->row_array();

        $qjurusan = 'SELECT COUNT(*) AS hasil FROM jurusan';
        $data['jurusan'] = $this->db->query($qjurusan)->row_array();

        $qmapel = 'SELECT COUNT(*) AS hasil FROM mapel';
        $data['mapel'] = $this->db->query($qmapel)->row_array();

        $qjadwal = 'SELECT COUNT(*) AS hasil FROM jadwal';
        $data['jadwal'] = $this->db->query($qjadwal)->row_array();

        $qnilai = 'SELECT COUNT(*) AS hasil FROM nilai';
        $data['nilai'] = $this->db->query($qnilai)->row_array();

        $qabsensi = 'SELECT COUNT(*) AS hasil FROM absen_siswa';
        $data['absensi'] = $this->db->query($qabsensi)->row_array();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('administrator/auth');
    }
}
