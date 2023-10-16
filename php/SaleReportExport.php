<?php
   include ("config.php");

   //all data from member table
   $result = $conn->query("SELECT * FROM sale");

   $fp = fopen('../saletable.csv', 'w') or die("Unable to load file");

    fputcsv($fp, ['Sale ID', 'Member ID', 'Product ID', 'Quantity', 'Date',	'Price']);
   
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    fclose($fp);
    $conn->close();

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="saletable.csv"');
    readfile('saletable.csv'); 
    header('Location: ../SalesReport.php');

 ?>