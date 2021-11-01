<?php

class M_suratmasuk extends CI_Model {
    public function get_data() {
        return $this->db->get('surat_masuk')->result_array();
    }

    public function save_data($data, $table) {
        return $this->db->insert($table, $data);
    }

    function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($id) {
        return $this->db->delete('surat_masuk', ['id' => $id]);
    }

    public function getSuratById($id) {
        return $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
    }

    // public function get_keyword($keyword) {
    //     $this->db->select('*');
    //     $this->db->from('surat_masuk');
    //     $this->db->like('no_surat', $keyword);
    //     $this->db->or_like('tanggal_surat', $keyword);
    //     $this->db->or_like('tanggal_diterima', $keyword);
    //     $this->db->or_like('perihal', $keyword);
    //     $this->db->or_like('pengirim', $keyword);
    //     $this->db->or_like('perihal', $keyword);
    //     return $this->db->get()->result();
    // }
}
