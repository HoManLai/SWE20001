<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Edit Form</title>
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

	<?php 
	include ("php/config.php");

	$pdID=$_GET["updateID"];

	$query = "SELECT * FROM product WHERE pdID=" . $pdID;

    //retrieve data from table
    $result = mysqli_query($conn, $query);

	$row = mysqli_fetch_assoc($result);
	$pdID = $row['pdID'];
	$pdName = $row['pdName'];
	$category = $row['category'];
	$price = $row['price'];
	$supplier = $row['supplier'];
	$description = $row['description'];
	?>

	<div class='content'>
		<div class="container">
			<form method="post" class="dbForm">
				<fieldset>
					<legend>New Product Details</legend>
					<label for="pdID">ID: </label>
						<input type="text" name="pdID" id="pdID" value="<?php echo $pdID ?>" readonly/>
					<label for="pdName">Name: </label>
						<input type="text" name="pdName" id="pdName" value="<?php echo $pdName ?>"/>
					<label for="category">Category: </label>
						<input type="text" name="category" id="category" value="<?php echo $category ?>"/>
					<label for="price">Price: </label>
						<input type="text" name="price" id="price" value="<?php echo $price ?>"/>
					<label for="supplier">Supplier: </label>
						<input type="text" name="supplier" id="supplier" value="<?php echo $supplier ?>"/>
					<label for="description">Description: </label>
						<textarea rows="3" name="description" id="description"><?php echo $description ?></textarea>
	
					<input id="submit" type="submit" value="Edit Product"/>
					<button><a href='ProductList.php'>Go Back</a></button>
				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	//triming whitespaces from form
	$pdID = trim($_POST["pdID"]);
	$pdName = trim($_POST["pdName"]);
	$category = trim($_POST["category"]);
	$price = trim($_POST["price"]);
	$supplier = trim($_POST["supplier"]);
	$description = trim($_POST["description"]);

	$validation = true;

	// all fields must be entered when submitting, otherwise will throw error
	$value = "";
	if (isset($pdID))
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
		$query = "UPDATE product "
			."SET pdName = '" . $pdName . "', " 
			."category = '" . $category . "', " 
			."price = '" . $price . "', " 
			."supplier = '" . $supplier . "', " 
			."description = '" . $description . "'"
			."WHERE pdID =" . $pdID . ";";
	
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
			echo "<p>Successfully updated product </p>";
			header('location:ProductList.php');
		}
	}

	mysqli_close($conn);

?>
