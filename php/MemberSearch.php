<?php
    include ("config.php");

    //get name
    $name = $_POST['searchbar']//need name of search bar

    //search data from member table
    $query = "SELECT * FROM member where memFirst = '$name' or memLast = '$name'";

    //retrieve data from table
    $result = mysqli_query($conn, $query);

    //store in array
    $row = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[]=$row;
    }

    echo json_encode($data);
?>