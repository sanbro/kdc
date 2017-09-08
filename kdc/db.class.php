<?php
class Db {
	private $conn;
	private $host;
	private $user;
	private $password;
	private $dbname;
	
	function __construct($params=array()) {
		$this->conn = false;
		$this->host = 'localhost'; //hostname
		$this->user = 'root'; //username
		$this->password = ''; //password
		$this->dbname = 'kmg'; //name of your database
		$this->connect();
	}

	function connect() {
		if (!$this->conn) {
			$this->conn = new  mysqli($this->host, $this->user, $this->password, $this->dbname);	
			
			if (!$this->conn) {
				$this->status_fatal = true;
				echo 'Connection Database failed';
				die();
			} 
			else {
				$this->status_fatal = false;
			}
		}
 
		return $this->conn;
	}
 
	
	
	function getAll($query) { // getAll function: when you need to select more than 1 line in the database
		$cnx = $this->conn;
		if (!$cnx || $this->status_fatal) {
			echo 'GetAll -> Connection database failed';
			die();
		}
		
		$cur = mysqli_query($cnx,$query);
		$return = array();
		
		while($data = mysqli_fetch_assoc($cur)) { 
			array_push($return, $data);
		} 
 
		return $return;
	}
	
	function insert($query) { // execute function: to use INSERT or UPDATE
		$cnx = $this->conn;
 
		$cur = mysqli_query($cnx,$query);
 
		if ($cur == TRUE) {
			return True;
		}
		else {
			return false;
		}
		
	}
	
}




?>