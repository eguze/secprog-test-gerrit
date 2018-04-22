
<?php
	include('function.php');
	session_start();
	unset($_SESSION['UserID']);
	unset($_SESSION['username']);
	unset($_SESSION['usertype']);
	unset($_SESSION['interface']);
	session_destroy();
	setcookie("email", "", time()-3600);
	gotoInterface('../index.php');
?>