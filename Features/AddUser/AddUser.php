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
</style>

<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "LibMS";
    
    // Create connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    //get values from form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phNumber= $_POST['phNumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = (string)$_POST['password'];
    
    $insertNewRecordQuery = "INSERT INTO `UserDetail` (Name, Age, PhoneNumber, Email, Address, Password)
VALUES ('$name', '$age', '$phNumber', '$email', '$address', '$password')";
    $conn->query($insertNewRecordQuery);


    $lastID = $conn->insert_id;
    $userID = "22UDT0" . (string)$lastID;
    $updateUserID = "UPDATE `UserDetail` SET `UserID` = '$userID' WHERE `id` = '$lastID'";
    $conn->query($updateUserID);
    
    echo "<strong class='report' style='margin-top:5em'>New User Created successfully</strong><br>";
    echo "<span class = 'report'>UserID: " . $userID . "<br>Password: " . $password . "</span>";
    
    
    
    echo '<a href="AddUser.html"><button class=backButton>&lt&lt&lt</button>';

    $conn->close();
?>