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
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, PORT);
    // insert
    /* $query="insert into `ITI`.`students` (name,email) 
    values('omar','omar@gmail.com'),
    ('Amira','Amira@gmail.com'),
    ('Ahmed','Ahmed@gmail.com')";
    $res=$conn->query($query);
    var_dump($conn->affected_rows);
    var_dump($conn->insert_id);*/

    //update
    /*  $query2="update `ITI`.`students` 
    set name='Marina'
    where id=1;";   
    $res=$conn->query($query2);
    var_dump($conn->affected_rows);
    var_dump($res);*/
    //delete
    /*
    $query = "delete from  `ITI`.`students`
             where id=11; ";
    $res=$conn->query($query);         
    var_dump($conn->affected_rows);
    */

    // select
    $query = "select * from `ITI`.`students`; ";
    $res = $conn->query($query);
    $data = $res->fetch_all(2); // indexed array
  //  var_dump($data);
  
   //$res->free_result();
  ///  var_dump($res->num_rows);

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

          // 
       //   var_dump(reset($data));
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



    $conn->close();




} catch (Exception $ex) {
    echo $ex->getMessage();
}