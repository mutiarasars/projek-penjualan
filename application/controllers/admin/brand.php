<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

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
        $data['brand'] = $this->Mcrud->get_all_data('brand')->result();

		$this->template->load('layout_admin', 'admin/brand/index', $data);
	}

    public function add()
    {
        $this->template->load('layout_admin', 'admin/brand/form_add');
    }

    public function save(){
        $nama_brand = $this->input->post('nama_brand');
        $logo_brand = $_FILES['logo_brand'];

        if ($_FILES['logo_brand']['name'] == null) {
            $logo_brand = ' ';
        } else {
            $config['upload_path'] = './assets/img/brand';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo_brand')) {
                $this->session->set_flashdata('mssg', 'Foto Gagal di Upload');
                redirect('admin/brand');
            } else {
                $logo_brand = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_brand' => $nama_brand,
            'logo_brand' => $logo_brand
        );

        $this->Mcrud->insert('brand', $data);
        redirect('admin/brand');
    }

    public function get_id($id) {
        $where = array('id_brand' => $id);
        $data['brand'] = $this->Mcrud->get_by_id('brand', $where)->row_object();

        $this->template->load('layout_admin', 'admin/brand/form_edit', $data);
    }

    public function save_update() {
        $id_brand = $this->input->post('id_brand');
        $nama_brand = $this->input->post('nama_brand');
        $logo_brand = $_FILES['logo_brand'];

        $where = array('id_brand' => $id_brand);
        $logo = $this->Mcrud->get_by_id('brand', $where)->row_object();

        if ($_FILES['logo_brand']['name'] == null) {
            $logo_brand = $logo->logo_brand;
        } else {
            $config['upload_path'] = './assets/img/brand';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo_brand')) {
                $this->session->set_flashdata('mssg', 'Foto Gagal di Upload');
                redirect('admin/brand');
            } else {
                $path = './assets/img/brand/'. $logo->logo_brand;
                unlink($path);
                $logo_brand = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_brand' => $id_brand,
            'nama_brand' => $nama_brand,
            'logo_brand' => $logo_brand
        );
        
        $this->Mcrud->update('brand', $data, 'id_brand', $id_brand);
        redirect('admin/brand');
    }

    public function delete($id) {
        $where = array('id_brand' => $id);

        $old = $this->Mcrud->get_by_id('brand', $where)->row_object();
        $this->Mcrud->del_data('brand', $where);

        $path = './assets/img/brand/'.$old->logo_brand;
        unlink($path);

        $this->session->set_flashdata('mssg', 'data berhasil dihapus');
        redirect('admin/brand');
    }
}
?>