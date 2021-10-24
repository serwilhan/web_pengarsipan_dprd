<?php

class M_suratkeluar extends CI_Model {
    public function get_data() {
        return $this->db->get('surat_keluar')->result_array();
    }

    public function save_data($data, $table) {
        return $this->db->insert($table, $data);
    }
}
