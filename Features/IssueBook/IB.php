<?php
    include '../ServerScripts/DatabaseConnection.php';

    
    /* if (isset($_POST['issueButton'])){
        $issueDate = date(d/m/Y, time());
        echo $issueDate;
    } */

    if(isset($_POST['issueButton']))
    {
        $issueDate = date('d-m-Y', time());
        echo "Time the button was clicked: " . $issueDate . "<br>";
    }

    //Set Requested orderID
    $orderID =  $_POST['issueButton'];

    //Select Requested OrderRow
    $query1 = "SELECT * FROM `OrderedBooks` WHERE ID='$orderID'";
    $orderedRow = $conn->query($query1);
    $orderedData = $orderedRow->fetch_assoc();

    //Update Issued as true
    $query2 = "UPDATE OrderedBooks SET `Issued`=1 WHERE ID='$orderID'";
    $conn->query($query2);

    //Decrement the available book
    $bookID = $orderedData['BookID'];
    $bookRow = $conn->query("SELECT AvailableCount FROM `AvailableBooks` WHERE ID = $bookID");
    $bookData = $bookRow->fetch_assoc();
    $count = $bookData['AvailableCount'];
    --$count;
    $query3 = "UPDATE `AvailableBooks` SET AvailableCount = '$count' WHERE ID = $bookID";
    $conn->query($query3);

    //Show Table
    include '../ServerScripts/ShowTable.php';
    echo "<a href='IssueBook.php'><button>&lt&lt</button></a>";
?>