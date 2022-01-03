<!DOCTYPE html>

<?php
/*     if (isset($_POST['submit'])){
        include '../ServerScripts/DatabaseConnection.php';
        $idNo = $_POST['idNo'];
        $selectIdRowQuery = "SELECT * FROM `AvailableBooks` WHERE `ID` = $idNo";
        $display = $conn->query($selectIdRowQuery);

        echo '<table>
        <tr style="border-bottom: 1em solid black;">
            <th>ID</th> <th>Title</th> <th>Author</th>
            <th>Category</th> <th>Language</th> <th>Count</th>
        </tr>';
        while ( $displayRow = $display->fetch_assoc()){
            echo "<tr>" . "<td>".   $displayRow['ID'] . "</td> <td>" .  $displayRow['Title'] . "</td> <td>" .  $displayRow['Author'] . "</td> <td>" .
            $displayRow['Category'] . "</td> <td>" .  $displayRow['Language'] . "</td> <td>" .  $displayRow['Count'] . "</tr>" . "<br>";
        }
        echo '</table>';
    }*/
?>

<html>
    <head>

        <style>
            input[type=number]{
                padding: 1em;
            }
            .center{
                display: flex;
                justify-content: center;
                margin-top: 5em;
            }
            input[type=submit]{
                padding : .8em 2em;
                font-size: medium;
                font-weight: bold;
                border-radius: .5em;
                background-color: beige;
                display: block;
                margin: auto;
            }

            input[type=number]{
                margin-bottom: 2em;
            }
        </style>
    </head>
    <body>
        <div class="center">
        <form method="POST" action="">
            <span>Select ID</span>
            <input type="number" name="idNo"><br>
            <input type="submit" id="button" name="submit" value="Search">
        </form>
        </div>
        <div class="center">
            <?php include 'IssueBook2.php';?>
        </div>
    </body>
</html>