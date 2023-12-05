<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();

        if ($this->session->id_user) {
            redirect('administrator');
        } else if ($this->session->id_guru) {
            redirect('guru');
        } else if ($this->session->id_siswa) {
            redirect('siswa');
        } else if ($this->session->userdata() == null) {
            redirect('administrator/auth');
        }
    }
	
	public function index()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('administrator/login');
		$this->load->view('templates_administrator/footer');
	}
}
