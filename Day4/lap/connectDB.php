<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function connectDB()
{

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "Marina.107");
    define("DB_DATABASE", "ITI");
    define("PORT", 3308);
    try {
        $dsn = 'mysql:dbname=ITI;host=localhost;port=3308;';
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
        return $db;

    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

?>