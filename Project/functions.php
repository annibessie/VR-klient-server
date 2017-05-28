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

function main(){
	include_once('views/main.html');
}

function about(){
	include_once('views/about.html');
}

function register(){
    global $connection;
    
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (empty($_POST['user'])){
            $errors[] = "Please enter username";
        } else {
            $user = mysqli_real_escape_string($connection, $_POST['user']);
            $sql = "SELECT * FROM akitt_users WHERE user = '$user'";
            $result = mysqli_query($connection, $sql) or die ($sql . " - " . mysqli_error($connection));
            if (mysqli_num_rows($result)>0){
                $errors[] = "This username is already taken";
            }
        }
        if (empty($_POST['pass'])){
            $errors[] = "Please enter password";
        } else {
            $pass = SHA1(mysqli_real_escape_string($connection, $_POST['pass']));
        }
        if (empty($_POST['email'])){
            $errors[] = "Please enter your e-mail";
        } else {
            $email = mysqli_real_escape_string($connection, $_POST['email']);
        }   
        if (!empty($_POST['name'])){
            $name = mysqli_real_escape_string($connection, $_POST['name']);
        } else {
            $name = "Please enter your full name";
        }
        if (!isset($errors)){
            $sql = "INSERT INTO akitt_users (user, pass, email, name) VALUES ('$user', '$pass', '$email', '$name')";
            mysqli_query($connection, $sql) or die ($sql . " - " . mysqli_error($connection));
        }
    }
    include_once('views/register.html');
}

function login(){
    global $connection;
    if (isset($_SESSION['user'])){
        header("Location: ?page=about");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (empty($_POST['user'])){
            $errors[] = "Please enter username";
        } else if (empty($_POST['pass'])){
            $errors[] = "Please enter password";
        } else {
            $user = mysqli_real_escape_string($connection, $_POST['user']);
            $pass = mysqli_real_escape_string($connection, $_POST['pass']);
            $sql = "SELECT * FROM akitt_users WHERE user = '$user' AND pass= SHA1('$pass')";
            $result = mysqli_query($connection, $sql) or die("$sql - ".mysqli_error($connection));
            if (mysqli_num_rows($result)>0){
                $_SESSION['user'] = $user;
                header("Location: ?page=about");
            } else {
                $errors[] = "Wrong username or password";
            }
        }
    }
	include_once('views/login.html');
}


function logout(){
    session_destroy();
    header("Location: ?");
}

function add(){
    global $connection;
    
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (empty($_POST['dogname'])){
            $errors[] = "Please enter dog's full name";
        } else {
			$dogname = (mysqli_real_escape_string($connection, $_POST['dogname']));
        }
        if (empty($_POST['owner'])){
            $errors[] = "Please enter owner's full name";
        } else {
            $owner = (mysqli_real_escape_string($connection, $_POST['owner']));
        }
        if (empty($_POST['gender'])){
            $errors[] = "Please enter dog's gender";
        } else {
            $gender = mysqli_real_escape_string($connection, $_POST['gender']);
        }   
		if (empty($_POST['result'])){
            $errors[] = "Please enter dog's SPAID test result";
        } else {
            $result = mysqli_real_escape_string($connection, $_POST['result']);
		}
		if (empty($_POST['country'])){
            $errors[] = "Please enter your country";
        } else {
            $country = mysqli_real_escape_string($connection, $_POST['country']);
		}
		if (!empty($_POST['comment'])){
            $comment = mysqli_real_escape_string($connection, $_POST['comment']);
        } else {
            $comment = "";
		}
        if (!isset($errors)){
            $sql = "INSERT INTO akitt_spaid (dogname, owner, gender, result, country, comment) VALUES ('$dogname', '$owner', '$gender', '$result', '$country', '$comment')";
            mysqli_query($connection, $sql) or die ($sql . " - " . mysqli_error($connection));
        }
    }
    include_once('views/add.html');

}

function results() {
    global $connection;
		$spaidresult=array(); // Tühi massiiv
		$query= "SELECT id, dogname, owner, result, country, comment FROM akitt_spaid"; // Selekteerib andmebaasist võistluse kuvamiseks vajalikud andmed.
		$result=mysqli_query($connection, $query) or die ("$query - ".mysqli_error($connection));
while ($row = mysqli_fetch_assoc($result)){
	$spaidresult[] = $row;

}
	
	
	include_once("views/results.html");
	}

?>