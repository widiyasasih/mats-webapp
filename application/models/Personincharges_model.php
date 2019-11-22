<?php
    class Personincharges_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = TRUE)
        {
            $this->db->select('p.*, p.id id, pos.id pos_id, pos.position');
            $this->db->order_by('p.name');
            $this->db->join('positions pos', 'pos.id = p.position_id', 'LEFT');
            var_dump($id);
            if($id === TRUE){
                $query = $this->db->get('personincharges p');
                return $query->result_array();  
            } else {
                $query = $this->db->get_where('personincharges p', array('p.id' => $id));
                return $query->row_array();
            }
        }

        public function create_person()
        {
            $data = array(
                'name' => $this->input->post('name'), 
                'position_id' => $this->input->post('position'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'email' => $this->input->post('email'), 
                'address' => $this->input->post('address'), 
            );
            return $this->db->insert('personincharges', $data);
        }

        public function update_person($id = TRUE)
        {
            $data = array(
                'name' => $this->input->post('name'), 
                'position_id' => $this->input->post('position'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'email' => $this->input->post('email'), 
                'address' => $this->input->post('address'), 
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('personincharges', $data);
        }

        public function delete_person($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('personincharges');
            return true;
        }

        public function get_position($id = TRUE)
        {
            if ($id === TRUE) {
                return $this->db->get('positions')->result_array();
            }else {
                return $this->db->get_where('positions', array('id' => $id))->row_array();
            }
        }
        
        public function create_position()
        {
            $data = array(
                'position' => $this->input->post('position'), 
            );
            return $this->db->insert('positions', $data);
        }

        public function update_position()
        {
            $data = array(
                'position' => $this->input->post('position'), 
            );
            return $this->db->update('positions', $data, array('id' => $this->input->post('id')));
        }

        public function delete_position($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('positions');
            return true;
        }
    }
?>