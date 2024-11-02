<?php
class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Task_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $data['tasks'] = $this->Task_model->get_all_tasks();
        $this->load->view('task_list', $data);
    }    

    public function add_task() {
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('person', 'Person', 'required');
        $this->form_validation->set_rules('task', 'Task', 'required');
        $this->form_validation->set_rules('details', 'Details');
    
        if ($this->form_validation->run() == FALSE) {
            $data['tasks'] = $this->Task_model->get_all_tasks();
            $this->load->view('task_list', $data);
        } else {
            $data = array(
                'date' => $this->input->post('date', TRUE),
                'location' => $this->input->post('location', TRUE),
                'person' => $this->input->post('person', TRUE),
                'task' => $this->input->post('task', TRUE),
                'details' => $this->input->post('details', TRUE)
            );
            $this->Task_model->insert_task($data);
            redirect('task');
        }
    }
    

    public function mark_completed($id) {
        $this->Task_model->update_task_status($id, 'Completed');
        redirect('task');
    }
    public function change_status($id, $status) {
        // Validasi status yang diterima untuk mencegah nilai yang tidak sah
        $valid_statuses = ['Pending', 'Ditunda', 'Gagal', 'Completed'];
        if (in_array($status, $valid_statuses)) {
            $this->Task_model->update_task_status($id, $status);
        }
        redirect('task');
    }
    
}
?>
