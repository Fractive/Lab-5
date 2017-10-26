<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <h1>My Books</h1>

                    <form action="myBooks.php" class="search" method="GET"> <!-- Inspired by provided book-search.php and book-list.php files on PingPong -->
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

                    <p>Below are the books which you have reserved.</p>

                    <ul class="results">
                        <?php //Inspired by the reservedbooks.php file provided on PingPong
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
                                $query = 'select * from library where reserved = 1 and title like "%' . $title . '%" and `First name` like "%' . $author . '%" or reserved = 1 and title like "%' . $title . '%" and `Last name` like "%' . $author . '%"';
                            } else if ($title) {
                                $query = 'select * from library where reserved = 1 and title like "%' . $title . '%"';
                            } else if ($author) {
                                $query = 'select * from library where reserved = 1 and `First name` like "%' . $author . '%" or reserved = 1 and `Last name` like "%' . $author . '%"';
                            } else {
                                $query = 'select * from library where reserved = 1';
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
                                        <a class="return" href="return.php?return=' . urlencode($ID) . '">Return</a>
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
