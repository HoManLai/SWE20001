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
		<a href="Main.php">Home</a>
        <a href="MemberList.php">Members</a>
        <a href="ProductList.php">Products</a>
        <a href="SalesReport.php">Sales Report</a>

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
				<th>Settings</th>
			</tr></thead>

			<!-- display data -->
			<tbody id="phpTable">
				<?php 
					include ("php/config.php");
				
					//all data from member table
					$query = "SELECT * FROM member";
				
					//retrieve data from table
					$result = mysqli_query($conn, $query);
				
					//store in array
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['memID'] . "</td>";
						echo "<td>" . $row['memFirst'] . "</td>";
						echo "<td>" . $row['memLast'] . "</td>";
						echo "<td>" . date("Y-m-d", strtotime($row['dob'])) . "</td>";
						echo "<td>" . $row['phone'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['streetName'] . "</td>";
						echo "<td>" . $row['suburb'] . "</td>";
						echo "<td>" . $row['state'] . "</td>";
						echo "<td>" . $row['postcode'] . "</td>";
						echo "<td><button><a href=\"MemberEditForm.php?updateID=" . $row['memID'] . "\">Update</a></button>";
						echo "<button><a href=\"MemberDeleteForm.php?deleteID=" . $row['memID'] . "\">Delete</a></button></td>";
						echo "</tr>";
					}
				?>
			</tbody> 
			
		</table></p>

		<button><a href="MemberAddForm.php" class="addMem">Add Members</a></button>
		<form method="post" action="php/MemberListExport.php" class="dbForm">
			<input type='submit' value='Export to CSV' name='Export to CSV'/>
		</form>
	</div>

</body>
</html>