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
		include ("config.php");
		 
		$query = "INSERT INTO member"
		."(memFirst, memLast, phone, email, streetName, suburb, state, postcode, dob)"
		."VALUES"
		."('$memFirst', '$memLast', '$phone', '$email', '$streetName', '$suburb', '$state', '$postcode', '$dob')";
	
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
			echo "<p>Successfully added new member </p>";
			echo "<a href='MemberList.html'>View Members</a>";
		}
	}

	mysqli_close($conn);

?>