<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->library('excel');
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
        $data['guru'] = $this->guru_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_guru' => set_value('id_guru'),
            'nip' => set_value('NIP'),
            'nama_guru' => set_value('nama_guru'),
            'tgl_lahir_guru' => set_value('tanggal_lahir'),
            'jk_guru' => set_value('jenis_kelamin'),
            'tlp_guru' => set_value('no_tlp'),
            'alamat_guru' => set_value('alamat'),
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_form', $data);
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
                'nip' => $this->input->post('NIP', TRUE),
                'nama_guru' => $this->input->post('nama_guru', TRUE),
                'tgl_lahir_guru' => $this->input->post('tanggal_lahir', TRUE),
                'jk_guru' => $this->input->post('jenis_kelamin', TRUE),
                'tlp_guru' => $this->input->post('no_tlp', TRUE),
                'alamat_guru' => $this->input->post('alamat', TRUE),
            );
            $this->guru_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data guru berhasil ditambahkan!
            </div>
          </div>');
            redirect('administrator/guru');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
        $this->form_validation->set_rules(
            'NIP',
            'NIP',
            'required|is_unique[guru.NIP]',
            array(
                'required'      => 'NIP wajib diisi!',
                'is_unique'     => '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Data sudah ada!
                    </div>
                  </div>'
            )
        );
        $this->form_validation->set_rules('nama_guru', 'nama_guru', 'required', ['required' => 'Nama Guru wajib diisi!']);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', ['required' => 'Tanggal Lahir wajib diisi!']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', ['required' => 'Jenis Kelamin wajib diisi!']);
        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required', ['required' => 'No Tlp wajib diisi!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Alamat wajib diisi!']);
    }
    public function ubah($id)
    {
        $where = array('id_guru' => $id);
        $data['guru'] = $this->guru_model->edit_data($where, 'guru')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id = $this->input->post('id_guru');
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
            'id_guru' => $id
        );
        $this->guru_model->ubah_data($where, $data, 'guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Guru berhasil diubah!
        </div>
      </div>');
        redirect('administrator/guru');
    }
    public function lihat($id)
    {
        $where = array('id_guru' => $id);
        $data['guru'] = $this->guru_model->edit_data($where, 'guru')->result();
        $data['jadwal'] = $this->guru_model->edit_data($where, 'vjadwal')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_lihat', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function import()
    {

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_import');
        $this->load->view('templates_administrator/footer');
    }
    public function fetch()
    {
        $data = $this->guru_model->select();

        $output = "<h3 align='center'>Total Data -" . $data->num_rows() . "</h3>
		         <table class='table table-bordered'>
		         <thead>
		         <tr>
                 <th>ID Guru</th>
                 <th>Username</th>
                 <th>Password</th>
                 <th>Nama Guru</th>
		             <th>NIP</th>
		             <th>Jenis Kelamin</th>
		             <th>Tanggal Lahir</th>
		             <th>No Tlp</th>
                     <th>Alamat</th>
		         </tr>
		         </thead>
		         <tbody>";
        foreach ($data->result_array() as $row) {
            $output .= "<td>" . $row['id_guru'] . "</td>";
            $output .= "<td>" . $row['username'] . "</td>";
            $output .= "<td>" . $row['password'] . "</td>";
            $output .= "<td>" . $row['nama_guru'] . "</td>";
            $output .= "<td>" . $row['nip'] . "</td>";
            $output .= "<td>" . $row['jk_guru'] . "</td>";
            $output .= "<td>" . $row['tgl_lahir_guru'] . "</td>";
            $output .= "<td>" . $row['tlp_guru'] . "</td>";
            $output .= "<td>" . $row['alamat_guru'] . "</td>";
            $output .= "</tr>";
        }

        $output .= "</tbody>
		           </table>";

        echo $output;
    }
    public function import_aksi()
    {
        if (isset($_FILES['file']['name'])) {
            $path = $_FILES['file']['tmp_name'];
            //create a class PHPExcel_IOFactory::load($path)
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                //get highest worksheet row
                $highestRow = $worksheet->getHighestRow();
                //get highest worksheet column
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $username = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nama_guru = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nip = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $jk_guru = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tgl_lahir_guru = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $tlp_guru = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $alamat_guru = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $data[] = array(
                        'username' => $username,
                        'password' => $password,
                        'nama_guru' => $nama_guru,
                        'nip' => $nip,
                        'jk_guru' => $jk_guru,
                        'tgl_lahir_guru' => date('Y-m-d', strtotime($tgl_lahir_guru)),
                        'tlp_guru' => $tlp_guru,
                        'alamat_guru' => $alamat_guru
                    );
                }
            }
            $this->guru_model->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Import Data Guru berhasil!
            </div>
          </div>');

            redirect('administrator/guru');
        }
    }
    public function hapus($id)
    {
        $where = array('id_guru' => $id);
        $this->guru_model->hapus_data($where, 'guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data Guru berhasil dihapus!
        </div>
      </div>');
        redirect('administrator/guru');
    }
}
