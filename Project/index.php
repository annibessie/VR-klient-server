<?php 
require_once('functions.php');
session_start();
connect_db();

$page="main";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('views/head.html');

switch($page){
	case('register'):
		register();
		break;
	case('login'):
		login();
		break;
	case('logout'):
		logout();
		break;
	case('add'):
		add();
		break;
	case('results');
		show_results();
		break;
	case('about'):
		about();
		break;
	default:
		main();
		break;

}

include_once('views/foot.html')
?>

