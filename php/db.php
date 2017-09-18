<?php
class Db {
	
	private $connectie;
	
	function getConnectie() {
		if($_SERVER['SERVER_NAME'] == "localhost") {
			$user = 'root';
			$password = 'root';
			$db = 'summer';
			$host = 'localhost';
			$port = 3305;
		} else {
			$user = '';
			$password = '';
			$db = '';
			
		}
		
		try {
			$this->connectie = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$db, $user, $password);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
		
		return $this->connectie;
	}
	
	
	
}