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
			padding-top: 5px;
			padding-left: 500px;
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
			/*background-image: url("img/1.jpg");*/
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
		  padding: 10px;
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
			margin-top: -50px; 
			height: 600px;
			width: 700px;
			background-color: black;
			opacity: .7;
			color: white;
		}
		.scroll
		{
			width: 100%;
			height: 300px;
			overflow: auto; 
		}
		th,td
		{
			width: 15%;
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
<div class="container">
	<?php	
			if(isset($_SESSION['login_user']))
			{
	?>
				<div style="float: left; padding: 20px;">	
					<form method="post" action="">
						<button class="btn btn-default" type="submit" name="submit2">RETURNED</button>&nbsp&nbsp&nbsp  
						<button  type="submit" name="submit3" class="btn btn-default">EXPIRED</button>
					</form>
				</div>	
				<div style="float: right; padding-top: 6px;">
					
					<?php

						$var=0;
						$result=mysqli_query($db,"SELECT * FROM `fine` WHERE username='$_SESSION[login_user]' and status='not paid';");
						while ($r = mysqli_fetch_assoc($result)) 
						{
							$var=$var+$r['fine'];
						}
						$var2=$var+$r['fine'];
					?>
					
					<h3>Your Fine is :
						<?php
							echo "Rs. ".$var2;
						?>
					</h3>
				
				</div>

			<!--

				<div class="srch">
					<form method="post" action="" name="form1">
						<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
						<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
						<center><button class="btn btn-default" name="submit" 		type="submit">SUBMIT</button></center>
					</form>
				</div>
	<?php
	//	if(isset($_POST['submit']))
		{
	//		$var1='<p style="color=yellow; background-color: green;">RETURNED</p>';
			
	//		mysqli_query($db,"UPDATE `issue-book` SET approve='$var1' WHERE username='$_POST[username]' and bid='$_POST[bid]';");
	//		mysqli_query($db,"UPDATE books set quantity=quantity+1 WHERE bid='$_POST[bid]';");
		}	
			}	

	?>				

	<h2 style="text-align: center;">Information of Expired Book</h2>-->



	<br>
	<?php
	 	$c=0;
		if(isset($_SESSION['login_user']))
		{
			
			$ret='<p style="color=yellow; background-color: green;">RETURNED</p>';
			$exp='<p style="color=yellow; background-color: red;">EXPIRED</p>';
			
			if(isset($_POST['submit2']))
			{
				$sql = "SELECT `student registration`.`username`,email,`books`.bid,name,authors,edition,approve,issue,dueon FROM `student registration` inner join `issue-book` ON `student registration`.username=`issue-book`.username inner join books ON `issue-book`.bid=books.bid WHERE `issue-book`.approve ='$ret' and `student registration`.`username`='$_SESSION[login_user]' ORDER BY `issue-book`.dueon DESC";
				$res = mysqli_query($db,$sql);
			}
			else if (isset($_POST['submit3'])) 
			{
				$sql = "SELECT `student registration`.`username`,email,`books`.bid,name,authors,edition,approve,issue,dueon FROM `student registration` inner join `issue-book` ON `student registration`.username=`issue-book`.username inner join books ON `issue-book`.bid=books.bid WHERE `issue-book`.approve ='$exp' and `student registration`.`username`='$_SESSION[login_user]' ORDER BY `issue-book`.dueon DESC";
				$res = mysqli_query($db,$sql);
			}
			else
			{
				$sql = "SELECT `student registration`.`username`,email,`books`.bid,name,authors,edition,approve,issue,dueon FROM `student registration` inner join `issue-book` ON `student registration`.username=`issue-book`.username inner join books ON `issue-book`.bid=books.bid WHERE `issue-book`.approve !='' and `issue-book`.approve !='yes' and `student registration`.`username`='$_SESSION[login_user]' ORDER BY `issue-book`.dueon DESC";
				$res = mysqli_query($db,$sql);
			}

			echo"<table class ='table table-bordered'>";

			echo "<tr style='background-color: #9cb5e6;'>";	
					echo"<th>"; echo"USERNAME"; echo"</th>";
					echo"<th>"; echo"EMAIL"; echo"</th>";
					echo"<th>"; echo"BID"; echo"</th>";
					echo"<th>"; echo"BOOK NAME"; echo"</th>";
					echo"<th>"; echo"AUTHORS NAMES"; echo"</th>";
					echo"<th>"; echo"EDITION"; echo"</th>";
					echo"<th>"; echo"STATUS"; echo"</th>";
					echo"<th>"; echo"ISSUE DATE"; echo"</th>";
					echo"<th>"; echo"RETURN DATE"; echo"</th>";
				echo"</tr>";
			echo "</table>";

			echo "<div class='scroll'>";
			echo"<table class ='table table-bordered'>";

			while( $row = mysqli_fetch_assoc($res))
			{ 
				echo"<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['dueon']; echo "</td>";
				echo"</tr>";
			} 
			
				echo"</table>"; 
			echo "</div>";
		}
		else
		{
			?>
				<h2 style="text-align: center;">Login first.</h2> 
			<?php
		}
	?>

</div>
</div>
</body>
</html>







 