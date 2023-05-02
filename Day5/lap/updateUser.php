<?php
include 'connectDB.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_st((artup_errors', 1);
error_reporting(E_ALL);

$errors = [];
$formData = [];
$id= $_GET['id'];
var_dump($_GET);
$email = $_POST["email"];
$name = $_POST["name"];
if (isset($name) and empty($name)) {
    $errors['name'] = 'Name is required';
  } else {
    $formData['name'] = $_POST['name'];
    if (preg_match("{/^[a-zA-Z-' ]*$/}", $name != 1)) {
      $errors['name_valid'] = "Only letters and white space allowed";
    }
  }
  
  if (isset($email) and empty($email)) {
    $errors['email'] = 'Email is required';
  } else {
    $formData['email'] = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email_valid'] = 'Email is not valid!!';
  
    }
  }
if ($errors) {
    $errors_Str = json_encode($errors);
    $url = "Location:updateform.php?errors={$errors_Str}";
    if ($formData) {
        $oldData = json_encode($formData);
        $url .= "&old={$oldData}";
    }
    header($url);
}
else {
  try {
     $db = new Database('ITI', 'root', 'Marina.107', 'localhost', '3306');
     if ($db) {
       $new_user['name'] = "{$name}";
       $new_user['email'] = "{$email}";
    
       $db->updateUserById($db->connect(),'students',$id, $new_user);
  } 


} catch (Exception $ex) {
  echo $ex->getMessage();
}


}

  




?>