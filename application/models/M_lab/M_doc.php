<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_doc extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get($tgl = null, $tgl2 = null, $name = null)
    {
        $where = array();

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "tgl >= '$tgl' AND tgl <= '$tgl2'";
        } else {
            $where[] = "jenis_doc = 'jenis'";
        }

        // if ($name) {
        //     $where[] = "nama_fmkt = '$name'";
        // }
        
        $where = implode(" AND ", $where);
        $sql = "SELECT * FROM tb_doc_form WHERE $where ORDER BY id_fmkt ASC";
        return $this->db->query($sql)->result_array();
    }

    public function ambil_print($tgl, $tgl2)
    {
        $where = "";

        if ($tgl != null && $tgl2 != null) {
            $where = "AND tgl >= '$tgl' AND tgl <= '$tgl2'";
        }

        $sql = "SELECT a.* FROM tb_doc_form a WHERE dept = 'DOC' $where ORDER BY a.tgl_berlaku ASC";

        return $this->db->query($sql)->result_array();
    }

    public function approval_rilis($data)
    {
        $sql = "
        UPDATE `tb_doc_form`
        SET `dept`='$data[dept]',
        `nama_fmkt`='$data[nama_fmkt]',
        `tgl_berlaku`='$data[tgl_berlaku]',
        `tgl_review`='$data[tgl_review]'
        WHERE `id_fmkt`='$data[id_fmkt]';
        ";
        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_doc_form`(`dept`, `nama_fmkt`, `tgl_berlaku`, `tgl_review`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[dept]','$data[nama_fmkt]','$data[tgl_berlaku]','$data[tgl_review]', NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_doc_form` 
            SET `dept`='$data[dept]',
                `nama_fmkt`='$data[nama_fmkt]',
                `tgl_berlaku`='$data[tgl_berlaku]',
                `tgl_review`='$data[tgl_review]',
                `updated_at`=NOW(),
                `updated_by`='$id_user' 
            WHERE `id_fmkt`='$data[id_fmkt]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_doc_form`
         WHERE `id_fmkt`='$data[id_fmkt]'
        ";
        return $this->db->query($sql);
    }
}
