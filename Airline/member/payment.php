<html>
<head>
<title>Payment Confirmation</title>
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

	if (empty($_SESSION['code']))
		gotoInterface('../member.php');	
	
	$bag = $_POST['baggage'] + $_POST['sport'];
	$_SESSION['newPrice1'] = $_SESSION['newPrice'] + $bag;
	
	if(empty($_POST['food'])) {}
	else
	{
		$food = $_POST['food'];
		$n = count($food);
		for($i=0; $i < $n; $i++)
		{
			$_SESSION['newPrice1'] += $food[$i];
		}
	}
	
	if(empty($_POST['ck'])) {} 
	else $_SESSION['newPrice1'] += $_POST['ck'];
	
	$_SESSION['deptPrice'] = $_SESSION['newPrice1'] - $_SESSION['priceR'];
	$_SESSION['deptPrice2'] = $_SESSION['newPrice1'] - $_SESSION['price'];
	
	if($_SESSION['way'] == "Return")
		$_SESSION['retPrice'] = $_SESSION['newPrice1'] - $_SESSION['price'];
?>

<script type="text/javascript">
	function yesnoCheck() {
		if (document.getElementById('yescheck').checked) {
			document.getElementById('one').style.display = 'none';
			document.getElementById('two').style.display = 'block';
			document.getElementById('three').style.display = 'none';
		}
		else 
		{
			document.getElementById('one').style.display = 'block';
			document.getElementById('two').style.display = 'none';
			document.getElementById('three').style.display = 'block';
		}
	}
</script>

</head>

<body>
	<div id="tile">
	<h1> Payment</h1></div>
	
	<div id="wrapper">
	<div id="bg1">

	<?php include('../include/valid2.php'); ?><br>
	
	<h3>Summary</h3>
	<hr><br>
	<table border="0">
	<tr><td>Adults:</td> <td><?php echo $_SESSION['adults'] ?></td></tr>
	<tr><td>Kids:</td> <td><?php echo $_SESSION['kids'] ?></td></tr>
	<tr><td>Infants:</td> <td><?php echo $_SESSION['infants'] ?></td></tr>
	<tr><td>Type of Flight:</td> <td><?php echo $_SESSION['way']?></td></tr>
	<tr><td>Depart Date:</td> <td><?php echo $_SESSION['depart']?></td></tr>
	<?php if($_SESSION['way'] == "Return"){ ?>
	<tr><td>Return Date:</td> <td><?php echo $_SESSION['return']?></td></tr>
	<?php } ?>
	<tr><td>Current Total Price:</td> <td><?php printf ("RM %4.2f", $_SESSION['newPrice1']); ?></td></tr>
	</table>
	<br>
	
	<h3> Please choose Your Payment Method</h3><hr>
	<form action="done.php" method="POST">
	<input type ="radio" name="payment" value="Credit Card" id="yescheck" onclick="javascript:yesnoCheck();" checked>Credit Card
	<input type ="radio" name="payment" value="Internet Banking" id="nocheck" onclick="javascript:yesnoCheck();">Internet Banking
	<br><br>
	
	<h3> Please Choose Which Bank You Desire</h3><hr>	
	
	<br><div id="two" style="display:block">
	Credit Card No :
	<input type="text" name="credit" size = "20" maxlength = "16" />
	</div><br>
	
	<div id="three" style="display:none">
	<input type="radio" name="bank" value="CIMB Clicks" checked>
	<img src="../images/cimb.png" alt="CIMB Clicks" style="width:100px;height:42px;">
	&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="radio" name="bank" value="Bank Islam" >
	<img src="../images/bankislam.jpg" alt="Bank Islam" style="width:130px; height:42px;">
	</div>
	<br><br>
	
	<div id="one" style="display:none">
	Account No :
	<input type="text" name="account" size = "20" maxlength = "14" />
	</div>
	<br><br>
	
	<input type = "submit" onClick="alert('Your transaction is successful! \nYou will be directed to the main page. \nThank you and have a safe flight!')" value =" Submit ">&nbsp;
	<input type = "reset" value =" Clear ">
	</form>
</body>
</html>
