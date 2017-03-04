<!DOCTYPE html>
<html>
	<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	?>
	<head>
		<meta charset="utf-8" />
		<title> Pealkiri </title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	
	<body>
		<h1> Minu kodukas </h1>
		
		<h2> 2. katse luua kodukas </h2>
		
		<p> Lisan siia ka pildi. <p>
		
		<img src="lammas1.jpeg" alt="lammas" width="100" height="200">
		
		<div id="kuupaev"><script src="javascriptkodu.js"></script></div>
<?php
echo 'Current PHP version: ' .phpversion();
echo phpversion('tidy');
?>
	</body>
	
</html>


