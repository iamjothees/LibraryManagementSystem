<?php
    session_start();
    $user = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html>

<head>
    <title> Search Book </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .bg {
            background-image: url(../../Images/Background.jpg);
            background-color: blueviolet;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 1698px 1131px;
            margin: 0 10em 0;

        }

        .center {
            display: flex;
            justify-content: center;
        }

        .container {
            margin-top: 3em;
            width: 400px;
            height: 400px;
            text-align: center;
        }

        .containerBG {
            position: absolute;
            width: 700px;
            height: 400px;
            margin-top: 1.5em;
            background-color: beige;
            opacity: 40%;
            z-index: -1;
            border-radius: 10px;
        }

        input[type=text] {
            font-size: large;
            padding: .5em 0em;
            margin: 5em 0em 1em;
            text-align: center;
        }

        select {
            font-size: large;
            padding: .5em;
            text-align: center;
            margin: 1em .5em;
        }

        input[type=submit] {
            padding: .8em 5em;
            font-size: medium;
            font-weight: bold;
            border-radius: .5em;
            background-color: beige;
            display: block;
            margin: auto;
        }

        span {
            font-size: large;
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

<body class="bg" onload="changeWidth()">
    <div class="center">
        <div class="container">
            <div class="center">
                <div class="containerBG">
                </div>
            </div>

            <form method="POST" action="SearchBookResult.php">
                <div class="center">
                    <input type="text" name="keyword" size=50 placeholder="(SHOW ALL)"><br>
                </div>
                <div class="center">
                    <span>By</span>
                    <select name="searchIn">

                        <option value="All">Title & Author</option>
                        <option value="Title">Title</option>
                        <option value="Author">Author</option>
                    </select>
                    <span>In</span>
                    <select name="category">
                        <option value="All">All Categories</option>
                        <option value="Self Help">Self Help</option>
                        <option value="Biography">Biography</option>
                        <option value="Spiritual">Spiritual</option>
                        <option value="Health">Health</option>
                        <option value="Thriller Fiction">Thriller Fiction</option>
                        <option value="Romance Fiction">Romance Fiction</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Undefined">Undefined</option>
                    </select><br>
                </div>
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <?php
        if ($user == "Admin")
            echo    '<a href="../../Users/Admin.html"><button class="backButton">&lt&lt&lt</button></a>';
        else
        echo    '<a href="../../Users/Member.html"><button class="backButton">&lt&lt&lt</button></a>';
    ?>
</body>

<script>
    function changeWidth() {
        if (window.screen.width < 700) {
            document.getElementsByClassName('containerBG')[0].style.width = "90%";
            document.getElementsByClassName('containerBG')[0].style.height = "60%";
            document.getElementsByName('keyword')[0].setAttribute('size', '25');
            document.getElementsByTagName('input')[1].style.fontSize = "small";
            document.getElementsByTagName('input')[1].style.padding = "0.8em 2em";
        
            x = document.getElementsByTagName('select');
            y = document.getElementsByTagName('span');
            for (i=0; i<x.length; i++){
                x[i].style.fontSize = ".7em";
                y[i].style.fontSize = "small";
            }
        }
        else {
            document.getElementsByClassName('containerBG')[0].style.width = "700px";
            document.getElementsByClassName('containerBG')[0].style.height = "400px";
            document.getElementsByName('keyword')[0].setAttribute('size', '50');
            document.getElementsByTagName('input')[1].style.fontSize = "medium";
            document.getElementsByTagName('input')[1].style.padding = "0.8em 5em";
        
            x = document.getElementsByTagName('select');
            y = document.getElementsByTagName('span');
            for (i=0; i<x.length; i++){
                x[i].style.fontSize = "large";
                y[i].style.fontSize = "large";
            }

        }
    }

    window.addEventListener('resize', changeWidth);
</script>

</html>