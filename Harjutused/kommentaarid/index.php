<?php 
require_once('functions.php');
session_start();
connect_db();

$page="main";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}
include_once('main.html');

switch($page){
	case ('add'):
		add();
		break;
	case('results'):
		results();
		break;
	default:
		main();
		break;
}
?>