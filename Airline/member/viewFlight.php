<head>
<title>Flight Database</title>
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

	mysql_select_db($database, $con);

	if ($_SESSION['usertype']!='M'){
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
	<h1>Your Flight Information</h1>
	<p><table id="rounded-corner" align="center">
	<tr>
	<th>No.</th>
	<th>Transaction No.</th>
	<th>Flight Code</th>
	<th>Depart Date</th>
	<th>Adults</th>
	<th>Kids</th>
	<th>Infants</th>
	<th>Total Price (RM)</th>
	<th>Payment Method</th>
	<th>Delete Flight</th>
	</tr>
	<tbody>
	<?php 
	$sql="SELECT * FROM infoflight WHERE Email='".$_SESSION['email']."'";
	
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
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
    <td><?php echo $row[4]; ?></td>
    <td><?php echo $row[5]; ?></td>
    <td><?php echo $row[6]; ?></td>
    <td><?php printf ("%4.2f",$row[7]); ?></td>
    <td><?php echo $row[8]; ?></td>
	<td><a href="<?php echo 'deleteFlight.php?date='.$row[3].'&trans='.$row[0]; ?>" onClick="return conf('Delete booking flight?')" ><img src="../images/delete.png" width="30px" height="30px" value="Delete" alt="Delete" title="Delete" /></a></td>
	</tr>

	<?php 
	$x=$x+1; } 
	?>
	</tbody>
	</table></p>

	<?php
	if(isset($_GET['search'])) {
	?>
	<br>
	<h3>Search Complete...</h3><hr><br>
	<form name="searchForm" method="GET" action="viewFlight.php">
	<input type="textbox" name="search" maxlength="5" size="10" placeholder="Flight Code" />
	<input type="submit" name="find" value=" Search Now " />
	</form>
	
	<p><table id="rounded-corner" align="center">
	<tr>
	<th>No.</th>
	<th>Flight Code</th>
	<th>Origin</th>
	<th>Destination</th>
	<th>Low Fare</th>
	<th>Premium Flex</th>
	<th>Depart Time</th>
	<th>Arrive Time</th>
	<th>Duration</th>
	</tr>
	<tbody>
	<?php 
	$sql1="SELECT * FROM flight WHERE Code='".$_GET['search']."'";
	$result1=mysql_query($sql1);
	if (!$result1) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	
	$y=1;
	while($row1 = mysql_fetch_row($result1))  { ?>
	<tr>
    <td><?php echo $y; ?></td>
    <td><?php echo $row1[0]; ?></td>
    <td><?php echo $row1[1]; ?></td>
    <td><?php echo $row1[2]; ?></td>
    <td><?php echo $row1[3]; ?></td>
    <td><?php echo $row1[4]; ?></td>
    <td><?php echo $row1[5]; ?></td>
    <td><?php echo $row1[6]; ?></td>
    <td><?php echo $row1[7]; ?></td>
	</tr>
	
	<?php $y=$y+1; } ?>
	</tbody>
	</table></p>
	<?php 
		if($y == 1)
		{
			echo "<br>Unavailable or no flight information can be found. Please try again.";			
		}
	} else { ?>
	<br>
	<form name="searchForm" method="GET" action="viewFlight.php">
	<h3>Use Search Box Below For More Flight Information!</h3>
	<input type="textbox" name="search" maxlength="5" size="10" placeholder="Flight Code" />
	<input type="submit" name="find" value=" Search Now " />
	</form>
	<?php } ?>
</body>
</html>
