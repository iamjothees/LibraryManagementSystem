<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Search Result</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table{
                border: .1em solid black;
                text-align: center;
                font-size: larger;
                margin-bottom: 10px;
            }
            th{
                border-bottom: .3em solid black;
            }
            th, td{
                padding: .3em .5em;
            }

            .center{
                display: flex;
                justify-content: center;
            }

            .viewOrderButton{
                padding : 1em;
                font-size: large;
                font-weight: bold;
            }

            .placeOrderButton{
                padding : .6em;
                font-size: medium;
                font-weight: bold;
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
    </head>


    <body>
        <div class = "center">
        <table>
            <?php    
                include "../ServerScripts/DatabaseConnection.php";
                $keyword = $_POST['keyword'];
                $searchIn = $_POST['searchIn'];
                $category  = $_POST['category'];

                search($keyword, $searchIn, $category);

                function search($keyword, $searchIn, $category){
                    global $conn;
                    $selectAll = "SELECT * FROM `AvailableBooks`";

                    //Check for empty keyword
                    if ($keyword != ""){
                        ($searchIn!="All") ? ($checkSearchIn = $searchIn . " LIKE '%$keyword%'") : 
                            ($checkSearchIn = "`Title`  LIKE '%$keyword%' OR `Author` LIKE '%$keyword%'");
                    }
                    else{   $checkSearchIn = "`Title` LIKE '%%'";    }

                    //check for All category
                    ($category != "All") ? ($checkCategory = "Category LIKE '%$category%'") :
                        ($checkCategory = "'Category' LIKE '%%'");

                    //Check within the given constraints
                    $query2 = $selectAll . " WHERE (" . $checkCategory . ") AND (" . $checkSearchIn . ")";
                    $queryRow = $conn->query($query2);

                    //Check for empty result
                    if ($queryRow->num_rows>0){
                        echo '<table> <tr style="border-bottom: 1em solid black;">
                        <th>S.no</th> <th>ID</th> <th>Title</th> <th>Author</th>
                        <th>Category</th> <th>Language</th> <th>Available Count</th> </tr>';
                        if ($_SESSION['userID'] != 'Admin'){
                            echo "<form method='POST' action='../PlaceOrder/PlaceOrder.php'>";

                            $i=0;
                            while ($displayRow = $queryRow->fetch_assoc()){                           
                                echo "<tr>" . "<td>".  ++$i . "</td> <td>" .  $displayRow['ID'] . "</td> <td>" . $displayRow['Title'] . "</td> <td>" . $displayRow['Author'] . "</td> <td>" .
                                $displayRow['Category'] . "</td> <td>" . $displayRow['Language'] . "</td> <td>" . $displayRow['AvailableCount'] .
                                "</td> <td><button value=" . $displayRow['ID'] . " name='placeOrderButton' class='placeOrderButton'>  Place Order   </button></td>" . "</tr>";
                            }
                        }else{
                            $i=0;
                            while ($displayRow = $queryRow->fetch_assoc()){                           
                                echo "<tr>" . "<td>" .  ++$i . "</td> <td>" .  $displayRow['ID'] . "</td> <td>" . $displayRow['Title'] . "</td> <td>" . $displayRow['Author'] . "</td> <td>" .
                                $displayRow['Category'] . "</td> <td>" . $displayRow['Language'] . "</td> <td>" . $displayRow['AvailableCount'] . "</td>" . "</tr>";
                            }
                        }
                        echo "</table>" . "</form>";
                    }
                    else{
                        echo "<div style='font-size: larger; font-weight: bold;'>No Records found</div>";
                    }
                }
            ?>
        </div>
        <br>
        <a href="SearchBook.html"><button class="backButton" style="display: inline-block;">&lt&lt&lt</button> </a>
        <?php
            if ($_SESSION['userID'] == 'Admin')
                echo '<a href="../IssueBook/IssueBook.php" class="center viewOrderButton"><button>View Order</button> </a>';
        ?>
    </body>
</html>