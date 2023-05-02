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

        $db = connectDB();
        if ($db) {

        $logged_in = false;
        $auth_query = "select email from `ITI`.`students` where `email`=:email and `password`=:password";
        $auth_stmt = $db->prepare($auth_query);
        $auth_stmt->bindParam(":email",$email);
        $auth_stmt->bindParam(":password",$password);
        $auth_stmt->execute();
        $response = $auth_stmt->fetch();
        if($response != false){
            $logged_in = true;
        }
        if ($logged_in) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['login'] = true;
            header("Location:HomePage.php");

        } else {
            $error['valid'] = 'Invalid Email or Password !!!';
            $error_Str = json_encode($error);
            header("Location:login.php?errors={$error_Str}");
        }
    }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

}

?>