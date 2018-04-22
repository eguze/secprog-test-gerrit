<html>
	<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>
	<?php

		if (empty($_SESSION['name'])){
			gotoInterface('index.php');
		} else {
	?>

	<a href="include/logout.php">Logout</a><br>	

	<?php } ?>
</body>
</html>
