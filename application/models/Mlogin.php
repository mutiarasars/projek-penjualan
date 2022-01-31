<?php
class Mlogin extends CI_Model
{
    public function cek_login($tabel, $usr){
        return $this->db->get_where($tabel, $usr);
    }
}
?>