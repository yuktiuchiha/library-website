<?php
		include"connection.php";
		include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>	profile</title>
	<style type="text/css">
		.wrapper
		{
			width:350px;
			height: 500px;
			margin: 0 auto;
			background-color: black;
			color: white;
			opacity: 0.7;
			/*padding-top: 10px;*/

		}
	</style>	
</head>
<body style="background-color: lightblue;">
	<div class="container">
		<form action="" method="post">
			<button class="btn btn-default" style="float: right; width: 70PX;" name="submit1"> EDIT</button>
		</form>
		<div class="wrapper">
			<?php

				if(isset($_POST['submit1']))
				{
					?>
					
					<script type="text/javascript">
						window.location="edit.php";
					</script>

					<?php
				}

				$q = mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_SESSION[login_user]' ;");
			?>
			<center><h2>My Profile</h2></center>
			
			<?php

				$row = mysqli_fetch_assoc($q);

				echo"<div style='text-align:center;'><img class='img-circle profile_img' height=110 width=120 src='img/".$_SESSION['pic']."'></div> ";
			?>	
			<div style="text-align: center;">
				<b>WELCOME</b>
			
			<h4>
					<?php  echo $_SESSION['login_user'];  ?>
				</h4>
			</div>
			<?php
				echo"<b>";	
				echo"<table class='table table-bordered'>";
					echo"<tr>"; 
					echo"<td>"; 
							echo "<b> First name: </b>";
					echo"</td>";
					echo"<td>"; 
						echo $row['firstname'];
					echo"</td>";	
					echo"</tr>";

					echo"<tr>";
					echo"<td>";
						echo "<b> Last Name: </b>";
					 echo"</td>";
					echo"<td>";
						echo $row['lastname'];
					echo"</td>";
					echo"</tr>";

					echo"<tr>";
					echo"<td>"; 
						echo "<b> E-mail: </b>";
					echo"</td>";
					echo"<td>"; 
						echo $row['email'];
					echo"</td>";
					echo"</tr>";

					echo"<tr>";
					echo"<td>"; 
						echo "<b> PhoneNo.: </b>";
					echo"</td>";
					echo"<td>"; 
						echo $row['phoneNo'];
					echo"</td>";
					echo"</tr>";

					echo"<tr>";
					echo"<td>"; 
						echo "<b> Username: </b>";
					echo"</td>";
					echo"<td>"; 
						echo $row['username'];
					echo"</td>";
					echo"</tr>";

					echo"<tr>";
					echo"<td>"; 
						echo "<b> Password: </b>";
					echo"</td>";
					echo"<td>"; 
						echo $row['password'];
					echo"</td>";
					echo"</tr>";

				echo"</table>";	
				echo"</b>";	
			?>
		</div>
	</div>	
</body>
</html>