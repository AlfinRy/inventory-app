<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ahu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_Utility/M_ahu');
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_ahu->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;
        $this->template->load('template', 'content/utility/ahu/ahu_data', $data);
        // print_r($data);

    }

    public function add()
    {
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['nama_mesin'] = $this->input->post('nama_mesin', TRUE);
        $data['jenis_mesin'] = $this->input->post('jenis_mesin', TRUE);
        $data['masalah'] = $this->input->post('masalah', TRUE);
        $data['penyebab'] = $this->input->post('penyebab', TRUE);
        $data['tindakan'] = $this->input->post('tindakan', TRUE);
        $data['nama_operator'] = $this->input->post('nama_operator', TRUE);
        $respon = $this->M_ahu->add($data);

        if ($respon) {
            header('location:' . base_url('Utility/Ahu') . '?alert=success&msg=Selamat anda berhasil menambah History Mesin AHU');
        } else {
            header('location:' . base_url('Utility/Ahu') . '?alert=error&msg=Maaf anda gagal menambah History Mesin AHU');
        }
    }
    public function update()
    {
        $data['id_hmu'] = $this->input->post('id_hmu', TRUE);
        $data['tgl'] = $this->convertDate($this->input->post('tgl', TRUE));
        $data['nama_mesin'] = $this->input->post('nama_mesin', TRUE);
        $data['jenis_mesin'] = $this->input->post('jenis_mesin', TRUE);
        $data['masalah'] = $this->input->post('masalah', TRUE);
        $data['penyebab'] = $this->input->post('penyebab', TRUE);
        $data['tindakan'] = $this->input->post('tindakan', TRUE);
        $data['operator'] = $this->input->post('nama_operator', TRUE);
        $respon = $this->M_ahu->update($data);
        if ($respon) {
            header('location:' . base_url('Utility/Ahu') . '?alert=success&msg=Selamat anda berhasil meng-update History Mesin AHU');
        } else {
            header('location:' . base_url('Utility/Ahu') . '?alert=error&msg=Maaf anda gagal meng-update History Mesin AHU');
        }
    }
    public function delete($id_hmu)
    {
        $data['id_hmu'] = $id_hmu;
        $respon = $this->M_ahu->delete($data);

        if ($respon) {
            header('location:' . base_url('Utility/Ahu') . '?alert=success&msg=Selamat anda berhasil menghapus History Mesin AHU');
        } else {
            header('location:' . base_url('Utility/Ahu') . '?alert=error&msg=Maaf anda gagal menghapus History Mesin AHU');
        }
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function pdf_ahu($tgl = null, $tgl2 = null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['result'] = $this->M_ahu->get($tgl, $tgl2)->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            $d['id_hmu'] = $data['result'][$i]['id_hmu'];
        }

        $d = $this->load->view('laporan/utility/page_laporan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
    
    public function pdf_page_print()
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['detail'] = $this->M_ahu->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;

        $d = $this->load->view('laporan/utility/ahu/page_print', $data, TRUE);
        $mpdf->AddPage("L", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
