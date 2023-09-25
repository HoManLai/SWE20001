<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="description"	content="List displaying members detail"/>
	<meta name="keywords"		  content="HTML, CSS, PHP, JavaScript"/>
	<meta name="author"			  content="MSP_CL4_T2"/>
	<title>Members List</title>

	<script src="script src="scripts/session.js"></script>
</head>
<body>
	<!--Company Logo-->
    <img src="Goto_Logo.png" alt="Goto Logo"  width="50" height="50" style="float:Left;">

	<h1>Member Managment System</h1>
	
	<!--Hoverable Menu (Add CSS to make it dropdown)-->
	<div class="Meun">
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
		</div>
	<!--Filter button-->
	<div id="filterMem">
		<!--Add filterSelection-->
		<button class="btn active" onclick="filterSelection('all')"> Show all</button>
		<button class="btn" onclick="filterSelection('...')">...</button>
		<button class="btn" onclick="filterSelection('...')">...</button>
		<button class="btn" onclick="filterSelection('...')"> ...</button>
		<button class="btn" onclick="filterSelection('...')">...</button>
	</div>
	<!--Sort by Asc or Desec alphabetically-->
	<button onclick="sortList()">Sort</button>
	<!--Generate Report-->
	<button onclick="">Generate Report</button>
	<!--Table for showing members information-->
	<table style="border: 1px solid black; margin-left:auto; margin-right:auto;">
		<caption>Members List</caption>
		<!--Title-->
		
		<?php
       include ("config.php");
       $query =  "select * from member";
       $result = mysqli_query($conn, $query);
    	?>

		<table border="1">
		<tr>
			<th>Members ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Address</th>
			<th>Suburb</th>
			<th>State</th>
			<th>Postcode</th>
			<th>Date of Birth</th>
			<th>View</th>
		</tr>
		<tr>

		<?php
			while ($row = mysqli_fetch_assoc($result))
			{
		?>

        <td><?php echo $row['memID']; ?></td>
        <td><?php echo $row['memFirst']; ?></td>
        <td><?php echo $row['memLast']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['streetName']; ?></td>
        <td><?php echo $row['suburb']; ?></td>
        <td><?php echo $row['state']; ?></td>
        <td><?php echo $row['postcode']; ?></td>
        <td><?php 
        echo $row['dob']; ?>
        </td>
        <td><?php echo $row['memIcon']; ?></td>
        
		</tr>
		<?php 
			}
		?>

	</table>

	<a href="MemberEditForm.html">Edit Members</a>
	<a href="MemberAddForm.html">Add Members</a>

</body>
</html>