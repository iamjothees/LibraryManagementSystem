<!DOCTYPE html>
<html>
    <head>
        <title> Search Result</title>
        <style>
            table{
                border: .1em solid black;
                text-align: center;
                font-size: larger;
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
        </style>
    </head>
    <body class = "center">
        <table>
            <?php    
                include "DatabaseConnection.php";
                $keyword = $_POST['keyword'];
                $searchIn = $_POST['searchIn'];
                $category  = $_POST['category'];

                search($keyword, $searchIn, $category);
                
                $conn->close();

                function search($keyword, $searchIn, $category){
                    global $conn;
                    $selectAll = "SELECT * FROM `AvailableBooks`";

                    if ($keyword != ""){
                        ($searchIn!="All") ? ($checkSearchIn = $searchIn . " LIKE '%$keyword%'") : 
                            ($checkSearchIn = "`Title`  LIKE '%$keyword%' OR `Author` LIKE '%$keyword%'");
                    }
                    else{   $checkSearchIn = "`Title` LIKE '%%'";    }

                    ($category != "All") ? ($checkCategory = "Category LIKE '%$category%'") :
                        ($checkCategory = "'Category' LIKE '%%'");
                        
                    $query2 = $selectAll . " WHERE (" . $checkCategory . ") AND (" . $checkSearchIn . ")";

                    $queryRow = $conn->query($query2);
                    if ($queryRow->num_rows>0){
                        echo '<tr style="border-bottom: 1em solid black;"> <th>ID</th> <th>Title</th> <th>Author</th> <th>Category</th> <th>Language</th> <th>Count</th> </tr>';
                        while ($rowDisplay = $queryRow->fetch_assoc()){                           
                            echo "<tr>" . "<td>".  $rowDisplay['ID'] . "</td> <td>" . $rowDisplay['Title'] . "</td> <td>" . $rowDisplay['Author'] . "</td> <td>" .
                            $rowDisplay['Category'] . "</td> <td>" . $rowDisplay['Language'] . "</td> <td>" . $rowDisplay['Count'] . "</tr>" . "<br>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "</table>  <div style='font-size: larger; font-weight: bold;'>No Records found</div>";
                    }
                }
            ?>
            if ()
            <br><a href="/Library Management System/ViewOrder.html"><button> View Order</button> </a>
    </body>
</html>