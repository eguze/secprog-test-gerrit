<html>
<head>
<title>Deleting...</title>
<link rel="shortcut icon" href="../images/favicon.png" >
<?php
session_start();
include('../setting.php');
$test=$myurl.'../include/config.php';
include($test);
include('../include/function.php');
include('../include/valid2.php');

	if ($_SESSION['usertype']!='A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }

$email=$_GET['email'];
echo 'You are going to delete User with Email: '.$email.'<br>';

$sql="DELETE FROM tbluser where Email='".$email."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
		$to='../admin/view.php';
		gotoInterface($to);
?>
</head>

<body>
</body>
</html>