<?php
    class Suppliers extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'List Supplier';

            $data['suppliers'] = $this->suppliers_model->get_data();

            $this->load->view('templates/header', $data);
            $this->load->view('resources/suppliers/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_supplier()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Tambah Supplier';

            // $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('supplier', 'Supplier', 'required', array(
                'required' => 'Nama supplier harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('attn', 'Attention', 'required', array(
                'required' => 'Attention harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('telp_primary', 'Telepon', 'required', array(
                'required' => 'Telepon harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('field', 'Jasa', 'required', array(
                'required' => 'Bidang jasa harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('address', 'Alamat', 'required', array(
                'required' => 'Alamat harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/suppliers/add_supplier', $data);
                $this->load->view('templates/footer');
            } else {
                $this->suppliers_model->create_supplier();
                redirect(base_url().'resources/suppliers');
            }
        }

        public function edit($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['supplier'] = $this->suppliers_model->get_data($id);
            $data['title'] = 'Edit Supplier '.$data['supplier']['supplier'];
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/suppliers/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['supplier'] = $this->suppliers_model->update_supplier($id);
            redirect(base_url().'resources/suppliers');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $this->suppliers_model->delete_supplier($id);
            redirect(base_url().'resources/suppliers');
        }
    }
    


?>