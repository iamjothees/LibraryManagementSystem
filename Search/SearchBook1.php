<!DOCTYPE html>
<html>
    <head>
        <title> Search Book </title>

    </head>

    <body>
        <?php
            echo '<form method="post" action="SearchBookPhp.php" name="adminSearch" value=$whoseSearch>';
        ?>
            <input type="text" name="keyword">
            <select name="searchIn">
                <option value="All">All</option>
                <option value="Title">Title</option>
                <option value="Author">Author</option>
            </select><br>
            <select name="category">
                <option value="All">All</option>
                <option value="Biography">Biography</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Fictional">Fictional</option>
                <option value="History">History</option>
                <option value="Reference">Reference</option>
                <option value="General">General</option>
                <option value="Others">Others</option>
            </select><br>
            <input type="submit">
        </form>
    </body>
</html>