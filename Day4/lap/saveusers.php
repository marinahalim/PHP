<?php
include 'connectDB.php';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_st((artup_errors', 1);
error_reporting(E_ALL);

$errors = [];
$formData = [];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$roomNo = $_POST["roomNo"];
$image = $_FILES["image"];

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

if (isset($password) and empty($password)) {
  $errors['password'] = 'Enter password please!';
} else {
  $formData['password'] = $_POST['password'];
  if (preg_match("{/^[a-z]{8}/}", $password != 1)) {
    $errors['password_valid'] = 'weak password!!';
  }
}

if (isset($confirm) and empty($confirm)) {
  $errors['confirm'] = 'repeat your password please!';
} else {
  if ($_POST['confirm'] != $_POST['password']) {
    $errors['confirm_valid'] = 'password dosnt match!!';
  }
}

if ($errors) {
  $errors_Str = json_encode($errors);
  $url = "Location:registerForm.php?errors={$errors_Str}";
  if ($formData) {
    $oldData = json_encode($formData);
    $url .= "&old={$oldData}";
  }
  header($url);
} else {
  try {
    
    $imagename = '';
    if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
      $imagename = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $ext_name = pathinfo($imagename)['extension'];
      if (in_array($ext_name, ['png', 'jpg'])) {
        $uploaded = move_uploaded_file($tmp_name, "images/$imagename");
      }
    }
    $db = connectDB();
    if ($db) {
      $addTable_query = "create table if not exists `students`(`id` serial primary key,`name` varchar(100) ,`email` varchar(400) unique ,`password` varchar(400),`roomNo` varchar(400) ,`image` varchar(500));";
      $addTable_stmt = $db->prepare($addTable_query);
      $response = $addTable_stmt->execute();


      $insert_query = "insert into `ITI`.`students` (name,email,password,roomNo,image) values (:name,:email,:password,:roomNo,:image);";
      $insert_statm = $db->prepare($insert_query);
      $insert_statm->bindParam(":name", $name);
      $insert_statm->bindParam(":email", $email);
      $insert_statm->bindParam(":password", $password);
      $insert_statm->bindParam(":roomNo", $roomNo);
      $insert_statm->bindParam(":image", $imagename);

      

      $response = $insert_statm->execute();
      if($response == false) {
        var_dump($response);
        $errors['emailrepeat'] = 'Email is already registerd, you can login directly';
        $errors_Str = json_encode($errors);
        header("Location:registerForm.php?errors={$errors_Str}");
      } else {
        header('Location:login.php');
      }
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}

?>