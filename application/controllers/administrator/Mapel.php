<?php
class mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mapel_model');
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
        $data['mapel'] = $this->mapel_model->tampil_view_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_matapelajaran' => set_value('id_matapelajaran'),
            'kode_matapelajaran' => set_value('kode_matapelajaran'),
            'nama_matapelajaran' => set_value('nama_matapelajaran')
        );
        $data['guru'] = $this->mapel_model->tampil_guru();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_form', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $data = array(
                'id_guru' => $this->input->post('id_guru', TRUE),
                'kode_mapel' => $this->input->post('kode_matapelajaran', TRUE),
                'nama_mapel' => $this->input->post('nama_matapelajaran', TRUE),
            );
            $this->mapel_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data mata pelajaran berhasil ditambahkan!
            </div>
          </div>');
            redirect('administrator/mapel');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('id_guru', 'id_guru', 'required', ['required' => 'Guru wajib diisi!']);
        $this->form_validation->set_rules('kode_matapelajaran', 'kode_matapelajaran', 'required', ['required' => 'Kode mata pelajaran wajib diisi!']);
        $this->form_validation->set_rules('nama_matapelajaran', 'nama_matapelajaran', 'required', ['required' => 'Nama mata pelajaran wajib diisi!']);
    }
    public function ubah($id)
    {
        $where = array('id_mapel' => $id);
        $data['mapel'] = $this->mapel_model->edit_data($where, 'mapel')->result();
        $data['guru'] = $this->mapel_model->tampil_guru();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id_mapel = $this->input->post('id_matapelajaran');
        $id_guru = $this->input->post('id_guru');
        $kode_mapel = $this->input->post('kode_matapelajaran');
        $nama_mapel = $this->input->post('nama_matapelajaran');

        $data = array(
            'id_guru' => $id_guru,
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel,
            'id_guru' => $id_guru
        );
        $where = array(
            'id_mapel' => $id_mapel
        );
        $this->mapel_model->ubah_data($where, $data, 'mapel');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data mata pelajaran berhasil diubah!
        </div>
      </div>');
        redirect('administrator/mapel');
    }
    public function hapus($id)
    {
        $where = array('id_mapel' => $id);
        $this->mapel_model->hapus_data($where, 'mapel');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data mata pelajaran berhasil dihapus!
        </div>
      </div>');
        redirect('administrator/mapel');
    }
}
