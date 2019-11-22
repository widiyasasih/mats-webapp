<?php
    class Models_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = FALSE)
        {
            if($id === FALSE){
                $this->db->order_by('model');
                $query = $this->db->get('modeltypes');
                return $query->result_array();  
            } 
            $query = $this->db->get_where('modeltypes', array('id' => $id));
            return $query->row_array();
        }

        public function create_model()
        {
            $data = array(
                'model' => $this->input->post('model'), 
            );
            return $this->db->insert('modeltypes', $data);
        }

        public function update_model($id)
        {
            $data = array(
                'model' => $this->input->post('model'), 
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('modeltypes', $data);
        }

        public function delete_model($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('modeltypes');
            return true;
        }
    }
?>