
<html>
<head>
	<title>Search Flight</title>
	<link rel="shortcut icon" href="../images/favicon.png" >
	<link rel="stylesheet" type="text/css" href="../css/slide.css">
	<link rel="stylesheet" type="text/css" href="../css/tablestyle.css">

	 <!-- calendar stylesheet -->
	<link rel="stylesheet" type="text/css" media="all" href="../css/calendar-win2k-cold-1.css" title="win2k-cold-1">

	<!-- main calendar program -->
	<script type="text/javascript" src="../js/calendar.js"></script>

	<!-- language for the calendar -->
	<script type="text/javascript" src="../js/calendar-en.js"></script>

	<!-- the following script defines the Calendar.setup helper function, which makes adding a calendar a matter of 1 or 2 lines of code. -->
	<script type="text/javascript" src="../js/calendar-setup.js"></script>

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
?>		
</head>

	<div id="header">
	<h2> |
	&nbsp;  Flight &nbsp; | 
	&nbsp;  Contact Us &nbsp; | 
	&nbsp;&nbsp; <?php include('../include/valid2.php'); ?></h2>
	</div>

<body id="slider">
	<script type="text/javascript">
	function yesnoCheck() {
		if (document.getElementById('yesCheck').checked) {
			document.getElementById('one').style.display = 'block';
			document.getElementById('two').style.display = 'block';
	}
    else 
	{
		document.getElementById('one').style.display = 'none';
		document.getElementById('two').style.display = 'none';
	}
}
</script>
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
	if (isset($_POST['depart']))
	{
		$origin = $_POST['origin']; 
		$dest = $_POST['dest'];
		$depart = $_POST['depart'];
		$return = $_POST['return'];
		//SQL STATEMENT
		$sql = "SELECT * FROM flight WHERE Origin='".$origin."' and Destination='".$dest."'";

		//SQL STATEMENT END
		$db=mysql_select_db($database, $con);

		$result=mysql_query($sql);
		if (!$result) {
			echo 'Could not run query: ' . mysql_error();
			exit;
		}
	
		$row = mysql_fetch_row($result);
		//session_register
		$_SESSION['origin'] = $row[1];
		$_SESSION['dest'] = $row[2];
		$_SESSION['depart'] = $depart;
		$_SESSION['return'] = $return;
		$_SESSION['adults'] = $_POST['adults'];
		$_SESSION['kids'] = $_POST['kids'];
		$_SESSION['infants'] = $_POST['infants'];
		$_SESSION['way'] = $_POST['way'];
		$_SESSION['people'] = $_SESSION['adults'] + $_SESSION['kids'];
		
		?>
		<h3>Depart Flight - <?php echo $_SESSION['depart']?></h3>	
		<p>Adults: <?php echo $_SESSION['adults'] ?></p>
		<p>Kids: <?php echo $_SESSION['kids'] ?></p>
		<p>Infants: <?php echo $_SESSION['infants'] ?></p>
		
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
		
		if (empty($row[0])){  
			echo '<h3>No Such Flight. Please Try Again</h3>';
		}else
		{
				$x=1;
				$sql1="SELECT * FROM flight WHERE Origin LIKE '".$_SESSION['origin']."' and Destination LIKE '".$_SESSION['dest']."'";
				
				$arr = array();
				if($_SESSION['way'] == "One Way"){ ?>
				
				<form method="POST" action="addOn.php">
				<?php } else { ?>
				<form method="POST" action="returnFlight.php"> <?php }
				$result1=mysql_query($sql1);
				while($row1 = mysql_fetch_row($result1))  { 
				
				$arr[$x] = $row1[0];
				
					?>
					
				<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $row1[0]; ?></td>
				<td><?php echo $row1[1]; ?></td>
				<td><?php echo $row1[2]; ?></td>
				<td><input type="radio" name="fare" value="<?php echo $row1[3]; ?>" required /><?php echo $row1[3]; ?> </td>
				<td><input type="radio" name="fare" value="<?php echo $row1[4]; ?>" /><?php echo $row1[4]; ?></td>
				<td><?php echo $row1[5]; ?></td>
				<td><?php echo $row1[6]; ?></td>
				<td><?php echo $row1[7]; ?></td>
				<td><input type="radio" name="code" value="<?php echo $row1[0]; ?>" /></td>
				<?php $x = $x+1; }
		}
		?>		</table><br>
				<input name="next" type="submit" value="Next Step" />
				</form>		<?php
		}
	else{ ?>
	
	<br>
	<form id="form2" action="searchFlight.php" method="POST">
	<table>
	<tr>
	<h1>Search Flight</h1>
	<td><input type="radio" onclick="javascript:yesnoCheck();" name="way" value="Return" id="yesCheck"> Return</td>
	<td><input type="radio" onclick="javascript:yesnoCheck();" name="way" value="One Way" id="noCheck" checked> One way</td>
	</tr>
	
	<tr><td>&nbsp;</td></tr>
	
	<tr>
	<td><select name="origin" required />
	<option value="" selected>Origin
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
	<td><input type="text" name="depart" id="dep_date_c" readonly="1" placeholder="Depart Date" value="" required /></td>
	<td><img src="../images/img.gif" id="dep_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Date selector" onmouseover="this.style.background=&#39;red&#39;;" onmouseout="this.style.background=&#39;&#39;"></td>
	</tr>
	
	<tr>
	<td><select name="dest" required />
	<option value="" selected>Destination
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
	<td><div id="one" style="display:none"><input type="text" name="return" id="ret_date_c" readonly="1" placeholder="Return Date" value="" required /></div></td>
	<td><div id="two" style="display:none"><img src="../images/img.gif" id="ret_trigger_c" style="cursor: pointer; border: 1px solid red;" title="Date selector" onmouseover="this.style.background=&#39;red&#39;;" onmouseout="this.style.background=&#39;&#39;"></div></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	</table>
	<select name="adults">
	<option value="0">0 Adults
	<option selected value="1">1 Adults
	<option value="2">2 Adults
	<option value="3">3 Adults
	<option value="4">4 Adults
	<option value="5">5 Adults
	<option value="6">6 Adults
	<option value="7">7 Adults
	<option value="8">8 Adults
	<option value="9">9 Adults
	</select>&nbsp;
	<td><select name="kids">
	<option selected value="0">0 Kids
	<option value="1">1 Kids
	<option value="2">2 Kids
	<option value="3">3 Kids
	<option value="4">4 Kids
	<option value="5">5 Kids
	<option value="6">6 Kids
	<option value="7">7 Kids
	<option value="8">8 Kids
	<option value="9">9 Kids
	</select>&nbsp;
	<td><select name="infants">
	<option selected value="0">0 Infants
	<option value="1">1 Infants
	<option value="2">2 Infants
	<option value="3">3 Infants
	<option value="4">4 Infants
	</select><br><br>
	
	<input type="submit" name="submit" value="Search">&nbsp;&nbsp;
	<input type="reset" name="clear" value="Clear">
	
	</form>
	
		<script type="text/javascript">
			Calendar.setup({
				inputField     :    "dep_date_c",     // id of the input field
				ifFormat       :    "%B %e, %Y",      // format of the input field
				showsTime      :    false,
				button         :    "dep_trigger_c",  // trigger for the calendar (button ID)
				align          :    "Tl",           // alignment (defaults to "Bl")
				singleClick    :    true
		});		
		</script>
		
		<script type="text/javascript">
			Calendar.setup({
				inputField     :    "ret_date_c",     // id of the input field
				ifFormat       :    "%B %e, %Y",      // format of the input field
				showsTime      :    false,
				button         :    "ret_trigger_c",  // trigger for the calendar (button ID)
				align          :    "Tl",           // alignment (defaults to "Bl")
				singleClick    :    true
		});		
		</script>
	</div>
	</div>
	
	<div id="footer">
		<br>Copyright © localairlines
	</div>
		
	<?php
	} ?>
</body>
</html>