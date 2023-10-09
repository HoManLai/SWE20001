<?php

//triming whitespaces from form
$memID = trim($_POST["memID"]);
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

//only execute if it matches with memID
$query = "SELECT * FROM member WHERE memID='$memID'";
$result = mysqli_query($conn, $query);
if (!$result) {
	echo "<p>The entered Member ID does not match with any members";
}
else
{
	$fields = "";
	$values = "";

	//only input fields if they have input
	foreach($_POST as $key=>$value)
	{
		if($value != "")
		{
			if($_POST[""])
			{
				$fields .= "";
			}
			if($value != end($_POST))
			{
				$fields .= $key . " = '" . $value . "', ";
			}
		}
	}

	echo $query = "UPDATE member SET $fields WHERE memID=$memID";

}
?>