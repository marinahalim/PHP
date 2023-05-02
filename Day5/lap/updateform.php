<?php
if (isset($_GET["errors"])) {
    $errorss = json_decode($_GET["errors"], true);
}

if (isset($_GET["old"])) {
    $formData = json_decode($_GET["old"], true);
}
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <title>Register Form</title>
</head>


<body style='background-color: black;'>
    <div class='container' style='color: white;'>

        <nav class='navbar navbar-expand-lg  navbar-dark '>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav'
                aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
            </div>
            <ul class='nav navbar-nav navbar-right'>
                <li class='nav-item '>
                    <a class='nav-link active' href='registerForm.php'>Register</a>
                </li>
            </ul>
        </nav>
        <div class='row my-4 justify-content-center'> 
            
            <form method='post' action='updateUser.php?id=<?php echo $id?>' enctype='multipart/form-data'>
                <div class='mb-3'>
                    <label for='name' class='form-label'> Name:</label>
                    <input type='text' name='name' class='form-control' id='name' value="<?php if (isset($formData["name"]))
                    echo $formData["name"];?>" >
                   <span style="color:red;">
                        <?php if (isset($errorss["name"]))
                            echo $errorss['name']; ?>
                    </span>
                    <span style="color:red;">
                        <?php if (isset($errorss["name_valid"]))
                            echo $errorss['name_valid']; ?>
                    </span>
                </div>
                <div class='mb-3'>
                    <label for='email' class='form-label'> Email:</label>
                    <input type='email' name='email' class='form-control' id='email'>
                    <span style="color:red;">
                        <?php if (isset($errorss["email"]))
                            echo $errorss['email']; ?>
                    </span>
                    <span style="color:red;">
                        <?php if (isset($errorss['email_valid']))
                            echo $errorss['email_valid']; ?>
                        <?php if (isset($errorss['emailrepeat']))
                            echo $errorss['emailrepeat']; ?>    
                    </span>
                </div>
                
                <div class='row text-center'>
                    <div class='col-12 my-3'>
                        <button type='submit'class='btn btn-primary'>Submit</button>
                    </div>
                
                </div>
               
            </form>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
        crossorigin='anonymous'></script>
</body>
</html>

?>