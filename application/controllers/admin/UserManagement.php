<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
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
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/user');
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

            redirect(base_url('admin/usermanagement'));
        }
    }

    // public function upload_foto() {
    //     $this->load->model('m_user');
    //     $data['current_user'] = $this->auth_model->current_user();

    //     if ($this->input->method() === 'post') {
    //         // the user id contain dot, so we must remove it
    //         $file_name = str_replace('.', '', $data['current_user']->id);
    //         $config['upload_path']          = FCPATH . '/assets/dist/img/profile';
    //         $config['allowed_types']        = 'jpg|jpeg|png';
    //         $config['file_name']            = $file_name;
    //         $config['overwrite']            = true;
    //         $config['max_size']             = 1000; // 1MB
    //         $config['max_width']            = 1080;
    //         $config['max_height']           = 1080;

    //         $this->load->library('upload', $config);

    //         if (!$this->upload->do_upload('foto')) {
    //             $data['error'] = $this->upload->display_errors();
    //         } else {
    //             $uploaded_data = $this->upload->data();

    //             $new_data = [
    //                 'id' => $data['current_user']->id,
    //                 'foto' => $uploaded_data['file_name'],
    //             ];

    //             if ($this->m_user->update($new_data)) {
    //                 $this->session->set_flashdata('message', 'Avatar updated!');
    //                 redirect(site_url('admin/setting'));
    //             }
    //         }
    //     }
    //     $this->load->view('admin/setting_upload_avatar.php', $data);
    // }
}
