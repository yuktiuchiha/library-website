<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse" style="padding: 17px; word-spacing: 15px; margin-bottom: 0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand active" style="padding-left: 0px;"><center>ONLINE LIBRARY<br>MANAGEMENT SYSTEM</center></a>
			</div>
			
				<ul class="nav navbar-nav">
					<li><a href="index.php" style="text-decoration: none; display: bold;"><span class=" glyphicon"> HOME</span></a></li>
					<li><a href="books.php"><span class=" glyphicon"> BOOKS</span></a></li>
					<li><a href="feedback.php"><span class=" glyphicon"> FEEDBACK</span></a></li>
				</ul>

				<?php
				if(isset($_SESSION['login_user']))
				{
					$r=mysqli_query($db,"SELECT COUNT(status) AS `total` FROM `message` where `status`='no' and `sender`='student';");  
 					$c=mysqli_fetch_assoc($r);
				?>	
					<ul class="nav navbar-nav">
						<li><a href="profile.php"><span class=" glyphicon  glyphicon-profile">PROFILE</span></a></li>
						<li><a href="student.php"><span class=" glyphicon">STUDENT<br>INFORMATION</span></a></li>
						<li><a href="fine.php"><span class="glyphicon">FINES</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right"><li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> <span class="badge bg-green">	

							<?php
							echo $c['total'];	
							?>

						</span></a></li>
					<li><a href="profile.php">
						<div style="color: white;">
						
						<?php
							echo "<img class='img-circle profile_img' height=50 width=50 src='img/".$_SESSION['pic']." '>";
							echo" ".$_SESSION['login_user'];
						?>
						</div> 
					</a></li>
					<li><a href="logout.php"><span class=" glyphicon  glyphicon-log-out"> LOGUT</span></a></li>
					</ul>
				<?php
				}
				else
				{
				?>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="admin-login.php"><span class=" glyphicon  glyphicon-log-in"> LOGIN</span></a></li>
					<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN-UP</span></a></li>
				</ul>
				<?php 
				}
				?>
				
				
		</div>		
	</nav>
	
</body>
</html>