<?php 
$pildid = array (
			"pildid/nameless1.jpg",
			"pildid/nameless2.jpg",
			"pildid/nameless3.jpg",
			"pildid/nameless4.jpg",
			"pildid/nameless5.jpg",
			"pildid/nameless6.jpg");

if (empty($_SESSION["voted_for"])):?>
	
<h3>Vali oma lemmik :)</h3>
	<form action="?mode=tulemus" method="POST">
			
		<?php foreach ($pildid as $pilt): ?>
		<p>
			<label for =<?php echo "\"".$pilt."\"";?>>
				<img src=<?php echo "\"".$pilt."\"";?> alt=<?php echo "\"".$pilt."\""?> height="100" />
			</label>
			<input type="radio" value=<?php echo "\"".$pilt."\"";?> name="pilt"/>
		</p>
		
		<?php endforeach;?>

		<br/>
		<input type="submit" value="Valin!"/>
	</form>

<?php else:
	include_once("tulemus.php");
	endif;
?>
