<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserProfile extends CI_Controller {

    public function index() {

        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();


        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/user-profile', $data);
        $this->load->view('dashboard/wrapper/footer');
    }
}
