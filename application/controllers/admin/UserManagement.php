<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');

        if (!$this->session->userdata('nik')) {
            redirect('loginpage');
        }
    }

    public function index() {
        $data['page'] = 'User';
        $data['title'] = 'E-Dokumen - User';

        $this->load->model('m_user');
        $data_db['data_user'] = $this->m_user->get_data();
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/user', $data_db);
        $this->load->view('dashboard/wrapper/footer');
    }

    public function tambahUser() {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => "Nama Lengkap tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', 'is_unique[user.nik]', [
            'required' => "NIK tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'required' => "Password tidak boleh kosong.",
            'matches' => 'Password tidak sama.',
            'min_length' => 'Masukan password minimal 6 karakter.'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => "Konfirmasi Password tidak boleh kosong."
        ]);


        if ($this->form_validation->run() == false) {
            $data['page'] = 'User';
            $data['title'] = 'E-Dokumen - User';

            $this->load->model('m_user');
            $data_db['data_user'] = $this->m_user->get_data();
            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

            $this->load->view('dashboard/wrapper/header', $data);
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/user', $data_db);
            $this->load->view('dashboard/wrapper/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nomor_telepon' => $this->input->post('notelpon'),
                'pas_foto' => 'default.png',
                'nik' => $this->input->post('nik'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('user-message', '<div class="alert alert-success" role="alert">
            User berhasil ditambahkan.</div>');

            redirect(base_url('admin/usermanagement'));
        }
    }

    public function hapusUser($id) {
        $this->load->model('m_user');
        $this->m_user->delete_data($id);

        $this->session->set_flashdata('user-message', '<div class="alert alert-success" role="alert">
        User berhasil dihapus.</div>');

        redirect(base_url('admin/usermanagement'));
    }

    public function setAsAdmin($id) {

        $role_id = 1;

        $data = array(
            'role_id' => $role_id,
        );

        $where = array(
            'id' => $id
        );

        $this->load->model('m_user');
        $this->m_user->update_data($where, $data, 'user');

        $this->session->set_flashdata('user-message', '<div class="alert alert-success" role="alert">
            User telah diubah menjadi admin.</div>');

        redirect(base_url('admin/usermanagement'));
    }

    public function setAsUser($id) {

        $role_id = 2;

        $data = array(
            'role_id' => $role_id,
        );

        $where = array(
            'id' => $id
        );

        $this->load->model('m_user');
        $this->m_user->update_data($where, $data, 'user');

        $this->session->set_flashdata('user-message', '<div class="alert alert-success" role="alert">
            User telah diubah menjadi user.</div>');

        redirect(base_url('admin/usermanagement'));
    }

    public function activateUser($id) {
        $is_active = 1;

        $data = array(
            'is_active' => $is_active,
        );

        $where = array(
            'id' => $id
        );

        $this->load->model('m_user');
        $this->m_user->update_data($where, $data, 'user');

        $this->session->set_flashdata('user-message', '<div class="alert alert-success" role="alert">
            User berhasil Aktifkan.</div>');

        redirect(base_url('admin/usermanagement'));
    }

    public function nonActivateUser($id) {
        $is_active = 0;

        $data = array(
            'is_active' => $is_active,
        );

        $where = array(
            'id' => $id
        );

        $this->load->model('m_user');
        $this->m_user->update_data($where, $data, 'user');

        $this->session->set_flashdata('user-message', '<div class="alert alert-success" role="alert">
            User berhasil dinonaktifkan.</div>');

        redirect(base_url('admin/usermanagement'));
    }
}
