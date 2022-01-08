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
        /* text-align: center; */
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

    $query1 = "SELECT * FROM `OrderedBooks` WHERE `Issued`=1 && `Returned`=0";
    $outstandingDetail = $conn->query($query1);
    

    if ($outstandingDetail->num_rows>0){
        echo '<div class="center">  <form method="POST" action="ReturnBookResult.php">  <table>
            <tr style="border-bottom: 1em solid black;">
            <th>S.No</th> <th>User ID</th> <th>Title</th> <th>Author</th> <th>Language</th> <th>Count</th> <th>Available Count</th> </tr>';
        while ( $displayRow1 = $outstandingDetail->fetch_assoc()){
            /* echo  "<br>" . $displayRow1['BookID'] . "  >>>>> "; */
            $query2 = "SELECT * FROM `AvailableBooks`";
            $bookDetail = $conn->query($query2);
            $sNo;
            while ( $displayRow2 = $bookDetail->fetch_assoc()){
                /* echo $displayRow2['ID']; */
                if ($displayRow1['BookID'] == $displayRow2['ID']){
                    echo "<tr>" . "<td>" .   ++$sNo . "</td> <td>" .   $displayRow1['UserID'] . "</td> <td>" .  $displayRow2['Title'] . "</td> <td>" .
                    $displayRow2['Author'] . "</td> <td>" . $displayRow2['Language'] . "</td> <td>" . $displayRow2['Count'] . "</td> <td>" .$displayRow2['AvailableCount'] . "</td> <td>" .
                    "</td> <td><button value='$displayRow1[ID]' name='returnedButton'>  Returned   </button></td>" . "</tr>" . "<br>";
                }
            }
        }
        echo '</table> </form>  <br>';
    }else
    {
        echo "<div style='font-size: larger; font-weight: bold;' class='center'>No Records found</div>";
    }

    echo  '<a href="../../Users/Admin.html"><button class="backButton" style="display: inline-block;">&lt&lt&lt
    
    </button> </a>';
?>
