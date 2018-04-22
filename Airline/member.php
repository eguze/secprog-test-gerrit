<html>
<head>
	<title>Member Details</title>
	<link rel="shortcut icon" href="images/favicon.png" >
	<link rel="stylesheet" type="text/css" href="css/design2.css">
	<script src="js/button.js"></script>

	<?php
		session_start();
		include('setting.php');
		$test=$myurl.'include/config.php';
		include($test);
		include('include/function.php');

		$db=mysql_select_db($database, $con);
		$sql="SELECT * FROM tbluser where Email='".$_SESSION['email']."'";
		$result=mysql_query($sql);
		$row = mysql_fetch_row($result);

		if ($row[13]!='M'){
		$to=$_SESSION['interface'];
		gotoInterface($to);
	}
	?>
</head>

<body align="center">
	<img src="images/logo.png" width="180px" height="180px" style="position: absolute; left: 50px; top:15px;" />
	<div id="center" align="center">
	<div id="box2">
	<?php include('include/valid.php'); ?></div>
	</div><br>

	<table align="center">
	<tr>
	<td>
	<img src="images/admin.png" width="100" height="80"></td>
	<td>
	<h1>Welcome Member!</h1></td>
	<td>
	<img src="images/fly.gif" width="150" height="90"></td>
	</tr>
	</table><hr>
	
	<br><a id="image" href="#"><img onClick="openWin();" border="4" src="<?php echo $row[16]; ?>" width="190" height="250" alt="User Profile" title="User Profile" /></a>
		
	<table align="center">
		<tr><td id="p">
				<div id="box"><br>
				<table style="border-radius: 0.8em; position:absolute; top:600px;" align="center" border="0" bgcolor="lightblue">
					<tr>
					<th colspan="2"><h2><u>Personal Details</u></h2></th>
					</tr>
					<tr>
						<td width="150"> Name: </td>
						<td width="150"> <?php echo $row[3]; ?> </td>
					</tr>
					<tr>
						<td width="150"> Surname: </td>
						<td width="150"> <?php echo $row[4]; ?> </td>
					</tr>
					<tr>
						<td width="150"> Title:  </td>
						<td width="150"> <?php echo $row[2]; ?> </td>
					</tr>
					<tr>
						<td width="150"> IC/Passport: </td>
						<td width="150"> <?php echo $row[6]; ?> </td>
					</tr>
					<tr>
						<td width="150"> Email: </td>
						<td width="150"> <?php echo $row[0]; ?> </td>
					</tr>
					<tr>
						<td width="150"> Date of Birth: </td>
						<td width="150"> <?php echo $row[6]; ?> </td>
					</tr>
					<tr>
						<td width="150"> User Type: </td>
						<td width="150"> Member </td>
					</tr>
					<tr>
						<td width="150"> Nationality: </td>
						<td width="150"><?php echo $row[7]; ?></td>
					</tr>
			<tr>
				<td> Address: </td>
				<td> <?php echo $row[8]; ?> </td>
			</tr>
			<tr>
				<td> State: </td>
				<td> <?php echo $row[9]; ?> </td>
			</tr>
			<tr>
				<td> Town/City: </td>
				<td> <?php echo $row[10]; ?> </td>
			</tr>
			<tr>
				<td> Postcode/ZIP: </td>
				<td> <?php echo $row[11]; ?> </td>
			</tr>
			<tr>
				<td> Mobile Phone: </td>
				<td> <?php echo $row[12]; ?> </td>
			</tr>
				</table><br>
				
				</div>
				</td>
			
		<td align="center" id="p">
			
			<div id="box">
					<div id="board">
					<a href="member/<?php echo 'edit.php?email='.$row[0];?>">Update Self Information</a></div><br>
					<div id="board">
					<a href="member/searchFlight.php">Book Flight Ticket</a></div><br>
					<div id="board">
					<a href="member/<?php echo 'viewFlight.php?email='.$row[0];?>">Flights Depart Information</a></div><br>	
			
			</div>
		</td></tr></table>
		<br><br>
		<hr>
		
</body>
</html>