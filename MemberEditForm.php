<!DOCTYPE html>
<html lang="en">
<head>
	<title>Member Edit Form</title>
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

<?php 
	include ("php/config.php");

	$memID=$_GET["updateID"];

	$query = "SELECT * FROM member WHERE memID=" . $memID;

    //retrieve data from table
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
	$memFirst = $row['memFirst'];
	$memLast = $row['memLast'];
	$phone = $row['phone'];
	$email = $row['email'];
	$streetName = $row['streetName'];
	$suburb = $row['suburb'];
	$state = $row['state'];
	$postcode = $row['postcode'];
	$dob = $row['dob'];
?>

	<div class="container">
		<form method="post"  class="dbForm">
			<fieldset>
				<legend>Edit Member Details</legend>
				<label for "memID">ID: </label>
					<input type="text" name="memID" id="memID" value="<?php echo $memID ?>" readonly/>
				<label for "memFirst">First Name: </label>
					<input type="text" name="memFirst" id="memFirst" value="<?php echo $memFirst ?>"/>
				<label for "memLast">Last Name: </label>
					<input type="text" name="memLast" id="memLast" value="<?php echo $memLast ?>"/>
				<label for "phone">Phone Number: </label>
					<input type="text" name="phone" id="phone" value="<?php echo $phone ?>"/>
				<label for "email">Email: </label>
					<input type="text" name="email" id="email" value="<?php echo $email ?>"/>
				<label for "streetName">Address: </label>
					<input type="text" name="streetName" id="streetName" value="<?php echo $streetName ?>"/>
				<label for "suburb">Suburb: </label>
					<input type="text" name="suburb" id="suburb" value="<?php echo $suburb ?>"/>
				<label for="state">State:</label>
					<select id="state" name="state">
					<option value="<?php echo $state ?>"><?php echo $state ?></option>
					<option value="ACT">ACT</option>
					<option value="NSW">NSW</option>
					<option value="NT">NT</option>
					<option value="SA">SA</option>
					<option value="TAS">TAS</option>
					<option value="VIC">VIC</option>
					<option value="WA">WA</option>
					</select>
				<label for "postcode">Postcode: </label>
					<input type="text" name="postcode" id="postcode" value="<?php echo $postcode ?>"/>
				<label for "dob">Date of Birth: </label>
					<input type="date" name="dob" id="dob" value="<?php echo date("Y-m-d", strtotime($dob)) ?>" />
				
				<input id="submit" type="submit" value="Edit Member"/>
				<button><a href='MemberList.php'>Go Back</a></button>
			</fieldset>
		</form>
	</div>

</body>
</html>


<?php
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
		$query = "UPDATE member "
			."SET memFirst = '" . $memFirst . "', " 
			."memLast = '" . $memLast . "', " 
			."phone = '" . $phone . "', " 
			."email = '" . $email . "', " 
			."streetName = '" . $streetName . "', " 
			."suburb = '" . $suburb . "', " 
			."state = '" . $state . "', " 
			."postcode = '" . $postcode . "', " 
			."dob = '" . $dob . "' "
			."WHERE memID =" . $memID . ";";
	
		//execute query
		$result = mysqli_query($conn, $query);
		if (!$result) {
			// remove when final
			echo "<p>There is an issue with ", $query, " </p>";
			echo "<a href='MemberAdd.php'>Go Backs</a>";
		}
		else
		{
			//success message
			echo "<p>Successfully updated member </p>";
			header('location:MemberList.php');
		}
	}

	mysqli_close($conn);

?>