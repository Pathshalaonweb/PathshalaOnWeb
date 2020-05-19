<?php
class DB {
	
	protected $db_host = 'localhost';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_name = 'pathshal_pathshala';
	
	
	protected $db_hostTwo = 'localhost';
	protected $db_userTwo = 'root';
	protected $db_passTwo = '';
	protected $db_nameTwo = 'pathshal_newlms';
	
	 
	
	protected $conn;
	protected $connTwo;
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	public function connect() {
		mysqli_report(MYSQLI_REPORT_STRICT); 
		
		try { 
		$this->conn= new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		if ($this->conn->connect_error) {
    		die("Connection failed: " . $this->conn->connect_error);
			} 
		}
		catch (mysqli_sql_exception $e) {
      		throw $e;
	  	}
		
		return $this->conn;
		//return true;
	}
	
	public function connectTwo() {
		mysqli_report(MYSQLI_REPORT_STRICT); 
		
		try { 
		$this->connTwo= new mysqli($this->db_hostTwo, $this->db_userTwo, $this->db_passTwo, $this->db_nameTwo);
		if ($this->connTwo->connect_error) {
    		die("Connection failed: " . $this->connTwo->connect_error);
			} 
		}
		catch (mysqli_sql_exception $e) {
      		throw $e;
	  	}
		
		return $this->connTwo;
		//return true;
	}

}

// set time and date for indian
date_default_timezone_set('Asia/Kolkata');
$date_time = date('Y-m-d h:i:s ', time());
$date=date('Y-m-d');
$time=time();

?>