<?php 

function connect_db() {
		global $connection;
		$host="localhost";
		$user="test";
		$pass="t3st3r123";
		$db="test";
		$connection = mysqli_connect($host, $user, $pass, $db) or die ("Cannot connect.".mysqli_error());
		mysqli_query($connection,"SET CHARACTER SET UTF8") or die ("Could not get database to UTF8".mysqli_error($connection));

}

function main(){
	include_once('views/main.html');
}

function about(){
	include_once('views/about.html');
}


?>