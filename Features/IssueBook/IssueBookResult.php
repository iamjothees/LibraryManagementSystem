<?php   session_start()?>
<?php
    include '../ServerScripts/DatabaseConnection.php';
    $idNo = $_SESSION['idNo'];
    $resultSet = $conn->query("SELECT Count FROM `AvailableBooks` WHERE ID = $idNo");
    $resultData = $resultSet->fetch_assoc();
    $count = $resultData['Count'];
    --$count;
    $conn->query("UPDATE `AvailableBooks` SET Count = '$count' WHERE ID = $idNo");
    include '../ServerScripts/ShowTable.php';
    echo "<a href='../Operations/IssueBook1.php'><button>&lt&lt</button></a>";
?>