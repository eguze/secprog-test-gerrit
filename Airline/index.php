<html >
  <head>
    <meta charset="UTF-8">
    <title>Welcome to Local Airline</title>    
    
        <link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" href="images/favicon.png" >
		
		<?php
			include('include/function.php');
			session_start();
			if (!empty($_SESSION['email'])){
			$to=$_SESSION['interface'];
			gotoInterface($to);
			}
		?>
  </head>

  <body>
	<img src="images/logo.png" width="180px" height="180px" style="position: relative; bottom: 35px; left: 45px;" />
    <div class="wrapper">
	<div class="container">
		<h1>Welcome to Local Airline<br>"All you have to do is fly"</h1>
		<form id="form1" class="form" action="login.php" method="POST">
			<input type="text" placeholder="Email" name="txtUsername">
			<input type="password" placeholder="Password" name="txtPassword">
			<button type="submit" id="login-button">Login</button>
			<button type="button" onClick="window.location.href='membership.php'"> Create New Account?</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
  </body>
</html>
