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
            // redirect(base_url('dashboard'));

            $this->_login();
        }
    }

    private function _login() {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nik' => $nik])->row_array();

        // If the user exists
        if ($user) {
            // If the user is active
            if ($user['is_active'] == 1) {
                //Password Verify
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nik' => $user['nik'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else {
                    redirect('LoginPage');
                }
            } else {
                redirect('LoginPage');
            }
        } else {
            redirect('LoginPage');
        }
    }

    public function logout() {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('role_id');

        redirect('LoginPage');
    }
}
