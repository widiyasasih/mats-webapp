<?php
    class Models extends CI_Controller
    {
        function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = "List Model Produk";

            $data['models'] = $this->models_model->get_data();

            $this->load->view('templates/header', $data);
            $this->load->view('resources/models/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_model()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Tambah Model';

            // $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('model', 'Model', 'required', array(
                'required' => 'Model harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/models/add_model', $data);
                $this->load->view('templates/footer');
            } else {
                $this->models_model->create_model();
                redirect(base_url().'resources/models');
            }
        }

        public function edit($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['model'] = $this->models_model->get_data($id);
            $data['title'] = 'Edit Model '.$data['model']['model'];
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/models/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['unit'] = $this->models_model->update_model($id);
            redirect(base_url().'resources/models');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $this->models_model->delete_model($id);
            redirect(base_url().'resources/models');
        }
    }
    
?>