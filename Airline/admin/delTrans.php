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

	if ($_SESSION['usertype']!='A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }

$trans=$_GET['trans'];
$code=$_GET['code'];
$email=$_GET['email'];

$sql="DELETE FROM infoflight WHERE Trans='".$trans."' AND Code='".$code."' AND Email='".$email."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
		?>
	
	<script type="text/javascript">history.go(-1);</script>

</head>

<body>
</body>
</html>