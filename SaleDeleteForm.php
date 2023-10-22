<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List</title>
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
					<th>Sale ID</th>
					<th>Member ID</th>
					<th>Product ID</th>
					<th>Quantity</th>
					<th>Date</th>
					<th>Price</th>
				</tr></thead>
	
				<tbody id="phpTable">
					<?php 
						include ("php/config.php");
				
						$saleID=$_GET["deleteID"];
	
						$query = "SELECT * FROM sale WHERE saleID=" . $saleID;
	
						//retrieve data from table
						$result = mysqli_query($conn, $query);
	
						//store in array
						$row = mysqli_fetch_assoc($result);
						echo "<tr>";
						echo "<td>" . $row['saleID'] . "</td>";
						echo "<td>" . $row['memID'] . "</td>";
						echo "<td>" . $row['pdID'] . "</td>";
						echo "<td>" . $row['quantity'] . "</td>";
						echo "<td>" . $row['saleDate'] . "</td>";
						echo "<td>" . $row['salePrice'] . "</td>";
						echo "</tr>";
					?>
				</tbody>
			</table></p>
		</div>
	
		<div class="container">
			<form method="post"  class="dbForm">
				<p>Do you really want to delete this sale?</p>
				<button><a href='SalesReport.php'>Go Back</a></button>
				<input id="submit" type="submit" name="submit" value="Confirm"/>
			</form>
		</div>
	</div>
</body>
</html>


<?php
	// all fields must be entered when submitting, otherwise will throw error
	if (isset($_POST['submit']))
	{	
		echo $query = "DELETE FROM sale WHERE saleID=" . $saleID . ";";
	
		//execute query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			echo "<p>There is an issue with ", $query, " </p>";
			echo "<a href='SalesReport.php'>Go Back</a>";
		}
		else
		{
			//success 
			echo "<p>Successfully deleted sale transaction </p>";
			header('location:SalesReport.php');
		}
	}

	mysqli_close($conn);

?>
