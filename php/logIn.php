<?php include "config.php" ?>

<!DOCTYPE html>
<html>
    <?php include "head.php" ?>

    <body>
        <div id="pageContainer">
            <?php include "header.php" ?>

            <main>
                <section>
                    <h1>Log in</h1>
                    <p>Log in is required for this section.</p>

                    <form method="POST">
                        <label>Username</label>
                        <input type="text" name="username">
                        <label>Password</label>
                        <input type="password" name="password">
                        <input type="submit" name="submit">
                    </form>

                    <?php
                        echo "username as username and password as password, or root for both, for testing purposes.<br>";

                        if (isset($_POST) && !empty($_POST)) { //Inspired by SQLInjection.php, XSS.php and sessionHijacking.php on PingPong
                            @ $db = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

                            if ($db->connect_error) {
                                echo '<br><p>Database error occured: ' . $db->connect_error . '</p>';
                                exit();
                            }

                            $username = htmlentities(mysqli_real_escape_string($db, $_POST["username"]));
                            $password = htmlentities(mysqli_real_escape_string($db, sha1($_POST["password"])));

                            $query = $db->prepare("select * from user where username = '{$username}' and password ='{$password}'");
                            $query->execute();
                            $query->store_result();

                            if ($query->num_rows()) {
                                echo "<a href='imageUpload.php'>Access granted. Click here to access the image upload page.</a>";

                                ini_set("session.cookie_httponly", true);
                                session_start();

                                if (isset($_SESSION["userIP"]) === false) {
                                    $_SESSION["userIP"] = $_SERVER["REMOTE_ADDR"];
                                }

                                if ($_SESSION["userIP"] !== $_SERVER["REMOTE_ADDR"]) {
                                    session_unset();
                                    session_destroy();
                                }
                            } else {
                                echo "Access denied. The information did not make a correct match.";
                            }

                            $query->close();
                        }
                     ?>
                </section>
            </main>

            <?php include "footer.php" ?>
        </div>
    </body>
</html>
