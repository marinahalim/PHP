<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

try{

   #1- write 
     /*$fileobj = fopen("user.txt",'w');
     if($fileobj){
        fwrite($fileobj,"Hello ");
        fwrite($fileobj,"PHP".PHP_EOL);      
     }*/
     
   #2-append
     $fileobj = fopen("user.txt",'a');
     if($fileobj){
        fwrite($fileobj,"I love ");
        fwrite($fileobj,"PHP");      
     }

   // fclose($objfile);

}catch(Exception $ex){
    echo $ex->getMessage();

}
?>