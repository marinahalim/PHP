<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

session_start();
if($_SESSION["login"]){
  $name = strtok($_SESSION["email"], "@{1,9}");
    echo " <div class='container'>
             <div class='row'>
                <h2 class='col-12 text-center'>
                    Welcome to your Home Page {$name}
                </h2>
                <div class='col-12 text-center'>
                  <a href='logOut.php'class='btn btn-danger'>logout</a>
                </div>

              </div>
            </div>";
   
   
}
else{
    header("Location:login.php");

}

?>