<html>
<head>
<title>Change Password</title>
<link rel="shortcut icon" href="../images/favicon.png" >
<link rel="stylesheet" type="text/css" href="../css/design.css">
<script src="../js/confirm.js"></script>

<?php
	session_start();
	include('../setting.php');
	$test=$myurl.'../include/config.php';
	include($test);
	include('../include/function.php');

	if ($_SESSION['usertype'] != 'A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to); }
	
	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }
	
	if(isset($_POST['newP'])) {
		
		$oldP = MD5($_POST['oldP']);
		$newP = MD5($_POST['newP']);
		$conP = MD5($_POST['conP']);
		
		echo '<p>';
		include('../include/valid3.php');
		if($_SESSION['pass'] != $oldP){
			echo "<br><br>Old password does not match. Please try again.</p>";
			exit;
		}
		else
		{
			if($newP != $conP){
				echo "<br><br>New password confirmation fail. Please try again.</p>";
				exit; }
			else
			{
				$sql="UPDATE tbluser SET Password='".$newP."' WHERE Email='".$_SESSION['email']."'";
			
				//SQL STATEMENT END
				mysql_select_db($database, $con);

				$result=mysql_query($sql);
				if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;	}
				
				echo "<script>alert('Your password have been changed!'); history.go(-2); </script>";
				
				$_SESSION['pass'] = $newP;
			}
		}
	}
	else 
	{
	
?>

</head>

<body>
	<div id="tile">
	<h1>Update</h1></div>
	
	<div id="wrapper">
	<div id="bg1">
	
	<form name="form" method="POST" action="<?php $_SELF ?>">
	<?php include('../include/valid3.php'); ?>
	<h3>Change Password</h3>
	<hr>
		<table border="0">
			<tr>
				<td width="200"> Old Password: </td>
				<td> <input type="password" name="oldP" required /></td>
			</tr>
			<tr>
				<td width="200"> New Password: </td>
				<td> <input type="password" name="newP" required /></td>
			</tr>
			<tr>
				<td width="200"> Confirm Password: </td>
				<td> <input type="password" name="conP" required /></td>
			</tr>	
		</table>
		<br>
		<table>
		<td><input type="submit" onClick="return conf('Change password?');" name="Save" value="Save" /></td>
		<td><input type="Reset" name="Clear" value="Clear" /></td>
		</table>

	</form>
	<?php } ?>
</body>
</html>
