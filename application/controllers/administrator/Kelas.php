<?php
class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
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
        $data['kelas'] = $this->kelas_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_kelas' => set_value('id_kelas'),
            'kelas' => set_value('kelas'),
            'id_jurusan' => set_value('id_jurusan'),
            'ruang' => set_value('ruang'),
        );
        $data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
        $data['jurusan'] = $this->kelas_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_form', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'id_jurusan' => $this->input->post('nama_jurusan', TRUE),
                'ruang' => $this->input->post('ruang', TRUE),
            );
            $this->kelas_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data Kelas berhasil ditambahkan!
            </div>
          </div>');
            redirect('administrator/kelas');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kelas', 'kelas', 'required', ['required' => 'Kelas wajib diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required', ['required' => 'Jurusan wajib diisi!']);
        $this->form_validation->set_rules('ruang', 'ruang', 'required', ['required' => 'ruang wajib diisi!']);
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
        $nama_jurusan = $this->input->post('nama_jurusan');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $data = array(
            'nama_jurusan' => $nama_jurusan,
            'kode_jurusan' => $kode_jurusan
        );
        $where = array(
            'id_jurusan' => $id
        );
        $this->jurusan_model->ubah_data($where, $data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data jurusan berhasil diubah!
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
          Data jurusan berhasil dihapus!
        </div>
      </div>');
        redirect('administrator/jurusan');
    }
}
