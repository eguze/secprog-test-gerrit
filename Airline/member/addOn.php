<html>
<head>
<title>Add-Ons</title>
<link rel="shortcut icon" href="../images/favicon.png" >
<link rel="stylesheet" type="text/css" href="../css/design.css">
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
	
	if ($_SESSION['way']=='One Way')
	{
		$_SESSION['price'] = 0;
		$_SESSION['code'] = $_POST['code'];
	}
	
	if(!empty($_POST['code1']))
		$_SESSION['code1'] = $_POST['code1'];
	
	$_SESSION['priceR'] = $_POST['fare'] * $_SESSION['people'];
	$_SESSION['newPrice'] = $_SESSION['price'] + $_SESSION['priceR'];
?>
</head>

<body>
	<form id="formAdd" action="payment.php" method="POST">
	<div id="tile">
	<h1>Add-Ons</h1></div>
	<div id="wrapper">
	<div id="bg1">
	
	<table>
	<tr>
	<?php include('../include/valid2.php'); ?>
	<br><br>
	<td width="300"><h3>Checked Baggage</h3></td>
	<td>
	<select name="baggage">
	<option selected value="0">No checked baggage
	<option value="26.50">Up to 15kg - 26.50 MYR
	<option value="31.80">Up to 20kg - 31.80 MYR
	<option value="42.40">Up to 25kg - 42.40 MYR
	<option value="63.60">Up to 30kg - 63.60 MYR
	<option value="116.60">Up to 40kg - 116.60 MYR
	</select><br><br>
	</td>
	</tr>
	</table><hr>
	
	<table>
	<td width="300"><h3>Sports Equipment</h3></td>
	<td>
	<select name="sport">
	<option selected value="0">No sport equipment
	<option value="47.70">Up to 15kg - 47.70 MYR
	<option value="53.00">Up to 20kg - 53.00 MYR
	<option value="63.60">Up to 25kg - 63.60 MYR
	<option value="84.80">Up to 30kg - 84.80 MYR
	<option value="137.80">Up to 40kg - 137.80 MYR
	</select><br><br>
	</td>
	</table><hr>
	<td width="300"><h3>Inflight Meal</h3></td>
	
	<table align="center" bgcolor="AliceBlue">
		<tr>
				<td width="150"><img src="../images/chicken rice.png" alt="Chicken Rice" width="110" height="90"><br>
						<input type="checkbox" name="food[]" value="12.72"><br>RM 12.72<br>Chicken Rice
				</td>
				
				<td width="150"><img src="../images/fried rice.png" alt="Fried Rice" width="110" height="90"><br>
						<input type="checkbox" name="food[]" value="13.72"><br>RM 13.72<br>Fried Rice
				</td>		
				
				<td width="150"><img src="../images/mee goreng.png" alt="Mee Goreng" width="110" height="90"><br>
						<input type="checkbox" name="food[]" value="15.90"><br>RM 15.90<br>Mee Goreng Mamak
				</td>
				
				<td width="150"><img src="../images/nasi lemak.png" alt="Nasi Lemak" width="110" height="90"><br>
						<input type="checkbox" name="food[]" value="12.72"><br>RM 12.72<br>Nasi Lemak
				</td>
				
				<td width="150"><img src="../images/roast chicken.png" alt="Roast Chicken" width="110" height="90"><br>
						<input type="checkbox" name="food[]" value="14.72"><br>RM 14.72<br>Roast Chicken
				</td>
			</tr>
	</table>
	<br><br>
	<hr>
	<td width="300"><h3>Inflight Comfort</h3></td>

	<p> 
		Comfort Kit include neck pillow, eye shade and blanket.<br>
		Please tick checkbox below if interested.<br>
		<input type="checkbox" name="ck" value="32.86"> RM 32.86
	</p>
	<input name="pay" type="submit" value=" Go to Payment "/> &nbsp;
	<input type = "reset" value =" Clear ">
	</form>
	</div>
	</div>			
</body>
</html>