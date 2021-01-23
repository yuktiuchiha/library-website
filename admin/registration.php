<?php
	include"connection.php";
	include"navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>




	<section>
		<div class="reg-img">
			<br>
			<div class="box2">
				<br>
				<h1 style="text-align: center;font-size: 35px; font-family: Lucida Console; color: white;">WELCOME</h1>
				<h1 style="text-align: center; font-size: 25px; color: white;">USER REGISTRATION FORM</h1>
				<form name="Registration" action="" method="post">
					<div class="login">
						<br>
						<input class="form-control" type="text" name="firstname" placeholder="First Name" required=""><br>
						<input class="form-control"type="text" name="lastname" placeholder="Last Name" required=""><br>
						<input class="form-control"type="text" name="email" placeholder="email" required=""><br>
						<input class="form-control"type="text" name="phoneNo" placeholder="phone no." required=""><br>
						<input class="form-control"type="text" name="username" placeholder="username" required=""><br>
						<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
						
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input class="btn .btn-success" type="submit" name="register" value="REGISTER" style="color: white; width: 95px; height: 30px;background-color: blue;">
					</div>	
				</form>
			</div>	
		</div>
	</section>

<?php
	
	if(isset($_POST['register']))
	{
		$count=0;
		$sql="SELECT username from `admin`";
		$res=mysqli_query($db,$sql);

		while($row=mysqli_fetch_assoc($res))
		{
			if($row['username']==$_POST['username'])
			{
				$count=$count+1;
			}
		}
		if($count==0)
		{
		mysqli_query($db,"INSERT INTO `admin` VALUES('','$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[phoneNo]', '$_POST[username]', '$_POST[password]','u1.png');");
?>
	<script type="text/javascript">
		alert("registration successful");
	</script>

<?php
}
	else
	{
	
?>
		<script type="text/javascript">
		alert("username alrady exists");
		</script>
	
<?php
	}

	}

?>

</body>
</html>


