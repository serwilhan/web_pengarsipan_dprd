<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        $data['page'] = 'User';
        $data['title'] = 'E-Dokumen - User';
        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/user');
        $this->load->view('dashboard/wrapper/footer');
    }

    public function tambahUser() {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', 'is_unique[user.nik]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama.',
            'min_length' => 'Masukan minimal 6 karakter.'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['page'] = 'User';
            $data['title'] = 'E-Dokumen - User';
            $this->load->view('dashboard/wrapper/header', $data);
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/form-tambah-user');
            $this->load->view('dashboard/wrapper/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nomor_telepon' => $this->input->post('notelpon'),
                'pas_foto' => 'default.jpg',
                'nik' => $this->input->post('nik'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            redirect(base_url('user'));
        }
    }
}
