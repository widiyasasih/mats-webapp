<?php
    class Units_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = FALSE)
        {
            if ($id === FALSE) {
                $this->db->order_by('unit');
                $query = $this->db->get('units');
                return $query->result_array();
            }
            $query = $this->db->get_where('units', array('id' => $id));
            return $query->row_array();
        }

        public function create_unit()
        {
            $data = array(
                'unit' => $this->input->post('unit'), 
            );
            return $this->db->insert('units', $data);
        }

        public function update_unit($id)
        {
            $data = array(
                'unit' => $this->input->post('unit'), 
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('units', $data);
        }

        public function delete_unit($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('units');
            return true;
        }
    }
    


?>