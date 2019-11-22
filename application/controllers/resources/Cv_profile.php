<?php
    class Cv_profile extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = "Profile Perusahan";

            $data['profile'] = $this->cv_profile_model->get_data();
            $data['branchs'] = $this->cv_profile_model->get_branchs();
            $all_branch = array();
            foreach ($data['branchs'] as $key => $value) {
               $all_branch[] = $value['city'];
            }
            $data['all_branchs'] = implode(', ', $all_branch);
            print_r($data['all_branchs']);
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/cv/profile/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_branch()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Tambah Cabang Baru';

            $data['alert'] = $this->form_validation->set_rules('code', 'Kode', 'required', array(
                'required' => 'Kode harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('city', 'Kota', 'required', array(
                'required' => 'Kota harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('telp_primary', 'Telpon', 'required', array(
                'required' => 'Telpon harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('email', 'Email', 'required', array(
                'required' => 'Email harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('address', 'Alamat', 'required', array(
                'required' => 'Alamat harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/cv/branchs/add_branch', $data);
                $this->load->view('templates/footer');
            } else {
                $this->cv_branchs_model->create_branch();
                redirect(base_url().'resources/cv_branchs');
            }
        }

        public function edit($id = NULL)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['profile'] = $this->cv_profile_model->get_data($id);
            $data['title'] = "Edit Profile CV";
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/cv/profile/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $config['upload_path'] = './assets/img/logos_profile';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('logo')) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = $this->input->post('logo_old');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['logo']['name'];
            } 
            // $this->posts_model->update_post($id, $post_image);
            $this->cv_profile_model->update_profile($id, $post_image);
            redirect(base_url().'resources/cv_profile');
        }

        // public function delete($id)
        // {
        //     $this->cv_branchs_model->delete_branch($id);
        //     redirect(base_url().'resources/cv_branchs');
        // }
    }
    
?>