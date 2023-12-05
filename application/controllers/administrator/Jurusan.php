<?php
class Jurusan extends CI_Controller
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
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_jurusan' => set_value('id_jurusan'),
            'kelas_jurusan' => set_value('kelas_jurusan'),
            'kode_jurusan' => set_value('kode_jurusan'),
            'nama_jurusan' => set_value('nama_jurusan'),
            'ruang_jurusan' => set_value('ruang_jurusan'),
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_form', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $data = array(
                'kelas_jurusan' => $this->input->post('kelas_jurusan', TRUE),
                'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE),
                'ruang_jurusan' => $this->input->post('ruang_jurusan', TRUE),
            );
            $this->jurusan_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data Kelas Jurusan berhasil ditambahkan!
            </div>
          </div>');
            redirect('administrator/jurusan');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_jurusan', 'kode_jurusan', 'required', ['required' => 'Kode Jurusan wajib diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Nama Jurusan wajib diisi!']);
    }
    public function ubah($id)
    {
        $where = array('id_jurusan' => $id);
        $data['jurusan'] = $this->jurusan_model->edit_data($where, 'jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id = $this->input->post('id_jurusan');
        $kelas_jurusan = $this->input->post('kelas_jurusan');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $ruang_jurusan = $this->input->post('ruang_jurusan');
        $data = array(
            'kelas_jurusan' => $kelas_jurusan,
            'kode_jurusan' => $kode_jurusan,
            'nama_jurusan' => $nama_jurusan,
            'ruang_jurusan' => $ruang_jurusan
        );
        $where = array(
            'id_jurusan' => $id
        );
        $this->jurusan_model->ubah_data($where, $data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Kelas Jurusan berhasil diubah!
        </div>
      </div>');
        redirect('administrator/jurusan');
    }
    public function hapus($id)
    {
        $where = array('id_jurusan' => $id);
        $this->jurusan_model->hapus_data($where, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Kelas Jurusan berhasil dihapus!
        </div>
      </div>');
        redirect('administrator/jurusan');
    }
}
