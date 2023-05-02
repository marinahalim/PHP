<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

echo "<body text-light'>
<div class='container my-3'>
 <table class='table table-striped table-hover' >
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Password</th>
        <th scope='col'>Image</th>      
      </tr>
    </thead>
    <tbody>";
    $lines = file('users.txt');
  // var_dump($lines);
   ///exit();
    if($lines){
    foreach ($lines as $line) {
       $linedata=trim($line,"\n");
      $linedata = explode(":", $linedata);   //linedate= [Marina , Halim]
      echo "<tr>";
      
     foreach($linedata as $index=>$word){
       if($index==4){
        var_dump($word);
        echo "hiiii";
          echo "<td> <img src='{$word}' width='100' heigth='100' ></td>"; 
        }
        else{
          echo "<td>{$word}</td>";                    
        }
        //var_dump($word);
      }
      //var_dump($linedata);
      
      echo "</tr> ";
    }
    echo "</tbody>
          </table>
         
    </div> 
   
  </body>";               



  
  }

?>    