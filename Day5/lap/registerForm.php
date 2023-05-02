<?php
if (isset($_GET["errors"])) {
    $errorss = json_decode($_GET["errors"], true);
}
if (isset($_GET["old"])) {
    $formData = json_decode($_GET["old"], true);
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
            <form method="post" action="saveusers.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php if (isset($formData["name"]))
                        echo $formData['name']; ?>">
                    <span style="color:red;">
                        <?php if (isset($errorss["name"]))
                            echo $errorss['name']; ?>
                    </span>
                    <span style="color:red;">
                        <?php if (isset($errorss["name_valid"]))
                            echo $errorss['name_valid']; ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"> Eamil:</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?php if (isset($formData["name"]))
                        echo $formData['email']; ?>">
                    <span style="color:red;">
                        <?php if (isset($errorss["email"]))
                            echo $errorss['email']; ?>
                    </span>
                    <span style="color:red;">
                        <?php if (isset($errorss['email_valid']))
                            echo $errorss['email_valid']; ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"> Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <span style="color:red;">
                        <?php if (isset($errorss["password"]))
                            echo $errorss['password']; ?>
                    </span>
                    <span style="color:red;">
                        <?php if (isset($errorss["password_valid"]))
                            echo $errorss['password_valid']; ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="confirm" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm" class="form-control" id="confirm">
                    <span style="color:red;">
                        <?php if (isset($errorss['confirm']))
                            echo $errorss['confirm']; ?>
                    </span>

                    <span style="color:red;">
                        <?php if (isset($errorss['confirm_valid']))
                            echo $errorss['confirm_valid']; ?>
                    </span>
                </div>
                <div class="mb-3">
                    <label for="roomNum" class="form-label">Room No:</label>
                    <select class="form-select" aria-label="Default select example" name="roomNo">
                        <option value="Application1">Application1</option>
                        <option value="Application2">Application2</option>
                        <option value="cloud">cloud</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ext" class="form-label">Ext:</label>
                    <input type="text" name="ext" class="form-control" id="ext">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">profile picture :</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <span style="color:red;">
                        <?php if (isset($errorss['emailrepeat']))
                            echo $errorss['emailrepeat']; ?>
                    </span>

                </div>

                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <div class="col-3">
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </form>
            <form class="text-center text-bold">
                <span>you already have an acount?<span>
                        <a class="" href="login.php">Login</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>