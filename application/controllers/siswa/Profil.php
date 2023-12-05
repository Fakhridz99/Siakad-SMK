<?php
class Profil extends CI_Controller
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
            redirect('siswa/auth');
        }
    }
    public function index()
    {
        $data['siswa'] = $this->user_model->ambil_data($this->session->userdata['id_siswa'], 'vsiswa', 'id_siswa');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('siswa/profil', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
    }
    public function ubah()
    {
        $data['siswa'] = $this->user_model->ambil_data($this->session->userdata['id_siswa'], 'vsiswa', 'id_siswa');
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('siswa/profil_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id_siswa = $this->session->userdata('id_siswa');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $NIS = $this->input->post('NIS');
        $nama_siswa = $this->input->post('nama_siswa');
        $id_jurusan_siswa = $this->input->post('id_jurusan_siswa');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');

        $data = array(
            'username' => $username,
            'password' => $password,
            'nis' => $NIS,
            'nama_siswa' => $nama_siswa,
            'id_jurusan' => $id_jurusan_siswa,
            'tgl_lahir_siswa' => $tanggal_lahir,
            'jk_siswa' => $jenis_kelamin,
            'tlp_siswa' => $no_tlp,
            'alamat_siswa' => $alamat

        );

        $where = array(
            'id_siswa' => $id_siswa
        );

        $get_data = $this->user_model->get_one('vsiswa', 'username', $username);
        $get_by_id = $this->user_model->get_one('vsiswa', 'id_siswa', $id_siswa);

        if ($get_data == FALSE || $get_by_id->username == $username) {
            $sess_data['username'] = $username;
            $sess_data['password'] = $password;
            $this->session->set_userdata($sess_data);

            $this->user_model->ubah_data($where, $data, 'siswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Akun Pengguna berhasil diubah!
        </div>
      </div>');
            redirect('siswa/profil');
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
