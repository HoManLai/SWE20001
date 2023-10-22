<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sales Report</title>
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
		<h2 id=pgHeader>Sales</h2>
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
	
				<!-- display data -->
				<tbody id="phpTable">
					<?php 
						include ("php/config.php");
					
						//all data from member table
						$query = "SELECT * FROM sale";
					
						//retrieve data from table
						$result = mysqli_query($conn, $query);
					
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row['saleID'] . "</td>";
							echo "<td>" . $row['memID'] . "</td>";
							echo "<td>" . $row['pdID'] . "</td>";
							echo "<td>" . $row['quantity'] . "</td>";
							echo "<td>" . $row['saleDate'] . "</td>";
							echo "<td>" . $row['salePrice'] . "</td>";
							echo "<td><button><a href=\"SaleEditForm.php?updateID=" . $row['saleID'] . "\">Update</a></button>";
							echo "<button><a href=\"SaleDeleteForm.php?deleteID=" . $row['saleID'] . "\">Delete</a></button></td>";
							echo "</tr>";
						}
					?>
				</tbody> 
				
			</table></p>
		</div>

		<button><a href="SalesAddForm.php">Manually Add Sales</a></button>
		<form method="post" action="php/SaleReportExport.php" class="dbForm">
			<input type='submit' value='Export to CSV' name='Export to CSV'/>
		</form>
	</div>
</body>

</html>
