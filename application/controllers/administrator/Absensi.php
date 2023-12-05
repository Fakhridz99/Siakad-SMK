<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
require 'vendor/autoload.php';

use Shuchkin\SimpleXLSX;

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_model');
        if (!isset($this->session->userdata['id_user'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
			<div>
			  Anda Belum Login!
			</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
		  </div>');
            redirect('administrator/auth');
        }
    }
    public function index()
    {
        $data['absensi'] = $this->absensi_model->absensi_jurusan()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/absensi', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail_jurusan($id_jurusan)
    {
        $data = [
            'nama_jurusan' => $this->absensi_model->nama_jurusan($id_jurusan)->result(),
            'absensi_detail_jadwal' => $this->absensi_model->absensi_detail_jadwal($id_jurusan)->result()
        ];
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/absensi_detail_jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail_kelas($id_mapel)
    {
        $data = [
            'absensi_detail_kelas' => $this->absensi_model->absensi_detail_kelas($id_mapel)->result()
        ];
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/absensi_detail_kelas', $data);
        $this->load->view('templates_administrator/footer');
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
