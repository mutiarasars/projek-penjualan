<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_user extends CI_Controller
{

    public function index(){
        $this->load->view('frontend/form_login'); 
    }

    public function login()
    {
        $this->load->model('Mlogin');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array('username' => $username);

        $cek = $this->Mlogin->cek_login('pengguna', $where);
        $pass = $cek->row();

        if ($cek->num_rows() == 1 && password_verify($password, $pass->password) == TRUE) {

            if ($pass->statususer == 'Y') {
                $data_session = array(
                    'username' => $username,
                    'status' => 'login'
                );

                $this->session->set_userdata($data_session);
                redirect('Welcome');
            } else {
                $this->session->set_flashdata('mssg', 'Akun ini belum diaktifkan oleh Admin');
            }
        } else {
            $this->session->set_flashdata('mssg', 'Username atau Password Salah !');
        }
        redirect('pengguna/login_user');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Welcome');
    }
}
?>