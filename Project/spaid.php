<?php
require_once('function.php');
session_start();
connect_db();

$page="header";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('head.html');

switch($page){
	case "login":
		logi();
	break;
	case "register":
		register();
	break;
	case "logout":
		logout();
	break;
	case "addData":
		add();
	break;
	case "browse":
		browse();
	break;
	default:
		include_once('head.html');
	break;
}

include_once('foot.html');

?>