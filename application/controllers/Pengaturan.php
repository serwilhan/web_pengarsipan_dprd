<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function index() {
        $data['title'] = 'E-Dokumen - Pengaturan';
        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/wrapper/footer');
    }
}
