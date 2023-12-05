<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
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
        //        $data['siswa'] = $this->siswa_model->tampil_data()->result();
        $data['siswa'] = $this->siswa_model->tampil_view_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_siswa' => set_value('id_siswa'),
            'nis' => set_value('NIS'),
            'nama_siswa' => set_value('nama_siswa'),
            'id_jurusan' => set_value('id_jurusan'),
            'tgl_lahir_siswa' => set_value('tanggal_lahir'),
            'jk_siswa' => set_value('jenis_kelamin'),
            'tlp_siswa' => set_value('no_tlp'),
            'alamat_siswa' => set_value('alamat'),
        );
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_form', $data);
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
                'nis' => $this->input->post('NIS', TRUE),
                'nama_siswa' => $this->input->post('nama_siswa', TRUE),
                'id_jurusan' => $this->input->post('id_jurusan_siswa', TRUE),
                'tgl_lahir_siswa' => $this->input->post('tanggal_lahir', TRUE),
                'jk_siswa' => $this->input->post('jenis_kelamin', TRUE),
                'tlp_siswa' => $this->input->post('no_tlp', TRUE),
                'alamat_siswa' => $this->input->post('alamat', TRUE),
            );
            $this->siswa_model->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Data siswa berhasil ditambahkan!
            </div>
          </div>');
            redirect('administrator/siswa');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib diisi!']);
        $this->form_validation->set_rules(
            'NIS',
            'NIS',
            'required|is_unique[siswa.NIS]',
            array(
                'required'      => 'NIS wajib diisi!',
                'is_unique'     => '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      Data sudah ada!
                    </div>
                  </div>'
            )
        );
        $this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required', ['required' => 'Nama Siswa wajib diisi!']);
        $this->form_validation->set_rules('id_jurusan_siswa', 'id_jurusan_siswa', 'required', ['required' => 'Jurusan wajib diisi!']);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', ['required' => 'Tanggal Lahir wajib diisi!']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required', ['required' => 'Jenis Kelamin wajib diisi!']);
        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required', ['required' => 'No Tlp wajib diisi!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Alamat wajib diisi!']);
    }
    public function ubah($id)
    {
        $where = array('id_siswa' => $id);
        $data['siswa'] = $this->siswa_model->edit_data($where, 'siswa')->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_ubah', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function ubah_aksi()
    {
        $id = $this->input->post('id_siswa');
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
            'id_siswa' => $id
        );
        $this->siswa_model->ubah_data($where, $data, 'siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data siswa berhasil diubah!
        </div>
      </div>');
        redirect('administrator/siswa');
    }
    public function lihat($id)
    {
        $where_siswa = array('id_siswa' => $id);
        $data['siswa'] = $this->siswa_model->edit_data($where_siswa, 'vsiswa')->result();

        $where_jurusan = array('id_jurusan' => $data['siswa'][0]->id_jurusan);
        $data['jadwal'] = $this->siswa_model->edit_data($where_jurusan, 'vjadwal')->result();

        $data['absensi'] = $this->siswa_model->edit_data($where_siswa, 'vabsensi')->result();

        $data['nilai'] = $this->siswa_model->edit_data($where_siswa, 'vnilai')->result();

        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_lihat', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function import()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_import');
        $this->load->view('templates_administrator/footer');
    }
    public function fetch()
    {
        $data = $this->siswa_model->select();

        $output = "<h3 align='center'>Total Data -" . $data->num_rows() . "</h3>
		         <table class='table table-bordered'>
		         <thead>
		         <tr>
                 <th>ID Siswa</th>
                 <th>ID Jurusan</th>
                 <th>Username</th>
                 <th>Password</th>
		             <th>NIS</th>
                     <th>Nama siswa</th>
		             <th>Tanggal Lahir</th>
                     <th>Jenis Kelamin</th>
		             <th>No Tlp</th>
                     <th>Alamat</th>
		         </tr>
		         </thead>
		         <tbody>";
        foreach ($data->result_array() as $row) {
            $output .= "<td>" . $row['id_siswa'] . "</td>";
            $output .= "<td>" . $row['id_jurusan'] . "</td>";
            $output .= "<td>" . $row['username'] . "</td>";
            $output .= "<td>" . $row['password'] . "</td>";
            $output .= "<td>" . $row['nis'] . "</td>";
            $output .= "<td>" . $row['nama_siswa'] . "</td>";
            $output .= "<td>" . $row['tgl_lahir_siswa'] . "</td>";
            $output .= "<td>" . $row['jk_siswa'] . "</td>";
            $output .= "<td>" . $row['tlp_siswa'] . "</td>";
            $output .= "<td>" . $row['alamat_siswa'] . "</td>";
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
                    $id_jurusan = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $username = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $password = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nis = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $nama_siswa = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tgl_lahir_siswa = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $jk_siswa = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $tlp_siswa = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $alamat_siswa = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $data[] = array(
                        'id_jurusan' => $id_jurusan,
                        'username' => $username,
                        'password' => $password,
                        'nis' => $nis,
                        'nama_siswa' => $nama_siswa,
                        'tgl_lahir_siswa' => date('Y-m-d', strtotime($tgl_lahir_siswa)),
                        'jk_siswa' => $jk_siswa,
                        'tlp_siswa' => $tlp_siswa,
                        'alamat_siswa' => $alamat_siswa
                    );
                }
            }
            $this->siswa_model->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Succes:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              Import Data Siswa berhasil!
            </div>
          </div>');

            redirect('administrator/siswa');
        }
    }
    public function hapus($id)
    {
        $where = array('id_siswa' => $id);
        $this->siswa_model->hapus_data($where, 'siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Data siswa berhasil dihapus!
        </div>
      </div>');
        redirect('administrator/siswa');
    }
}
