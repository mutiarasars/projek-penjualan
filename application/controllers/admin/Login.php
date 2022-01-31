<?php
class Login extends CI_Controller
{

    public function index(){
        $this->load->view('admin/form_login'); 
    }

    public function aksi_login(){
        $this->load->model('Mlogin');

        $u = $this->input->post('username');
        $p = $this->input->post('password');
        $where = array('username_admin' => $u);

        $cek = $this->Mlogin->cek_login('admin', $where);
        $Pass = $cek->row();
        if($cek->num_rows() == 1 && password_verify($p, $Pass->password) == TRUE){            
            $data_session = array(
                'user_name' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('admin/dashboard');
        }
        else{
            $this->session->set_flashdata('mssg', 'Username atau Password Salah');
            redirect('admin/Login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/Login');
    }
}
?>