<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>participation record</title>
	<style type="text/css">
		.page
		{
			width: 70%;
			height: 100%;
			background-color: yellow;
		}
	</style>
</head>
<body>
<div class="page">
	
</div>


<?php
	if(isset($_POST['submit']))
	{
		$q=mysqli_query($db,"SELECT * FROM `table name` where username='$_SESSION[login_user]';");
		
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

	
?>	
</body>
</html>



