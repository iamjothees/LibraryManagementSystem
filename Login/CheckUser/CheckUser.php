<?php
    session_start();

    $id = $_POST['userID'];
    $pwd=$_POST['password'];
    $loginFlag=false;
    if ($id=="Admin" && $pwd=="admin@123"){
        header("location:../../Users/AdminPage.html");
    }
    else{
        include "../../ServerScripts/DatabaseConnection.php";
        $query1 = "SELECT `UserID`, `Password` FROM `UserDetail`";
        $result = $conn->query($query1);
        
        while ($resultRow = $result->fetch_assoc()){
            echo "$id == $resultRow[UserID] && $pwd==$resultRow[Password]<br>";
            if ($id== $resultRow['UserID'] && $pwd==$resultRow['Password']){
                header("location:../../Users/UserPage.html");
                $loginFlag=true;
            }
        }

        if ($loginFlag == false){
            echo "UserID Or Password Wrong";
        }
    }
?>