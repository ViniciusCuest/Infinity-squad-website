<?php
function Connection() {
    $database = "banana_project";
    $user = "root";
    $pass = "";
    try {
        $db = new PDO('mysql:host=localhost;dbname='.$database, $user, $pass);
    }
    catch (PDOException $err) {
        echo "Error: " + $err;
        die();
    }

    return $db;
}
?>