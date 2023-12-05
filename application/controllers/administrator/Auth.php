<?php
class Auth extends CI_Controller
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
    
    public function proses_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username Wajib diisi ya']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password Wajib diisi ya']);
        $this->form_validation->set_rules('level', 'level', 'required', ['required' => 'Level Wajib diisi ya']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_administrator/header');
            $this->load->view('administrator/login');
            $this->load->view('templates_administrator/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level = $this->input->post('level');

            $user = $username;
            $pass = MD5($password);
            $lvl = $level;

            $cek = $this->login_model->cek_login($user, $pass, $lvl);

            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {

                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                    $sess_data['level'] = $lvl;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'admin') {
                    $this->session->set_userdata('id_user', $ck->id_user);
                    redirect('administrator/dashboard');
                } elseif ($sess_data['level'] == 'guru') {
                    $this->session->set_userdata('id_guru', $ck->id_guru);
                    redirect('guru/dashboard');
                } elseif ($sess_data['level'] == 'siswa') {
                    $this->session->set_userdata('id_jurusan', $ck->id_jurusan);
                    $this->session->set_userdata('id_siswa', $ck->id_siswa);
                    redirect('siswa/dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Ada yang Salah!
                    </div>
                  </div>');
                    redirect('administrator/auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Ada yang Salah!
                    </div>
                  </div>');
                redirect('administrator/auth');
            }
        }
    }    
}
