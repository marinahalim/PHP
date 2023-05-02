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
$name = 'mayar2';
$email = 'mayar2@gmail.com';
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, PORT);

    // first way but not prefer
    /*$query = "insert into `ITI`.`students` (name,email) 
              values('{$name}','{$email}');";
    $conn->query($query);*/ 

    //second way
   /* $insert_query = "insert into `ITI`.`students` (name,email) values (?,?);";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param('ss',$name,$email);
    $insert_stmt->execute();
    $data_info= $insert_stmt->get_result();
    var_dump($data_info);
    */



    $id=10;
    $select_query="select * from `ITI`.`students` where id > ? ";
    $select_stmt = $conn->prepare($select_query);
    $select_stmt->bind_param('i',$id);
    $select_stmt->execute();
    $data_info=$select_stmt->get_result();
  

   /* while($row=$data_info->fetch_assoc()){  //row by row
        var_dump($row);

    }*/

     $data=$data_info->fetch_all(2);
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


} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>