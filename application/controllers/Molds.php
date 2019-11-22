<?php
class Molds extends CI_controller
{
    public function index()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $data['title'] = 'Rak Cetakan';
        $data['molds'] = $this->molds_model->get_molds();
        // var_dump($data['molds']);
        // var_dump($id);

        $this->load->view('templates/header', $data);
        $this->load->view('molds/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = TRUE)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }

        $data['title'] = 'Rak Cetakan';
        $data['mold'] = $this->molds_model->get_molds($id);
        // $data['models'] = $this->racks_model->get_model_by_mold();
        // var_dump($data['mold']);

        $this->load->view('templates/header', $data);
        $this->load->view('molds/view', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }

        $data['title'] = 'Tambah Cetakan';
        $data['racks'] = $this->racks_model->get_racks();
        $data['models'] = $this->needs_model->get_models();
        $data['get_id'] = $this->molds_model->get_id_mold();
        //  = count($get_id);
        
        $data['alert'] = $this->form_validation->set_rules('code', 'Kode', 'required', array(
            'required' => 'Kode harus diisi'));
        $data['alert'] = $this->form_validation->set_rules('rack', 'Rak', 'required', array(
            'required' => 'Rak harus dipilih'));
        $data['alert'] = $this->form_validation->set_rules('model[]', 'Model', 'required', array(
            'required' => 'Model harus dipilih'));
        $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', array(
            'required' => 'Deskripsi harus diisi'));
                        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('molds/add_mold', $data);
            $this->load->view('templates/footer');
        }else {
            $config['upload_path'] = 'assets/img/molds';
            $config['allowed_types'] = 'jpeg|jpg|gif|png';
            $config['max_size'] = 100000*1024;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_mold')) {
                $errors = array('error' => $this->upload->display_errors());
                $upload_img = 'noimage.png';
            }else {
                $data = array('upload_data' => $this->upload->data());
                $upload_img = $_FILES['img_mold']['name'];        
            }
            
            $this->molds_model->insert_mold($upload_img);
            $this->molds_model->insert_mold_models();
            redirect('molds');
        }
    }

    public function edit($id = TRUE)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        
        $data['title'] = 'Tambah Cetakan';
        $data['racks'] = $this->racks_model->get_racks();
        $data['models'] = $this->molds_model->get_models_by_id($id);
        $data['get_id'] = $this->molds_model->get_id_mold();
        $data['mold'] = $this->molds_model->get_molds($id);
        // var_dump($data['models']);
        
        $data['alert'] = $this->form_validation->set_rules('code', 'Kode', 'required', array(
            'required' => 'Kode harus diisi'));
        $data['alert'] = $this->form_validation->set_rules('rack', 'Rak', 'required', array(
            'required' => 'Rak harus dipilih'));
        $data['alert'] = $this->form_validation->set_rules('condition', 'Kondisi', 'required', array(
            'required' => 'Kondisi harus diiisi'));
        $data['alert'] = $this->form_validation->set_rules('model[]', 'Model', 'required', array(
            'required' => 'Model harus dipilih'));
        $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', array(
            'required' => 'Deskripsi harus diisi'));
                        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('molds/edit', $data);
            $this->load->view('templates/footer');
        }
    }
    public function update()
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }

        if(isset($_POST['submit']))
        {
            $config['upload_path'] = 'assets/img/molds';
            $config['allowed_types'] = 'jpeg|jpg|gif|png';
            $config['max_size'] = 100000*1024;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_mold')) {
                $errors = array('error' => $this->upload->display_errors());
                $upload_img = $this->input->post('img_mold_old');
            }else {
                $data = array('upload_data' => $this->upload->data());
                $upload_img = $_FILES['img_mold']['name'];        
            }
            
            $this->molds_model->update($upload_img);
            $this->molds_model->update_mold_models();
            $this->molds_model->delete_mold_models();

        }
        //need advance for auto refresh redirect to the edit form page once only
        $id = $_POST['id'];
        redirect('molds/view/'.$id);
    }

    public function delete($id = TRUE)
    {
        if(!$this->session->userdata('logged_in')){
            redirect('login');
        }

        $this->molds_model->delete($id);
        redirect('molds');
    }
}
?>