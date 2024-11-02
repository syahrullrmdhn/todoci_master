<?php
class Task_model extends CI_Model {

    public function get_all_tasks() {
        return $this->db->get('tasks')->result_array();
    }

    public function insert_task($data) {
        return $this->db->insert('tasks', $data);
    }

    public function update_task_status($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        return $this->db->update('tasks');
    }    
}
?>
