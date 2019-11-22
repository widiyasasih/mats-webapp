<?php
    class Cv_branchs_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($id = FALSE)
        {
            if ($id === FALSE) {
                $this->db->order_by('city');
                $query = $this->db->get('cv_branchs');
                return $query->result_array();
            }
            $query = $this->db->get_where('cv_branchs', array('id' => $id));
            return $query->row_array();
        }

        public function create_branch()
        {
            $data = array(
                'main_profile_id' => $this->input->post('main_profile_id'), 
                'code' => $this->input->post('code'), 
                'city' => $this->input->post('city'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'email' => $this->input->post('email'), 
                'address' => $this->input->post('address'), 
            );
            return $this->db->insert('cv_branchs', $data);
        }

        public function update_branch($id)
        {
            $data = array(
                'main_profile_id' => $this->input->post('main_profile_id'), 
                'code' => $this->input->post('code'), 
                'city' => $this->input->post('city'), 
                'telp_primary' => $this->input->post('telp_primary'), 
                'telp_alt' => $this->input->post('telp_alt'), 
                'fax' => $this->input->post('fax'), 
                'email' => $this->input->post('email'), 
                'address' => $this->input->post('address'), 
            );
            $this->db->where('id', $id);
            return $this->db->update('cv_branchs', $data);
        }

        public function delete_branch($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('cv_branchs');
            return true;
        }
    }
    


?>