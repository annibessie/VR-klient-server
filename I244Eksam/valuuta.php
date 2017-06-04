<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Valuutakalkulaator</title>
	<h3>EUR-USD ja USD-EUR valuutakalkulaator</h3>
</head>
<body>
<form action="valuuta.php" method="POST">
<p>Mis summa väärtuses soovid raha vahetada?</p>
<input type="number" name="raha" value="<?php echo (isset($_POST['summa']) ? $_POST['summa'] : "") ?>"><br><br>
<p>Vali esialgne valuuta, mida soovid vahetada</p>
<input type="radio" name="vahetus" value="eur" <?php echo(isset($_POST['vahetus']) && $_POST['vahetus'] === 'EUR' ? "checked" : "" )?>>EUR<br>
<input type="radio" name="vahetus" value="usd"<?php echo(isset($_POST['vahetus']) && $_POST['vahetus'] === 'USD' ? "checked" : "" )?>>USD<br>
<input type="submit" value="Arvuta!">
</form>

</body>
</html>

<?php 
$kokku = "";
$kurss = 1.1109;

if ($_SERVER['REQUEST_METHOD']=='POST'){

if(empty($kokku)) {
$raha = htmlspecialchars($_POST['raha']);
$vahetus = htmlspecialchars($_POST['vahetus']);
if ($vahetus === 'eur'){
$arvutus = $raha*$kurss;
$kokku = $arvutus . "USD dollarit";
}else if($vahetus === 'usd') {
$arvutus = $raha/$kurss;
$kokku = $arvutus . "eurot";

}
}
}

echo "Tulemus: ". $kokku;
?>


