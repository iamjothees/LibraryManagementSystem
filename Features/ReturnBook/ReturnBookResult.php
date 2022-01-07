<?php
    include '../ServerScripts/DatabaseConnection.php';

    //Set Requested orderID
    $outstandingID =  $_POST['returnedButton'];

    //Select Requested OrderRow
    $query1 = "SELECT * FROM `OrderedBooks` WHERE ID='$outstandingID'";
    $outstandingRow = $conn->query($query1);
    $outstandingData = $outstandingRow->fetch_assoc();

    //Update Returned as true
    $query2 = "UPDATE OrderedBooks SET `Returned`=1 WHERE ID='$outstandingID'";
    $conn->query($query2);

    //Increment the available book
    $bookID = $outstandingData['BookID'];
    $bookRow = $conn->query("SELECT AvailableCount FROM `AvailableBooks` WHERE ID = $bookID");
    $bookData = $bookRow->fetch_assoc();
    $count = $bookData['AvailableCount'];
    ++$count;
    $query3 = "UPDATE `AvailableBooks` SET AvailableCount = '$count' WHERE ID = $bookID";
    $conn->query($query3);

    //Show Table
    include '../ServerScripts/ShowTable.php';
    echo "<a href='ReturnBook.php'><button>&lt&lt</button></a>";
?>