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

	if ($_SESSION['usertype']!='M'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }

	$date=$_GET['date'];
	$trans=$_GET['trans'];
	//echo '<br>You are going to delete Flight Information Date: '.$date.'<br>';

	$sql="DELETE FROM infoflight WHERE Date='".$date."' and Trans='".$trans."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
		?>
	
	<script type="text/javascript"> history.go(-1); </script>

</head>

<body>
</body>
</html>