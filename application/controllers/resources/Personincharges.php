<?php
    class Personincharges extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'List Anggota Organisasi Perusahaan';

            $data['persons'] = $this->personincharges_model->get_data();
            // var_dump($data['persons']);

            $this->load->view('templates/header', $data);
            $this->load->view('resources/personincharges/index', $data);
            $this->load->view('templates/footer');
        }

        public function add_person()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Tambah Anggota Organisasi Perusahaan';
            $data['positions'] = $this->personincharges_model->get_position();

            // $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('name', 'Nama', 'required', array(
                'required' => 'Nama harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('position', 'Position', 'required', array(
                'required' => 'Posisi harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('telp_primary', 'Telepon', 'required', array(
                'required' => 'Telepon harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('email', 'Email', 'required', array(
                'required' => 'Email harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('address', 'Alamat', 'required', array(
                'required' => 'Alamat harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/personincharges/add_person', $data);
                $this->load->view('templates/footer');
            } else {
                $this->personincharges_model->create_person();
                redirect(base_url().'resources/personincharges');
            }
        }

        public function edit($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['person'] = $this->personincharges_model->get_data($id);
            $data['positions'] = $this->personincharges_model->get_position();
            $data['title'] = 'Edit Anggota '.$data['person']['name'];
            var_dump($data['person']);
            // var_dump($id);
            
            $this->load->view('templates/header', $data);
            $this->load->view('resources/personincharges/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['person'] = $this->personincharges_model->update_person($id);
            redirect(base_url().'resources/personincharges');
        }

        public function delete($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $this->personincharges_model->delete_person($id);
            redirect(base_url().'resources/personincharges');
        }

        public function add_position()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'Tambah Posisi Perusahaan';

            // $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('position', 'Posisi', 'required', array(
                'required' => 'Posisi harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('resources/personincharges/add_position', $data);
                $this->load->view('templates/footer');
            } else {
                $this->personincharges_model->create_position();
                redirect(base_url().'resources/view_position');
            }
        }

        public function view_position()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'List Posisi Organisasi di Perusahaan';
            $data['positions'] = $this->personincharges_model->get_position();
            // var_dump($data['positions']);
            $this->load->view('templates/header', $data);
            $this->load->view('resources/personincharges/view_position', $data);
            $this->load->view('templates/footer');
        }

        public function edit_position($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['position'] = $this->personincharges_model->get_position($id);
            $data['title'] = 'Edit Posisi Organisasi di Perusahaan';
            // var_dump($data['position']);
            $this->load->view('templates/header', $data);
            $this->load->view('resources/personincharges/edit_position', $data);
            $this->load->view('templates/footer');
        }

        public function update_position()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            
            $this->personincharges_model->update_position();
            redirect(base_url().'resources/view_position');
        }

        public function delete_position($id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            
            $this->personincharges_model->delete_position($id);
            redirect(base_url().'resources/view_position');
        }
    }
?>