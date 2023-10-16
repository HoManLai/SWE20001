<?php
   include ("config.php");

   //all data from member table
   $result = $conn->query("SELECT * FROM product");

   $fp = fopen('../producttable.csv', 'w') or die("Unable to load file");

    fputcsv($fp, ['Product ID',	'Name', 'Category', 'Price', 'Supplier', 'Description']);
   
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    fclose($fp);
    $conn->close();

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="producttable.csv"');
    readfile('producttable.csv'); 
    header('Location: ../ProductList.php');

 ?>