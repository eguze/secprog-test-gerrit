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

$code=$_GET['code'];
echo 'You are going to delete Flight Information Code '.$code.'<br><br>';

$sql="DELETE FROM flight where Code='".$code."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
		$to='../admin/viewFlightA.php';
		gotoInterface($to);
?>
</head>

<body>
</body>
</html>