<?php require_once('head.html');?>

<h3>Fotod</h3>
	<div id="gallery">
		<?php $pildid=array (
			"pildid/nameless1.jpg",
			"pildid/nameless2.jpg",
			"pildid/nameless3.jpg",
			"pildid/nameless4.jpg",
			"pildid/nameless5.jpg",
			"pildid/nameless6.jpg");?>
	
	
		<?php foreach ($pildid as $pilt): ?>
		
		<img src="<?php echo $pilt; ?>" alt="<?php echo $pilt['alt'];?>" />
		
		<?php endforeach;?>
</div>

<?php require_once('foot.html');?>

