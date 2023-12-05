<?php
class User extends CI_Controller
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
        $data['user'] = $this->user_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_user' => set_value('id'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'level' => set_value('level'),
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user_form', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
            );
            $this->user_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data Pengguna berhasil ditambahkan!
            </div>
          </div>');
            redirect('administrator/user');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules(
            'username', 'username',
            'required|is_unique[user.username]',
            array(
                    'required'      => 'Username wajib diisi!',
                    'is_unique'     => '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Data sudah ada!
                    </div>
                  </div>'
            )
    );
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
    }
    public function ubah($id)
    {
        $where = array('id_user' => $id);
        $data['user'] = $this->user_model->edit_data($where, 'user')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id = $this->input->post('id');
        $id_user = $this->session->userdata('id_user');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data = array(
            'username' => $username,
            'password' => $password,
        );

        $where = array(
            'id_user' => $id
        );

        $get_data = $this->user_model->get_one('user', 'username', $username);
        $get_by_id = $this->user_model->get_one('user', 'id_user', $id);

        if ($get_data == FALSE || $get_by_id->username == $username) {
            if ($id_user == $get_by_id->id_user) {
                $sess_data['username'] = $username;
                $sess_data['password'] = $password;
                $this->session->set_userdata($sess_data);
            }

            $this->user_model->ubah_data($where, $data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Pengguna berhasil diubah!
        </div>
      </div>');
            redirect('administrator/user');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            Username sudah ada
            </div>
            </div>');
            redirect('administrator/user/ubah/' . $id);
        }
    }
    public function hapus($id)
    {
        $where = array('id_user' => $id);
        $this->user_model->hapus_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Pengguna berhasil dihapus!
        </div>
      </div>');
        redirect('administrator/user');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['user'] = $this->user_model->get_keyword($keyword);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user', $data);
        $this->load->view('templates_administrator/footer');
    }
}
