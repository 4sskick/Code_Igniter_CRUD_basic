<?php
/**
* 
*/
class Model_data extends CI_Model
{
	
	function displayData(){
		//retrieve data from database table 'user'
		//on CRUD controller
		//http://stackoverflow.com/a/16506825
		$queryGet = $this->db->get('user');
		return $queryGet->result();//return as array
	}

	function inputData($data, $table){
		$this->db->insert($table, $data);
	}

	function deleteData($whereArgs, $table){
		$this->db->where($whereArgs);
		$this->db->delete($table);
	}

	function updateDataToDisplay($whereArgs, $table){
		$queryGetWhere = $this->db->get_where($table, $whereArgs);
		return $queryGetWhere->result();
	}

	function updateData($whereArgs, $data, $table){
		$this->db->where($whereArgs);
		$this->db->update($table, $data);
	}

	function getImage(){		
		$files = scandir(realpath(APPPATH . '../upload_image/'));//scandir for real path
		$files = array_diff($files, array('.','..'));//get rid of '.' and '..' when scan dir in subdir
		$images = array();

		foreach ($files as $file) {
			$images[] = array(
				'url' => base_url().'upload_image/'.$file //adding URL of images into '$images' variable
				);
		}

		return $images;
	}
}
?>