<?php
session_start();

if (!isset($_SESSION["laigid"])){
	$_SESSION["laigid"] = array();
}

$liked = array("like");

$_SESSION["laigid"][$like]++;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta chraset="utf-8"/>
		<title>HTML</title>
	</head>
	<body>
		<?php foreach ($liked as $id=>$like):?>
		<p><?php echo $like; ?><input type="submit" value="like"><p>
		<?php endforeach;?>
		<pre><?php print_r($_SESSION)?></pre>
	</body>
</html>
