<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function index($page = 'dashboard')
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		}
		
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
		}
		//  get date currently
        $month = date('n');
        $year = date('Y');
        $data['title'] = 'Beranda';
		$data['date'] = $this->pages_model->get_date($month, $year);
		
        //  purchase order
		$data['tax'] = 10/100; // optional rolling as CV's decision
		$data['sum_pos'] = $this->pages_model->get_sum_pos($month, $year); // get cost of pos
        $data['pos'] = $this->pages_model->get_total_pos($month, $year); // get how many po've been created
        $data['tot_pos'] = count($data['pos']);
        
        // get submission slip have been created
        // $data['sps'] = $this->pages_model->get_total_sps($month, $year);
        // $data['sps'] = $this->pages_model->get_total_sps($month, $year);
        // $data['sps'] = array('1, 2', '2, 2');
        // $data['tot_sps'] = 'need rev '.count($data['sps']);
        
        // grant cost this month 
        $data['cost'] = $this->pages_model->get_sum_ammount($month, $year);
        $sum = array(); // create new array bcz result array
        foreach ($data['cost'] as $key => $value) {
            $sum[] = $value['nominals'];
		}
        $data['tot_cost'] = array_sum($sum); // we can use this function after get new array which could count
        
        // get need for this year
        $data['needs'] = $this->pages_model->get_needs($year);
        
        // get purchase order list deadline
		$data['deadline_pos'] = $this->pages_model->get_deadline_pos($month, $year);
		
        // $data['test']  = $this->pages_model->fetch_data();
        //  $data['test'] = $this->pages_model->fetch_data();
        //  var_dump($data['cost']);
        //  var_dump($data['cost']);
        //  var_dump($data['test']);

        $this->load->view('templates/header',$data);
		$this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer');
	}

	function fetch()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		}
		// initialize
		$output = '';
		$query = '';
		// passing input from ajax 
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->pages_model->fetch_data($query);
        $output .= '
        <p class="card-category result-molds">
        <span class="text-primary"><i class="fa fa-long-arrow-right"></i></span><small> hasil pencarian cetakan</small>
		<div class="table-responsive">
					<table width="100%" class="table table-bordered ">
						<tr class="text-center" style="background-color:#fafafa">
							<th>Kode</th>
							<th>Name</th>
							<th>Rak</th>
							<th>Model</th>
							<th>Kondisi</th>
							<th width="200px">Deskripsi</th>
							<th>Image</th>
						</tr>
		';
		if(!empty($data))
		{
			foreach($data as $row)
			{
				$output .= '
						<tr class="text-center">
							<td>'.$row['code'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['rack'].'</td>
							<td style="word-wrap:break-word;width:150px">'.$row['models'].'</td>
							<td style="word-wrap:break-word;width:150px">'.$row['cd'].'</td>
							<td style="word-wrap:break-word;width:150px">'.$row['description'].'</td>
							<td> <img width="150px" height="150px" src="'.base_url('assets/img/molds/'.$row['image']).'"></td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="7" style="font-weight:bold;">Data tidak ditemukan.</td>
						</tr>';
		}
		$output .= '</table></div></p>';
		echo $output;
	}

	function about($page = 'about')
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		}
		
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
		}
        $data['title'] = 'Tentang Sistem';

        $this->load->view('templates/header',$data);
		$this->load->view('pages/about', $data);
        $this->load->view('templates/footer');
	}
	
	function faq($page = 'faq')
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
		}
		
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
		}
        $data['title'] = 'FAQ';

        $this->load->view('templates/header',$data);
		$this->load->view('pages/faq', $data);
        $this->load->view('templates/footer');
	}
}
