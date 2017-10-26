<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <h1>Browse Books</h1>
                    <p>Here is where you can look for your favorite books.</p>

                    <form action="browse.php" class="search" method="GET"> <!-- Inspired by provided book-search.php and book-list.php files on PingPong -->
                        <div class="left">
                            <label>Title</label>
                            <input type="text" name="title">
                        </div>
                        <div class="left">
                            <label>Author</label>
                            <input type="text" name="author">
                        </div>

                        <input type="submit" name="submit" value="Search">
                    </form>

                    <ul class="results">

                    <?php
                        $title = "";
                        $author = "";

                        //Inspired by listBooks.php on PingPong
                        @ $db = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

                        if ($db->connect_error) {
                            echo '<br><p>Database error occured: ' . $db->connect_error . '</p>';
                            exit();
                        }

                        if (isset($_GET) && !empty($_GET)) { //Inspired by SQLInjection.php, XSS.php and sessionHijacking.php on PingPong
                            $title = $_GET["title"] ? addslashes(trim($_GET["title"])) : NULL;
                            $title = htmlentities(mysqli_real_escape_string($db, $title));
                            $author = $_GET["author"] ? addslashes(trim($_GET["author"])) : NULL;
                            $author = mysqli_real_escape_string($db, htmlentities($author));
                        }

                        if ($title && $author) {
                            $query = 'select * from library where reserved = 0 and title like "%' . $title . '%" and `First name` like "%' . $author . '%" or reserved = 0 and title like "%' . $title . '%" and `Last name` like "%' . $author . '%"';
                        } else if ($title) {
                            $query = 'select * from library where reserved = 0 and title like "%' . $title . '%"';
                        } else if ($author) {
                            $query = 'select * from library where reserved = 0 and `First name` like "%' . $author . '%" or reserved = 0 and `Last name` like "%' . $author . '%"';
                        } else {
                            $query = 'select * from library where reserved = 0';
                        }

                        $library = $db->prepare($query);
                        $library->bind_result($ID, $SSN, $firstName, $lastName, $birthYear, $URL, $ISBN, $Title, $Pages, $Edition, $Year, $publishingCompany, $Reserved);
                        $library->execute();

                        while($library->fetch()) {
                            echo '
                                <li class="result">
                                    <img src="../img/book.png" alt="book"/>
                                    <h2>' . $Title . '</h2>
                                    <span>by ' . $firstName . " " . $lastName . '</span>
                                    <p>' . $Title . " by " . $firstName . " " . $lastName . '</p>
                                    <a class="reserve" href="reserve.php?reserve=' . urlencode($ID) . '">Reserve</a>
                                </li>
                            ';
                        }

                        $library->close();
                    ?>

                    </ul>
                </section>
            </main>

            <?php include "footer.php" ?>
        </div>
    </body>
</html>
