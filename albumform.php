<?php
include("header.php");
include_once("php/album.php");

if(isset($_POST['knop'])) {
	extract($_POST);
	$album = new Album();
	$album->setAlbumnaam($albumnaam);
	$album->setArtiest($artiest);
	$album->setImageUrl($imageurl);
	if($album->insertAlbum()) {
		echo "Album is toegevoegd";
	} else {
		echo "Album kon niet toegevoegd worden";
	}
}
?>
<div class=form>
	<div class="album">
		<div class="form">
		<form action="" method="POST">
			<label>Naam van album: </label>
			<input id="albumnaam" type="text" name="albumnaam" value="">
		<br>
			<label>Naam van artiest: </label>
			<input id="artiest" type="text" name="artiest" value="">
		<br>
			<label>Album cover url: </label>
			<input id="imageurl" type="text" name="imageurl" value="">
			<button type="submit" name="knop">Album toevoegen</button>
		</form>
		</div>
	</div>
</div>


<a href="/joey/main.php">Terug naar Albums</a>
</body>
</html>