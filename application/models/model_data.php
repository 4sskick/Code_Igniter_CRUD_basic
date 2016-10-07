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
}
?>