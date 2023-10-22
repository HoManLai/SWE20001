<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sales Add Forms</title>
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
		<h2 id=pgHeader>Manual Sale Entry</h2>
		<p>All fields are required</p>
		<div class="container">
			<span id="message"></span>
			<form method="post" class="dbForm">
				<fieldset><legend>Manual Sale Entry</legend>
					<label for="memID">Member ID: </label>
						<input type="text" name="memID" id="memID" />
					<label for="pdID">Product ID: </label>
						<input type="text" name="pdID" id="categopdIDry" />
					<label for="price">Price: </label>
						<input type="text" name="price" id="price" />
					<label for="quantity">Quantity: </label>
						<input type="text" name="quantity" id="quantity" />
					<label for="date">Sales Date</label>
						<input type="datetime-local" name="date" id="date" >
					
					<input type="submit" name="Add New Sale"/></fieldset>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	include ("php/config.php");
	//triming whitespaces from form
	$memID = trim($_POST["memID"]);
	$pdID = trim($_POST["pdID"]);
	$price = trim($_POST["price"]);
	$quantity = trim($_POST["quantity"]);
	$date = trim($_POST["date"]);

	$validation = true;

	// all fields must be entered when submitting, otherwise will throw error
	$value = "";
	if (isset($memID))
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
			$query = "INSERT INTO sale"
			."(memID, pdID, salePrice, quantity, saleDate)"
			."VALUES"
			."('$memID', '$pdID', '$price', '$quantity', '$date')";
		
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
				echo "<p>Successfully added sale </p>";
				echo "<a href='SalesReport.php'>View Sales</a>";
			}
		}
		else
		{
			echo "<p>Product/Member does not exist</p>";
		}
	}
	else
	{
		echo "All fields are required";
	}

	mysqli_close($conn);

?>
