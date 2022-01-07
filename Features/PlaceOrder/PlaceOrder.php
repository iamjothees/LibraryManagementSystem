<style>
    .backButton{
        position:fixed;
        left: 1em;
        bottom: 1em;
        padding:.5em 2em;
        font-weight: bolder;
        font-size: large;
        display: inline-block;
    }
</style>

<?php
    session_start();

    include "../ServerScripts/DatabaseConnection.php";

    $userID = $_SESSION['userID'];
    $bookID = $_POST['placeOrderButton'];


    $query1 = "INSERT INTO OrderedBooks(UserID, BookID) Value('$userID', $bookID)";
    $conn->query($query1);
    echo "Order Placed";
    echo  '<a href="../../Users/Member.html"><button class="backButton">&lt&lt</button> </a>';
?>