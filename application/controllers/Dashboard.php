<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        $data['page'] = 'Dashboard';
        $data['title'] = 'E-Dokumen - Dashboard';
        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/wrapper/footer');
    }
}
