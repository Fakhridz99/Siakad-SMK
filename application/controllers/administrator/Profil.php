<?php
class Profil extends CI_Controller
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
        $data['user'] = $this->user_model->ambil_data($this->session->userdata['id_user'], 'user', 'id_user');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/profil', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
    }
    public function ubah()
    {
        $data['user'] = $this->user_model->ambil_data($this->session->userdata['id_user'], 'user', 'id_user');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/profil_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id_user = $this->session->userdata('id_user');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data = array(
            'username' => $username,
            'password' => $password
        );

        $where = array(
            'id_user' => $id_user
        );

        $get_data = $this->user_model->get_one('user', 'username', $username);
        $get_by_id = $this->user_model->get_one('user', 'id_user', $id_user);

        if ($get_data == FALSE || $get_by_id->username == $username) {
            $sess_data['username'] = $username;
            $sess_data['password'] = $password;
            $this->session->set_userdata($sess_data);

            $this->user_model->ubah_data($where, $data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Akun Pengguna berhasil diubah!
        </div>
      </div>');
            redirect('administrator/profil');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            Username sudah ada
            </div>
            </div>');
            redirect('administrator/profil/ubah');
        }
    }
}
