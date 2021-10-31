<?php

class M_user extends CI_Model {
    public function get_data() {
        return $this->db->get('user')->result_array();
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
        return $this->db->delete('user', ['id' => $id]);
    }
}
