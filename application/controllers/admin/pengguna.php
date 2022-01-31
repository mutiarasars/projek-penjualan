<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengguna extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->library('template');
        if (empty($this->session->userdata('user_name'))) {
            redirect('admin/Login');
        }
    } 

    public function index() {
        $data['pengguna'] = $this->Mcrud->get_all_data('pengguna')->result();

        $this->template->load('layout_admin', 'admin/pengguna/index', $data);
    } 

    public function save_update() {
        $id_produk = $this->input->post('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $id_brand = $this->input->post('id_brand');
        $harga = $this->input->post('harga');
        $deskripsi = $this->input->post('deskripsi');
        $promo = $this->input->post('promo');
        $image = $_FILES['image'];

        $where = array('id_produk' => $id_produk);
        $logo = $this->Mcrud->get_by_id('produk', $where)->row_object();

        if ($_FILES['image']['name'] == null) {
            $image = $logo->image;
        } else {
            $config['upload_path'] = './assets/img/produk';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('mssg', 'Foto Gagal di Upload');
                redirect('admin/produk');
            } else {
                $path = './assets/img/produk/'. $logo->image;
                unlink($path);
                $image = $this->upload->data('file_name');
            }
        }
    }

     public function status_aktif($id_pengguna) {
        $data_where = array('id_pengguna' => $id_pengguna);
        $statususer = $this->Mcrud->get_by_id('pengguna', $data_where)->row_object();
        
        if ($statususer->statususer == "Y") {
            $data_update = array('statususer' => "N");
        } else {
            $data_update = array('statususer' => "Y");
        }

        $this->Mcrud->update('pengguna', $data_update, 'id_pengguna', $id_pengguna);
        redirect('admin/pengguna');
    }

    public function delete($id) {
        $where = array('id_pengguna' => $id);

        $old = $this->Mcrud->get_by_id('pengguna', $where)->row_object();
        $this->Mcrud->del_data('pengguna', $where);

        $this->session->set_flashdata('mssg', 'data berhasil dihapus');
        redirect('admin/pengguna');
    }
    

}
?>