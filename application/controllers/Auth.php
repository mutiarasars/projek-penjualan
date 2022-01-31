<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mlogin');
        $this->load->library('Template');
    }

    public function index()
    {
        $data['jf'] = "Login User";
        
        $this->load->view('frontend/form_login', $data);
    }

    public function register()
    {
        $data['jf'] = "Register User";
        
        $this->load->view('frontend/form_register', $data);
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    } 

    public function register_action() {
        $nama_pengguna = $this->input->post('nama_pengguna');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $data = array(
            'nama_pengguna' => $nama_pengguna, 
            'username' => $username,
            'password' => $this->hash_password($password),
            'statususer' => 'Y'
        );
        
        $cekData = $this->Mcrud->get_by_id('pengguna', array('username' => $username));

        if ($cekData->num_rows() == 1) {
            $this->session->set_flashdata('msg', 'Username Sudah Terpakai');
            redirect('auth/register');
        } else {
            $this->Mcrud->insert('pengguna', $data);
            redirect('auth');
        }
    }

    public function status_user($id) {
        $data_where = array('id_pengguna' => $id);
        $status_user = $this->Mcrud->get_by_id('pengguna', $data_where)->row_object();

        if ($status_user->status_user == "Y") {
            $data_update = array('statususer' => "N");
        } else {
            $data_update = array('statususer' => "Y");
        }

        $this->Mcrud->update('pengguna', $data_update, 'id_pengguna', $id);
        redirect('admin/user_data');
    }
}