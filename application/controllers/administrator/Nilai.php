<?php
class Nilai extends CI_Controller
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
        $data['nilai_jurusan'] = $this->nilai_model->nilai_jurusan()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/nilai', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function detail_jurusan($id_jurusan)
    {
        $data = [
            'nama_jurusan' => $this->nilai_model->nama_jurusan($id_jurusan)->result(),
            'absensi_detail_jadwal' => $this->nilai_model->nilai_detail_jadwal($id_jurusan)->result()
        ];
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/nilai_detail_jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail_kelas($id_mapel)
    {
        $data = [
            'nilai_detail_kelas' => $this->nilai_model->nilai_detail_kelas($id_mapel)->result()
        ];
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/nilai_detail_kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
}
