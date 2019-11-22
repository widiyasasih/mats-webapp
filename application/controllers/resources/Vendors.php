<?php
    class Vendors extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'List Vendor';

            $data['vendors'] = $this->vendors_model->get_data();

            $this->load->view('templates/header', $data);
            $this->load->view('resources/vendors/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_vendor()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'Tambah Vendor';

            // $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('vendor', 'Vendor', 'required', array(
                'required' => 'Nama vendor harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('attn', 'Attention', 'required', array(
                'required' => 'Attention harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('telp_primary', 'Telepon', 'required', array(
                'required' => 'Telepon harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('address', 'Alamat', 'required', array(
                'required' => 'Alamat harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/vendors/add_vendor', $data);
                $this->load->view('templates/footer');
            } else {
                $this->vendors_model->create_vendor();
                redirect(base_url().'resources/vendors');
            }
        }

        public function edit($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['vendor'] = $this->vendors_model->get_data($id);
            $data['title'] = 'Edit Vendor '.$data['vendor']['vendor'];
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/vendors/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['vendor'] = $this->vendors_model->update_vendor($id);
            redirect(base_url().'resources/vendors');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $this->vendors_model->delete_vendor($id);
            redirect(base_url().'resources/vendors');
        }
    }
    


?>