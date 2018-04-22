<html>
	<head>
		<meta charset="utf-8">
		<title>Untitled Document</title>
	</head>

<body>

	<?php

		if (is_null($_SESSION['name'])){
		gotoInterface('../index.php');
		} else {
			$to = $_SESSION['interface'];
	?>
		<a href="<?php echo '../'.$to; ?>">Home</a> &nbsp; | &nbsp; <a href="../include/logout.php">Logout</a>
	<?php } ?>

</body>
</html>
