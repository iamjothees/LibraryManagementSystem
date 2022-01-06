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

    .center{
                display: flex;
                justify-content: center;
                text-align: center;
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
    include '../ServerScripts/DatabaseConnection.php';

    $query1 = "SELECT * FROM `OrderedBooks` WHERE `Issued`=0";
    $orderDetail = $conn->query($query1);
    

    echo '<div class="center"><table>
        <tr style="border-bottom: 1em solid black;">
        <th>User ID</th> <th>Title</th> <th>Author</th> <th>Language</th> <th>Count</th> </tr>';
    while ( $displayRow1 = $orderDetail->fetch_assoc()){
        echo  "<br>" . $displayRow1['BookID'] . "  >>>>> ";
        $query2 = "SELECT * FROM `AvailableBooks`";
        $bookDetail = $conn->query($query2);
        while ( $displayRow2 = $bookDetail->fetch_assoc()){
            echo $displayRow2['ID'];
            if ($displayRow1['BookID'] == $displayRow2['ID']){
                echo "<tr>" . "<td>" .   $displayRow1['UserID'] . "</td> <td>" .  $displayRow2['Title'] . "</td> <td>" .
                $displayRow2['Author'] . "</td> <td>" . $displayRow2['Language'] . "</td> <td>" . $displayRow2['Count'] . "</td> <td>" .
                "</td> <td><button onclick='issueBookResult()'>  Issue   </button></td>" . "</tr>" . "<br>";
            }
        }
    }
    echo '</table> <br>';

    echo  '<a href="../../Users/Admin.html"><button class="backButton" style="display: inline-block;">&lt&lt</button> </a>';
?>
<script>
    function issueBookResult(){
        window.location.href = "IssueBookResult.php";
    }
</script>