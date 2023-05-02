<?php
include 'connectDB.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_st((artup_errors', 1);
error_reporting(E_ALL);




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
     </nav> ";

try {

  $db = connectDB();
  if ($db) {
    $select_query = "select * from `ITI`.`students`";
    $select_stmt = $db->prepare($select_query);
    $select_stmt->execute();
    $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "
        <table class='table table-dark table-striped text-center my-4'>
        <thead>
        <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Password</th>
        <th scope='col'>Room No</th>
        <th scope='col'>Image</th>
        <th scope='col'>Edit</th>
        <th scope='col'>Delete</th>
        </tr>
        </thead>
        <tbody>";
    foreach ($data as $row) {
      echo "<tr>";
      foreach ($row as $data) { 
        if($row['image'] == $data && $data !=""){
            echo "<td><img src='images/{$data}' width='100' heigth='100' ></td>"; 
        }
        else{
              echo "<td>{$data}</td>"; 
        }
      }
      echo "<td><a href='updateform.php?id={$row['id']}'class='btn btn-success'>Edit</a></td>";
      echo "<td><a href='delete.php?id={$row['id']}'class='btn btn-danger'>Delete</a></td>";
      echo "</tr>";
    }
    echo "</tbody>
        </table>
        </div>
        </div>
        </body>";
  }
} catch (Exception $ex) {
  echo $ex->getMessage();
}








?>