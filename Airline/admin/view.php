
<html>
<head>
<title>User Database</title>
<link rel="shortcut icon" href="../images/favicon.png" >
<link rel="stylesheet" type="text/css" href="../css/design.css">
<link rel="stylesheet" type="text/css" href="../css/tablestyle.css">
<script src="../js/confirm.js"></script>

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
?>

</head>

<body>
	<div id="tile">
	<h1>View</h1></div>
	
	<div id="wrapper">
	<div id="bg1">
	<?php include('../include/valid2.php'); ?>
	<h3>User Database</h3><hr>
	<p>
	<table id="rounded-corner" align="center">
	<tr>
	<th>No</th>
    <th>Email</th>
    <th>Name</th>
    <th>UserType</th>
    <th>ID Worker (Admin)</th>
    <th>Department (Admin)</th>
    <th>Update</th>
    <th>Delete</th>
	</tr>
	<tbody>
	<?php 
  	$x=0;
	$sql="SELECT * FROM tbluser ORDER BY UserType ASC";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	$x=1;
	while($row = mysql_fetch_row($result))  { ?>
	<tr>
    <td><?php echo $x; ?></td>
    <td><?php echo $row[0]; ?></td>
    <td><?php echo $row[3]; ?></td>
    <td><?php echo $row[13]; ?></td>
    <td><?php echo $row[15]; ?></td>
    <td><?php echo $row[14]; ?></td>
	
    <td>
	<?php if($row[0] == $_SESSION['email']) {} else { ?>
	<a href="<?php echo 'editA.php?email='.$row[0]; ?>"><img src="../images/update.png" width="30px" height="30px" value="Update" alt="Update" title="Update" /></a>
	<?php } ?>
	</td>
    
	<td>
	<?php if($row[0] == $_SESSION['email']) {} else { ?>
	<a href="<?php echo 'deleteA.php?email='.$row[0]; ?>" onClick="return conf('Delete user?')" ><img src="../images/delete.png" width="30px" height="30px" value="Delete" alt="Delete" title="Delete" /></a>
	<?php } ?>
	</td>
	</tr>
  
	<?php $x=$x+1; } ?>
	</tbody>
	</table>
	</p>
</body>
</html>