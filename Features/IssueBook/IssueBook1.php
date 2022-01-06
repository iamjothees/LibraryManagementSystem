<?php   session_start();    ?>
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