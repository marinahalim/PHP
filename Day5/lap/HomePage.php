<?php
include 'connectDB.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_st((artup_errors', 1);
error_reporting(E_ALL);
session_start();


if ($_SESSION["login"]) {
  $name = strtok($_SESSION["email"], "@{1,9}");
  echo"
   
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <title>Home Page</title>
</head>

<body style='background-color: black;'>
    <div class='container' style='color: white;'>
      <nav class='navbar navbar-expand-lg  navbar-dark '> 
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
              <a class='nav-link active' aria-current='page' href='HomePage.php'>Home</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link active' href='userstable.php'>users</a>
            </li>
        </div>  
        </ul>
        <ul class='nav navbar-nav navbar-right'>
        <li class='nav-item '>
         <a class='nav-link active' href='logOut.php'>Logout</a>
        </li>
      </ul>  
     </nav> 
    <div class='row  my-4'>
      <h2 class='col-12 text-center  text-danger my-4'>
        Welcome to your Home Page {$name}
      </h2>
     
    </div>
  </div>
</body>";
} else {
  header("Location:login.php");

}

?>