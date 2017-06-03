<?php 
function connect_db() {
global $connection;
		$host="localhost";
		$user="test";
		$pass="t3st3r123";
		$db="test";
		$connection = mysqli_connect($host, $user, $pass, $db) or die ("Cannot connect - ".mysqli_error());
		mysqli_query($connection,"SET CHARACTER SET UTF8") or die ("Could not get database to UTF8 - ".mysqli_error($connection));
}

function add() {
global $connection;
	
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		if (empty($_POST[''])){
            $errors[] = "Please enter dog's full name";
        } else {
			$dogname = (mysqli_real_escape_string($connection, $_POST['dogname']));
        }
}