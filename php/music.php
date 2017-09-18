<?php
include_once("db.php");
include_once("album.php");
include_once("nummers.php");

class Music {
	private $albums;
	private $nummers;
	
	function __construct() {
		$this->albums = array();
		$this->nummers = array();
	}
	
	function getAlbums() {
		return $this->albums;
	}
	
	function getNummers() {
		return $this->nummers;
	}
	
	function selectAlbums() {
		$db = new db();
		$conn = $db->getConnectie();
		$sth = $conn->prepare("SELECT * FROM album");
		$sth->execute();
		$this->albums = $sth->fetchAll(PDO::FETCH_CLASS, "Album");
	}
	
	function selectAlbumsByAlbumId($albumid) {
		$db = new db();
		$conn = $db->getConnectie();
		$sth = $conn->prepare("SELECT * FROM album WHERE idAlbum = '".$albumid."'");
		$sth->execute();
		$this->albums = $sth->fetchAll(PDO::FETCH_CLASS, "Album");
	}
	
	function selectNummersByAlbumId($albumid) {
		$db = new db();
		$conn = $db->getConnectie();
		$sth = $conn->prepare("SELECT * FROM nummer WHERE Album_idAlbum = '".$albumid."'");
		$sth->execute();
		$this->nummers = $sth->fetchAll(PDO::FETCH_CLASS, "Nummers");
 	}
	

}