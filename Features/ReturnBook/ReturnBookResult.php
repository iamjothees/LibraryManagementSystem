<style>
    .report{
        display: flex;
        justify-content: center;
        font-size: x-large;
    }

    .backButton{
        position:fixed;
        left: 1em;
        bottom: 1em;
        padding:.5em 2em;
        font-weight: bolder;
        font-size: large;
    }
</style>";

<?php

    if(isset($_POST['returnedButton'])){
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
    
        echo "<strong class='report' style='margin-top:5em'>Returned Record Added</strong><br>";
        //Show Table
        include '../ServerScripts/ShowTable.php';
        echo "<a href='ReturnBook.php'><button>&lt&lt&lt</button></a>";
    }
    else{
        echo "
            <style>
                .report{
                    display: flex;
                    justify-content: center;
                    font-size: x-large;
                }

                .backButton{
                    position:fixed;
                    left: 1em;
                    bottom: 1em;
                    padding:.5em 2em;
                    font-weight: bolder;
                    font-size: large;
                }
            </style>";
            echo "<strong class='report' style='margin-top:5em'>Returned Record Already Added</strong><br>";
            echo "<a href='ReturnBook.php'><button class='backButton'>&lt&lt&lt</button></a>";
    }
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>