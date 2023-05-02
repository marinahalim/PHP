<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

try {

  $objfile = fopen("mycv.txt", 'r');
  if ($objfile) {

    $filesize = filesize('mycv.txt');

    #1- read in one string
      //$data= fread($objfile,$filesize);
      //var_dump($data);

    #2- read line by line
      /*while(! feof($objfile)){
      //  var_dump(fgets($objfile));
      }*/

    #3- read each line in array
        //$line = fgetcsv($objfile,1000,' ');
    //var_dump($line);
    /*
        while(! feof($objfile)){
    var_dump(fgetcsv($objfile,1000,' '));  
    }*/
    #4- read into one array
        /*echo "<table class='table'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
      </tr>
    </thead>
    <tbody>";
    $lines = file('mycv.txt');
    var_dump($lines);  
    foreach ($lines as $line) { //Marina Halim
      $linedata = explode(" ", $line);   //linedate= Marina + Halim
      echo "<tr> <th scope='row'>#</th>";
      foreach($linedata as $word){
        var_dump($word);
        echo "<td>{$word}</td>";                    
      }
      echo "</tr>";
     
      //var_dump($linedata);
    }*/
    #5- read and print in one line   
        // readfile("mycv.txt");
    
    #6- read in one string
          /* $filedata = file_get_contents("mycv.txt");
          var_dump($filedata);  */
    fclose($objfile);

  }

} catch (Exception $ex) {
  echo $ex->getMessage();

}
?>