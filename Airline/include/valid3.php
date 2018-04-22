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
		<a href="#" onClick="history.back(-1)">Back</a> | <a href="../include/logout.php">Logout</a>
	<?php } ?>

</body>
</html>
