<?php
class Profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['id_guru'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
			<div>
			  Anda Belum Login!
			</div>
		  </div>');
            redirect('guru/auth');
        }
    }
    public function index()
    {
        $data['guru'] = $this->user_model->ambil_data($this->session->userdata['id_guru'], 'guru', 'id_guru');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/profil', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
    }
    public function ubah()
    {
        $data['guru'] = $this->user_model->ambil_data($this->session->userdata['id_guru'], 'guru', 'id_guru');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/profil_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id_guru = $this->session->userdata('id_guru');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $NIP = $this->input->post('NIP');
        $nama_guru = $this->input->post('nama_guru');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');

        $data = array(
            'username' => $username,
            'password' => $password,
            'nip' => $NIP,
            'nama_guru' => $nama_guru,
            'tgl_lahir_guru' => $tanggal_lahir,
            'jk_guru' => $jenis_kelamin,
            'tlp_guru' => $no_tlp,
            'alamat_guru' => $alamat

        );

        $where = array(
            'id_guru' => $id_guru
        );

        $get_data = $this->user_model->get_one('guru', 'username', $username);
        $get_by_id = $this->user_model->get_one('guru', 'id_guru', $id_guru);

        if ($get_data == FALSE || $get_by_id->username == $username) {
            $sess_data['username'] = $username;
            $sess_data['password'] = $password;
            $this->session->set_userdata($sess_data);

            $this->user_model->ubah_data($where, $data, 'guru');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Akun Pengguna berhasil diubah!
        </div>
      </div>');
            redirect('guru/profil');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            Username sudah ada
            </div>
            </div>');
            redirect('siswa/profil/ubah');
        }
    }
}
