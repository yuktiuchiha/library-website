<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Books
	</title>
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


	<!--        -----search bar-----       -->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input  class="form-control " type="text" name="search" placeholder="search book" required="">
				<button  style="background-color: #9cb5e6;" type="submit" name="submit" class="btb btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			
		</form>
	</div>

<!----      book request      ---------->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input  class="form-control " type="text" name="bid" placeholder="Enter book ID " required="">
				<button style="background-color: #9cb5e6;" type="submit" name="submit1" class="btb btn-default">REQUEST
				</button>
			
		</form>
	</div>


	<center><h2><b><u>LIST OF BOOKS</u></b></h2></center>
	<br><br>

	<?php

	if(isset($_POST['submit'])) 
	{
		$q=mysqli_query($db,"SELECT * FROM `books` where `name` like '%$_POST[search]%' ");
		
		if(mysqli_num_rows($q)==0)
		{
			echo"sorry no book found...try again ";
		}
		else
		{
			echo"<table class ='table table-bordered table-hover'>";
			echo "<tr style='background-color: #9cb5e6;'>";
			echo"<th>"; echo"ID"; echo"</th>";
			echo"<th>"; echo"bok name"; echo"</th>";
			echo"<th>"; echo"Author name"; echo"</th>";
			echo"<th>"; echo"Edition"; echo"</th>";
			echo"<th>"; echo"status"; echo"</th>";
			echo"<th>"; echo"quantity"; echo"</th>";
			echo"<th>"; echo"department"; echo"</th>";
			echo"</tr>";
		
			while($row=mysqli_fetch_assoc($q))
			{
				echo"<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				echo"</tr>";
			}

			echo"</table>";	
		}
	}
			/* if buton is not pressed*/
	else
	{
			
		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo"<table class ='table table-bordered table-hover'>";
		echo "<tr style='background-color: #9cb5e6;'>";
		echo"<th>"; echo"ID"; echo"</th>";
		echo"<th>"; echo"bok name"; echo"</th>";
		echo"<th>"; echo"Author name"; echo"</th>";
		echo"<th>"; echo"Edition"; echo"</th>";
		echo"<th>"; echo"status"; echo"</th>";
		echo"<th>"; echo"quantity"; echo"</th>";
		echo"<th>"; echo"department"; echo"</th>";
		echo"</tr>";
	
		while($row=mysqli_fetch_assoc($res))
		{
			echo"<tr>";
			echo "<td>"; echo $row['bid']; echo "</td>";
			echo "<td>"; echo $row['name']; echo "</td>";
			echo "<td>"; echo $row['authors']; echo "</td>";
			echo "<td>"; echo $row['edition']; echo "</td>";
			echo "<td>"; echo $row['status']; echo "</td>";
			echo "<td>"; echo $row['quantity']; echo "</td>";
			echo "<td>"; echo $row['department']; echo "</td>";
			echo"</tr>";
		}	

		echo"</table>";
	}

	if(isset($_POST['submit1']))
	{
		if(isset($_SESSION['login_user']))
		{
			mysqli_query($db,"INSERT INTO `issue-book` VALUES('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
		?>		
			<script type="text/javascript">
				window.location="request.php";
			</script>
	<?php
		}
		else
		{
	?>		
			<script type="text/javascript">
				alert("login to request book.");
			</script>
	<?php
		}
	}	

	?>	

</body>
</html>