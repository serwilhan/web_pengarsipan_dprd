<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserProfile extends CI_Controller {

    public function index() {

        $data['title'] = 'E-Dokumen - Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->model('m_user');

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/user-profile', $data);
        $this->load->view('dashboard/wrapper/footer');
    }

    public function editProfile() {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => "Nama Lengkap tidak boleh kosong."
        ]);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
        //     'required' => "Password tidak boleh kosong.",
        //     'matches' => 'Password tidak sama.',
        //     'min_length' => 'Masukan password minimal 6 karakter.'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
        //     'required' => "Konfirmasi Password tidak boleh kosong."
        // ]);

        if ($this->form_validation->run() == false) {

            $data['page'] = 'Edit Profile';
            $data['title'] = 'E-Dokumen - Edit Profile';
            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

            $this->load->view('dashboard/wrapper/header', $data);
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/user-profile', $data);
            $this->load->view('dashboard/wrapper/footer');
        } else {
            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

            $nama = $this->input->post('nama');
            $nomor_telepon = $this->input->post('nomor_telepon');
            $pas_foto = $_FILES['pas_foto']['name'];

            // $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);


            if ($pas_foto) {
                $config['upload_path'] = './assets/dist/img/profile/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('pas_foto')) {
                    $new_pasfoto = $this->upload->data('file_name');

                    $this->db->set('pas_foto', $new_pasfoto);
                } else {
                    $this->upload->display_errors();
                }
            }

            // $data = [
            //     'nama' => $nama,
            //     'nomor_telepon' => $nomor_telepon,
            //     'pas_foto' => $pas_foto,
            //     // 'password' => $password,
            // ];

            $nik = $this->session->userdata('nik');

            $this->db->set('nama', $nama);
            $this->db->set('nomor_telepon', $nomor_telepon);
            $this->db->where('nik', $nik);
            $this->db->update('user');

            $this->session->set_flashdata('editprofile-message', '<div class="alert alert-success" role="alert">
            Profile berhasil diubah.</div>');

            redirect('userprofile');
            // -------------------------------------------------------------------------------------------
        }
    }
}
