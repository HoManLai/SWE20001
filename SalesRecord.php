<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="description"	content="Display the Sales Record"/>
	<meta name="keywords"		  content="HTML, CSS, PHP, JavaScript"/>
	<meta name="author"			  content="MSP_CL4_T2"/>
    <title>Sales Record</title>

</head>
<body>
    <!--Company Logo-->
    <img src="Goto_Logo.png" alt="Goto Logo"  width="50" height="50" style="float:Left;"">
	
    <h1>Member Managment System</h1>
    
    <!--Hoverable Menu (Add CSS to make it dropdown)-->
    <div class="Meun">
		<button class="Meun">Menu</button>
		<div class="Meun">
			<!--Add the html links-->
		<a href="#">Link 1</a>
		<a href="#">Link 2</a>
		<a href="#">Link 3</a>
		<a href="#">Link 4</a>
		</div>
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
    <th><?php echo $row['memID']; ?></th>
    <th><?php echo $row['pdID']; ?></th>
    <th><?php echo $row['salePrice']; ?></th>
    <th><?php echo $row['quantity']; ?></th>
    </tr>

    <?php 
        }
    ?>
</body>

</html>