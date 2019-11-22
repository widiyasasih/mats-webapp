<?php
    class Items_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = FALSE)
        {
            if($id === FALSE){
                $this->db->select('items.*, units.unit, units.id as id_unit');
                // $this->db->from('items');
                $this->db->order_by('item_name');
                $this->db->join('units', 'units.id = items.unit_id');
                $query = $this->db->get('items');
                return $query->result_array();
            }
            $query = $this->db->get_where('items', array('id' => $id));
            return $query->row_array();  
        }

        public function get_units()
        {
            $this->db->order_by('unit');
            $query = $this->db->get('units');
            return $query->result_array();
        }

        public function create_item()
        {
            $data = array(
                'item_name' => $this->input->post('item_nm'),
                'unit_id' => $this->input->post('unit'),
                'price' => $this->input->post('price')   
            );
            // $this->db->get('units');
            return $this->db->insert('items', $data);
        }

        public function update_item($id)
        {
            $data = array(
                'item_name' => $this->input->post('item_nm'), 
                'unit_id' => $this->input->post('unit'), 
                'price' => $this->input->post('price')
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('items', $data);
        }

        public function delete_item($id)
        {
            // echo $id;
            $this->db->where('id', $id);
            $this->db->delete('items');
            return true;
        }
    }
    
?>