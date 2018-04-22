<html>
<head>
<title>Member Update</title>
<link rel="shortcut icon" href="../images/favicon.png" >
<link rel="stylesheet" type="text/css" href="../css/design.css">
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

	$code = $_GET['code'];

	$sql="SELECT * FROM flight where Code='".$code."'";

	//SQL STATEMENT END
	$db=mysql_select_db($database, $con);

	$result=mysql_query($sql);
	if (!$result) {
    	echo 'Could not run query: ' . mysql_error();
    	exit;
	}
	$row = mysql_fetch_row($result);
	
	if ($_SESSION['usertype']!='A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to);
	}
	
	$_SESSION['code'] = $row[0];
?>

</head>

<body>
	<div id="tile">
	<h1>Update</h1></div>
	
	<div id="wrapper">
	<div id="bg1">
	<?php include('../include/valid3.php'); ?>
	<form name="form" method="post" action="saveFlightA.php">
		<h3>Update Flight Details</h3><hr>
		<table border="0">
			<tr>
				<td> Code: </td>
				<td> <?php echo $row[0]; ?> </td>
			</tr>
			<tr>
				<td> Origin: </td>
				<td> <select name="origin">
				<option value="<?php echo $row[1]; ?> "><?php echo $row[1]; ?> </option>
				<option value="Alor Setar (AOR)">Alor Setar(AOR)</option>
				<option value="Bintulu (BTU)">Bintulu(BTU)</option>
				<option value="Johor Bahru(JHB)">Johor Bahru(JHB)</option>
				<option value="Kota Bahru(KBR)">Kota Bahru(KBR)</option>
				<option value="Kota Kinabalu(BKI)">Kota Kinabalu(BKI)</option>
				<option value="Kuala Lumpur(KUL)">Kuala Lumpur(KUL)</option>
				<option value="Kuala Terengganu(TGG)">Kuala Terengganu(TGG)</option>
				<option value="Kuching(KCH)">Kuching(KCH)</option>
				<option value="Labuan(LBU)">Labuan(LBU)</option>
				<option value="Langkawi(LGK)">Langkawi(LGK)</option>
				<option value="Miri(MYY)">Miri(MYY)</option>
				<option value="Penang(PEN)">Penang(PEN)</option>
				<option value="Sandakan(SDK)">Sandakan(SDK)</option>
				<option value="Sibu(SBW)">Sibu(SBW)</option>
				<option value="Tawau(TWU)">Tawau(TWU)</option>
				</select></td>
			</tr>
			<tr>
				<td> Destination: </td>
				<td> <select name="destination">
				<option value="<?php echo $row[2]; ?> "><?php echo $row[2]; ?> </option>
				<option value="Alor Setar (AOR)">Alor Setar(AOR)</option>
				<option value="Bintulu (BTU)">Bintulu(BTU)</option>
				<option value="Johor Bahru(JHB)">Johor Bahru(JHB)</option>
				<option value="Kota Bahru(KBR)">Kota Bahru(KBR)</option>
				<option value="Kota Kinabalu(BKI)">Kota Kinabalu(BKI)</option>
				<option value="Kuala Lumpur(KUL)">Kuala Lumpur(KUL)</option>
				<option value="Kuala Terengganu(TGG)">Kuala Terengganu(TGG)</option>
				<option value="Kuching(KCH)">Kuching(KCH)</option>
				<option value="Labuan(LBU)">Labuan(LBU)</option>
				<option value="Langkawi(LGK)">Langkawi(LGK)</option>
				<option value="Miri(MYY)">Miri(MYY)</option>
				<option value="Penang(PEN)">Penang(PEN)</option>
				<option value="Sandakan(SDK)">Sandakan(SDK)</option>
				<option value="Sibu(SBW)">Sibu(SBW)</option>
				<option value="Tawau(TWU)">Tawau(TWU)</option>
				</select></td>
			</tr>
			<tr>
				<td> Low Fare: </td>
				<td> <input type="text" name="low" value="<?php echo $row[3]; ?>" required /></td>
			</tr>
			<tr>
				<td> Premium Flex:  </td>
				<td> <input type="text" name="premium" value="<?php echo $row[4]; ?>" required /></td>
			</tr>		
			<tr>
				<td> Depart Time: </td>
				<td> <input type="text" name="depart" value="<?php echo $row[5]; ?>" required /></td>
			</tr>
			<tr>
				<td> Arrive Time:  </td>
				<td> <input type="text" name="arrive" value="<?php echo $row[6]; ?>" required /> </td>
			</tr>
			<tr>
				<td> Duration: </td>
				<td> <input type="text" name="duration" value="<?php echo $row[7]; ?>" required /> </td>
			</tr>
		</table>	
<hr>	
			<tr>
				<br>
				<td><input type="submit" onClick="return conf('Update Flight?');" name="Save" value="Save" /></td>
				<td><input type="Reset" name="Clear" value="Clear" /></td>
			</tr>
	</form>
	</div></div>
</body>
</html>
