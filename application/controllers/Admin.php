<?php
    class Admin extends CI_controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }else {
                if($this->session->userdata('logged_in') && $this->session->userdata('user_level_id') == 1){
                    $data['title'] = 'Daftar Pengguna Mats';
                    $data['users'] = $this->admin_model->get_data();
                    // var_dump($data['users']);

                    $this->load->view('templates/header', $data);
                    $this->load->view('admin/users', $data);
                    $this->load->view('templates/footer');
                }else {
                    redirect('dashboard');
                }
            }
        }

        public function update_user($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }else {
                if($this->session->userdata('logged_in') && $this->session->userdata('user_level_id') == 1){
                    $data['title'] = 'Edit Pengguna';
                    
                    $data['user'] = $this->admin_model->get_data($id);
                    // var_dump($data['user']);
                    $data['positions'] = $this->personincharges_model->get_position();
                    $data['levels'] = $this->admin_model->get_level();
            
                    $this->form_validation->set_rules('fullname', 'Fullname', 'required');
                    $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
                    $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
                    $this->form_validation->set_rules('telp_primary', 'Telpon Utama', 'required');
                    // $this->form_validation->set_rules('password', 'Password', 'required');
                    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
                    
                    if($this->form_validation->run() === FALSE){
                        $this->load->view('templates/header', $data);
                        $this->load->view('admin/edit_user', $data);
                        $this->load->view('templates/footer');
                    }else {
                        // die('Continue');
                        // encrypt password
                        $enc_password = md5($this->input->post('password'));

                        $this->users_model->register($enc_password);

                        
                        redirect(base_url());
                    }
                    
                }else {
                    redirect('dashboard');
                }
            }
        }
    }
?>