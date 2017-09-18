<?php
include_once("db.php");

class Album {
	private $idAlbum;
	private $Albumnaam;
	private $Artiest;
	private $ImageUrl;
	
	function __construct() {
		
	}
	
	function getidAlbum() {
		return $this->idAlbum;
	}
	
	function getAlbumnaam() {
		return $this->Albumnaam;
	}
	
	function getArtiest() {
		return $this->Artiest;
	}
	
	function getImageUrl() {
		return $this->ImageUrl;
	}
	
	
	function insertAlbum() {
		$db = new db();
		$conn = $db->getConnectie();
		$query = "INSERT INTO Album (idAlbum, Albumnaam, Artiest, ImageUrl) "
		."VALUES (:idAlbum, :Albumnaam, :Artiest, :ImageUrl)";
		$sth = $conn->prepare($query);
		$sth->bindParam(':idAlbum', $this->idAlbum, PDO::PARAM_INT);
		$sth->bindParam(':Albumnaam', $this->Albumnaam, PDO::PARAM_STR);
		$sth->bindParam(':Artiest', $this->Artiest, PDO::PARAM_STR);
		$sth->bindParam(':ImageUrl', $this->ImageUrl, PDO::PARAM_STR);
		return $sth->execute();
	}
	
	function setidAlbum($idAlbum) {
		$this->idAlbum = $idAlbum;
	}
	
	function setAlbumnaam($Albumnaam) {
		$this->Albumnaam = $Albumnaam;
	}
	
	function setArtiest($Artiest) {
		$this->Artiest = $Artiest;
	}
	
	function setImageUrl($ImageUrl) {
		$this->ImageUrl = $ImageUrl;
	}
	
}