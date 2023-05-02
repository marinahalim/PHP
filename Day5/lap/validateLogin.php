<?php
include 'connectDB.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_st((artup_errors', 1);
error_reporting(E_ALL);

$errors = [];
$formData = [];
$email = $_POST["email"];
$password = $_POST["password"];

if (isset($email) and empty($email)) {
    $errors['email'] = 'Email is required';
} else {
    $formData['email'] = $_POST['email'];
}
if (isset($password) and empty($password)) {
    $errors['password'] = 'password is required';
} else {
    $formData['password'] = $_POST['password'];
}
if ($errors) {
    $errors_Str = json_encode($errors);
    $url = "Location:login.php?errors={$errors_Str}";
    if ($formData) {
        $oldData = json_encode($formData);
        $url .= "&old={$oldData}";
    }
    header($url);
} else {
    try {
        $db = new Database('ITI','root','Marina.107','localhost','3306');
        if($db){
            $user_data['email'] = "{$email}";
            $user_data['password'] = "{$password}";

            $db->validateLogin($db->connect(),'students', $user_data);
        }    
    } 
    catch (Exception $e) {
        echo $e->getMessage();    
    }
}

?>