<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);  

$errors=[];
$formData=[];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$address = $_POST["address"];
var_dump($_POST["address"]);
if(isset($firstName) and empty($firstName)){
    $errors['firstName']='First Name is required';
}
else{
    $formData['firstName']=$_POST['firstName'];

}
if(isset($lastName) and empty($lastName)){
    $errors['lastName']='Last Name is required';
}
else{
    $formData['lastName']=$_POST['lastName'];
}
if(isset($address) and empty($address) ){
    $errors['address']='Address is required';
}
else{ 
    $formData['address']=$_POST['address'];

}

if($errors){
    $errors_Str=json_encode($errors);
    $url="Location:registerForm.php?errors={$errors_Str}";
    if($formData){
        $oldData = json_encode($formData);
        $url.="&old={$oldData}";
    }
    header($url);
}
else{
    try{
        $fileobj = fopen("users.txt",'a');
        $id=time();
        $userdate ="{$id}:{$_POST["firstName"]}:{$_POST["lastName"]}:{$_POST["address"]}";
        if($fileobj){ 
           fwrite($fileobj,$userdate.PHP_EOL);
           header('Location:userstable.php');
           fclose($fileobj);
        }
    }catch(Exception $ex){
        echo $ex->getMessage();
    }

}





?>