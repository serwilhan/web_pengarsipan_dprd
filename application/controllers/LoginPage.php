<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginPage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-Dokumen - Login';
            $this->load->view('auth/login');
        } else {

            redirect(base_url('dashboard'));
        }
    }
}
