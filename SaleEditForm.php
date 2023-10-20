<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Edit Formt</title>
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

		$saleID=$_GET["updateID"];

		$query = "SELECT * FROM sale WHERE saleID=" . $saleID;

		//retrieve data from table
		$result = mysqli_query($conn, $query);

		$row = mysqli_fetch_assoc($result);
		$memID = $row["memID"];
		$pdID = $row["pdID"];
		$price = $row["salePrice"];
		$quantity = $row["quantity"];
		$date = $row["saleDate"];
	?>

	<div class='content'>
		<div class="container">
			<form method="post" class="dbForm">
				<fieldset>
				<legend>Update Sale Entry</legend>
					<label for="saleID">Sale ID: </label>
						<input type="text" name="saleID" id="saleID" value="<?php echo $saleID ?>" readonly/>
					<label for="memID">Member ID: </label>
						<input type="text" name="memID" id="memID" value="<?php echo $memID ?>"/>
					<label for="pdID">Product ID: </label>
						<input type="text" name="pdID" id="pdID" value="<?php echo $pdID ?>"/>
					<label for="price">Price: </label>
						<input type="text" name="price" id="price" value="<?php echo $price ?>"/>
					<label for="quantity">Quantity: </label>
						<input type="text" name="quantity" id="quantity" value="<?php echo $quantity ?>"/>
					<label for="date">Sales Date</label>
						<input type="datetime-local" name="date" id="date" value="<?php echo $date ?>">
	
					<input id="submit" type="submit" value="Edit Product"/>
					<button><a href='SalesReport.php'>Go Back</a></button>
				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>

<?php
	//triming whitespaces from form
	$memID = trim($_POST["memID"]);
	$pdID = trim($_POST["pdID"]);
	$price = trim($_POST["price"]);
	$quantity = trim($_POST["quantity"]);
	$date = trim($_POST["date"]);

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
		//make sure member + product exists from their respective tables
		$validateSQL = "SELECT * FROM sale s"
		." WHERE EXISTS"
		." (SELECT * FROM member m WHERE m.memID =$memID)"
		." AND EXISTS"
		." (SELECT * FROM product p WHERE p.pdID =$pdID)";

		if (mysqli_query($conn, $validateSQL))
		{
			$query = "UPDATE sale "
				."SET memID = '" . $memID . "', " 
				."pdID = '" . $pdID . "', " 
				."salePrice = '" . $price . "', " 
				."quantity = '" . $quantity . "', " 
				."saleDate = '" . $date . "'"
				."WHERE saleID =" . $saleID . ";";
		
			//execute query
			$result = mysqli_query($conn, $query);
			if (!$result) {
				// remove when final
				echo "<p>There is an issue with ", $query, " </p>";
				echo "<a href='SalesReport.php'>Go Back</a>";
			}
			else
			{
				//success message
				echo "<p>Successfully updated sale </p>";
				header('location:SalesReport.php');
			}
		}
	}

	mysqli_close($conn);

?>
