<?php
    include '../ServerScripts/DatabaseConnection.php';

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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>