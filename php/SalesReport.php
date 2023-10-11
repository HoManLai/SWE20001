<?php
    include ("config.php");

    //all data from member table
    $query = "SELECT * FROM sale";

    //retrieve data from table
    $result = mysqli_query($conn, $query);

    //store in array
    $row = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[]=$row;
    }

    echo json_encode($data);
?>