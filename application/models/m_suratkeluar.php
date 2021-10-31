<?php

class M_suratkeluar extends CI_Model {
    public function get_data() {
        return $this->db->get('surat_keluar')->result_array();
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
        return $this->db->delete('surat_keluar', ['id' => $id]);
    }

    public function getSuratById($id) {
        return $this->db->get_where('surat_keluar', ['id' => $id])->row_array();
    }
}
