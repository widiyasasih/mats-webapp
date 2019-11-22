<?php
    class Suppliers_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = FALSE)
        {
            if($id === FALSE){
                $this->db->order_by('supplier');
                $query = $this->db->get('suppliers');
                return $query->result_array();  
            } 
            $query = $this->db->get_where('suppliers', array('id' => $id));
            return $query->row_array();
        }

        public function create_supplier()
        {
            $data = array(
                'supplier' => $this->input->post('supplier'), 
                'attn' => $this->input->post('attn'), 
                'field' => $this->input->post('field'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'address' => $this->input->post('address'), 
            );
            return $this->db->insert('suppliers', $data);
        }

        public function update_supplier($id = TRUE)
        {
            $data = array(
                'supplier' => $this->input->post('supplier'), 
                'attn' => $this->input->post('attn'), 
                'field' => $this->input->post('field'),
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'address' => $this->input->post('address'), 
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('suppliers', $data);
        }

        public function delete_supplier($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('suppliers');
            return true;
        }
    }
?>