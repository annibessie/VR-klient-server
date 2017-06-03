<?php 
if (empty($_COOKIE["teine"])) {
setcookie ("teine", time(), time()+60*1);
	echo "Küpsis loodud!".time();
} else{
	echo "Küpsis oli olemas, väärtus oli: ".$_COOKIE["teine"];
	echo "<br/> Hetke aeg on:" .time();
}

$_COOKIE = $kypsis[];
?>