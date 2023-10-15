<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="description"	content="List displaying members detail"/>
	<meta name="keywords"		  content="HTML, CSS, PHP, JavaScript"/>
	<meta name="author"			  content="MSP_CL4_T2"/>
	<title>Members Add</title>

</head>
<body>
	<!--Company Logo-->
    <img src="Goto_Logo.png" alt="Goto Logo"  width="50" height="50" style="float:Left;"">

	<h1>Member Managment System</h1>
	
	<button class="Meun">Menu</button>
	<div class="Meun">
		<!--Add the html links-->
	<a href="Main.html">Main</a>
	<a href="AddMembers.html"> Member Registration</a>
	<a href="MemberList.php">Members List</a>
	<!--
	<a href="MemberProfile.html">Members Profile</a>
	-->
	<a href="SalesRecord.php">Sales Record List</a>
	<!--
	<a href="SalesReport.html">Link 4</a>

	-->
	<a href="SalesRecord.php">Add product form</a>
	</div>

		<?php
		include ("config.php");
		
		//triming whitespaces from form
		//!!will need to add more to sanitise input more....!!
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

			$query = "UPDATE member SET $fields WHERE memID=$memID";

			echo str_replace(", WHERE", " WHERE", $query);

			/*execute query
			$result = mysqli_query($conn, $query);
			if (!$result) {
				// remove when final
				echo "<p>There is an issue with ", $query, " </p>";
			}
			else
			{
				//success message
				echo "<p>Successfully edited member </p>";
			}
				*/
		}
		?>

</body>
</html>