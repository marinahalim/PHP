<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

echo "<body text-light'><div class='container my-3'> <table class='table table-striped table-hover' >
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Address</th>
        <th scope='col'>Edit</th>
        <th scope='col'>Delete</th>       
      </tr>
    </thead>
    <tbody>";
    $lines = file('users.txt');
    if($lines){
    foreach ($lines as $line) { //Marina Halim
      $linedata = explode(":", $line);   //linedate= [Marina , Halim]
      echo "<tr>";
      foreach($linedata as $word){
        echo "<td>{$word}</td>";                    
      }
      echo "<td><a  href='updateform.php?id={$linedata[0]}'class='btn btn-success'>Edit</a></td>";
      echo "<td><a href='deleteUser.php?id={$linedata[0]}'class='btn btn-danger'>Delete</a></td>";
      echo "</tr> ";
    
    }
    echo "</tbody></table>";
    echo "<div class='d-flex justify-content-center'><a href='registerForm.php'class='btn btn-primary btn-lg'>Add new user</a></div>";
    echo" </div></body>";
  }

?>    