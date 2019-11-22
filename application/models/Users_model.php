<?php
    class Users_model extends CI_Model
    {
        public function __construct()
        {
            // load db 
            $this->load->database();
        }

        public function login($username, $password)
        {
            // validate
            $this->db->select('ul.*, ul.id ul_id, u.*, u.id id');
            $this->db->join('user_level ul', 'ul.id = u.level_id');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $result = $this->db->get('users u');

            // get which matched 
            if ($result->num_rows() == 1) {
                // if = 1 -> everything is OK and get result as row
                return $result->row_array();
            }else {
                // user is invalid
                return false;
            }
        }

        public function set_status_login($user_id)
        {
            // this method will help administrator for monitor
            // set status login to 1 for online
            $data = array(
                'online_status' => 1
            );
            $this->db->where('id', $user_id);
            return $this->db->update('users', $data);

            // var_dump($user_id);
        }

        public function set_status_logout($user_id)
        {
            // set status logout to 0 for offline
            $data = array(
                'online_status' => 0
            );
            $this->db->where('id', $user_id);
            return $this->db->update('users', $data);

            // var_dump($user_id);
        }

        public function register($enc_password)
        {
            $data = array(
                'online_status' => $this->input->post('online_status'),
                'level_id' => $this->input->post('level_id'),
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'telp_primary' => $this->input->post('telp_primary'),
                'password' => $enc_password
            );

            return $this->db->insert('users', $data);
        }

        //check username exists
        public function check_username_exists($username)
        {
            $query = $this->db->get_where('users', array('username' => $username));

            if(empty($query->row_array())){
                // if not exist
                return true;
            }else {
                // if not exist
                return false;
            }
        }

        //check email exists
        public function check_email_exists($email)
        {
            $query = $this->db->get_where('users', array('email' => $email));

            if(empty($query->row_array())){
                // if not exist
                return true;
            }else {
                // if exist
                return false;
            }
        }
    }
?>