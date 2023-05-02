<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//---------------------------1-set cennection credit---------------------
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "Marina.107");
define("DB_DATABASE", "ITI");
define("PORT", 3308);



try {
  //--------------------------2- open connection--------------------------- 
  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, PORT);
  if (mysqli_connect_errno()) {
    trigger_error(mysqli_connect_error());
    echo "failed to connect to MYSQL" . mysqli_connect_error();
    exit;
  } else {
    echo "server listen at port 3306";
  }

  //--------------------------3- make query ---------------------
  /*$query="create table if not exists `students`(`id` serial primary key,`name` varchar(100) ,`email` varchar(400) unique)";
  //--------------------------- 4-excute query ------------------
  $res=mysqli_query($conn,$query);
  var_dump($res);*/

  //-----------------------------5-close query ------------------------------------
  //mysqli_close($conn);  

  //--------------------insert------
  /* $query="insert into `ITI`.`students` (name,email) 
  values('Reta','retaessam7@gmail.com'),
  ('Merna','mernafathy2@gmail.com'),
  ('Margo','margomaher71@gmail.com')";
  $res=mysqli_query($conn,$query); 
  var_dump(mysqli_insert_id($conn));
  */

  //--------update----------------------
  /*$query2="update `ITI`.`students` 
  set name='MarinaHalim'
  where id=1;";               
  
  $res=mysqli_query($conn,$query2);
  var_dump(mysqli_affected_rows($conn));
  var_dump($res);*/

  // select
  $query = "select * from `ITI`.`students`; ";
  $res = mysqli_query($conn, $query);
  //$data = mysqli_fetch_all($res,1); /// assciative array
  //$data = mysqli_fetch_all($res); /// assciative array
  $data = mysqli_fetch_all($res, 2); /// indexed array
  //echo($data);
  echo "
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
  mysqli_close($conn);
} catch (Exception $ex) {
  echo $ex->getMessage();


}









?>