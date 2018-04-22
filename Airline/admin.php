<html>
<head>
	<title>Admin Details</title>
	<link rel="shortcut icon" href="images/favicon.png">
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

		if ($row[13]!='A'){
			$to=$_SESSION['interface'];
			gotoInterface($to);	}
	?>
</head>

<body >
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
	<h1>Welcome Admin!</h1></td>
	<td>
	<img src="images/fly.gif" width="150" height="90"></td>
	</tr>
	</table><hr>
	
	<br><a id="image" href="#"><img onClick="openWin();" border="4" src="<?php echo $row[16]; ?>" width="190" height="250" alt="User Profile" title="User Profile" /></a>
	
	<table align="center">
		<tr><td id="p">
				<div id="box">
				<table align="center" border="0" bgcolor="lightblue" style="border-radius: 0.8em">
					<tr>
					<th colspan="2"><h2><u>Personal Details</u></h2></th>
					</tr>
					<tr>
						<td width="150"> ID Worker: </td>
						<td width="150"> <?php echo $row[15]; ?> </td>
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
						<td width="150"> IC Number: </td>
						<td width="150"> <?php echo $row[6]; ?> </td>
					</tr>
					<tr>
						<td width="150"> Department: </td>
						<td width="150"> <?php echo $row[14]; ?> </td>
					</tr>
					<tr>
						<td width="150"> Mobile Phone: </td>
						<td width="150"> <?php echo $row[12]; ?> </td>
					</tr>
					<tr>
						<td width="150"> User Type: </td>
						<td width="150"> Admin </td>
					</tr>
				</table><br>
				</div>
				</td>
			
		<td align="center" id="p">
			<div id="box">
					<div id="board">
					<a href="admin/<?php echo 'editA.php?email='.$row[0];?>">Update Self Information</a></div><br>
					<div id="board">
					<a href="admin/newAdmin.php">Create New Admin Account</a></div><br>
					<div id="board">
					<a href="admin/viewFlightA.php">View Flights Database</a></div><br>
					<div id="board">
					<a href="admin/view.php">View Users Database</a></div><br>
					<div id="board">
					<a href="admin/transaction.php">View Customers Transaction</a></div>
			
			</div>
		</td></tr></table>
		<br><br>
		<hr>
		
</body>
</html>