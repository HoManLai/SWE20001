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
	<h1>Member Managment System</h1>
    <!--Company Logo-->
    <img src="css\images\Goto_Logo.png" alt="Goto Logo"  width="50" height="50" style="float:Left;">

	<!--Hoverable Menu (Add CSS to make it dropdown)-->
	<div class="Menu">
		<button class="Menu">Menu</button>
		<div class="Menu">
			<!--Add the html links-->
		<a href="Main.html">Home</a>
        <a href="MemberList.html">Members</a>
        <a href="ProductList.html">Products</a>
        <a href="SalesReport.html">Sales Report</a>

		</div>
	</div>

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

	<div class="container">
		<form method="post"  class="dbForm">
			<p>Do you really want to delete this member?</p>
			<input id="submit" type="submit" name="submit" value="Confirm"/>
		</form>

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
			echo "<a href='MemberList.html'>Go Back</a>";
		}
		else
		{
			//success 
			echo "<p>Successfully deleted member </p>";
			header('location:MemberList.html');
		}
	}

	mysqli_close($conn);

?>
