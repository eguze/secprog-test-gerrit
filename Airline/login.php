<?php 
	include('setting.php');
	$test=$myurl.'include/config.php';
	include($test);
	include('include/function.php');
	session_start();
?>

<html>
<head>
<title>Welcome to Local Airline</title>
<link rel="shortcut icon" href="images/favicon.png" >
<link rel="stylesheet" type="text/css" href="css/design.css">

</head>
<?php
if (isset($_SESSION['email'])){
	$to=$_SESSION['interface'];
	gotoInterface($to);
}
?>
<?php 
if (isset($_POST['txtUsername']))
{
	$email=$_POST['txtUsername']; //USER INPUT
	$pass=MD5($_POST['txtPassword']);
	//SQL STATEMENT
	$sql = "SELECT * FROM tbluser WHERE Email='".$email."' AND Password = '".$pass."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	
	$row = mysql_fetch_row($result);
	
	//session_register
	$_SESSION['email']=$row[0];
	$_SESSION['pass']=$row[1];
	$_SESSION['name']=$row[3];
	$_SESSION['usertype']=$row[13];
	
	$expire = time()+60*60*24*7;	// 7 days
	setcookie("email", "$row[0]", $expire);
	
	$sql1="SELECT interface FROM category WHERE UserType='".$row[13]."'";
	$result1=mysql_query($sql1);
	$row1 = mysql_fetch_row($result1);
	
	if (empty($row[0])){
		echo "	<div id='tile'>
				<h1>Login</h1></div>
	
				<div id='wrapper'>
				<div id='bg1'>";
		echo "No such user. Please login Again<br><br>";
		echo "</div></div>";
		header('Refresh: 2; URL=index.php');
	}else
	{
		$to=$row1[0];
		$_SESSION['interface']=$to;
		gotoInterface($to);
	}
}
else{		
	gotoInterface('index.php');
}
?>
</html>