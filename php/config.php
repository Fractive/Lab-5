<?php //Inspired by provided config.php files in PingPong
    $lab = 4;
    $url = $_SERVER["REQUEST_URI"];
    $urlStrings = explode("/", $url);
    $urlStrings = end($urlStrings);
    $urlStrings = explode("?", $urlStrings);
    $currentPage = reset($urlStrings);

    $dbName = "bookJourneySimpleDB";
    $dbUser = "root";
    $dbPass = "";
    $dbServer = "localhost";
?>
