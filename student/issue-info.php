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
			height: 600px;
			width: 700px;
			/*background-color: black;
			opacity: .7;*/
			color: black;
		}
		.scroll
		{
			width: 100%;
			height: 450px;
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
	<h2 style="text-align: center;">Information of Borrowed Book</h2>
	<br>
	<?php
	 	$c=0;
		If(isset($_SESSION['login_user']))
		{
			$sql = "SELECT `student registration`.`username`,email,`books`.bid,name,authors,edition,issue,dueon FROM `student registration` inner join `issue-book` ON `student registration`.username=`issue-book`.username and `student registration`.username= '$_SESSION[login_user]' inner join books ON `issue-book`.bid=books.bid WHERE `issue-book`.approve='yes' ORDER BY `issue-book`.dueon ASC";

			$res = mysqli_query($db,$sql);

			echo"<table class ='table table-bordered'>";

			echo "<tr style='background-color: #9cb5e6;'>";	
					echo"<th>"; echo"USERNAME"; echo"</th>";
					echo"<th>"; echo"EMAIL"; echo"</th>";
					echo"<th>"; echo"BID"; echo"</th>";
					echo"<th>"; echo"BOOK NAME"; echo"</th>";
					echo"<th>"; echo"AUTHORS NAMES"; echo"</th>";
					echo"<th>"; echo"EDITION"; echo"</th>";
					echo"<th>"; echo"ISSUE DATE"; echo"</th>";
					echo"<th>"; echo"RETURN DATE"; echo"</th>";
				echo"</tr>";
			echo "</table>";

			echo "<div class='scroll'>";
			echo"<table class ='table table-bordered'>";

			while( $row = mysqli_fetch_assoc($res))
			{ 
				$d=date("Y-m-d");
				
				if($d > $row['dueon'])
				{
					$c=$c+1;
					$var='<p style="color: yellow; background-color: red;">EXPIRED</p>';
					mysqli_query($db,"UPDATE `issue-book` SET approve='$var' WHERE dueon='$row[dueon]' and approve='yes' limit $c;");
					echo $d."<br>";	
				}

				echo"<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
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







