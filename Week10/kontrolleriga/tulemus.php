<?php
$pildid = array (
		"pildid/nameless1.jpg",
			"pildid/nameless2.jpg",
			"pildid/nameless3.jpg",
			"pildid/nameless4.jpg",
			"pildid/nameless5.jpg",
			"pildid/nameless6.jpg");
$teade="";

if (!empty($_SESSION["voted_for"])){
		$teade = "Oled oma valiku juba teinud! Valisid oma lemmikuks: <br> <img src=\"".$_SESSION["voted_for"]."\"";
} else if (empty($_POST)){
		$teade = "Oma lemmiku hääletamiseks vali pilt!";
} else {
		$teade = "Midagi läks valesti, sellist pilti ei eksisteeri.";
		foreach($pildid as $pilt){
			if ($pilt == $_POST["pilt"]){
				$_SESSION["voted_for"] = $_POST["pilt"];
				$teade = "Suur tänu hääletamast, Sinu eelistus on kirjas!";
			}
		}
}?>


<h3>Valiku tulemus</h3>
<p><?php echo $teade;?></p>
<br><br><br>
<a href="sessionend.php">Lõpeta session!</a>

