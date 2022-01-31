<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    } 

	public function index()
	{
		$data['brand'] = $this->Mcrud->get_all_data('brand')->result();
        $data['username'] = $this->session->userdata('username');
        $data['produk'] = $this->Mcrud->get_all_data('produk')->result();

		$this->load->view('frontend/dashboard', $data);
	}
}
?>