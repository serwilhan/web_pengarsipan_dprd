<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {

    public function index() {
        $data['page'] = 'User';
        $data['title'] = 'E-Dokumen - User';
        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/user');
        $this->load->view('dashboard/wrapper/footer');
    }
}
