<?php
    class Vendors_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = FALSE)
        {
            if($id === FALSE){
                $this->db->order_by('vendor');
                $query = $this->db->get('vendors');
                return $query->result_array();  
            } 
            $query = $this->db->get_where('vendors', array('id' => $id));
            return $query->row_array();
        }

        public function create_vendor()
        {
            $data = array(
                'vendor' => $this->input->post('vendor'), 
                'attn' => $this->input->post('attn'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'address' => $this->input->post('address'), 
            );
            return $this->db->insert('vendors', $data);
        }

        public function update_vendor($id = TRUE)
        {
            $data = array(
                'vendor' => $this->input->post('vendor'), 
                'attn' => $this->input->post('attn'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'address' => $this->input->post('address'), 
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('vendors', $data);
        }

        public function delete_vendor($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('vendors');
            return true;
        }
    }
?>