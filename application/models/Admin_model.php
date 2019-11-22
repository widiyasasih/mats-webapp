<?php
    class Admin_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = TRUE)
        {
            $this->db->order_by('ul.id');
            $this->db->join('positions pt', 'pt.id=u.position_id', 'LEFT');
            $this->db->join('user_level ul', 'ul.id=u.level_id', 'LEFT');
            if ($id === TRUE) {
                return $this->db->get('users u')->result_array();
            }else {
                return $this->db->get_where('users u', array('u.id' => $id))->row_array();
            }
        }

        public function get_level()
        {
            return $this->db->get('user_level')->result_array();
        }
    }
?>