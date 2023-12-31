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
		<h2 id=pgHeader>Products</h2>
	    	<div class="tbldata">
	        <p><table>
	            <thead><tr>
	                <th>Product ID</th>
	                <th>Name</th>
	                <th>Category</th>
	                <th>Price</th>
	                <th>Supplier</th>
	                <th>Description</th>
	            </tr></thead>
	
				<tbody id="phpTable">
					<?php 
						include ("php/config.php");
					
						//all data from member table
						$query = "SELECT * FROM product";
					
						//retrieve data from table
						$result = mysqli_query($conn, $query);
	
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row['pdID'] . "</td>";
							echo "<td>" . $row['pdName'] . "</td>";
							echo "<td>" . $row['category'] . "</td>";
							echo "<td>" . $row['price'] . "</td>";
							echo "<td>" . $row['supplier'] . "</td>";
							echo "<td>" . $row['description'] . "</td>";
							echo "<td><button><a href=\"ProductEditForm.php?updateID=" . $row['pdID'] . "\">Update</a></button>";
							echo "<button><a href=\"ProductDeleteForm.php?deleteID=" . $row['pdID'] . "\">Delete</a></button></td>";
							echo "</tr>";
						}
					?>
				</tbody> 
	            
	        </table></p>
	</div>

		<a href="ProductAddForm.php">Add Products</a>
		<form method="post" action="php/ProductListExport.php" class="dbForm">
			<input type='submit' value='Export to CSV' name='Export to CSV'/>
		</form>
	</div>

</body>

</html>
