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
			padding-left: 1000px;
		}
				body {
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
<?php
if(isset($_SESSION['login_user'])) 
	{
		$q=mysqli_query($db,"SELECT * FROM `issue-book` where username='$_SESSION[login_user]' and approve='' ;");
		
		if(mysqli_num_rows($q)==0)
		{
			echo"THERE IS NO PENDING REQUEST.";
		}
		else
		{
			echo"<table class ='table table-bordered table-hover'>";
				echo "<tr style='background-color: #9cb5e6;'>";
			
					echo"<th>"; echo"BOOK-ID"; echo"</th>";
					echo"<th>"; echo"REQUEST DATE"; echo"</th>";
					echo"<th>"; echo"APPROVE STATUS"; echo"</th>";
					echo"<th>"; echo"RETURN DATE"; echo"</th>";
				echo"</tr>";
		
			while($row=mysqli_fetch_assoc($q))
			{
				echo"<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['dueon']; echo "</td>";
				echo"</tr>";
			}

			echo"</table>";	
		}
	}
else
{
	echo "</br></br></br>";
	echo "<h2><b><center>";
	echo "please login first to see reuest information.";
	echo "</center></b></h2>";
}
?>
</head>
<body>

 