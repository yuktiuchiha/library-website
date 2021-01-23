<?php
	include"connection.php";
	include"navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>

	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body
		{
			background-image: url("img/f2.jpg");
		}
		.wrapper
		{
			width: 600px;
			height: 500px;
			background-color: black;
			opacity: .7;
			color: white;
		}
		.form-control
		{
			height: 70px;
			width: 60%;
		}
		.scroll
		{
			width: 80%;
			height: 40%;
			overflow: auto;
		}

	</style>
</head>
<body>
	<br>
	<center><div class="wrapper">
		<br>
		<h3>if you have any suggestions or questions please comment below </h3><br>
		<form style="" action="" method="post">
				
				<input class="form-control" type="text" name="comment" placeholder="write something..."><br>
				<input class="btn btn-default" type="submit" name="submit" value="comment" style="width:50ox ; height: 40px;">

		</form>
		<br>

	<div class="scroll">

		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments`(`ID`, `username`, `comment`) VALUES ('', '$_SESSION[login_user]', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
					$res=mysqli_query($db,$q);
					echo"<table class='table table-bordered'";
					while($row=mysqli_fetch_assoc($res))
					{
						echo"<tr>";
							echo"<td>"; echo$row['username']; echo"</td>";
							echo"<td>"; echo$row['comment']; echo"</td>";  
						echo"</tr>";						
					}
				}

			}
			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
					$res=mysqli_query($db,$q);
					echo"<table class='table table-bordered'";
					while($row=mysqli_fetch_assoc($res))
					{
						echo"<tr>";
							echo"<td>"; echo$row['username']; echo"</td>";
							echo"<td>"; echo$row['comment']; echo"</td>";  
						echo"</tr>";						
					}
			}

		?>

	</div>
	</div></center>

</body>
</html>