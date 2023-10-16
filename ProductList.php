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
						echo "<td><button><a href=\"ProductEditForm.php?updateID=" . $row['memID'] . "\">Update</a></button>";
						echo "<button><a href=\"ProductDeleteForm.php?deleteID=" . $row['memID'] . "\">Delete</a></button></td>";
						echo "</tr>";
					}
				?>
			</tbody> 
            
        </table></p>
    </div>

	<a href="ProductAddForm.php">Add Products</a>
</body>

</html>