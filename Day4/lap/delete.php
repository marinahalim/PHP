<?php
include 'connectDB.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_st((artup_errors', 1);
error_reporting(E_ALL);


$id= $_GET['id'];
try {

    $db = connectDB();
    if ($db) {
       
        $update_query = "delete from  `ITI`.`students`             
                         where `id`=:id ;";
          
        $update_statm = $db->prepare($update_query);
        $update_statm->bindParam(":id", $id);
        $update_statm->execute();
        header('Location:userstable.php');
    }
}catch (Exception $ex) {
        echo $ex->getMessage();
      }




?>