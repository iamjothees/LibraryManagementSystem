<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../StyleSheets/UserLoginPage.css">
        <link rel="stylesheet" href="../StyleSheets/UpdatePage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="center" style="">

        <form style="background-color: beige;" method="post" action="">
            <span class="bookDetail" style="margin-left: -2em;">Title</span>
            <input type="text" name="title"><br>
            <span class="bookDetail" style="margin-left: -3em;">Author</span>
            <input type="text"><br>
            <span class="bookDetail" style="margin-left: -4em;">Category</span>
            <select>
                <option value="Biography"> Biography</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Fictional">Fictional</option>
                <option value="History">History</option>
                <option value="Reference">Reference</option>
                <option value="General">General</option>
                <option value="Others">Others</option>
            </select><br>
            <span class="bookDetail" style="margin-left: -4em;">Language</span>
            <select>
                <option value="Tamil">Tamil</option>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Others">Others</option>

            </select><br>
            <span id="condition" class="bookDetail" style="margin-left: -4em;">Condition</span><br>
                <input name="condition" type="radio" value="New" class="conditionInput">
                <label class="yearLabel">New</label><br>
                <input  name="condition" type="radio"  value="Old" class="conditionInput">
                <label class="yearLabel">Old</label><br>
            <span class="bookDetail" style="margin-left: -2em;">Price</span>
            <input type="number"><br>           

            <input type="submit" style="padding:.5em 2.5em; margin-top: 2.5em; border-radius: .4em; background-color: beige; font-weight: bolder; font-size: large;/>
            ">ADD</input>
        </form>

            <?php
                $title = $_POST['title'];
                echo $title;
            ?>
    </body>
</html>