<?php
    class Cv_branchs extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = "Cabang Perusahan";

            $data['branchs'] = $this->cv_branchs_model->get_data();
            // print_r($data['items']);
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/cv/branchs/index', $data);
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
            
            $data['branch'] = $this->cv_branchs_model->get_data($id);
            $data['title'] = "Edit Cabang ".$data['branch']['city'];
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/cv/branchs/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $this->cv_branchs_model->update_branch($id);
            redirect(base_url().'resources/cv_branchs');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $this->cv_branchs_model->delete_branch($id);
            redirect(base_url().'resources/cv_branchs');
        }


    }
    
?>