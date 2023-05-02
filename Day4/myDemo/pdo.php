<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "Marina.107");
define("DB_DATABASE", "ITI");
define("PORT", 3308);

try {
    // DSN ->>> Data Source Name;
    $dsn = 'mysql:dbname=ITI;host=localhost;port=3308;';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    if ($db) {
        $select_query = "select * from `ITI`.`students`";
        $select_stmt = $db->prepare($select_query);
        $select_stmt->execute();
        $data = $select_stmt->fetchAll();   //----------->why repeat result
        var_dump($data);
        // echo $select_stmt->errorInfo();    // ------------>error
        //  $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

        /* echo "
        <div class='container my-3 text-light'>
        <table class='table table-striped table-hover text-center' >
        <thead>
        <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($data as $row) { // id name email
        echo "<tr>";
        foreach ($row as $data) { // id
        echo "<td>{$data}</td>";
        }
        echo "</tr>";
        }
        echo "</tbody>
        </table>
        </div>";
        */
    }

    // :colon placeholder;
    /*
    $name="fefe";
    $email="fefe@gmail.com";
    $insert_query="insert into `ITI`.`students` (name,email) values (:name,:email);";
    $insert_statm = $db->prepare($insert_query);
    $insert_statm->bindParam(":name",$name);
    $insert_statm->bindParam(":email",$email);
    $insert_statm->execute();*/

    // update and transaction
    $id = 10;
    $name = "Hsnaa";
    $email = "hsnaa@gmail.com";
    $update_query = "update  `ITI`.`students`
                     set `name`=:name,`email`=:email
                     where `id`=:id ;";
                 
                 
    $db->beginTransaction();
    $update_statm = $db->prepare($update_query);
    $update_statm->bindParam(":id", $id);
    $update_statm->bindParam(":name", $name);
    $update_statm->bindParam(":email", $email);
    $update_statm->execute();
    $db->commit();







    // close connection;
    $db = null;


} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>