<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <div id="welcome">
                        <?php
                            if ($currentPage == "reserve.php") {
                                echo '<h1>Your book has been reserved!</h1>
                                    <img src="../img/book.png" alt="book"/>
                                    <p>Find your reserved books under My Books.</p>
                                ';
                            } else if ($currentPage == "return.php") {
                                echo '<h1>The book has been returned!</h1>
                                    <img src="../img/book.png" alt="book"/>
                                    <p>Find more books under Browse Books.</p>
                                ';
                            } else {
                                echo '<h1>Welcome to Book Journey!</h1>
                                    <img src="../img/book.png" alt="book"/>
                                    <p>Book Journey is where you can discover new books and interact with a community of book lovers! Find your books and share your ideas.</p>
                                ';
                            }
                        ?>
                    </div>
                </section>
            </main>

            <?php include "footer.php" ?>
        </div>
    </body>
</html>
