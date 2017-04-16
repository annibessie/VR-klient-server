<?php require_once('head.html');?>
<?php $pildid=array (
			"pildid/nameless1.jpg",
			"pildid/nameless2.jpg",
			"pildid/nameless3.jpg",
			"pildid/nameless4.jpg",
			"pildid/nameless5.jpg",
			"pildid/nameless6.jpg");

if (!empty($_GET["mode"])){
	$page = $_GET["mode"];
} else {
	$page = "pealeht";
}

switch ($page) {
	case "galerii":
		require('galerii.html');
		break;
	case "vote":
		require('vote.html');
		break;
	case "tulemus":
		require('tulemus.html');
		break;
	default:
		require('pealeht.html');
		break;
}
?>
<?php require_once('foot.html');?>
