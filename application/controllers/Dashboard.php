<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('nik')) {
            redirect('loginpage');
        }
    }

    public function index() {
        $data['title'] = 'E-Dokumen - Dashboard';
        $data['page'] = 'Dashboard';

        $data['jumlah_surat_masuk'] = $this->db->count_all('surat_masuk');
        $data['jumlah_surat_keluar'] = $this->db->count_all('surat_keluar');
        $data['jumlah_user'] = $this->db->count_all('user');

        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar', $data);
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/wrapper/footer', $data);
    }
}
