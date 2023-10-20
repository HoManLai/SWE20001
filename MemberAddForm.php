<!DOCTYPE html>
<html lang="en">
<head>
	<title>Member Add</title>
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
		<h2 id=pgHeader>Member Add Form</h2>
		<p>All fields are required</p>
		<div class="container">
			<span id="message"></span>
			<form method="post" id="memForm" class="dbForm">
				<fieldset>
					<legend>New Member Details</legend>
					<label for="memFirst">First Name:</label>
						<input type="text" name="memFirst" id="memFirst" class="memData"/>
					<label for="memLast">Last Name: </label>
						<input type="text" name="memLast" id="memLast" class="memData"/>
					<div id="errMsgName"></div>
					<label for="phone">Phone Number: </label>
						<input type="text" name="phone" id="phone" class="memData"/>
					<label for="email">Email: </label>
						<input type="email" name="email" id="email" class="memData"/>
					<label for="streetName">Address: </label>
						<input type="text" name="streetName" id="streetName" class="memData"/>
					<label for="suburb">Suburb: </label>
						<input type="text" name="suburb" id="suburb" class="memData"/>
					<label for="state">State:</label>
						<select id="state" name="state" class="memData">
						<option value="" selected="selected"> --- </option>
						<option value="ACT">ACT</option>
						<option value="NSW">NSW</option>
						<option value="NT">NT</option>
						<option value="SA">SA</option>
						<option value="TAS">TAS</option>
						<option value="VIC">VIC</option>
						<option value="WA">WA</option>
						</select><br>
					<label for="postcode">Postcode: </label>
						<input type="text" name="postcode" id="postcode" class="memData"/>
					<label for="dob">Date of Birth: </label>
						<input type="date" name="dob" id="dob" class="memData"/>
	
					<input id="submit" type="submit" name="submit" value="Add New Member"/>
				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>

<?php
	include ("php/config.php");
	//triming whitespaces from form
	$memFirst = trim($_POST["memFirst"]);
	$memLast = trim($_POST["memLast"]);
	$phone = trim($_POST["phone"]);
	$email = trim($_POST["email"]);
	$streetName = trim($_POST["streetName"]);
	$suburb = trim($_POST["suburb"]);
	$state = trim($_POST["state"]);
	$postcode = trim($_POST["postcode"]);
	$dob = trim($_POST["dob"]);

	$validation = true;

	// all fields must be entered when submitting, otherwise will throw error
	$value = "";
	if (isset($memFirst))
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
		 
		$query = "INSERT INTO member"
		."(memFirst, memLast, phone, email, streetName, suburb, state, postcode, dob)"
		."VALUES"
		."('$memFirst', '$memLast', '$phone', '$email', '$streetName', '$suburb', '$state', '$postcode', '$dob')";
	
		//execute query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			// remove when final
			echo "<p>There is an issue with ", $query, " </p>";
			echo "<a href='MemberAdd.php'>Go Back</a>";
		}
		else
		{
			//success message
			echo "<p>Successfully added new member </p>";
			echo "<a href='MemberList.php'>View Members</a>";
		}
	}
	else
	{
		echo "All fields are required";
	}

	mysqli_close($conn);

?>
