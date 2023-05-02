<?php
if(isset($_GET["errors"])){
  //  var_dump($_GET["errors"]);
    $errorss=json_decode($_GET["errors"],true);  //convert it to associative array
   // var_dump($errorss);
}

if(isset($_GET["old"])){
   // var_dump($_GET["old"]);
    $formData=json_decode($_GET["old"],true);  //convert it to associative array
   // var_dump($formData);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register Form</title>
</head>

<body style="background-color: black;">
    <div class="container" style="color: white;">
        <div class="row my-4 justify-content-center">
            <form  method="post" action="validateLogin.php"  enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="email" class="form-label"> Eamil:</label>
                    <input type="email" name="email" class="form-control" id="email">
                    <span style="color:red;"><?php if(isset($errorss["email"])) echo $errorss['email']; ?></span>

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"> Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <span style="color:red;"><?php if(isset($errorss["password"])) echo $errorss['password']; ?></span>
                    <span style="color:red;"><?php if(isset($errorss["valid"])) echo $errorss['valid']; ?></span>


                </div>
                <div class="row text-center">
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="col-12">
                        <a href="#">Forget paassword?</a>
                    </div>
                </div>
            </form>
           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>