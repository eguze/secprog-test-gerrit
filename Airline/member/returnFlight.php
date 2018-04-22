<html>
<head>
	<title>Return Flight</title>
	<link rel="shortcut icon" href="../images/favicon.png" >
	<link rel="stylesheet" type="text/css" href="../css/slide.css">
	<link rel="stylesheet" type="text/css" href="../css/tablestyle.css">
	<script src="../js/confirm.js"></script>

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

	if (empty($_POST['code']))
		gotoInterface('../member.php');
	
	$_SESSION['code'] = $_POST['code'];
?>
		
</head>

<div id="header">
<h2> |
&nbsp;  Flight &nbsp; | 
&nbsp;  Contact Us &nbsp; | 
&nbsp;&nbsp; <?php include('../include/valid2.php'); ?></h2>
</div>

<body id="slider">
	<figure>
		<img src="../images/langkawi.jpg" alt="" >
		<img src="../images/legoland.jpg" alt="" >
		<img src="../images/a-farmosa.jpg" alt="" >
		<img src="../images/borneohighland.jpg" alt="" >
		<img src="../images/Taman-Selera.jpg" alt="" >
	</figure>
	
	<div id="nn">
	<div id="nn2">

	<?php	
	{		
		//SQL STATEMENT
		$sql = "SELECT * FROM flight WHERE Origin='".$_SESSION['dest']."' and Destination='".$_SESSION['origin']."'";

		//SQL STATEMENT END
		$db=mysql_select_db($database, $con);

		$result=mysql_query($sql);
		if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
		}
		
		$row = mysql_fetch_row($result);
		//session_register
		$_SESSION['origin1'] = $row[1];
		$_SESSION['dest1'] = $row[2];
		$_SESSION['price'] = $_POST['fare'] * $_SESSION['people'];
		?>
		<h3>Return Flight - <?php echo $_SESSION['return']?></h3>
		
		<p>Adults: <?php echo $_SESSION['adults'] ?></p>
		<p>Kids: <?php echo $_SESSION['kids'] ?></p>
		<p>Infants: <?php echo $_SESSION['infants'] ?></p>
		<p>Total Depart Ticket Price: RM<?php printf (" %4.2f", $_SESSION['price']) ?></p>
		<table id="rounded-corner">
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
				<th>Choose Flight</th>
				</tr>
		
		<?php
		
				$x=1;
				$sql1="SELECT * FROM flight WHERE Origin LIKE '".$_SESSION['origin1']."' and Destination LIKE '".$_SESSION['dest1']."'";
				$result1=mysql_query($sql1);
		?>		<form method="POST" action="addOn.php"> 	<?php
		
				while($row1 = mysql_fetch_row($result1)) { ?>
				<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $row1[0]; ?></td>
				<td><?php echo $row1[1]; ?></td>
				<td><?php echo $row1[2]; ?></td>
				<td><input type="radio" name="fare" value="<?php echo $row1[3]; ?>" /><?php echo $row1[3]; ?></td>
				<td><input type="radio" name="fare" value="<?php echo $row1[4]; ?>"/><?php echo $row1[4]; ?></td>
				<td><?php echo $row1[5]; ?></td>
				<td><?php echo $row1[6]; ?></td>
				<td><?php echo $row1[7]; ?></td>
				<td><input type="radio" name="code1" value="<?php echo $row1[0]; ?>" /></td>
				</tr>
			<?php $x = $x+1;
		}
		?>		</table><br>
				<input name="next" type="submit" value="Next Step" />
		</div>
		</div>
		<div id="footer">
			Copyright © localairlines.com
		</div>	
		<?php } ?>
</body>
</html>