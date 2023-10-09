<?php
   include ("config.php");

   //all data from member table
   $query->$conn->query("SELECT * FROM members ORDER BY id ASC");

   echo json_encode($data);
   
   if(isset($_POST["export"]))  
    {  
        $connect = new PDO('mysql:host=localhost;dbname=123', '123', 'invoice123');
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=data.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('
    Invoice No.', 'Invoice Date', 'Student Name', 'Total Amount'));  
        $query = "SELECT * from tbl_order";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            fputcsv($output, $row);  
        }  
        fclose($output);  
    }  
 ?>