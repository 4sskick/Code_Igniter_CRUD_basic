<?php
/**
* 
*/
class Crud extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		//load model
		// $this->load->model('model_data');
		// see in autoload.php model section

		//load helper for 'anchor' function
		// $this->load->helper('url');
		// see in autoload.php in helper section
	}

	function index(){
		//calling method inside 'model_data'
		$data['user'] = $this->model_data->displayData();
		//calling view to display '$data' / parsing data into 'view_tampil'
		$this->load->view('view_tampil', $data);
	}

	function add(){
		$this->load->view('view_tambah');
	}

	function add_action(){
		$name = $this->input->post('name');//this is based on name attribute on 'view_tambah'
		$address = $this->input->post('address');//so we can retrieve the values that user filled
		$jobs = $this->input->post('jobs');//inside the input tag

		/*
		after that we store those inside array with pattern
		array(Key => Value)

		I assume that key is related with name of fields data to store on database
		*/
		$data = array(
			'nama' => $name,
			'alamat' => $address,
			'pekerjaan' => $jobs
			);

		//then we pass the '$data' into 'model_data' method 'inputData'
		//with parameter '$data' and second as name of table 'user'
		$this->model_data->inputData($data, 'user');
		//and automatically refresh page and redirect to 'crud/index'
		redirect('crud/index','refresh');
	}

	function delete($idToDelete){
		//store data 'id' into array
		//I assume that 'Key' of array related with fields in database
		$whereArgs = array('id' => $idToDelete);
		//called method inside model then pass the parameters		
		$this->model_data->deleteData($whereArgs, 'user');
		//after that refresh page to redirect into 'crud/index'
		redirect('crud/index','refresh');
	}

	function update($idToUpdate){
		$whereArgs = array('id' => $idToUpdate);
		$data['user'] = $this->model_data->updateDataToDisplay($whereArgs, 'user');
		$this->load->view('view_update', $data);
	}

	function update_action(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$jobs = $this->input->post('jobs');

		$data = array(
			'nama' => $name,
			'alamat' => $address,
			'pekerjaan' => $jobs
			);

		$whereArgs = array(
			'id' => $id
			);

		$this->model_data->updateData($whereArgs, $data, 'user');
		redirect('crud/index','refresh');
	}
}
?>