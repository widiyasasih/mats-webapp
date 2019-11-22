<?php
    class Users extends CI_controller
    {
        public function index()
        {
            $data['title'] = 'Member Login';
            // set rules of validation error
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE) {
                // if not field then keep on login view
                $this->load->view('doors/login', $data);
            }else {
                // get username and encrypt password
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));

                // passing username and password
                $user = $this->users_model->login($username, $password);

                // create new variables
                $user_id = $user['id'];
                $user_level_id = $user['level_id'];
                $user_level = $user['level'];
                // var_dump($user);
                // var_dump($user_id);
                
                if ($user_id) {
                    // set status login
                    $this->users_model->set_status_login($user_id);
                    
                    // create session for userdata
                    $user_data = array(
                        'user_id' => $user_id,
                        'user_level_id' => $user_level_id,
                        'user_level' => $user_level,
                        'username' => $username,
                        'logged_in' => true
                    );
                    $this->session->set_userdata($user_data);
                    
                    // set message if login is succed
                    $this->session->set_flashdata('user_loggedin', 'Welcome back '.$user['username'].'! You are now logged in');
                    redirect(base_url());
                }else {
                    // set message if log in invalid
                    $this->session->set_flashdata('login_failed', 'Login is invalid');
                    redirect('login');
                }
            }
        }
        
        public function register()
        {
            $data['title'] = 'Registration Area';
            // set rules if validation error
            $this->form_validation->set_rules('fullname', 'Fullname', 'required');
            // set paramater callback for function check_username_exists and check_email_exists
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            // set paramater required only numeric type
            $this->form_validation->set_rules('telp_primary', 'Phone Number', 'required|numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');
            // set parameter should be match with password
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('doors/register', $data);
            }else {
                // die('Continue');
                // encrypt password
                $enc_password = md5($this->input->post('password'));

                $this->users_model->register($enc_password);

                // set session 
                $this->session->set_flashdata('user_registered', 'Hi <b>'.$this->input->post('username').'</b>! You are now registered and please log in first.');
                
                redirect('login');
            }
        }

        // check if username exists
        public function check_username_exists($username)
        {
            // call message when false
            $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
            if ($this->users_model->check_username_exists($username)) {
                return true;
            }else {
                return false;
            }
        }

        // check if email exists
        public function check_email_exists($email)
        {

            // call message when false
            $this->form_validation->set_message('check_email_exists', 'That email is used. Please choose a different one');
            if ($this->users_model->check_email_exists($email)) {
                return true;
            }else {
                return false;
            }
        }
        
        public function logout()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            // set status log out
            $user_id = $this->session->userdata('user_id');
            $this->users_model->set_status_logout($user_id);

            // unset userdata
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_level_id');
            $this->session->unset_userdata('user_level');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');

            // set message
            $this->session->set_flashdata('user_loggedout', 'You are now logged out');
            redirect('login');
        } 
    }
    ?>