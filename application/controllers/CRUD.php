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

	function upload(){
		//preparing for display image
		// $data['images'] = $this->model_data->getImage();

		//load view by passng parameter ' ' assumed as '$data'
		$data = array(
			'error' => ' ',
			'images' => $this->model_data->getImage()
			);
		$this->load->view('view_upload', $data);

	}

	function upload_action(){
		//this function using form 'helper'
		// that load in autoload.php section 'helper'
		$config['upload_path'] = './upload_image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 1000;
		$config['max_width'] = 2096;
		$config['max_height'] = 1526;

		//these are config to upload image
		//and 'upload_path' placed in root folder like applicaion, system etc. folder
		//after '$config' set then load library 'upload'
		$this->load->library('upload', $config);

		//'file_berkas' is name attribute from input tag in 'view_upload'
		if (! $this->upload->do_upload('file_berkas')) {
			//when file cannot to upload eror will be displayed
			$data = array(
				'error' => $this->upload->display_errors(),
				'images' => $this->model_data->getImage()
				);
			$this->load->view('view_upload', $data);
		}else{
			//when upoad process success
			//then meta-data of image file sent as parameter
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('view_upload_success', $data);
		}
	}

	//this function is about to gather information of visitors
	//this function helped by library 'user_agent'
	function get_info(){
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser().' '.$this->agent->version();
		}else if($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = "User Data Visitor Failed to Gather";
		}

		echo "Accessed from: <br>";
		echo "Browser: ".$agent."<br>";
		echo "Operation System: ".$this->agent->platform()."<br>";
		echo "IP address: ".$this->input->ip_address();//only can be accesed from hosting
	}
}
?>