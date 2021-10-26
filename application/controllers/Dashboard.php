<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        $data['page'] = 'Dashboard';
        $data['title'] = 'E-Dokumen - Dashboard';

        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar', $data);
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/wrapper/footer', $data);
    }
}
