<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  
$errors=[];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$address = $_POST["address"];
if(isset($firstName) and empty($firstName)){
    $errors["firstName"]="First Name is required";
}
if(isset($lastName) and empty($lastName)){
    $errors["lastName"]="Last Name is required";
}
if(isset($address) and empty($address)){
    $errors["address"]="Address is required";
}

if($errors){
    header('Location:updateform.php');
}
else{
    try{
        $id=$_GET["id"];
$users = file("users.txt"); 
foreach($users as $index=>$user){
    $linedata = explode(":", $user);
    if($linedata[0] == $_GET["id"]){
        unset($users[$index]);
        $fileobj = fopen("users.txt",'w');
        foreach($users as $user){
        fwrite($fileobj,$user);
       }
      fclose($fileobj);
        $fileobj = fopen("users.txt",'a');
        $userdate ="{$id}:{$_POST["firstName"]}:{$_POST["lastName"]}:{$_POST["address"]}";
        if($fileobj){
           fwrite($fileobj,$userdate.PHP_EOL);
           fclose($fileobj);
        }
        break;
        }      
    }     


header('Location:userstable.php');

    }catch(Exception $ex){
        echo $ex;
    }
    
}
?>  