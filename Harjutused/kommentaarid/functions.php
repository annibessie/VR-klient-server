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

function add(){
	global $connection;
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty($_POST['comment'])) {
		$errors[] = "Please enter your comment";
	} else{
		$comment = (mysqli_real_escape_string($connection, $_POST['comment']));
	}
	if (!isset($errors)){
		$sql = "INSERT INTO akitt_comments (comment) VALUES ('$comment')";
		mysqli_query($connection, $sql) or die ($sql . " - " . mysqli_error($connection));
        }
	}
    include_once('add.html');

}

function results() {
    global $connection;
		$commentsresult=array(); 
		$query= "SELECT id, comment FROM akitt_comments";
		$result=mysqli_query($connection, $query) or die ("$query - ".mysqli_error($connection));
while ($row = mysqli_fetch_assoc($result)){
	$commentsresult[] = $row;
}
	
include_once("results.html");
	}

function main (){
include_once("main.html");
}

?>

