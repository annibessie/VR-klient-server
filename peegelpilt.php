<?php

$tekst = "peegelpilt";

$tekstipikkus = strlen($tekst);

echo $tekst;
echo "<br>";

for ($i=($tekstipikkus-1); $i>=0; $i--)
	
	echo ($tekst[$i]);
?>
