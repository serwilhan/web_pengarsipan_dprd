<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

    public function index() {
        $data['page'] = 'Surat Masuk';
        $data['title'] = 'E-Dokumen - Surat Masuk';
        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/surat-masuk');
        $this->load->view('dashboard/wrapper/footer');
    }
}
