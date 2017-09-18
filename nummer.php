<?php
include_once("header.php");
include_once("php/music.php");
include_once("php/nummers.php");
$album = $_GET["album"];

$music = new Music();
$image = new Music();
$image->selectAlbumsByAlbumId($album);
$music->selectNummersByAlbumId($album);

if(isset($_POST['verwijder'])) {
	extract($_POST);
	$verwijder = $_POST['verwijder'];
	$nummer = new Nummers();
	if($nummer->verwijderNummer($verwijder)) {
		echo "Nummer is verwijderd";
		/*refresh database entries */
		$music = new Music();
		$music->selectNummersByAlbumId($album);
	} else {
		echo "Nummer kon niet verwijderd worden";
	}
}

?>
<div class="album">
	<div class="row">
		<div class="col-2">
		<?php foreach($image->getAlbums() as $cover) {
		?>
			<img src="<?php echo $cover->getImageUrl(); ?>">
		
		</div>
		<div class="col-4">
			<p>Album: <?php echo $cover->getAlbumnaam(); ?></p>
		</div>
		<div class="col-4">
			<p>Artiest: <?php echo $cover->getArtiest(); ?></p>
		</div>
	</div>
		<?php 
		}
		?>
		<?php
		foreach($music->getNummers() as $nummers) {
		?>
		<div class="row">	
			<div class="col-2">
			</div>
			<div class="col-4">
				<p>Nummer: <?php echo $nummers->getNummernaam();?></p>
			</div>
			<div class="col-3">
				<p>Lengte: <?php echo $nummers->getLengte();?></p>
			</div>
			<form action="" method="POST">
				<div class="col-3">			
					<button type="submit" name="verwijder" value="<?php echo $nummers->getidNummer();?>">Verwijder nummer</button>
				</div>
			</form>
		</div>
		<?php
		}
?>
	</div>

<a href="/joey/main.php">Terug naar Albums</a>
</body>
</html>