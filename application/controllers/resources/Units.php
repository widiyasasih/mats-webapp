<?php
    class Units extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'List Satuan Unit Item';

            $data['units'] = $this->units_model->get_data();

            $this->load->view('templates/header', $data);
            $this->load->view('resources/units/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_unit()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'Tambah Satuan Unit';

            // $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('unit', 'Satuan', 'required', array(
                'required' => 'Satuan unit harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/units/add_unit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->units_model->create_unit();
                redirect(base_url().'resources/units');
            }
        }

        public function edit($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['unit'] = $this->units_model->get_data($id);
            $data['title'] = 'Edit Satuan Unit '.$data['unit']['unit'];
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/units/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['unit'] = $this->units_model->update_unit($id);
            redirect(base_url().'resources/units');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $this->units_model->delete_unit($id);
            redirect(base_url().'resources/units');
        }
    }
    


?>