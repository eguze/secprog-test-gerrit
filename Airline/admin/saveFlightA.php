<?php 
	session_start();
	include('../setting.php');
	$test=$myurl.'../include/config.php';
	include($test);
	include('../include/function.php');

	if ($_SESSION['usertype']!='A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }

	$code=$_SESSION['code'];
	$origin=$_POST['origin'];
	$destination=$_POST['destination'];
	$low=$_POST['low'];
	$premium=$_POST['premium'];
	$depart=$_POST['depart'];
	$arrival=$_POST['arrive'];
	$duration=$_POST['duration'];

	$sql="UPDATE flight SET Origin='".$origin."', Destination='".$destination."', LowFare='".$low."', PremiumFlex='".$premium."', DepartTime='".$depart."', ArriveTime='".$arrival."', Duration='".$duration."' WHERE Code='".$code."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	
	gotoInterface('viewFlightA.php'); 
?> 
