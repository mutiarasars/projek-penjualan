<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
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
        $data['transaksi'] = $this->Mcrud->keranjang_admin()->result();

        $this->template->load('layout_admin', 'admin/transaksi/index', $data);
    } 

    public function add()
    {
        $data['brand'] = $this->Mcrud->get_all_data('brand')->result();

        $this->template->load('layout_admin', 'admin/transaksi/form_add', $data);
    }

    public function save(){
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlahi');
        $subtotal = $this->input->post('subtotal');
        $jumlah = $this->input->post('jumlah');
        $image = $_FILES['image'];

        if ($_FILES['image']['name'] == null) {
            $image = ' ';
        } else {
            $config['upload_path'] = './assets/img/produk';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('mssg', 'Foto Gagal di Upload');
                redirect('admin/produk');
            } else {
                $image = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'id_brand' => $id_brand,
            'deskripsi' => $deskripsi,
            'stok' => $stok,
            'promo' => $promo,
            'image' => $image
        );

        $this->Mcrud->insert('produk', $data);
        redirect('admin/produk');
    }

    public function get_id($id) {
        $where = array('id_produk' => $id);
        $data['produk'] = $this->Mcrud->get_by_id('produk', $where)->row_object();
        $data['brand'] = $this->Mcrud->get_all_data('brand')->result();

        $this->template->load('layout_admin', 'admin/produk/form_edit', $data);
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

        $data = array(
            'id_produk' => $id_produk,
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'id_brand' => $id_brand,
            'deskripsi' => $deskripsi,
            'promo' => $promo,
            'image' => $image
        );
        
        $this->Mcrud->update('produk', $data, 'id_produk', $id_produk);
        redirect('admin/produk');
    }

    public function delete($id) {
        $where = array('id_produk' => $id);

        $old = $this->Mcrud->get_by_id('produk', $where)->row_object();
        $this->Mcrud->del_data('produk', $where);

        $path = './assets/img/produk/'.$old->logo_produk;
        unlink($path);

        $this->session->set_flashdata('mssg', 'data berhasil dihapus');
        redirect('admin/produk');
    }

}
?>