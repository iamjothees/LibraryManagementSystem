<?php
    include '../ServerScripts/DatabaseConnection.php';
    $query1 = "SELECT * FROM AvailableBooks";
    $result = $conn->query($query1);
    while ($row = $result->fetch_assoc()){
        $count = $row['Count'];
        $id = $row['ID'];
        $query2 = "UPDATE AvailableBooks SET `AvailableCount` = $count WHERE `ID`=$id";
        echo $query2;
        $conn->query($query2);
    }
?>