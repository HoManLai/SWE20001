<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="description"	content="Display tde Sales Record"/>
	<meta name="keywords"		  content="HTML, CSS, PHP, JavaScript"/>
	<meta name="autdor"			  content="MSP_CL4_T2"/>
    <title>Sales Record</title>

    <script src="script src="scripts/session.js"></script>
</head>
<body>
    <!--Company Logo-->
<<<<<<< HEAD
    <img src="Goto_Logo.png" alt="Goto Logo"  width="50" height="50" style="float:Left;">
=======
    <img src="Goto_Logo.png" alt="Goto Logo"  widtd="50" height="50" style="float:Left;"">
>>>>>>> 29227a205395382e27ee68fefa93bfe969e1d0b0
	
    <h1>Member Managment System</h1>
    
    <button class="Meun">Menu</button>
		<div class="Meun">
<<<<<<< HEAD
			<!--Add tde html links-->
		<a href="#">Link 1</a>
		<a href="#">Link 2</a>
		<a href="#">Link 3</a>
		<a href="#">Link 4</a>
=======
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
>>>>>>> bf266f7a1c3d6b3bf2be70a38b6dca0dfc3355c7
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
		<caption>List of Sales</caption>
		<!--Title-->

	<?php
       include ("config.php");
       $query =  "select * from sale";
       $result = mysqli_query($conn, $query);
    ?>

    <table border="1">
    <tr>
        <th>Sale ID</th>
        <th>Member ID</th>
        <th>Product ID</th>
        <th>saleDate</th>
        <th>quantity</th>
    </tr>
    <tr>
    <?php
        while ($row = mysqli_fetch_assoc($result))
        {
    ?>

    <td><?php echo $row['saleID']; ?></td>
    <td><?php echo $row['memID']; ?></td>
    <td><?php echo $row['pdID']; ?></td>
    <td><?php echo $row['salePrice']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    </tr>

    <?php 
        }
    ?>
</body>

</html>