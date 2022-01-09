<style>
    .report{
        display: flex;
        justify-content: center;
        font-size: larger;
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
    if(isset($_POST['title'])){
        include '../ServerScripts/DatabaseConnection.php';

        $selectIDQuery = "SELECT ID FROM AvailableBooks";

        //get values from form
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $language = $_POST['language'];
        $condition = $_POST['condition'];
        $count = $_POST['count'];
        $availableCount = 0;
        
        $flag = false;
        $avlID;

        // Check if Book already exist
        $selectAllQuery = "SELECT * FROM AvailableBooks";
        $result = $conn->query($selectAllQuery);
        while ($row = $result->fetch_assoc()){
            if( $row['Title']==$title && $row['Author']==$author && $row['Language']==$language ){
                $availableCount = $row['AvailableCount'] + $count;
                $count =  $row['Count'] + $count;
                $GLOBALS['avlID'] = $row['ID'];
                $GLOBALS['flag'] = true;
                break;
            }
        }

        if ($flag == true){
            // Add count of existing book
            $addCountQuery = "UPDATE `AvailableBooks` SET `Count` = $count, `AvailableCount` = $availableCount WHERE `ID` = $avlID";
            $conn->query($addCountQuery);
            echo "<strong class='report'>Record updated successfully</strong>";
            include '../ServerScripts/ShowTable.php';
        }
        else{
            // Adding New Book
            $insertNewRecordQuery = "INSERT INTO AvailableBooks (Title, Author, Category, Language, Count, AvailableCount)
    VALUES ('$title', '$author', '$category', '$language', '$count', $count)";
            $conn->query($insertNewRecordQuery);
            
            echo "<strong class='report'>New Record inserted successfully</strong>";
            include '../ServerScripts/ShowTable.php';
        }
        echo '<a href="AddBook.html"><button class="backButton">&lt&lt&lt</button></a>';

        $conn->close();
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
        echo "<strong class='report'>Already Record inserted successfully</strong>";
        echo '<a href="AddBook.html"><button class="backButton">&lt&lt&lt</button></a>';
    }
?>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>