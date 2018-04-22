
<html>
<head>
	<title>Flights Database</title>
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
	<h1>Flights</h1></div>
	
	<div id="wrapper">
	<div id="bg1">
	<?php include('../include/valid2.php'); ?>	
	<h3>Flights Database Information</h3><hr><br>

	<form action="<?php $_SELF ?>" method="POST">
		<input type="button" name="submit" value=" Add New Flight " onclick="window.location.href='addFlight.php'"/><br><br>
		<input type="text" name="sBox" placeholder="Search Flight By" />
		<input type="radio" name="search" value="o" checked />Origin
		<input type="radio" name="search" value="d" />Destination
		| <input type="submit" name="submit1" value=" Search Flight "/>
	</form>
	
	<p>
	<table id="rounded-corner" align="center">
		<tr>
			<th>No.</th>
			<th>Code</th>
			<th>Origin</th>
			<th>Destination</th>
			<th>Low Fare (RM)</th>
			<th>Premium Flex (RM)</th>
			<th>Depart Time</th>
			<th>Arrive Time</th>
			<th>Duration</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
	<?php 
  	$x=0;
	
	if(empty($_POST['sBox'])) {
		$sql="SELECT * FROM flight ORDER BY Code ASC";
	} else {	
		$search = $_POST['sBox'];
		$by = $_POST['search'];
		
		if($by == 'o') {
			$sql="SELECT * FROM flight WHERE Origin LIKE '%$search%' ORDER BY Code ASC";
		} else {
			$sql="SELECT * FROM flight WHERE Destination LIKE '%$search%' ORDER BY Code ASC";		
		}
	}
	
	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	$x=1;
	while($row = mysql_fetch_row($result))  { ?>
	<tbody>
	<tr>
    <td><?php echo $x; ?></td>
    <td><?php echo $row[0]; ?></td>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
    <td><?php echo $row[4]; ?></td>
    <td><?php echo $row[5]; ?></td>
    <td><?php echo $row[6]; ?></td>
    <td><?php echo $row[7]; ?></td>
	<td><a href="<?php echo 'editFlightA.php?code='.$row[0]; ?>" ><img src="../images/update.png" width="30px" height="30px" value="Update" alt="Update" title="Update" /></a></td>
	<td><a href="<?php echo 'deleteFlightA.php?code='.$row[0]; ?>" onClick="return conf('An email will be send to all customers to notify about the flight deletion.\nClick \'Cancel\' to terminate the deletion process');" ><img src="../images/delete.png" width="30px" height="30px" value="Delete" alt="Delete" title="Delete" /></a></td>
	</tr>
    <tbody>  
	<?php $x=$x+1; } ?>
	</table>
	</p>
</body>
</html>