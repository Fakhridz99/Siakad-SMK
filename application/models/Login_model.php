<?php
class Login_model extends CI_Model
{
    public function cek_login($username, $password, $level)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        if ($level == 'admin') {
            $level = 'user';
        }
        $result = $this->db->get($level, 1);
        return $result;
    }
    public function getLoginData($user, $pass, $lvl)
    {
        $u = $user;
        $p = MD5($pass);
        $l = $lvl;

        $query_ceklogin = $this->db->get_where('user', array('username' => $u, 'password' => $p, 'level' => $l));
        if (count($query_ceklogin->result()) > 0) {
            foreach ($query_ceklogin->result() as $ck) {
                foreach ($query_ceklogin->result() as $ck) {
                    $sess_data['logged_in'] = TRUE;
                    $sess_data['username'] = $ck->username;
                    $sess_data['password'] = $ck->password;
                    $sess_data['level'] = $ck->level;
                    $this->session->set_userdata($sess_data);
                }
                redirect('adminiatrator/dashboard');
            }
        } else {
            $this->session->set_flashdata('pesan', 'ada yang salah');
            redirect('administrator/auth');
        }
    }
    public function daftar($data = array(), $level)
    {
        if ($level == 'admin') {
            $level = 'user';
        }

        if ($data) {
            $create = $this->db->insert($level, $data);
            return ($create == true) ? true : false;
        }
    }
}
