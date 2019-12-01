<?php
    class Needs extends CI_Controller
    {
        public function index()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'Kebutuhan Bahan Baku Bulanan';
            
            $data['cards'] = $this->needs_model->get_data();
            $this->load->view('templates/header', $data);
            $this->load->view('needs/index', $data);
            $this->load->view('templates/footer');
            // var_dump($data['cards']);
        }

        public function create_card()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'Kebutuhan Vendor';
            // get all models
            $data['models'] = $this->needs_model->get_models();
            $this->load->view('templates/header', $data);
            $this->load->view('needs/create', $data);
            $this->load->view('templates/footer');
            // var_dump($data['models']);
        }

        public function view($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            
            $data['title'] = 'View Kebutuhan Bahan Baku';
            $data['models'] = $this->needs_model->get_models_by_date($date_id);
            $data['date'] = $this->needs_model->get_data($date_id);
            $data['model_unselected'] = $this->needs_model->get_model_unselected($date_id);
            $data['pos'] = $this->needs_model->get_po($date_id);
            // $data['sps'] = $this->needs_model->get_sp_count($date_id);
            $get_ppn = $this->cv_profile_model->get_ppn();
		    $data['tax'] = $get_ppn['tax_ppn']/100;
            // var_dump($data['pos']);
            // var_dump($data['sps']);
            // var_dump($date_id);
            // $data['month'] = $this->needs_model->get_date($id)->month;
            // $data['year'] = $this->needs_model->get_date($id)->year;
            // $data['models'] = $this->needs_model->get_models($id_model);

            $this->load->view('templates/header', $data);
            $this->load->view('needs/view', $data);
            $this->load->view('templates/footer');
        }

        public function delete_card($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $this->needs_model->delete_card($date_id);
            redirect('needs');
        }

        public function delete_model($id, $date_id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            // var_dump($date_id);
            $this->needs_model->delete_model_on_card($id, $date_id);
            redirect('needs/view/'.$date_id);
        }

        public function add_item($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Tambah List Barang Baru';

            $data['units'] = $this->needs_model->get_units();

            $data['alert'] = $this->form_validation->set_rules('item_nm', 'Nama', 'required', array(
                'required' => 'Nama barang harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('unit', 'Satuan', 'required', array(
                'required' => 'Satuan harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('price', 'Harga', 'required', array(
                'required' => 'Harga harus diisi'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('needs/add_item', $data);
                $this->load->view('templates/footer');
            } else {
                $this->needs_model->create_item();
                echo '<script>alert("Data berhasil disimpan! Harap refresh/F5 halaman!"); history.go(-2); </script>';
            }
        }

        public function add_items()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['model'] = $this->needs_model->get_model();
            $data['items'] = $this->needs_model->get_items();
            // $data['date'] = $this->needs_model->view_date();
            // $periode = $this->needs_model->check_date();
            // $data['title'] = 'Kebutuhan Bulan '.$periode['month'].' '.$periode['year'];
            
            // check date if exists
            if (!empty($this->needs_model->check_date())) {
                // if exists then edit
                $data['already'] = "Periode ini sudah pernah dibuat sebelumnya!";
                $data['date_id'] = $this->needs_model->check_date();
                redirect('needs/edit_items/'.$_POST['month'].'/'.$_POST['year'].'/'.$data['date_id']['id'].'/'.$_POST['model_id']);
            }else {
                // create new card date
                $this->needs_model->create_date();
                $data['date'] = $this->needs_model->view_date();
                $data['already'] = "Menambah periode baru";
                $periode = $this->needs_model->check_date();
                $data['title'] = 'Kebutuhan Bulan '.$periode['mon'].' '.$periode['year'];
            }

            $this->load->view('templates/header', $data);
            $this->load->view('needs/add_items', $data);
            $this->load->view('templates/footer', $data);
            // var_dump($data['model']);
        }

        public function add_items_model($model_id = TRUE, $date_id)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['model'] = $this->needs_model->get_model($model_id);
            $data['items'] = $this->needs_model->get_items_for_edit($model_id, $date_id);
            $data['sum_view'] = $this->needs_model->sum_view($model_id, $date_id);
            $data['date'] = $this->needs_model->get_date($date_id);
            $data['title'] = 'Kebutuhan Bulan '.$data['date']['mon'].' '.$data['date']['year'];
            $data['already'] = "Menambah model baru";

            $this->load->view('templates/header', $data);
            $this->load->view('needs/add_items', $data);
            $this->load->view('templates/footer', $data);
        }

        public function insert_items()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            if ($this->input->post('check_item') === NULL) {
                echo '<script>alert("Harap ceklis item yang dipilih sebelum menyimpan!");history.go(-1)</script>';
            }else {
                $date_id = $_POST['date'];
                $this->needs_model->insert_items();
                redirect('needs/view/'.$date_id); // to card just already created
            }
        }

        public function edit_items($month, $year, $date_id, $model_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            // need auto refresh 1x
            $data['model'] = $this->needs_model->get_model($model_id);
            $data['items'] = $this->needs_model->get_items_for_edit($model_id, $date_id);
            $data['sum_view'] = $this->needs_model->sum_view($model_id, $date_id);
            $data['date'] = $this->needs_model->check_date($month, $year);
            $periode = $this->needs_model->check_date($month, $year);
            $data['title'] = 'Kebutuhan Bulan '.$periode['mon'].' '.$periode['year'];
            
            
            $this->load->view('templates/header', $data);
            $this->load->view('needs/edit_items', $data);
            $this->load->view('templates/footer', $data);
            // var_dump($data['items']);
        }

        public function update_items()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            // var_dump($_POST);
            $date = $_POST['date'];
            $model = $_POST['model'];
            if (empty($this->input->post('check_item'))) {
                // var_dump($date);
                //must delete all item
                // echo "<script>
                // if (confirm('Anda akan menghapus model ini?')) {".
                //     $this->needs_model->delete_model_on_card();
                // ."} else {
                //     history.go(-1);
                // }
                // </script>";
                $this->needs_model->delete_model_on_card();
                echo 'hapus model';
                redirect('needs/view/'.$date);

                // $data['title'] = 'View Kebutuhan Bahan Baku';
                // $data['models'] = $this->needs_model->get_models_by_date();
                // $data['date'] = $this->needs_model->get_data();

                // $this->load->view('templates/header', $data);
                // $this->load->view('templates/footer');
            }else {
                // header("Refresh:0");
                if(isset($_POST['submit']))
                {
                    $this->needs_model->update_items();
                    $this->needs_model->delete_items();
                    $this->needs_model->insert_items_to_list();
                }
                //need advance for auto refresh redirect to the edit form page once only
                echo '<script>alert("Data berhasil disimpan! Silahkan refresh/F5 halaman edit untuk melihat perubahan!"); history.go(-1); </script>';
            }
        }

        public function recap($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Rekapan Kebutuhan Bahan Baku';
            $data['models'] = $this->needs_model->get_models_by_date($date_id);
            $data['items'] = $this->needs_model->get_group_items($date_id);

            //-----> sum nominal
            $sum_nominal = array();
            foreach ($data['items'] as $key => $value) {
                $sum_nominal[] = $value['nominals'];
            }
            $data['sum_nominal'] = array_sum($sum_nominal);

            //-----> sum total pcs
            $sum_pcs = array();
            foreach ($data['items'] as $key => $value) {
                $sum_pcs[] = $value['totals'];
            }
            $data['sum_pcs'] = array_sum($sum_pcs);

            //-----> transform to matrix
            // $transforms = $this->needs_model->transform_data($date_id);
            // print_r($data['totals']);
            //  $data['td'] = '<td>'.$transforms['id'].'</td>';
            // foreach ($data['transforms'] as $transform) {
            //     $data['td'] = '<td>'.$transform['total'].'</td>';
            // }
            $data['date'] = $this->needs_model->get_data($date_id);
            $data['model_unselected'] = $this->needs_model->get_model_unselected($date_id);


            $this->load->view('templates/header', $data);
            $this->load->view('needs/recap', $data);
            $this->load->view('templates/footer');
        }

        // public function add_po($date_id = TRUE)
        // {
        //     $data['models'] = $this->needs_model->get_models_by_date($date_id);
        //     $data['items'] = $this->needs_model->get_group_items($date_id);
        //     $data['cv'] = $this->needs_model->get_cv();
        //     $data['date'] = $this->needs_model->get_data($date_id);
        //     $data['no'] = $this->needs_model->get_max_no($date_id);
        //     $data['id_po'] = $this->needs_model->get_max_id_po();
        //     // var_dump($data['id_po']);
        //     $data['suppliers'] = $this->suppliers_model->get_data();
        //     $data['vendors'] = $this->vendors_model->get_data();
        //     $data['persons'] = $this->personincharges_model->get_data();
        //     $data['branchs'] = $this->cv_branchs_model->get_data();
        //     $data['title'] = 'Tambah Purchase Order Bulan '.$data['date']['month'].' '.$data['date']['year'];
        //     $data['model_unselected'] = $this->needs_model->get_model_unselected($date_id);

        //     //-----> sum nominal
        //     $sum_nominal = array();
        //     foreach ($data['items'] as $key => $value) {
        //         $sum_nominal[] = $value['nominals'];
        //     }
        //     $data['sum_nominal'] = array_sum($sum_nominal);

        //     //-----> sum total pcs
        //     $sum_pcs = array();
        //     foreach ($data['items'] as $key => $value) {
        //         $sum_pcs[] = $value['totals'];
        //     }
        //     $data['sum_pcs'] = array_sum($sum_pcs);
            
        //     echo 'ulang';
        //     $data['alert'] = $this->form_validation->set_rules('item_nm', 'No PO', 'required', array(
        //         'required' => 'No PO harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('no_po', 'No PO', 'required', array(
        //         'required' => 'No PO harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('delivery_date', 'Tanggal pengiriman', 'required', array(
        //         'required' => 'Tanggal pengiriman harus dipilih'));
        //     $data['alert'] = $this->form_validation->set_rules('supplier', 'Supplier', 'required', array(
        //         'required' => 'Supplier harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('vendor', 'Vendor', 'required', array(
        //         'required' => 'Vendor harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', array(
        //         'required' => 'Deskripsi harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('city', 'Kota', 'required', array(
        //         'required' => 'Kota harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('sender_date', 'Tanggal po dibuat', 'required', array(
        //         'required' => 'Tanggal po dibuat harus diisi'));
        //     $data['alert'] = $this->form_validation->set_rules('sender', 'Pengirim', 'required', array(
        //         'required' => 'Pengirim harus diisi'));
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('needs/add_po', $data);
        //     $this->load->view('templates/footer');
        // }

        public function add_po($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['models'] = $this->needs_model->get_models_by_date($date_id);
            $data['items'] = $this->needs_model->get_group_items($date_id);
            $data['cv'] = $this->needs_model->get_cv();
            $data['date'] = $this->needs_model->get_data($date_id);
            $data['no'] = $this->needs_model->get_max_no($date_id);
            $data['id_po'] = $this->needs_model->get_max_id_po();
            $data['suppliers'] = $this->suppliers_model->get_data();
            $data['vendors'] = $this->vendors_model->get_data();
            $data['persons'] = $this->personincharges_model->get_data();
            $data['branchs'] = $this->cv_branchs_model->get_data();
            $data['title'] = 'Tambah Purchase Order Bulan '.$data['date']['month'].' '.$data['date']['year'];
            $data['model_unselected'] = $this->needs_model->get_model_unselected($date_id);
            // var_dump($data['items']);
            
            //-----> sum nominal
            $sum_nominal = array();
            foreach ($data['items'] as $key => $value) {
                $sum_nominal[] = $value['nominals'];
            }
            $data['sum_nominal'] = array_sum($sum_nominal);

            //-----> sum total pcs
            $sum_pcs = array();
            foreach ($data['items'] as $key => $value) {
                $sum_pcs[] = $value['totals'];
            }
            $data['sum_pcs'] = array_sum($sum_pcs);            

            $data['alert'] = $this->form_validation->set_rules('no_po', 'No PO', 'required', array(
                'required' => 'No PO harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('delivery_date', 'Tanggal pengiriman', 'required', array(
                'required' => 'Maksimal tanggal pengiriman harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('supplier', 'Supplier', 'required', array(
                'required' => 'Supplier harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('vendor', 'Vendor', 'required', array(
                'required' => 'Vendor harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', array(
                'required' => 'Deskripsi harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('city', 'Kota', 'required', array(
                'required' => 'Kota harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('sender_date', 'Tanggal Pembuatan PO', 'required', array(
                'required' => 'Tanggal pembuatan PO harus diisi'));
            $data['alert'] = $this->form_validation->set_rules('known_by', 'Diketahui oleh', 'required', array(
                'required' => 'Diketahui oleh harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('approved_by', 'Disetujui oleh', 'required', array(
                'required' => 'Disetujui oleh harus dipilih'));

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('needs/add_po', $data);
                $this->load->view('templates/footer');
                // redirect('needs/add_po/'.$date_id);
            } else {
                // echo 'berhasil';
                // var_dump($_POST);
                $id_po = $_POST['id_po'];
                $this->needs_model->create_po();
                $this->needs_model->insert_items_po();
                redirect('needs/view_po/'.$id_po);
            }
        }

        public function view_po($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Purchase Order';
            $data['po'] = $this->needs_model->view_po($id);
            $modified_at = $this->needs_model->get_max_modified_at($id);
            $data['items_po'] = $this->needs_model->view_items_po($id);
            $data['sum'] = $this->needs_model->get_sum_po($id);
            $data['max_mod_at'] = max($modified_at);
            $get_ppn = $this->cv_profile_model->get_ppn();
		    $data['tax'] = $get_ppn['tax_ppn']/100; 
		    $data['tax_ppn'] = $get_ppn['tax_ppn'];

            // var_dump($id);
            // var_dump($data['max_mod_at']);
            // var_dump($modified_at);
            
            $this->load->view('templates/header', $data);
            $this->load->view('needs/view_po', $data);
            $this->load->view('templates/footer');
        }

        public function edit_po($date_id = TRUE, $id = TRUE, $sp_id = NULL)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            if ($sp_id !== NULL) {
                $data['title'] = 'Purchase Order';
                $data['sp_id'] = $sp_id;
                
                $data['po'] = $this->needs_model->view_po($id);
                $data['items'] = $this->needs_model->get_items_for_edit_po($date_id, $id);
                $data['sum'] = $this->needs_model->get_sum_po($id);
                $data['suppliers'] = $this->suppliers_model->get_data();
                $data['vendors'] = $this->vendors_model->get_data();
                $data['persons'] = $this->personincharges_model->get_data();
                $data['branchs'] = $this->cv_branchs_model->get_data();
                // $data['cv'] = $this->needs_model->get_cv();
                // $data['id_po'] = $this->needs_model->get_max_id_po();
                // $data['date'] = $this->needs_model->get_data($date_id);
                // $data['no'] = $this->needs_model->get_max_no($date_id);
                // $data['items'] = $this->needs_model->get_items_for_edit($model_id, $date_id);
                // $data['items_po'] = $this->needs_model->view_items_po($id);
                // var_dump($data['persons']);
                // var_dump($data['po']);
                // var_dump($date_id);
                
                $this->load->view('templates/header', $data);
                $this->load->view('needs/edit_po', $data);
                $this->load->view('templates/footer');
            }else {
                $data['title'] = 'Purchase Order';
                $data['sp_id'] = '';
                $data['po'] = $this->needs_model->view_po($id);
                $data['items'] = $this->needs_model->get_items_for_edit_po($date_id, $id);
                $data['sum'] = $this->needs_model->get_sum_po($id);
                $data['suppliers'] = $this->suppliers_model->get_data();
                $data['vendors'] = $this->vendors_model->get_data();
                $data['persons'] = $this->personincharges_model->get_data();
                $data['branchs'] = $this->cv_branchs_model->get_data();
                // $data['cv'] = $this->needs_model->get_cv();
                // $data['id_po'] = $this->needs_model->get_max_id_po();
                // $data['date'] = $this->needs_model->get_data($date_id);
                // $data['no'] = $this->needs_model->get_max_no($date_id);
                // $data['items'] = $this->needs_model->get_items_for_edit($model_id, $date_id);
                // $data['items_po'] = $this->needs_model->view_items_po($id);
                // var_dump($data['persons']);
                // var_dump($data['po']);
                // var_dump($date_id);
                
                $this->load->view('templates/header', $data);
                $this->load->view('needs/edit_po', $data);
                $this->load->view('templates/footer');
                // die('normal');
            }
        }

        public function update_po()
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            if(isset($_POST['submit']))
            { 
                $this->needs_model->update_po();
                $this->needs_model->update_items_po();
                $this->needs_model->delete_items_po();
                $this->needs_model->insert_items_to_list_po();

                $date_id = $_POST['date'];
                $id = $_POST['id_po'];
                if (!empty($_POST['sp_id'])) {
                    redirect('needs/edit_sp/'.$_POST['sp_id']);
                }else {
                    redirect('needs/view_po/'.$id);
                }
            }
            //need advance for auto refresh redirect to the edit form page once only
        }

        public function print_po($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = '';
            $data['po'] = $this->needs_model->view_po($id);
            $data['items_po'] = $this->needs_model->view_items_po($id);
            $data['sum'] = $this->needs_model->get_sum_po($id);
            // var_dump($id);
            // var_dump($data['po']);
            
            $this->load->view('needs/print_po', $data);
        }

        public function delete_pos($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            // var_dump($date_id);
            $this->needs_model->delete_pos($date_id);
            redirect('needs/view/'.$date_id);
        }

        public function delete_po($date_id = TRUE, $id = TRUE)
        {            
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            // var_dump($date_id);
            $this->needs_model->delete_po($id);
            redirect('needs/view/'.$date_id);
        }

        public function all_sp($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Semua Slip Pengajuan';
            // $data['po_id'] = $id;
            $data['pos'] = $this->needs_model->get_po($date_id);
            $data['date'] = $date_id;
            $data['sps'] = $this->needs_model->get_all_sp($date_id);
            
            // $modified_at = $this->needs_model->get_max_modified_at($id);
            // $data['items_po'] = $this->needs_model->view_items_po($id);
            // $data['sum'] = $this->needs_model->get_sum_po($id);
            // // $data['max_mod_at'] = max($modified_at);

            // var_dump($data['sps']);
            // var_dump($data['sps']);
            // var_dump($modified_at);
            
            $this->load->view('templates/header', $data);
            $this->load->view('needs/all_sp', $data);
            $this->load->view('templates/footer');
        }

        public function list_sp($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['po_id'] = $id;
            $data['date'] = $this->needs_model->get_po_by_id($id);
            $data['sps'] = $this->needs_model->get_sps($id);
            $data['title'] = 'Slip Pengajuan PO No : '.$data['date']['no'].'/'.$data['date']['initial'].'/'.$data['date']['romawi'].'/'.$data['date']['year'] ;
            
            // $modified_at = $this->needs_model->get_max_modified_at($id);
            // $data['items_po'] = $this->needs_model->view_items_po($id);
            // $data['sum'] = $this->needs_model->get_sum_po($id);
            // // $data['max_mod_at'] = max($modified_at);

            // var_dump($data['po_id']);
            // var_dump($data['date']);
            // var_dump($modified_at);
            
            $this->load->view('templates/header', $data);
            $this->load->view('needs/list_sp', $data);
            $this->load->view('templates/footer');
        }

        public function add_sp($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            // var_dump($id);
            $data['alert'] = $this->form_validation->set_rules('date_sub', 'Tanggal Pengajuan', 'required', 
                array('required' => 'Tanggal Pengajuan harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', 
                array('required' => 'Deskripsi harus diisi'));

            $data['po'] = $this->needs_model->view_po($id);
            $data['sps'] = $this->needs_model->get_sps($id);
            $data['sp'] = count($data['sps']);
            $no_sp = $data['sp']+1;
            $data['id_sp'] = $this->needs_model->get_id_sp();
            $data['items'] = $this->needs_model->get_items_po($id);
            $data['title'] = 'Tambah Slip Pengajuan ke '.$no_sp;
            // $id_po = $id;
            // var_dump($_POST);
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('needs/add_sp', $data);
                $this->load->view('templates/footer');
            }else {
                if(isset($_POST['submit']))
                {
                    
                    $this->needs_model->create_sp();
                    $this->needs_model->insert_items_sp();
                    $id_po = $_POST['po_id'];
                    redirect('needs/list_sp/'.$id_po);
                }
            }
        }
        
        public function view_sp($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Slip Pengajuan';
            $data['sp'] = $this->needs_model->view_sp($id);
            $po_id = $data['sp']['po_id'];
            $data['items'] = $this->needs_model->get_items_sp($id);
            $data['count'] = count($data['items']);
            $data['sum'] = $this->needs_model->get_sum_sp($id, $po_id);
            // $modified_at = $this->needs_model->get_max_modified_at($id);
            // $data['items_po'] = $this->needs_model->view_items_po($id);
            // $data['sum'] = $this->needs_model->get_sum_po($id);
            // // $data['max_mod_at'] = max($modified_at);
            // echo $data['sum']['nominals'];
            // var_dump($data['po_id']);
            // var_dump($data['items']);
            // var_dump($data['count']);
            // var_dump($modified_at);
            
            $this->load->view('templates/header', $data);
            $this->load->view('needs/view_sp', $data);
            $this->load->view('templates/footer');
        }

        public function edit_sp($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['alert'] = $this->form_validation->set_rules('date_sub', 'Tanggal Pengajuan', 'required', 
                array('required' => 'Tanggal Pengajuan harus dipilih'));
            $data['alert'] = $this->form_validation->set_rules('description', 'Deskripsi', 'required', 
                array('required' => 'Deskripsi harus diisi'));

            $data['title'] = 'Tambah Slip Pengajuan';
            // $data['po'] = $this->needs_model->view_po($id);
            $data['id_sp'] = $this->needs_model->get_sp($id);
            $data['items'] = $this->needs_model->get_items_sp_for_edit($id);
            // var_dump($id);
            // var_dump($data['po']);
            // var_dump($data['id_sp']);
            // var_dump($data['items']);
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('needs/edit_sp', $data);
                $this->load->view('templates/footer');
            }else {
                if(isset($_POST['submit']))
                {
                    // var_dump($_POST);
                    // $this->needs_model->create_sp();
                    // $this->needs_model->insert_items_sp();
                    // $id_po = $_POST['po_id'];
                    // redirect('needs/list_sp/'.$id_po);
                }
            }
        }

        public function update_sp($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            if(isset($_POST['submit']))
            {
                // var_dump($_POST);
                $id = $_POST['po_id'];
                $sp_id = $_POST['id_sp'];
                if (empty($_POST['check_item'])) {
                    // echo '<script>alert("Tidak ada item yang tercentang. Anda akan menghapus slip pengajuan ini?");</script>';
                    // $this->needs_model->delete_sp($id);
                    redirect('needs/list_sp/'.$id);
                }else {
                    $this->needs_model->update_sp();
                    $this->needs_model->update_items_sp();
                    $this->needs_model->insert_items_update_sp();
                    $this->needs_model->delete_items_update_sp();
                    redirect('needs/edit_sp/'.$sp_id);
                }
            }
            //need advance for auto refresh redirect to the edit form page once only
            // $date_id = $_POST['date_id'];
            // redirect('needs/view_sp/'.$id);
        }

        public function delete_sp($id = TRUE, $po_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $this->needs_model->delete_sp($id);
            if ($po_id == TRUE) {
                redirect('needs/list_sp/'.$po_id);
            }else {
                redirect('needs/all_sp/'.$id);
            }
            
        }

        public function print_sp($id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            $data['title'] = 'Slip Pengajuan';
            $data['sp'] = $this->needs_model->view_sp($id);
            $po_id = $data['sp']['po_id'];
            $data['items'] = $this->needs_model->get_items_sp($id);
            $data['count'] = count($data['items']);
            $data['sum'] = $this->needs_model->get_sum_sp($id, $po_id);
            // $data['po'] = $this->needs_model->view_po($id);
            // $data['items_po'] = $this->needs_model->view_items_po($id);
            // $data['sum'] = $this->needs_model->get_sum_po($id);
            // var_dump($data['po']);
            
            $this->load->view('needs/print_sp', $data);
        }

        public function delete_sps($date_id = TRUE)
        {
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }

            // var_dump($date_id);
            $this->needs_model->delete_sps($date_id);
            redirect('needs/view/'.$date_id);
        }
    }
?>