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

	$department=$_POST['department'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$title=$_POST['title'];
	$surname=$_POST['surname'];
	$dob=$_POST['dob'];
	$ic=$_POST['ic'];
	$nationality=$_POST['nationality'];
	$address=$_POST['address'];
	$state=$_POST['state'];
	$town=$_POST['town'];
	$zip=$_POST['zip'];
	$hp=$_POST['hp'];
	$pic=$_POST['pic'];

	$sql="UPDATE tbluser SET Title='".$title."', Department='".$department."', Email='".$email."', Name='".$name."', Surname='".$surname."', DateOfBirth='".$dob."', ICPassport='".$ic."', Nationality='".$nationality."', Address='".$address."', State='".$state."', TownCity='".$town."', PostcodeZIP='".$zip."', MobilePhone='".$hp."', ImgPath='".$pic."' WHERE Email='".$email."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
?> 
	<script>history.go(-2);</script>
