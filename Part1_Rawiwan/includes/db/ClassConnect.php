<?php
require('dbconfig.inc');

class DBConfig {
    protected $host;
	protected $user;
	protected $pass;
	protected $db;
	protected $conn;

	function __construct($host = host, $user = user, $pass = password, $db = database) {

        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        
        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            $this->conn;
			if (!$this->conn) {
				echo 'The database server is not available';
				exit;
            }	
		}	
		
		return $this->conn;
    }

    function __destruct() {
        $this->conn->close();
    }
}

?>

