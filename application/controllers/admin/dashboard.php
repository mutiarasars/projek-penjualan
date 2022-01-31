<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
		$this->load->library('template');
		if (empty($this->session->userdata('user_name'))) {
            redirect('admin/Login');
        }
    }

	public function index()
	{

		$data['brand'] = $this->Mcrud->get_all_data('brand')->num_rows();
		$data['user'] = $this->Mcrud->get_all_data('pengguna')->num_rows();
		$data['produk'] = $this->Mcrud->get_all_data('produk')->num_rows();

		$this->template->load('layout_admin', 'admin/dashboard', $data);
	}
}
?>