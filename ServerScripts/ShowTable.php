<title>Report</title>
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

    button{
        padding : 1em;
        font-size: medium;
        font-weight: bold;
    }
</style>

<?php
    echo '
    <div class = "center">
        <table>
            <tr style="border-bottom: 1em solid black;">
                <th>ID</th> <th>Title</th> <th>Author</th>
                <th>Category</th> <th>Language</th> <th>Count</th>
            </tr>';
    include '/Library Management System/ServerScripts/DatabaseConnection.php';
    global $conn;
    $selectAllQuery = "SELECT * FROM AvailableBooks";
    $display = $conn->query($selectAllQuery);
    while ( $displayRow = $display->fetch_assoc()){
        echo "<tr>" . "<td>".   $displayRow['ID'] . "</td> <td>" .  $displayRow['Title'] . "</td> <td>" .  $displayRow['Author'] . "</td> <td>" .
        $displayRow['Category'] . "</td> <td>" .  $displayRow['Language'] . "</td> <td>" .  $displayRow['Count'] . "</tr>" . "<br>";
    }
    echo '
        </table>
    </div>';
?>