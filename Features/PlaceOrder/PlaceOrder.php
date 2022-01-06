<?php
    session_start();

    include "../ServerScripts/DatabaseConnection.php";

    $userID = $_SESSION['userID'];
    $bookID = $_POST['placeOrderButton'];


    $query1 = "INSERT INTO OrderedBooks(UserID, BookID) Value('$userID', $bookID)";
    echo $query1;
    $conn->query($query1);
?>