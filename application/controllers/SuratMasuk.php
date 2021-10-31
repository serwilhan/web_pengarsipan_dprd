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

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim', [
            'required' => "Nomor Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required', [
            'required' => "Tanggal Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
            'required' => "Perihal tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required', [
            'required' => "Pengirim tidak boleh kosong."
        ]);

        if ($this->form_validation->run() == false) {

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
        } else {
            // -------------------------------------------------------------------------------------------
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

            $this->session->set_flashdata('suratmasuk-message', '<div class="alert alert-danger" role="alert">
            Data berhasil disimpan.</div>');

            redirect('SuratMasuk');
            // -------------------------------------------------------------------------------------------
        }
    }

    public function editSurat($id) {

        // $data['data_user'] = $this->m_suratmasuk->getSuratById($id);

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim', [
            'required' => "Nomor Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required', [
            'required' => "Tanggal Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
            'required' => "Perihal tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required', [
            'required' => "Pengirim tidak boleh kosong."
        ]);

        if ($this->form_validation->run() == false) {

            $data['page'] = 'Surat Masuk';
            $data['title'] = 'E-Dokumen - Surat Masuk';

            $this->load->model('m_suratmasuk');
            $data['data_suratmasuk'] = $this->m_suratmasuk->get_data();
            $where = array('id' => $id);
            $data['data_suratmasuk'] = $this->m_suratmasuk->edit_data($where, 'surat_masuk')->result();

            // $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

            $this->load->view('dashboard/wrapper/header', $data);
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/surat-masuk', $data);
            $this->load->view('dashboard/wrapper/footer');
        } else {
            // -------------------------------------------------------------------------------------------
            $id = $this->input->post('id');
            $no_surat = $this->input->post('no_surat');
            $tanggal_surat = $this->input->post('tanggal_surat');
            $tanggal_diterima = $this->input->post('tanggal_diterima');
            $perihal = $this->input->post('perihal');
            $pengirim = $this->input->post('pengirim');
            $isi_ringkasan = $this->input->post('isi_ringkasan');
            $file = $this->input->post('file');

            $data = array(
                'id' => $id,
                'no_surat' => $no_surat,
                'tanggal_surat' => $tanggal_surat,
                'tanggal_diterima' => $tanggal_diterima,
                'perihal' => $perihal,
                'pengirim' => $pengirim,
                'isi_ringkasan' => $isi_ringkasan,
                'file' => $file
            );

            // $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
            // $this->db->update($data, 'surat_masuk');

            $where = array(
                'id' => $id
            );

            $this->m_suratmasuk->update_data($where, $data, 'surat_masuk');

            // $this->m_suratmasuk->edit_data($id);

            $this->session->set_flashdata('suratmasuk-message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah.</div>');

            redirect('SuratMasuk');
            // -------------------------------------------------------------------------------------------
        }
    }

    public function hapusSurat($id) {
        $this->load->model('m_suratmasuk');
        $this->m_suratmasuk->delete_data($id);

        $this->session->set_flashdata('suratmasuk-message', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus.</div>');

        redirect(base_url('suratmasuk'));
    }
}
