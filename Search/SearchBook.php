<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "LibMS";
    $tableName = "AvailableBooks";

    // Create connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $keyword = $_POST['keyword'];
    $searchIn = $_POST['searchIn'];

    checkKeyword($searchIn);
    
    $conn->close();

    function checkKeyword($searchIn){
        global $conn, $keyword;
        if ($searchIn=="All"){
            $query2 = "SELECT * FROM `AvailableBooks` WHERE `Title` LIKE '$keyword' OR `Author` LIKE '$keyword'";
        }
        else{
        $query2 = "SELECT * FROM `AvailableBooks` WHERE `$searchIn` LIKE '$keyword'";
        }
        $queryRow = $conn->query($query2);
        if ($queryRow->num_rows>0){
            while ($rowDisplay = $queryRow->fetch_assoc()){
                echo "<pre>" . $rowDisplay['ID'] . "    " . $rowDisplay['Title'] . "     " . $rowDisplay['Author'] . "     " .
                $rowDisplay['Category'] . "    " . $rowDisplay['Language'] . "    " . $rowDisplay['Count'] . "</pre>" . "<br>";
            }
        }
        else{
            echo "No records Found";
        }
    }
?>