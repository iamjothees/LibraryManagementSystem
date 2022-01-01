<?php

                $serverName = "localhost";
                $userName = "root";
                $password = "";
                $dbName = "LibMS";

                // Create connection
                $conn = new mysqli($serverName, $userName, $password, $dbName);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql1 = "SELECT ID FROM AvailableBooks";
                $id = ($conn->query($sql1))->num_rows;
                $id++;
                $title = $_POST['title'];
                $author = $_POST['author'];
                $category = $_POST['category'];
                $language = $_POST['language'];
                $condition = $_POST['condition'];
                $count = $_POST['count'];
                $flag = false;
                $avlID;

                // Check if Book already available
                $sql3 = "SELECT ID, Title, Author, Language, Count FROM AvailableBooks";
                echo $sql3;
                $result = $conn->query($sql3);
                while ($row = $result->fetch_assoc()){
                    echo "While loop" . "<br>";
                    if( $row['Title']==$title && $row['Author']==$author && $row['Language']==$language ){
                        echo "if statement";
                        $count =  $row['Count'] + $count;
                        $GLOBALS['avlID'] = $row['ID'];
                        $GLOBALS['flag'] = true;
                        break;
                    }
                }

                if ($flag == true){
                    // Add count of existing book
                    $sql4 = "UPDATE `AvailableBooks` SET `Count` = $count WHERE `AvailableBooks`.`ID` = $avlID";
                    $conn->query($sql4);
                    echo "Record updated successfully";
                }
                else{
                    // Adding New Book
                    $sql2 = "INSERT INTO AvailableBooks (ID, Title, Author, Category, Language, count) VALUES ('$id', '$title', '$author', '$category', '$language', '$count')";

                    // Check adding
                    if ($conn->query($sql2) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
                }
                

                $conn->close();
            ?>