<html>
<head>
<title>New Flight Info</title>
<link rel="shortcut icon" href="../images/favicon.png" >
<link rel="stylesheet" type="text/css" href="../css/design.css">
<head>

<?php
	session_start();
	include('../setting.php');
	$test=$myurl.'../include/config.php';
	include($test);
	include('../include/function.php');

	if ($_SESSION['usertype']!='A'){
	$to=$_SESSION['interface'];
	gotoInterface("../".$to);
}

	if ($_COOKIE['email'] != $_SESSION['email'] ){
	gotoInterface('index.php'); 
	exit; }

	if(!empty($_POST['origin']))
{
	echo '<br>Flight Information Added Successfully<br><br>';
	
	$sql = "INSERT INTO flight (Origin, Destination, LowFare, PremiumFlex, DepartTime, ArriveTime, Duration) 
	VALUES ('".$_POST['origin']."', '".$_POST['dest']."', '".$_POST['low']."', '".$_POST['prem']."', '".$_POST['depart']."', '".$_POST['arr']."', '".$_POST['duration']."')";
	mysql_query($sql);
	
	gotoInterface("viewFlightA.php");
	
	}
	else {
?>

<body>
	<div id="tile">
	<h1>Register</h1></div>
	
	<div id="wrapper">
	<div id="bg1">
	<?php include('../include/valid2.php'); ?>
	
	<h3>Create New Flight Information</h3><hr><br>
	<form method="POST" action="<?php $_SELF ?>">
	<table>
    <tr>
    <td width="200">Origin: </td>
	<td><select name="origin" required />
	<option value="" selected>Please Choose
	<option value="Alor Setar (AOR)">Alor Setar (AOR)
	<option value="Bintulu (BTU)">Bintulu (BTU)
	<option value="Johor Bahru (JHB)">Johor Bahru (JHB)
	<option value="Kota Bharu (KBR)">Kota Bharu (KBR)
	<option value="Kota Kinabalu (BKI)">Kota Kinabalu (BKI)
	<option value="Kuala Lumpur (KUL)">Kuala Lumpur (KUL)
	<option value="Kuala Terengganu (TGG)">Kuala Terengganu (TGG)
	<option value="Kuching (KCH)">Kuching (KCH)
	<option value="Labuan (LBU)">Labuan (LBU)
	<option value="Langkawi (LGK)">Langkawi (LGK)
	<option value="Miri (MYY)">Miri (MYY)
	<option value="Penang (PEN)">Penang (PEN)
	<option value="Sandakan (SDK)">Sandakan (SDK)
	<option value="Sibu (SBW)">Sibu (SBW)
	<option value="Tawau (TWU)">Tawau (TWU)
	</select></td>
	</tr>
    
	<tr>
	<td width="200">Destination: </td>
	<td><select name="dest" required />
	<option value="" selected>Please Choose
	<option value="Alor Setar (AOR)">Alor Setar (AOR)
	<option value="Bintulu (BTU)">Bintulu (BTU)
	<option value="Johor Bahru (JHB)">Johor Bahru (JHB)
	<option value="Kota Bharu (KBR)">Kota Bharu (KBR)
	<option value="Kota Kinabalu (BKI)">Kota Kinabalu (BKI)
	<option value="Kuala Lumpur (KUL)">Kuala Lumpur (KUL)
	<option value="Kuala Terengganu (TGG)">Kuala Terengganu (TGG)
	<option value="Kuching (KCH)">Kuching (KCH)
	<option value="Labuan (LBU)">Labuan (LBU)
	<option value="Langkawi (LGK)">Langkawi (LGK)
	<option value="Miri (MYY)">Miri (MYY)
	<option value="Penang (PEN)">Penang (PEN)
	<option value="Sandakan (SDK)">Sandakan (SDK)
	<option value="Sibu (SBW)">Sibu (SBW)
	<option value="Tawau (TWU)">Tawau (TWU)
	</select></td>
	</tr>
	
	<tr>
	<td width="200">Low Fare: (RM)</td>
	<td><input type="text" name="low" maxlength="9" required /></td>
    </tr>
	
	<tr>
	<td width="200">Premium Flex: (RM)</td>
	<td><input type="text" name="prem" size = "20" required /></td>
	</tr>
	
	<tr>
	<td width="200">Depart Time:</td>
	<td><input type="text" name="depart" size = "20" placeholder="hh:mm" required /></td>
	</tr>
	
	<tr>
	<td width="200">Arrive Time:</td>
	<td><input type="text" name="arr" size = "20" placeholder="hh:mm" required /></td>
	</tr>
	
	<tr>
	<td width="200">Duration Time:</td>
	<td><input type="text" name="duration" size = "20" placeholder="xh ym" required /></td>
	</tr>	
	</table>
	<br>
	<input type="submit" value="Create New Flight" /> &nbsp;
	<input type="reset" value="Clear Form" />
	<?php } ?>
	</form>			
</body>
</html>
	
