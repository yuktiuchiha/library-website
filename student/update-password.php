<?php
	include"connection.php";
	include"navbar.php";
?>



<!DOCTYPE html>
<html>
<head>
	<title>change password</title>
<style type="text/css">
	body
	{
		height: 650px;
		background-color: yellow;
		background-image: url("img/p1.jpg");
		background-repeat: no-repeat;
	}
	.wrapper
	{
		width: 400px;
		height: 500px;
		background-color: black;
		opacity: .7;
		margin-top: 30px;

	}
	.form-control
	{
		width:300px;
	}
</style>

</head>
<body>
	<center><div class="wrapper">
		<div style="text-align: center;">
		<h1 style="text-align: center;font-size: 35px; font-family: Lucida Console; color: white; text-align: center; padding-top: 10px;"><b>WELCOME</b></h1>
		<h1 style="text-align: center;font-size: 35px; color: white; text-align: center; padding-top: 0px;">change your password</h1><br><br>
		</div>
		<form action="" method="post">
			<input type="text" name="username" class="form-control" placeholder="username" required=""><br>			
			<input type="text" name="email" class="form-control" placeholder="email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="new password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit">UPDATE</button>
		</form>

<?php
	if(isset($_POST['submit']))
	{
		if(mysqli_query($db,"UPDATE `student registration` SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';")) 

		{
?>
			<script type="text/javascript">
				alert("updated successfully.");
			</script>
<?php			
		}
 
 	}
?>	
	</div></center>
</body>
</html>





