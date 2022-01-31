<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
		if (empty($this->session->userdata('username'))) {
            redirect('pengguna/login_user');
        }
    }

    public function index(){
        $id = $this->session->userdata('username');
        $data['username'] = $id;
        $data['keranjang'] = $this->Mcrud->keranjang_user(array('username' => $this->session->userdata('username')))->result();

        $this->load->view('frontend/keranjang', $data); 
    }

    public function add_keranjang() 
    {
        $data_produk = $this->input->post('id_produk');
        $harga_produk = $this->input->post('harga');
        $username = $this->session->userdata('username');
        $id_transaksi = $this->Mcrud->new_id_transaksi();
        if($id_transaksi == 0){
            $id_order = 1;
        } else {
            $id_order = 1 + $id_transaksi->id_order;
        }
        
        $id_pengguna = $this->Mcrud->get_by_id('pengguna', array('username' => $username))->row_object();
    
        $data = array(
            'id_order' => $id_order,
            'id_pengguna' => $id_pengguna->id_pengguna,
            'id_produk' => $data_produk,
            'ongkir' => 20000,
            'jumlah' => 1,
            'subtotal' => $harga_produk
        );

        $this->Mcrud->insert('transaksi', $data);

        redirect('pengguna/keranjang/detail_keranjang/'.$id_order);
    }

    public function detail_keranjang($id_order){
        $data_keranjang = array('id_order' => $id_order);
        $data['keranjang'] = $this->Mcrud->keranjang_user($data_keranjang)->result();

        $this->load->view('frontend/keranjang', $data);
    }

    public function delete($id_order){
        $where = array('id_order' => $id_order);

        $this->Mcrud->del_data('transaksi', $where);

        redirect('frontend');
    }
}
?>