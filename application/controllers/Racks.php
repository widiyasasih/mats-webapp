<?php
class Racks extends CI_controller
{
    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $data['title'] = 'Lokasi Rak';
        $data['racks'] = $this->racks_model->get_racks();
        
        $this->load->view('templates/header', $data);
        $this->load->view('racks/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $data['title'] = 'Tambah Rak';
        $data['alert'] = $this->form_validation->set_rules('code', 'Kode', 'required', array(
                         'required' => 'Kode harus diisi'));
        $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', array(
                         'required' => 'Deskripsi harus diisi'));
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('racks/add_rack', $data);
            $this->load->view('templates/footer');
        }else {
            $this->racks_model->insert_rack();
            redirect('racks');
        }
    }

    public function edit($id = TRUE)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $data['rack'] = $this->racks_model->get_racks($id);
        $data['title'] = 'Edit Rak '.$data['rack']['code'];
        $data['alert'] = $this->form_validation->set_rules('code', 'Kode', 'required', array(
                         'required' => 'Kode harus diisi'));
        $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', array(
                         'required' => 'Deskripsi harus diisi'));
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('racks/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $this->racks_model->update();
        redirect('racks');
    }

    public function delete($id = TRUE)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $this->racks_model->delete($id);
        redirect('racks');
    }
}
?>