<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livesearch extends CI_Controller {

	function index()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
        $this->load->view('templates/header');
		$this->load->view('livesearch');
        $this->load->view('templates/footer');
	}

	function fetch()
	{
		if(!$this->session->userdata('logged_in')){
            redirect('login');
        }
		$output = '';
		$query = '';
		$this->load->model('livesearch_model');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->livesearch_model->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr class="text-center">
							<th>Kode</th>
							<th>Name</th>
							<th>Rak</th>
							<th>Model</th>
							<th>Kondisi</th>
							<th width="200px">Deskripsi</th>
							<th>Image</th>
						</tr>
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr class="text-center">
							<td>'.$row->code.'</td>
							<td>'.$row->name.'</td>
							<td>'.$row->rack.'</td>
							<td>'.$row->model.'</td>
							<td>'.$row->condition.'</td>
							<td width="200px">'.$row->description.'</td>
							<td><img width="150px" height="150px" src="'.base_url('assets/img/molds/'.$row->image).'"></td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="8" style="font-weight:bold;">Data tidak ditemukan.</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
	
	// function fetch()
	// {
	// 	if(!$this->session->userdata('logged_in')){
    //         redirect('login');
    //     }
	// 	$output = '';
	// 	$query = '';
	// 	$this->load->model('livesearch_model');
	// 	if($this->input->post('query'))
	// 	{
	// 		$query = $this->input->post('query');
	// 	}
	// 	$data = $this->livesearch_model->fetch_data($query);
	// 	$output .= '
	// 	<div class="table-responsive">
	// 				<table class="table table-bordered table-striped">
	// 					<tr>
	// 						<th>Customer Name</th>
	// 						<th>Address</th>
	// 						<th>City</th>
	// 						<th>Postal Code</th>
	// 						<th>Country</th>
	// 					</tr>
	// 	';
	// 	if($data->num_rows() > 0)
	// 	{
	// 		foreach($data->result() as $row)
	// 		{
	// 			$output .= '
	// 					<tr>
	// 						<td>'.$row->CustomerName.'</td>
	// 						<td>'.$row->Address.'</td>
	// 						<td>'.$row->City.'</td>
	// 						<td>'.$row->PostalCode.'</td>
	// 						<td>'.$row->Country.'</td>
	// 					</tr>
	// 			';
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$output .= '<tr>
	// 						<td colspan="5">No Data Found</td>
	// 					</tr>';
	// 	}
	// 	$output .= '</table>';
	// 	echo $output;
	// }
}
