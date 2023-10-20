<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Add</title>
	<meta charset="UTF-8"/>
	<meta name="description"	content="Member List"/>
	<meta name="keywords"		  content="HTML, CSS, PHP, JavaScript"/>
	<meta name="author"			  content="MSP_CL4_T2"/>

	<script src="scripts/MemberList.js"></script>
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
		<h2 id=pgHeader>Product Add Form</h2>
		<p>All fields are required</p>
		<div class="container">
			<span id="message"></span>
			<form method="post" class="dbForm">
				<fieldset>
					<legend>New Product Details</legend>
					<label for "pdName">Name: </label>
						<input type="text" name="pdName" id="pdName" />
					<label for "category">Category: </label>
						<input type="text" name="category" id="category" />
					<label for "price">Price: </label>
						<input type="text" name="price" id="price" />
					<label for "supplier">Supplier: </label>
						<input type="text" name="supplier" id="supplier" />
					<label for "description">Description: </label>
						<textarea rows="3" name="description" id="description"></textarea>
					
					<input type="submit" name="Add New Product"/>
				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>

<?php
	include ("php/config.php");
	//triming whitespaces from form
	$pdName = trim($_POST["pdName"]);
	$category = trim($_POST["category"]);
	$price = trim($_POST["price"]);
	$supplier = trim($_POST["supplier"]);
	$description = trim($_POST["description"]);

	$validation = true;

	// all fields must be entered when submitting, otherwise will throw error
	$value = "";
	if (isset($pdName))
	{
		foreach($_POST as $key=>$value)
		{
			if($value == "")
			{
				$validation=false;
			}
		}
	}

	if ($validation)
	{
		 
		$query = "INSERT INTO product"
		."(pdName, category, price, supplier, description)"
		."VALUES"
		."('$pdName', '$category', '$price', '$supplier', '$description')";
	
		//execute query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			// remove when final
			echo "<p>There is an issue with ", $query, " </p>";
			echo "<a href='ProductList.php'>Go Back</a>";
		}
		else
		{
			//success message
			echo "<p>Successfully added new product </p>";
			echo "<a href='ProductList.php'>View Products</a>";
		}
	}
	else
	{
		echo "All fields are required";
	}

	mysqli_close($conn);

?>
