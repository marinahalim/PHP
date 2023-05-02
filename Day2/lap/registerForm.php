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
        <div class="row my-4">
            <form  method="post" action="saveusers.php">
                <div class="mb-3">
                    <label for="FirstName" class="form-label">First Name:</label>
                    <input type="text" name="firstName" class="form-control" id="FirstName"
                     value="<?php if(isset($formData["firstName"])) echo $formData['firstName'];?>"
                     >
                    <span style="color:red;"><?php if(isset($errorss["firstName"])) echo $errorss['firstName']; ?></span>
                </div>
                <div class="mb-3">
                    <label for="LastName" class="form-label">Last Name:</label>
                    <input type="text" name="lastName" class="form-control" id="LastName"
                    value="<?php if(isset($formData["lastName"])) echo $formData['lastName'];?>"
                    >
                    <span style="color:red;"><?php if(isset($errorss["lastName"])) echo $errorss['lastName']; ?></span>


                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address:</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"
                    value="<?php if(isset($formData["address"])) echo $formData['address'];?>"
                    >
                    </textarea>
                    <span style="color:red;"><?php if(isset($errorss["address"])) echo $errorss['address']; ?></span>

                </div>
                <select class="form-select mb-3" aria-label="Default select example" name="country">
                    <option selected>Select Country</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Italy">Italy</option>
                    <option value="Korea">Korea</option>
                </select>
                <div class="row mb-3">
                    <div class="col-3">
                        Gender
                    </div>
                    <div class="form-check col-3">
                        <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                        <label class="form-check-label" for="male">
                            male
                        </label>
                    </div>
                    <div class="form-check col-3">
                        <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                        <label class="form-check-label" for="female">
                            female
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">Skills:</div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="php" name="skills[]"
                                        id="php">
                                    <label class="form-check-label" for="php">
                                        PHP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="python" name="skills[]"
                                        id="python">
                                    <label class="form-check-label" for="python">
                                        python
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="java" name="skills[]"
                                        id="java">
                                    <label class="form-check-label" for="java">
                                        Java
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="nodejs" name="skills[]"
                                        id="nodejs">
                                    <label class="form-check-label" for="nodejs">
                                        Nodejs
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Username" class="form-label"> Username:</label>
                    <input type="text" name="username" class="form-control" id="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"> Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="Department" class="form-label">Department:</label>
                    <input type="text" name="department" class="form-control" id="Department" placeholder="Open Source">
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-6">
                        <button type="reset" class="btn btn-primary">Reset</button>
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