<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	if(!empty($_SESSION["user"])){
		header("Location: ?page=loomad");
	} else {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_POST["user"] == ''|| $_POST["pass"] == ''){
						$errors = array();
						if(empty($_POST["user"])){
							$errors[] = "Palun sisesta kasutajanimi!";
						}
	
						if (empty($_POST["pass"]))
								$errors[]= "Palun sisesta parool";
						} else {
								$kasutaja = mysqli_real_escape_string ($connection, $_POST["user"]);
								$parool = mysqli_real_escape_string ($connection, $_POST["pass"]);
								$sql = "SELECT id FROM akitt_kylastajad WHERE username='$imelik' AND passw=sha1('$parool')";
								$result = mysqli_query($connection, $sql);
								$rida = mysqli_num_rows($result);
								if($rida) {
									$SESSION["user"] = $POST["user"];
									header("Location: ?page=loomad");
								} else {
									header("Location: ?page=login");
								}
			}
	} else {
	}
	}

	include('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
		
	// siia on vaja funktsionaalsust

	global $connection;
	
	if(empty($_SESSION["user"])) {
		header("Location: ?page=login");
	} else {	
	
	$sql = "SELECT DISTINCT `puur` FROM `akitt_loomaaed`";
	$result = mysqli_query($connection, $sql) or die ("$sql - ".mysqli_error($connection));
	$puurid = array();
	while ($puur = mysqli_fetch_assoc($result)){
		$puurid[$puur["puur"]] = array();
		$sql = "SELECT * FROM `akitt_loomaaed` WHERE puur=".$puur["puur"];
		$res = mysqli_query($connection, $sql)  or die ("$sql - ".mysqli_error($connection));
		while ($loomarida = mysqli_fetch_assoc($res)){
			$puurid[$puur["puur"]][]=$loomarida;
		}
	}
	}
	echo ("<pre>");
	print_r ($puurid);
	echo ("</pre>");

	include_once('views/puurid.html');
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	
	$errors=array();
	global $connection;
	if(!empty($_SESSION['username'])){
		include_once('views/login.html');
	} else {
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(in_array("",$_POST)){
				$errors[] = "Täida väljad!";
				include_once('views/loomavorm.html');
			} else {
					global $connection;
					upload('liik');
					$nimi=mysqli_real_escape_string($connection, $_POST['nimi']);
					$puur=mysqli_real_escape_string($connection, $_POST['puur']);
					$liik=mysqli_real_escape_string($connection, "pildid/".$_FILES["liik"]["name"]);
					$query ="INSERT INTO akitt_loomaaed (nimi, puur, liik ) values ('$nimi','$puur','$liik')";
					$result = mysqli_query($connection, $query) or die("Päring ebaõnnestus ".mysqli_error($connection));

				header('Location:loomaaed.php?page=loomad');
		}
		} else {
			include_once('views/loomavorm.html');
		}
	}
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>