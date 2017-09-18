<?php
include("header.php");
include_once("php/nummers.php");
include_once("php/music.php");

if(isset($_POST['knop'])) {
	extract($_POST);
	$nummers = new Nummers();
	$nummers->setAlbumid($album);
	$nummers->setNummernaam($nummernaam);
	$nummers->setLengte($lengte);
	if($nummers->insertNummer()) {
		echo "Nummer is toegevoegd";
	} else {
		echo "Nummer kon niet toegevoegd worden";
	}
}

?>

<div class="album">
<div class="form">
	<form action="" method="POST">
	<label>Selecteer album: </label>
	<select name="album">
<?php
	$music = new Music();
	$music->selectAlbums();
	
	foreach($music->getAlbums() as $album) {
?>
		<option value="<?php echo $album->getidAlbum();?>"><?php echo $album->getAlbumnaam();?></option>	
<?php 
	}
?>
	</select>
	</br>
		<label>Naam van nummer: </label>
		<input id="nummernaam" type="text" name="nummernaam" value="">
	<br>
		<label>Lengte van nummer: </label>
		<input id="lengte" type="text" name="lengte" value="">
	<br>
		<button type="submit" name="knop">Nummer toevoegen</button>
</form>
</div>
</div>
	<a href="/joey/main.php">Terug naar Albums</a>
</body>
</html>