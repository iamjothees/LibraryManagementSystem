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

    .report{
        display: flex;
        justify-content: center;
        font-size: x-large;
    }
</style>

<?php
    session_start();

    if(isset($_POST['placeOrderButton'])){
        include "../ServerScripts/DatabaseConnection.php";

        $userID = $_SESSION['userID'];
        $bookID = $_POST['placeOrderButton'];


        $query1 = "INSERT INTO OrderedBooks(UserID, BookID) Value('$userID', $bookID)";
        $conn->query($query1);
        echo "<strong class='report' style='margin-top:5em'>Order Placed</strong><br>";
        echo  '<a href="../../Users/Member.html"><button class="backButton">&lt&lt&lt</button> </a>';
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
            echo "<strong class='report' style='margin-top:5em'>Already Order Placed</strong><br>";
            echo "<a href='../../Users/Member.html'><button class=backButton>&lt&lt&lt</button></a>";
    }
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>