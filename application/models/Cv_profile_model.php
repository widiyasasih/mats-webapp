<?php
    class Cv_profile_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = 1)
        {
            $query = $this->db->get_where('main_cv_profile', array('id' => $id));
            return $query->row_array();
        }

        public function get_branchs($id = 1)
        {
            $this->db->order_by('city');
            $query = $this->db->get_where('cv_branchs', array('main_profile_id' => $id));
            return $query->result_array();
        }

        public function update_profile($id, $post_image)
        {
            $data = array(
                'logo' => $post_image, 
                'name' => $this->input->post('name'), 
                'field' => $this->input->post('field'), 
                'initial' => $this->input->post('init'), 
                'city' => $this->input->post('city'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'email' => $this->input->post('email'), 
                'website' => $this->input->post('website'), 
                'address' => $this->input->post('address'),
                'description' => $this->input->post('description'),
            );
            $this->db->where('id', $id);
            return $this->db->update('main_cv_profile', $data);
        }

        // public function delete_profile($id)
        // {
        //     $this->db->where('id', $id);
        //     $this->db->delete('main_cv_profile');
        //     return true;
        // }
    }
    


?>