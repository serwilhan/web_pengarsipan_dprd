<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

    public function index() {
        $data['page'] = 'Surat Masuk';
        $data['title'] = 'E-Dokumen - Surat Masuk';

        $this->load->model('m_suratmasuk');
        $data['data_suratmasuk'] = $this->m_suratmasuk->get_data();
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/surat-masuk', $data);
        $this->load->view('dashboard/wrapper/footer');
    }

    public function tambah_suratmasuk() {
        $no_surat = $this->input->post('no_surat');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $tanggal_diterima = $this->input->post('tanggal_diterima');
        $perihal = $this->input->post('perihal');
        $pengirim = $this->input->post('pengirim');
        $isi_ringkasan = $this->input->post('isi_ringkasan');
        $file = $this->input->post('file');

        $data = array(
            'no_surat' => $no_surat,
            'tanggal_surat' => $tanggal_surat,
            'tanggal_diterima' => $tanggal_diterima,
            'perihal' => $perihal,
            'pengirim' => $pengirim,
            'isi_ringkasan' => $isi_ringkasan,
            'file' => $file
        );

        $this->m_suratmasuk->save_data($data, 'surat_masuk');
        redirect('SuratMasuk');
    }
}
