<?php

class Database{
	public $host=DB_HOST;
	public $user=DB_USER;
	public $pass=DB_PASS;
	public $dbname=DB_NAME;
	
	public $link;
	public $error;
	
	
	public function __construct(){
		$this->connect_db();
	}
	private function connect_db(){
	  $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
	  if(!$this->link){
		  $this->error = "Connection failed".$this->link->connect_error;
		  return false;
	  }
	}
	//this function is for select or Read data from db
	
	public function select_data($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}
	
	//this function is for inserting data into db
	public function insert_data($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			header("location: index.php?message=".urlencode('Data inserted successfully'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link->error);
		}
	}
	
	//this function is for updating data into db
	public function update_data($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			header("location: index.php?message=".urlencode('Data updated successfully'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link->error);
		}
	}
	
	//this function is for deleting data from db
	public function delete_data($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			header("location: index.php?message=".urlencode('Data deleted'));
			exit();
		}else{
			die("Error:(".$this->link->errno.")".$this->link->error);
		}
	}
}