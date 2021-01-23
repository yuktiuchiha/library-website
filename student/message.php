<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
</head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body
		{
			background-image: url(img/m1.jfif);
			background-repeat: no-repeat;
		}
		.wrapper
		{
			height: 500px;
			width: 500px;
			background-color: black;
			opacity: .7;
			/*margin: -20px auto;*/
			padding: 10px;
		}
		.form-control
		{
			height: 47px;
			width: 74%; 
		}
		.msg
		{
			height: 330px;
			background-color: black;
			overflow: scroll;
		}
		.btn-info
		{
			background-color: #02c5b6;
		}
		.chat
		{
			display: flex;
			flex-flow: wrap;
		}
		.user .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			background-color: yellow;
			border-radius: 10px;
			order: -1;
		}
		.admin .chatbox
		{
			height: 50px;
			width: 400px;
			padding: 13px 10px;
			background-color: yellow;
			border-radius: 10px;
		}
	</style>
<body>
	<?php
		if(isset($_POST['submit']))
		{
			mysqli_query($db,"INSERT into `library`.`message` values('','$_SESSION[login_user]','$_POST[message]','no','student','admin');");
			$res = mysqli_query($db,"SELECT * from `message` where username='$_SESSION[login_user]' or receiver='$_SESSION[login_user]';");
		}
		else
		{
			$res = mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' or receiver='$_SESSION[login_user]';");
		}
		mysqli_query($db,"UPDATE `message` set `status`='yes' WHERE sender='admin' and `receiver`='$_SESSION[login_user]';");
	?>
	<br>
	<center>
	<div class="wrapper">
		<div style="height: 70px; width: 100%; background-color: aqua; text-align: center; color: black; padding-top: 1px;">
			<h3><b>Admin</b></h3>
		</div>
		<br>
		<div class="msg">
			<br>
			<?php
				$res = mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]' or receiver='$_SESSION[login_user]';");
				while($row=mysqli_fetch_assoc($res))
				{
					if($row['sender']=='student')
					{
			?>
			<!--   STUDENT ---->
			<div class="chat user">
				&nbsp&nbsp
				<div style="float: left;padding-top: 0px;">
					<?php
							echo "<img class='img-circle profile_img' height=50 width=50 src='img/".$_SESSION['pic']." '>";
					?>
				</div>
				<div style="float: left;" class="chatbox">
					<?php
						echo $row['message'];
					?>
				</div>
			</div>
			<br>	
				<?php
					}
					else if($row['sender']=='admin')
					{
				?>
			<!------ ADMIN ------->
			<div class="chat admin">
				&nbsp
				<div style="float: left;padding-top: 0px;">
					<img src="img/u1.png" style="height: 50px; width: 50px; border-radius: 50%;">&nbsp&nbsp
				</div>
				<div style="float: left;" class="chatbox">
					<?php
						echo $row['message'];
					?>
				</div>
			</div>
			<br>
				<?php
					}
				}
				?>

		</div>
		
		<div style="height: 100px; padding-top: 10px;">
			<form action="" method="post">
				<input type="text" name="message" class="form-control" required="" placeholder="please write something....." style="float: left;">&nbsp&nbsp&nbsp&nbsp
				<button class="btn btn-info btn-lg" type="submit" name="submit"><span class="glyphicon glyphicon-send"></span>&nbspSend</button>
			</form>
			
		</div>
	</div>
	</center>
	
</body>
</html>