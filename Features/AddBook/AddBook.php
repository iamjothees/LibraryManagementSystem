<style>
    .report{
        display: flex;
        justify-content: center;
        font-size: larger;
    }
</style>

<?php
    include '../ServerScripts/DatabaseConnection.php';

    $selectIDQuery = "SELECT ID FROM AvailableBooks";

    //get values from form
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $language = $_POST['language'];
    $condition = $_POST['condition'];
    $count = $_POST['count'];
    
    $flag = false;
    $avlID;

    // Check if Book already available
     $selectAllQuery = "SELECT * FROM AvailableBooks";
    $result = $conn->query( $selectAllQuery);
    while ($row = $result->fetch_assoc()){
        if( $row['Title']==$title && $row['Author']==$author && $row['Language']==$language ){
            $count =  $row['Count'] + $count;
            $GLOBALS['avlID'] = $row['ID'];
            $GLOBALS['flag'] = true;
            break;
        }
    }

    if ($flag == true){
        // Add count of existing book
        $addCountQuery = "UPDATE `AvailableBooks` SET `Count` = $count WHERE `AvailableBooks`.`ID` = $avlID";
        $conn->query($addCountQuery);
        echo "<strong class='report'>Record updated successfully</strong>";
        include 'ShowTable.php';
    }
    else{
        // Adding New Book
        $insertNewRecordQuery = "INSERT INTO AvailableBooks (Title, Author, Category, Language, count)
VALUES ('$title', '$author', '$category', '$language', '$count')";
        $conn->query($insertNewRecordQuery);
        echo "<strong class='report'>New Record inserted successfully</strong>";
        include 'ShowTable.php';
    }

    echo '<a href="AddBook.html"><button>Back</button>';

    $conn->close();
?>