<!DOCTYPE html>
<html lang="en">
<head>
	<title>Member List</title>
	<meta charset="UTF-8"/>
	<meta name="description"	content="Member List"/>
	<meta name="keywords"		  content="HTML, CSS, PHP, JavaScript"/>
	<meta name="author"			  content="MSP_CL4_T2"/>

	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class='nav'>
		<img id='logo' src="css\images\Goto_Logo.png" alt="Goto Logo"  width="50" height="50" style="float:Left;">
		<h1 id='title'>GotoGro MRM</h1>
	
		<div class="menu">
			<a href="Main.php">Home</a>
			<a href="MemberList.php">Members</a>
			<a href="ProductList.php">Products</a>
			<a href="SalesReport.php">Sales Report</a>
		</div>
	</div>

	<div class='content'>
		<div class="tbldata">
			<p><table>
				<thead><tr>
					<th>Member ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Date of Birth</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Street Name</th>
					<th>Suburb</th>
					<th>State</th>
					<th>Postcode</th>
				</tr></thead>
	
				<?php 
				include ("php/config.php");
				
	
				$memID=$_GET["deleteID"];
	
				$query = "SELECT * FROM member WHERE memID=" . $memID;
	
				//retrieve data from table
				$result = mysqli_query($conn, $query);
	
				//store in array
				$row = mysqli_fetch_assoc($result);
				echo "<tr>";
				echo "<td>" . $memID . "</td>";
				echo "<td>" . $row['memFirst'] . "</td>";
				echo "<td>" . $row['memLast'] . "</td>";
				echo "<td>" . $row['dob'] . "</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['streetName'] . "</td>";
				echo "<td>" . $row['suburb'] . "</td>";
				echo "<td>" . $row['state'] . "</td>";
				echo "<td>" . $row['postcode'] . "</td>";
				echo "</tr>"
				?>
	
			</table></p>
		</div>
	</div>

	<div class="container">
		<form method="post"  class="dbForm">
			<p>Do you really want to delete this member?</p>
			<button><a href='MemberList.php'>Go Back</a></button>
			<input id="submit" type="submit" name="submit" value="Confirm"/>
		</form>
	</div>
</body>
</html>


<?php
	// all fields must be entered when submitting, otherwise will throw error
	if (isset($_POST['submit']))
	{	
		echo $query = "DELETE FROM member WHERE memID=" . $memID . ";";
	
		//execute query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			echo "<p>There is an issue with ", $query, " </p>";
			echo "<a href='MemberList.php'>Go Back</a>";
		}
		else
		{
			//success 
			echo "<p>Successfully deleted member </p>";
			header('location:MemberList.php');
		}
	}

	mysqli_close($conn);

?>
