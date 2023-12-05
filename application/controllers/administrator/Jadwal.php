<?php
class Jadwal extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('jadwal_model');
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
    $data['jadwal'] = $this->jadwal_model->tampil_view_data()->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/jadwal', $data);
    $this->load->view('templates_administrator/footer');
  }
  public function input()
  {
    $data = array(
      'id_jurusan' => set_value('id_jurusan'),
      'id_mapel' => set_value('id_mapel'),
      'id_guru' => set_value('id_guru'),
      'hari' => set_value('hari'),
      'jam_mulai' => set_value('jam_mulai'),
      'jam_selesai' => set_value('jam_selesai'),
    );
    $data['jurusan'] = $this->jadwal_model->tampil_data_jurusan()->result();
    $data['mapel'] = $this->jadwal_model->tampil_data_mapel()->result();
    $data['guru'] = $this->jadwal_model->tampil_data_guru()->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/jadwal_form', $data);
    $this->load->view('templates_administrator/footer');
  }
  public function input_aksi()
  {
    $this->_rules();
    if ($this->form_validation->run() == FALSE) {
      $this->input();
    } else {
      $data = array(
        'id_jurusan' => $this->input->post('id_jurusan', TRUE),
        'id_mapel' => $this->input->post('id_mapel', TRUE),
        // 'id_guru' => $this->input->post('id_guru', TRUE),
        'hari' => $this->input->post('hari', TRUE),
        'jam_mulai' => $this->input->post('jam_mulai', TRUE),
        'jam_selesai' => $this->input->post('jam_selesai', TRUE),
      );

      // check if data is already exists with some hari, jam_mulai, jam_selesai, id_jurusan
      // $this->db->where('id_guru', $data['id_guru']);
      $this->db->where('hari', $data['hari']);
      $this->db->where('jam_mulai', $data['jam_mulai']);
      $this->db->where('jam_selesai', $data['jam_selesai']);
      //            $this->db->where('id_jurusan', $data['id_jurusan']);
      $query = $this->db->get('jadwal');
      // var_dump($query->num_rows());
      // die;
      if ($query->num_rows() > 0) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  Jadwal sudah ada!
                </div>
              </div>');
        redirect('administrator/jadwal');
      } else {
        $this->jadwal_model->input_data($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                  Data jadwal berhasil ditambahkan!
                </div>
              </div>');
        redirect('administrator/jadwal');
      }
    }
  }
  public function _rules()
  {
    $this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'required', ['required' => 'Jurusan wajib diisi!']);
    $this->form_validation->set_rules('id_mapel', 'id_mapel', 'required', ['required' => 'Mapel wajib diisi!']);
    $this->form_validation->set_rules('hari', 'hari', 'required', ['required' => 'Hari wajib diisi!']);
    $this->form_validation->set_rules('jam_mulai', 'jam_mulai', 'required', ['required' => 'Jam Mulai wajib diisi!']);
    $this->form_validation->set_rules('jam_selesai', 'jam_selesai', 'required', ['required' => 'Jam Selesai wajib diisi!']);
  }
  public function ubah($id)
  {
    $where = array('id_jadwal' => $id);
    $data['jadwal'] = $this->jadwal_model->edit_data($where, 'jadwal')->result();
    $data['jurusan'] = $this->jadwal_model->tampil_data_jurusan()->result();
    $data['mapel'] = $this->jadwal_model->tampil_data_mapel()->result();
    $data['guru'] = $this->jadwal_model->tampil_data_guru()->result();
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/jadwal_ubah', $data);
    $this->load->view('templates_administrator/footer');
  }
  public function ubah_aksi()
  {
    $id_jadwal = $this->input->post('id_jadwal');
    $id_jurusan = $this->input->post('id_jurusan');
    $id_mapel = $this->input->post('id_mapel');
    $id_guru = $this->input->post('id_guru');
    $hari = $this->input->post('hari');
    $jam_mulai = $this->input->post('jam_mulai');
    $jam_selesai = $this->input->post('jam_selesai');
    $data = array(
      'id_jurusan' => $id_jurusan,
      'id_mapel' => $id_mapel,
      'id_guru' => $id_guru,
      'hari' => $hari,
      'jam_mulai' => $jam_mulai,
      'jam_selesai' => $jam_selesai,

    );
    $where = array(
      'id_jadwal' => $id_jadwal
    );
    $this->jadwal_model->ubah_data($where, $data, 'jadwal');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data jadwal berhasil diubah!
        </div>
      </div>');
    redirect('administrator/jadwal');
  }
  public function hapus($id)
  {
    $where = array('id_jadwal' => $id);
    $this->jadwal_model->hapus_data($where, 'jadwal');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data jadwal berhasil dihapus!
        </div>
      </div>');
    redirect('administrator/jadwal');
  }
}
