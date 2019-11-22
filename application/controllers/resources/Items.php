<?php
    class Items extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = "List Item Bahan Baku";

            $data['items'] = $this->items_model->get_data();
            // print_r($data['items']);
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/items/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_item()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'Tambah List Bahan Baku';

            $data['units'] = $this->items_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('item_nm', 'Nama', 'required', array(
                'required' => 'Nama barang harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('unit', 'Satuan', 'required', array(
                'required' => 'Satuan harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('price', 'Harga', 'required', array(
                'required' => 'Harga harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/items/add_item', $data);
                $this->load->view('templates/footer');
            } else {
                $this->items_model->create_item();
                redirect(base_url().'resources/items');
            }
        }

        public function edit($id = NULL)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['item'] = $this->items_model->get_data($id);
            $data['title'] = "Edit Item ".$data['item']['item_name'];

            $data['units'] = $this->items_model->get_units();
            
            $data['item'] = $this->items_model->get_data($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/items/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $this->items_model->update_item($id);
            redirect(base_url().'resources/items');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $this->items_model->delete_item($id);
            redirect(base_url().'resources/items');
        }


    }
    
?>