<?php
// Database Connection
class DBConnection {
    private $_dbHostname = "";
	private $_dbPort = "";
    private $_dbName = "";
    private $_dbUsername = "";
    private $_dbPassword = "";
    private $_con;

    public function __construct() {
    	try {
        	$this->_con = new PDO("mysql:host=$this->_dbHostname;port=$this->_dbPort;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
          $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->_con->exec('SET NAMES utf8');
	    } catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}

    }
    // return Connection
    public function returnConnection() {
        return $this->_con;
    }
}
?>
