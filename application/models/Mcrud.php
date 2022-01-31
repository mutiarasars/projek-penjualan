<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model
{
     public function get_all_data($tabel){
        return $this->db->get($tabel);
    }

    public function insert($tabel, $data){
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id){
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id){
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);  
    }

     public function del_data($tabel ,$id)
    {
        $this->db->where($id);
        $this->db->delete($tabel);
    }

    public function keranjang_admin() {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('produk', 'produk.id_produk=transaksi.id_produk');
        $this->db->join('pengguna', 'pengguna.id_pengguna=transaksi.id_pengguna');
        return $this->db->get();
    }

    public function keranjang_user($id) {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('produk', 'produk.id_produk=transaksi.id_produk');
        $this->db->join('pengguna', 'pengguna.id_pengguna=transaksi.id_pengguna');
        $this->db->where($id);
        return $this->db->get();
    }

    public function new_id_transaksi() {
        $result = $this->db->query("SELECT * FROM transaksi ORDER BY id_order DESC LIMIT 1");
        if($result->num_rows() > 0){
            return $result->row_object();
        } else {
            return 0;
        }
    }
}
?>