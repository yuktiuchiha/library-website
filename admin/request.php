<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>book request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 400px;
		}
		.form-control
		{
			width: 180px;
			height: 30px;
			background-color: black;
			color: white;	
		}
		body 
		{
			background-image: url("img/1.jpg");
			background-repeat: no-repeat;
		  font-family: "Lato", sans-serif;
		  transition: background-color .5s;
		}

		.sidenav {
		  height: 100%;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #222222;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		    margin-top: 85PX;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;

		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}
		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.h:hover
				{
					color: white;
					width: 300px;
					height: 50px;
					background-color: #00544c;
				}
		.container
		{
			height: 500px;
			width: 600px;
			background-color: black;
			opacity: .7;
			color: white;
		}
	</style>

</head>
<body>

	<!--      --------SIDENAV--------       -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  						<center><div style="color: white; font-size: 20px;">
						
						<?php
							if(isset($_SESSION['login_user']))
							{
								echo "<img class='img-circle profile_img' height=100 width=100 src='img/".$_SESSION['pic']." '>";
								echo "</br></br>";
								echo" <b>".$_SESSION['login_user'];
								echo "</b>";
							}						
						?>
						</div></center> 
						<br>

  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div> 
  <div class="h"><a href="issue-info.php">Issue Information</a></div>
  <div class="h"><a href="expire.php"> expire information</a></div>	
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</div> 
<div class="container">
	<br>
	<div class="srch">
		<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<center><button class="btn btn-default" name="submit" type="submit">SUBMIT</button></center>
		</form>
	</div>

	<br>
	<h3><center><u>Request of Book</u></center></h3><br><br>

	<?php
		if(isset($_SESSION['login_user']))
		{
			$sql="SELECT `student registration`.`username`,email,`books`.bid,name,authors,edition,status FROM `student registration` inner join `issue-book` ON `student registration`.username=`issue-book`.username inner join books ON `issue-book`.bid=books.bid WHERE `issue-book`.approve=''";

			$res=mysqli_query($db,$sql);
		
			if(mysqli_num_rows($res)==0)
			{	 

				echo "<h2><b><center><br><br>";
				echo"THERE IS NO PENDING REQUEST.";
				echo "</h2></b></center>";
			}
			else
			{
				echo"<table class ='table table-bordered'>";
					echo "<tr style='background-color: #9cb5e6;'>";
				
						echo"<th>"; echo"USERNAME"; echo"</th>";
						echo"<th>"; echo"EMAIL"; echo"</th>";
						echo"<th>"; echo"BID"; echo"</th>";
						echo"<th>"; echo"BOOK NAME"; echo"</th>";
						echo"<th>"; echo"AUTHORS NAMES"; echo"</th>";
						echo"<th>"; echo"EDITION"; echo"</th>";
						echo"<th>"; echo"STATUS"; echo"</th>";
					echo"</tr>";
			
				while($row=mysqli_fetch_assoc($res))
				{
					echo"<tr>";
					echo "<td>"; echo $row['username']; echo "</td>";
					echo "<td>"; echo $row['email']; echo "</td>";
					echo "<td>"; echo $row['bid']; echo "</td>";
					echo "<td>"; echo $row['name']; echo "</td>";
					echo "<td>"; echo $row['authors']; echo "</td>";
					echo "<td>"; echo $row['edition']; echo "</td>";
					echo "<td>"; echo $row['status']; echo "</td>";
					
					echo"</tr>";
				}

				echo"</table>"; 
			}
		}
		else
		{
	?>
			<br>
			<h4><center>you need to login first.</center></h4><br><br>
		
	<?php
		}
		if(isset($_POST['submit']))
		{
			$_SESSION['name']=$_POST['username'];
			$_SESSION['bid']=$_POST['bid'];
		?>
			<script type="text/javascript">
				window.location="approve.php"; 
			</script>
		<?php
		}
	?>
	 
</div>

</body>
</html>
 