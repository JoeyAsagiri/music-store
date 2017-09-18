<?php
include_once("header.php");
?>
<div class="album">
<?php
	include_once("php/music.php");
	include_once("php/db.php");
	$music = new Music();
	$music->selectAlbums();
	
	foreach($music->getAlbums() as $album) {
		?>	
		<div class="row">		
			<div class="col-2">				
				<img src="<?php echo $album->getImageUrl();?>">
			</div>
			<div class="col-4">
				<p>Album: <?php echo $album->getAlbumnaam();?></p>
			</div>
			<div class="col-4">
				<p>Artiest: <?php echo $album->getArtiest();?></p>
			</div>
			<div class="col-2">
				<a href="/joey/nummer.php?album=<?php echo $album->getidAlbum();?>">Nummers</a>
			</div>
		</div>
<?php
	}
?>
</div>
<div class="row">
    <a href="/joey/albumform.php">Voeg nieuwe album toe</a>
     <a href="/joey/nummerform.php">Voeg nieuwe nummers toe</a>
</div>
</body>
</html>
