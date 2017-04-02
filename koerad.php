<?php
	$koerad= array(
		array("nimi" => "Bruno", "koeratoug"=> "Staffordshire bullterjer", "vanus" => 3, "varv"=> "punane", "manguasi"=>"pall"),
		array("nimi" => "Matu", "koeratoug"=> "Jack Russeli terjer", "vanus" => 4, "varv"=> "must-valge", "manguasi"=>"mänguhiir"),
		array("nimi" => "Mossu", "koeratoug"=> "Mops", "vanus" => 5, "varv"=> "beež", "manguasi"=>"suss"),
		array("nimi" => "Berry", "koeratoug"=> "Vene toy terjer", "vanus" => 1, "varv"=> "must", "manguasi"=>"nöör")
		);
	foreach($koerad as $koer){
		include 'koerastiil.html';
	}
?>

			