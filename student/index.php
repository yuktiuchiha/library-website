<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style type="text/css">
	nav
	{
	    float: right;
	    padding: 35px;
	    word-spacing: 50px;
	}
	nav li
	{
	    display: inline-block;
	    line-height: 85px;
	}
	</style>
</head>
<body>
	<div class="wrapper">
		<header>
				<div class="logo">
					<img src="img/lib-img5.jpg" style="height: 120px; margin-left: 75px;">
					<h1 style="color: white; font-size: 23px;"><b>ONLINE LIBRARY MANAGEMENT SYSTEM</b></h1>
				</div>
			<?php
				if(isset($_SESSION['login_user'])) 
				{
			?>		
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<li><a href="registration.php">REGISTRATION</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			<?php	
				}
				else
				{
			?>		
					<nav>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="books.php">BOOKS</a></li>
							<li><a href="student-login.php">STUDENT-LOGIN</a></li>
							<li><a href="registration.php">REGISTRATION</a></li>
							<li><a href="feedback.php">FEEDBACK</a></li>
						</ul>
					</nav>
			<?php
				}
			?>

			
		</header>
		<section>
			<div class="sec-img">

			<br><br>
			
				<div class="box">
					<br><br>
					 <h1 style="text-align: center; font-size: 30px;">WELCOME TO LIBRARY</h1><br><br>
					 <h1 style="text-align: center; font-size: 25px">OPEN 24x7...</h1>
				</div>
			
			</div>	
		</section>

	<?php
		include"footer.php";
	?>

	</div>
</body>
</html>