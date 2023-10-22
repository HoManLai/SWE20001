<?php
   include ("config.php");

   //all data from member table
   $result = $conn->query("SELECT * FROM member");

   $fp = fopen('../membertable.csv', 'w') or die("Unable to load file");

    fputcsv($fp, ['Member ID', 'First Name', 'Last Name', 'Date of Birth', 'Phone', 'Email', 'Street Name', 'Suburb', 'State', 'Postcode']);
   
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    fclose($fp);
    $conn->close();

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="membertable.csv"');
    readfile('membertable.csv'); 
    header('Location: ../MemberList.php');

 ?>