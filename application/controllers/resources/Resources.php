<?php
    class Resources extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'CV Resource';

            $this->load->view('templates/header', $data);
            $this->load->view('resources/index', $data);
            $this->load->view('templates/footer');
        }
    }
    


?>
