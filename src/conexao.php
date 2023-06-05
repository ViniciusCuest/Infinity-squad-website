<?php
function Connection() {
    $database = "banana_project";
    $user = "root";
    $pass = "";
    try {
        $db = new PDO('mysql:host=localhost;charset=utf8mb4;dbname='.$database, $user, $pass);
        $db->exec("SET CHARACTER SET utf8");
        $db->exec("set names utf8mb4");
    }
    catch (PDOException $err) {
        echo "Error: " + $err;
        die();
    }

    return $db;
}
?>