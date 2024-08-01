<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelian extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_pembelian WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_pembelian`( `kode_pembelian`, `nama_pembelian`, `negara`, `alamat`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_pembelian]','$data[nama_pembelian]','$data[negara]','$data[alamat]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_pembelian` 
            SET `kode_pembelian`='$data[kode_pembelian]',`nama_pembelian`='$data[nama_pembelian]',`negara`='$data[negara]',`alamat`='$data[alamat]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_pembelian`='$data[id_pembelian]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_pembelian`
        WHERE `id_pembelian`='$data[id_pembelian]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_pembelian($kode_pembelian){
        $sql = "
            SELECT COUNT(a.kode_pembelian) count_sj FROM tb_pembelian a
            WHERE a.kode_pembelian = '$kode_pembelian' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
