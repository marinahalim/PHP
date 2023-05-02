<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//var_dump($_POST);
//var_dump($_FILES);
//exit;

$errors = [];
$formData = [];
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];



if (isset($name) and empty($name)) {
  $errors['name'] = 'Name is required';
} else {
  $formData['name'] = $_POST['name'];
  if (preg_match("{/^[a-zA-Z-' ]*$/}", $name !=1)) {
    $errors['name_valid'] = "Only letters and white space allowed";


  }

}
//email validation
if (isset($email) and empty($email)) {
  $errors['email'] = 'Email is required';
} else {
  $formData['email'] = $_POST['email'];
  /*  $email_pattern="^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
  if(!preg_match($pattern,$email)){
  $errors['email_valid']='Email is not valid!!';
  var_dump($errors['email_valid']);
  }*/

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_valid'] = 'Email is not valid!!';

  }
}

//password validation
if (isset($password) and empty($password)) {
  $errors['password'] = 'Enter password please!';
}
else {
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
    // handle image
    //var_dump($_FILES['image']);
   //  exit();

     $imagename = '';
    if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
      $imagename = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $ext_name = pathinfo($imagename)['extension'];
    //  $newName = time();
      //$image_newName = "i{$newName}.{$ext_name}";
      if (in_array($ext_name, ['png', 'jpg'])) {
        $uploaded = move_uploaded_file($tmp_name, $imagename);
        //var_dump($uploaded);
      //  exit();
      }
    }
    $fileobj = fopen("users.txt", 'a');
    $id = time();
    $userdate = "{$id}:{$_POST["name"]}:{$_POST["email"]}:{$_POST["password"]}:{$imagename}";
    if ($fileobj) {
      fwrite($fileobj, $userdate . PHP_EOL);
      header('Location:userstable.php');
      fclose($fileobj);
    }


  } catch (Exception $ex) {
    echo $ex->getMessage();
  }

}





?>