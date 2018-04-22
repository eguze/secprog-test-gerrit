<html>
<head>
<title>Processing...</title>
<link rel="shortcut icon" href="../images/favicon.png" >
</head>

<body>
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
	
	$_SESSION['payment'] = $_POST['payment'];
	
	if(empty($_POST['account'])) 
	{
		$_SESSION['account'] = "";
		$_SESSION['bank'] = "";
		$_SESSION['credit'] = $_POST['credit'];
	}
	else
	{
		$_SESSION['account'] = $_POST['account'];
		$_SESSION['bank'] = $_POST['bank'];
		$_SESSION['credit'] = "";
	}
	
	$db=mysql_select_db($database, $con);
	
	if($_SESSION['way'] == "Return")
	{
			$sql="INSERT INTO infoflight (Email, Code, Date, Adults, Kids, Infants, TotalPrice, Payment, CreditNo, AccountNo, Bank) 
			VALUES('".$_SESSION['email']."', '".$_SESSION['code']."', '".$_SESSION['depart']."', '".$_SESSION['adults']."', '".$_SESSION['kids']."', '".$_SESSION['infants']."', '".$_SESSION['deptPrice']."', '".$_SESSION['payment']."', '".$_SESSION['credit']."', '".$_SESSION['account']."', '".$_SESSION['bank']."')";
	
			mysql_query($sql);
		
			$sql="INSERT INTO infoflight (Email, Code, Date, Adults, Kids, Infants, TotalPrice, Payment, CreditNo, AccountNo, Bank) 
			VALUES('".$_SESSION['email']."', '".$_SESSION['code1']."', '".$_SESSION['return']."', '".$_SESSION['adults']."', '".$_SESSION['kids']."', '".$_SESSION['infants']."', '".$_SESSION['retPrice']."', '".$_SESSION['payment']."', '".$_SESSION['credit']."', '".$_SESSION['account']."', '".$_SESSION['bank']."')";
			
			mysql_query($sql);
	}		
	else
	{
		$sql="INSERT INTO infoflight (Email, Code, Date, Adults, Kids, Infants, TotalPrice, Payment, CreditNo, AccountNo, Bank) VALUES('".$_SESSION['email']."', '".$_SESSION['code']."', '".$_SESSION['depart']."', '".$_SESSION['adults']."', '".$_SESSION['kids']."', '".$_SESSION['infants']."', '".$_SESSION['deptPrice2']."', '".$_SESSION['payment']."', '".$_SESSION['credit']."', '".$_SESSION['account']."', '".$_SESSION['bank']."')";
	
		mysql_query($sql);
	}
	
	unset($_SESSION['code']);
	gotoInterface('../'.$_SESSION['interface']);
?>
</body>
</html>