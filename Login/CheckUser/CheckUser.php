<style>
    .center{
        display: flex;
        justify-content: center;
        text-align: center;
    }
</style>

<?php
    session_start();

    $_SESSION['userID'] = $_POST['userID'];
    $_SESSION['pwd']=$_POST['password'];
    $loginFlag=false;
    if ($_SESSION['userID']=='Admin' && $_SESSION['pwd']=='admin@123'){
        header("location:../../Users/Admin.html");
    }
    else{
        include "../../Features/ServerScripts/DatabaseConnection.php";
        $query1 = "SELECT `UserID`, `Password` FROM `UserDetail`";
        $result = $conn->query($query1);
        
        while ($resultRow = $result->fetch_assoc()){
            //echo "$_SESSION[userID] == $resultRow[UserID] && $_SESSION[pwd]==$resultRow[Password]<br>";
            if ($_SESSION['userID']== $resultRow['UserID'] && $_SESSION['pwd']==$resultRow['Password']){
                header("location:../../Users/Member.html");
                $loginFlag=true;
            }
        }

        if ($loginFlag == false){
            echo "<div style='font-size: larger; font-weight: bold;' class='center'>UserId or Password Wrong</div>";
            echo "<a href='../Login.html'><button>&lt&lt&lt</button></a>";
        }
    }
?>