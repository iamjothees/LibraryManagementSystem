<style>
    .report{
        display: flex;
        justify-content: center;
        font-size: larger;
    }
</style>

<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "LibMS";
    
    // Create connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    // Check connection
    /* if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else
        echo "connected"; */
    //require `/Library Management System/ServerScripts/DatabaseConnection.php`;
    /* $conn->query("INSERT INTO UserDetail () VALUES ()");
    echo $conn->insert_id;echo "Something";
    $userID = "22UDT" + (string)$conn->insert_id; */

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
    
    echo "<strong class='report'>New User Created successfully</strong><br>";
    echo "<span class = 'report'>UserID: " . $userID . "<br>Password: " . $password . "</span>";
    
    
    
    echo '<a href="/Library Management System/Operations/AddBook.html"><button>Back</button>';

    $conn->close();
?>