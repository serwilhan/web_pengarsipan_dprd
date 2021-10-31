<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratKeluar extends CI_Controller {

    public function index() {
        $data['page'] = 'Surat Keluar';
        $data['title'] = 'E-Dokumen - Surat Keluar';

        $this->load->model('m_suratkeluar');
        $data['data_suratkeluar'] = $this->m_suratkeluar->get_data();
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('dashboard/wrapper/header', $data);
        $this->load->view('dashboard/wrapper/navbar');
        $this->load->view('dashboard/wrapper/sidebar', $data);
        $this->load->view('dashboard/surat-keluar', $data);
        $this->load->view('dashboard/wrapper/footer');
    }

    public function tambah_suratkeluar() {
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim', [
            'required' => "Nomor Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('tanggal-surat', 'Tanggal Surat', 'required', [
            'required' => "Tanggal Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
            'required' => "Perihal tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('penerima', 'Penerima', 'required', [
            'required' => "Penerima tidak boleh kosong."
        ]);

        if ($this->form_validation->run() == false) {
            $data['page'] = 'Surat Keluar';
            $data['title'] = 'E-Dokumen - Surat Keluar';


            $this->load->model('m_suratkeluar');
            $data['data_suratkeluar'] = $this->m_suratkeluar->get_data();

            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

            $this->load->view('dashboard/wrapper/header', $data);
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/surat-keluar', $data);
            $this->load->view('dashboard/wrapper/footer');
        } else {
            $no_surat = $this->input->post('no_surat');
            $tanggal_surat = $this->input->post('tanggal_surat');
            $perihal = $this->input->post('perihal');
            $penerima = $this->input->post('penerima');
            $isi_ringkasan = $this->input->post('isi_ringkasan');
            $file = $this->input->post('file');

            $data = array(
                'no_surat' => $no_surat,
                'tanggal_surat' => $tanggal_surat,
                'perihal' => $perihal,
                'penerima' => $penerima,
                'isi_ringkasan' => $isi_ringkasan,
                'file' => $file
            );

            $this->m_suratkeluar->save_data($data, 'surat_keluar');

            $this->session->set_flashdata('suratkeluar-message', '<div class="alert alert-danger" role="alert">
            Data berhasil disimpan.</div>');

            redirect('SuratKeluar');
        }
    }

    public function editSurat($id) {

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required|trim', [
            'required' => "Nomor Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('tanggal_surat', 'Tanggal Surat', 'required', [
            'required' => "Tanggal Surat tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required', [
            'required' => "Perihal tidak boleh kosong."
        ]);
        $this->form_validation->set_rules('penerima', 'Penerima', 'required', [
            'required' => "Penerima tidak boleh kosong."
        ]);

        if ($this->form_validation->run() == false) {

            $data['page'] = 'Surat Keluar';
            $data['title'] = 'E-Dokumen - Surat Keluar';

            $this->load->model('m_suratkeluar');
            $data['data_suratkeluar'] = $this->m_suratkeluar->get_data();
            $where = array('id' => $id);
            $data['data_suratkeluar'] = $this->m_suratkeluar->edit_data($where, 'surat_keluar')->result();

            $this->load->view('dashboard/wrapper/header', $data);
            $this->load->view('dashboard/wrapper/navbar');
            $this->load->view('dashboard/wrapper/sidebar', $data);
            $this->load->view('dashboard/surat-keluar', $data);
            $this->load->view('dashboard/wrapper/footer');
        } else {
            // -------------------------------------------------------------------------------------------
            $id = $this->input->post('id');
            $no_surat = $this->input->post('no_surat');
            $tanggal_surat = $this->input->post('tanggal_surat');
            $perihal = $this->input->post('perihal');
            $penerima = $this->input->post('penerima');
            $isi_ringkasan = $this->input->post('isi_ringkasan');
            $file = $this->input->post('file');

            $data = array(
                'id' => $id,
                'no_surat' => $no_surat,
                'tanggal_surat' => $tanggal_surat,
                'perihal' => $perihal,
                'penerima' => $penerima,
                'isi_ringkasan' => $isi_ringkasan,
                'file' => $file
            );

            $where = array(
                'id' => $id
            );

            $this->m_suratkeluar->update_data($where, $data, 'surat_keluar');

            $this->session->set_flashdata('suratkeluar-message', '<div class="alert alert-success" role="alert">
            Data berhasil diubah.</div>');

            redirect('suratkeluar');
            // -------------------------------------------------------------------------------------------
        }
    }

    public function hapusSurat($id) {
        $this->load->model('m_suratkeluar');
        $this->m_suratkeluar->delete_data($id);

        $this->session->set_flashdata('suratkeluar-message', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus.</div>');

        redirect('suratkeluar');
    }
}
