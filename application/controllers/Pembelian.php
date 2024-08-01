<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_pembelian');

    }

	public function index()
	{
		// $data['row'] = $this->pembelian_m->get();
		$result = 
		$data['result'] = $this->M_pembelian->get()->result_array();

        $page = $_GET['page'];
        $option = $_GET['option'];

        if ($page === 'other') {
            if ($option === 'pembelian_other_data') {
                $this->template->load('template', 'content/purchasing/other/pembelian_other_data', $data);
            } else if ($option === 'supplier_other_data') {
                $this->template->load('template', 'content/purchasing/other/supplier_other_data', $data);
            } else($option === 'other_data') {
                $this->template->load('template', 'content/purchasing/other/other_data', $data)
            }
        } elseif ($page === 'supplier') {
            $this->template->load('template', 'content/purchasing/supplier/pembelian_supplier_data', $data);
        } elseif ($page === 'produk') {
            $this->template->load('template', 'content/purchasing/produk/pembelian_produk_data', $data);
        } else {
                $this->template->load('template', 'content/purchasing/default_view', $data);
        }


        
		// $this->template->load('template', 'content/purchasing/other/pembelian_other_data',$data);

	}

	public function add()
	{
		$data['kode_pembelian'] = $this->input->post('kode_pembelian',TRUE);
        $data['nama_pembelian'] = $this->input->post('nama_pembelian',TRUE);
        $data['negara'] = $this->input->post('negara',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
		$data['sertif_halal'] = $this->input->post('sertif_halal',TRUE);
        $respon = $this->M_pembelian->add($data);

        if($respon){
        	header('location:'.base_url('pembelian').'?alert=success&msg=Selamat anda berhasil menambah pembelian');
        }else{
        	header('location:'.base_url('pembelian').'?alert=success&msg=Maaf anda gagal menambah pembelian');
        }
	}
	public function update()
	{
		$data['id_pembelian'] = $this->input->post('id_pembelian',TRUE);
		$data['kode_pembelian'] = $this->input->post('kode_pembelian',TRUE);
        $data['nama_pembelian'] = $this->input->post('nama_pembelian',TRUE);
		$data['negara'] = $this->input->post('negara',TRUE);
        $data['alamat'] = $this->input->post('alamat',TRUE);
        $respon = $this->M_pembelian->update($data);
        // echo $respon;
        if($respon){
        	header('location:'.base_url('pembelian').'?alert=success&msg=Selamat anda berhasil meng-update pembelian');
        }else{
        	header('location:'.base_url('pembelian').'?alert=success&msg=Maaf anda gagal meng-update pembelian');
        }
	}
	public function delete($id_pembelian)
	{
		$data['id_pembelian'] = $id_pembelian;
        $respon = $this->M_pembelian->delete($data);

        if($respon){
        	header('location:'.base_url('pembelian').'?alert=success&msg=Selamat anda berhasil menghapus pembelian');
        }else{
        	header('location:'.base_url('pembelian').'?alert=success&msg=Maaf anda gagal menghapus pembelian');
        }
	}

	public function cek_kode_pembelian(){
        $kode_pembelian = $this->input->post('kode_pembelian',TRUE);

        $row = $this->M_pembelian->cek_kode_pembelian($kode_pembelian)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
}
