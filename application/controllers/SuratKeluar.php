<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

    public function index() {
        $data['page'] = 'Surat Keluar';
        $data['title'] = 'E-Dokumen - Surat Keluar';
        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/surat-masuk');
        $this->load->view('dashboard/wrapper/footer');
    }
}
