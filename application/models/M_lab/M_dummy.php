<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dummy extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }


    public function get($id = null)
    {
        // $kode_user = $this->kode_user();
        $sql = "
        SELECT * FROM tb_dummy";

        return $this->db->query($sql);
    }


    // public function get_per($id = null)
    // {
    //     // $kode_user = $this->kode_user();
    //     $sql = "
    //     SELECT b.*,c.qty,c.stok FROM tb_barang a
    //     LEFT JOIN tb_permintaan_barang b ON a.id_barang = b.id_barang
    //     LEFT JOIN tb_barang_masuk c ON a.id_barang_masuk = c.id_barang_masuk
    //     LEFT JOIN tb_transfer_slip d ON a.no_transfer_slip = d.no_transfer_slip
    //     WHERE b.is_deleted = 0 ORDER BY b.created_at ASC";

    //     return $this->db->query($sql);
    // }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_dummy`(`dept`, `jenis_doc`, `nama_fmkt`, `tgl_berlaku`, `tgl_review`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[dept]','$data[jenis_doc]','$data[nama_fmkt]','$data[tgl_berlaku]','$data[tgl_review]','NOW()','$id_user','0000-00-00 00:00:00','$id_user','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_dummy` 
            SET `dept`='$data[dept]',
            `tgl_berlaku`='$data[tgl_berlaku]',
            `nama_fmkt`='$data[nama_fmkt]',
            `tgl_review`='$data[tgl_review]',
            `jenis_doc`='$data[jenis_doc]',
            `updated_at` = NOW(),`updated_by`='$id_user' 
            WHERE `id_fmkt`='$data[id_fmkt]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        //$sql = "
        //  UPDATE `tb_barang` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //WHERE `id_barang`='$data[id_barang]'
        //";
        $sql = "
        DELETE FROM `tb_dummy`
         WHERE `id_fmkt`='$data[id_fmkt]'
        ";
        return $this->db->query($sql);
    }
}
