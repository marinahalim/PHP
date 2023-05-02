<?php
$id = $_GET["id"];



echo "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <title>Update Form</title>
</head>

<body style='background-color: black;'>
    <div class='container' style='color: white;'>
        <div class='row my-4'>
            <form  method='post' action='updateUser.php?id=${id}'>
                <div class='mb-3'>
                    <label for='FirstName' class='form-label'>First Name:</label>
                    <input type='text' name='firstName' class='form-control' id='FirstName'>
                </div>
                <div class='mb-3'>
                    <label for='LastName' class='form-label'>Last Name:</label>
                    <input type='text' name='lastName' class='form-control' id='LastName'>
                </div>
                <div class='mb-3'>
                    <label for='exampleFormControlTextarea1' class='form-label'>Address:</label>
                    <textarea class='form-control' name='address' id='exampleFormControlTextarea1' rows='3'></textarea>
                </div>
            
                <div class='row'>
                    <div class='col-6'>
                        <button type='submit' class='btn btn-primary'>Submit</button>
                    </div>
                    <div class='col-6'>
                        <button type='reset' class='btn btn-primary'>Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
        crossorigin='anonymous'></script>
</body>

</html>";
?>