<?php //Inspired by the reserve.php and reserveBook.php file provided on PingPong
    include "config.php";

    $library = urldecode($_GET["return"]);

    @ $db = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

    if ($db->connect_error) {
        echo '<br><p>Database error occured: ' . $db->connect_error . '</p>';
        exit();
    }

    $reserve = $db->prepare("update library set reserved = 0 where ID = ?");
    $reserve->bind_param("i", $library);
    $reserve->execute();
    $reserve->close();

    include "home.php";
 ?>
