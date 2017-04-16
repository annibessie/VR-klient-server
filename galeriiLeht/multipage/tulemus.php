<?php require_once('head.html');?>
<h3>Valiku tulemus</h3>
<?php if (empty($_GET)) {
		echo "Oops, Sul jäi valik tegemata! Proovi uuesti. :)";
} else {
	echo "Valisid pildi nr " . $_GET["pilt"].". Suur tänu hääletamast!";
}?>
	
<?php require_once('foot.html');?>