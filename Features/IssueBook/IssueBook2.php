<?php   session_start()?>
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

    button{
        padding : .5em;
        font-size: small;
        font-weight: bold;
    }
</style>

<?php
    if (isset($_POST['submit'])){
        include '../ServerScripts/DatabaseConnection.php';
        $idNo = $_POST['idNo'];
        $_SESSION['idNo'] = $idNo;
        $selectIdRowQuery = "SELECT * FROM `AvailableBooks` WHERE `ID` = $idNo";
        $display = $conn->query($selectIdRowQuery);

        echo '<table>
        <tr style="border-bottom: 1em solid black;">
            <th>ID</th> <th>Title</th> <th>Author</th>
            <th>Category</th> <th>Language</th> <th>Count</th>
        </tr>';
        while ( $displayRow = $display->fetch_assoc()){
            echo "<tr>" . "<td>".   $displayRow['ID'] . "</td> <td>" .  $displayRow['Title'] . "</td> <td>" .  $displayRow['Author'] . "</td> <td>" .
            $displayRow['Category'] . "</td> <td>" .  $displayRow['Language'] . "</td> <td>" .  $displayRow['Count'] .
            "</td> <td><button onclick='issueBookResult()'>  Issue   </button></td>" . "</tr>" . "<br>";
        }
        echo '</table> <br>';
    }
?>
<script>
    function issueBookResult(){
        window.location.href = "IssueBookResult.php";
    }
</script>