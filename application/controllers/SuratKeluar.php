<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

    public function index() {
        $data['page'] = 'Surat Keluar';
        $data['title'] = 'E-Dokumen - Surat Keluar';

        $this->load->model('m_suratkeluar');
        $data_db['data_suratkeluar'] = $this->m_suratkeluar->get_data();

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/surat-keluar', $data_db);
        $this->load->view('dashboard/wrapper/footer');
    }

    public function tambah_suratkeluar() {
        $no_surat = $this->input->post('no_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $penerima = $this->input->post('penerima');
        $isi_ringkasan = $this->input->post('isi_ringkasan');
        $file = $this->input->post('file');

        $data = array(
            'no_surat' => $no_surat,
            'tanggal_surat' => $tanggal_surat,
            'perihal' => $perihal,
            'penerima' => $penerima,
            'isi_ringkasan' => $isi_ringkasan,
            'file' => $file
        );

        $this->m_suratkeluar->save_data($data, 'surat_keluar');
        redirect('SuratKeluar');
    }
}
