<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sor_urjab extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_qa/M_doc/M_sor/M_sor_urjab');
	}

	public function index()
	{
		$data['result'] = $this->M_sor_urjab->get()->result_array();
		$this->template->load('template', 'content/qa/doc/sortir/sor_urjab_data', $data);
	}

	public function add()
	{
		$data['jenis_doc_sor'] = $this->input->post('jenis_doc_sor', TRUE);
		$data['nama_doc_sor'] = $this->input->post('nama_doc_sor', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_sor_urjab->add($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_sortir/sor_urjab') . '?alert=success&msg=Selamat anda berhasil menambah Data Urjab');
		} else {
			header('location:' . base_url('QA/Doc/Doc_sortir/sor_urjab') . '?alert=error&msg=Maaf anda gagal menambah Data Urjab');
		}
	}

	public function update()
	{
		$data['id_doc_sor'] = $this->input->post('id_doc_sor', TRUE);
		$data['jenis_doc_sor'] = $this->input->post('jenis_doc_sor', TRUE);
		$data['nama_doc_sor'] = $this->input->post('nama_doc_sor', TRUE);
		$data['tgl_berlaku'] = $this->convertdate($this->input->post('tgl_berlaku', TRUE));
		$data['tgl_review'] = $this->convertdate($this->input->post('tgl_review', TRUE));
		$respon = $this->M_sor_urjab->update($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_sortir/sor_urjab') . '?alert=success&msg=Selamat anda berhasil mengubah Data Urjab');
		} else {
			header('location:' . base_url('QA/Doc/Doc_sortir/sor_urjab') . '?alert=error&msg=Maaf anda gagal mengubah Data Urjab');
		}
	}
	public function delete($id_doc_sor)
	{
		$data['id_doc_sor'] = $id_doc_sor;
		$respon = $this->M_sor_urjab->delete($data);

		if ($respon) {
			header('location:' . base_url('QA/Doc/Doc_sortir/sor_urjab') . '?alert=success&msg=Selamat anda berhasil menghapus Data Urjab');
		} else {
			header('location:' . base_url('QA/Doc/Doc_sortir/sor_urjab') . '?alert=error&msg=Maaf anda gagal menghapus Data Urjab');
		}
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
