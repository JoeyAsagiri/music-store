<?php
include_once("db.php");

class Nummers {
	private $idNummer;
	private $Album_idAlbum;
	private $Nummernaam;
	private $Lengte;
	
	function __construct() {
		
	}
	
	function getidNummer() {
		return $this->idNummer;
	}
	
	function getNummernaam() {
		return $this->Nummernaam;
	}
	
	function getLengte() {
		return $this->Lengte;
	}
	
	function getAlbum_idAlbum() {
		return $this->Album_idAlbum;
	}
	
	function insertNummer() {
		$db = new db();
		$conn = $db->getConnectie();
		$query = "INSERT INTO nummer (idNummer, Album_idAlbum, Nummernaam, Lengte) "
		."VALUES (:idNummer, :Album_idAlbum, :Nummernaam, :Lengte)";
		$sth = $conn->prepare($query);
		$sth->bindParam(':idNummer', $this->idNummer, PDO::PARAM_INT);
		$sth->bindParam(':Album_idAlbum', $this->Album_idAlbum, PDO::PARAM_INT);
		$sth->bindParam(':Nummernaam', $this->Nummernaam, PDO::PARAM_STR);
		$sth->bindParam(':Lengte', $this->Lengte, PDO::PARAM_STR);
		return $sth->execute();
	}
	
	function verwijderNummer($idNummer) {
		$db = new db();
		$conn = $db->getConnectie();
		$query = "DELETE FROM nummer WHERE idNummer = :idNummer";
		$sth = $conn->prepare($query);
		$sth->bindParam(':idNummer', $idNummer, PDO::PARAM_INT);
		return $sth->execute();	
	}
	
	function setNummernaam($Nummernaam) {
		$this->Nummernaam = $Nummernaam;
	}
	
	function setLengte($Lengte) {
		$this->Lengte = $Lengte;
	}
	
	function setAlbumid($Album_idAlbum) {
		$this->Album_idAlbum = $Album_idAlbum;
	}
	
}