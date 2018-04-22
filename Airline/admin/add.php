<html>
<head>
<title>Processing...</title>
<link rel="shortcut icon" href="../images/favicon.png" >
</head>

<body>
<?php
	session_start();
	include('../setting.php');
	$test=$myurl.'../include/config.php';
	include($test);
	include('../include/function.php');

	if (empty($_POST['name'])){
	gotoInterface('index.php'); }
	
	if ($_SESSION['usertype']!='A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); }
	
	$row = array();
	$row[0] = $_POST['email']; 
	$row[1] = MD5($_POST['pass']);
	$row[2] = $_POST['title'];
	$row[3] = $_POST['name'];
	$row[4] = $_POST['surname'];
	$row[5] = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
	$row[6] = $_POST['ic'];
	$row[7] = $_POST['nationality'];
	$row[8] = $_POST['address1'].' '.$_POST['address2'];
	$row[9] = $_POST['state'];
	$row[10] = $_POST['town'];
	$row[11] = $_POST['zip'];
	$row[12] = $_POST['phone'];
	$row[13] = $_POST['department'];
	$row[14] = $_POST['id'];
	$row[15] = "profile_images/noPic.png";
	
	$db=mysql_select_db($database, $con);
	$sql="INSERT INTO tbluser (Email, Password, Title, Name, Surname, DateOfBirth, ICPassport, Nationality, Address, State, TownCity, PostCOdeZIP, MobilePhone, UserType, Department, IDWorker, ImgPath)
	VALUES('".$row[0]."', '".$row[1]."', '".$row[2]."', '".$row[3]."', '".$row[4]."', '".$row[5]."', '".$row[6]."', '".$row[7]."', '".$row[8]."', '".$row[9]."', '".$row[10]."', '".$row[11]."', '".$row[12]."', 'A', '".$row[13]."', '".$row[14]."', '".$row[15]."')";
	
	mysql_query($sql);
	gotoInterface('../admin.php');
?>
</body>
</html>