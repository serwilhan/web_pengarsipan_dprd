<?php

class M_user extends CI_Model {
    public function get_data() {
        return $this->db->get('user')->result_array();
    }

    public function save_data($data, $table) {
        return $this->db->insert($table, $data);
    }
}
