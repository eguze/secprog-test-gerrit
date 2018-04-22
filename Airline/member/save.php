<html>
<head>
<title>Forwarding...</title>
<link rel="shortcut icon" href="../images/favicon.png" >

<?php 
	session_start();
	include('../setting.php');
	$test=$myurl.'../include/config.php';
	include($test);
	include('../include/function.php');

	if ($_SESSION['usertype']!='M'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }

	$email1=$_SESSION['email'];
	$email=$_POST['email'];
	$title=$_POST['title'];
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$dob=$_POST['dob'];
	$ic=$_POST['ic'];
	$nationality=$_POST['nationality'];
	$address=$_POST['address'];
	$state=$_POST['state'];
	$town=$_POST['town'];
	$zip=$_POST['zip'];
	$hp=$_POST['hp'];

	$sql="UPDATE tbluser SET Title='".$title."', Email='".$email."', Name='".$name."', Surname='".$surname."', DateOfBirth='".$dob."', ICPassport='".$ic."', Nationality='".$nationality."', Address='".$address."', State='".$state."', TownCity='".$town."', PostcodeZIP='".$zip."', MobilePhone='".$hp."', UserType='".$_SESSION['usertype']."' WHERE Email='".$email1."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	//	echo "<h3>Information data have been updated!</h3><br>";
		$to='../member.php';
		gotoInterface($to);
?>

</head>

<body>
</body>
</html>