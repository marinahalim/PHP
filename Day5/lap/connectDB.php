<?php
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database
{
    protected $DB_DATABASE;
    protected $DB_USER;
    protected $DB_PASSWORD;
    protected $DB_HOST;
    protected $PORT;

    public function __construct(string $DB_DATABASE, string $DB_USER, string $DB_PASSWORD, string $DB_HOST, string $PORT)
    {
        $this->DB_DATABASE = $DB_DATABASE;
        $this->DB_USER = $DB_USER;
        $this->DB_PASSWORD = $DB_PASSWORD;
        $this->DB_HOST = $DB_HOST;
        $this->PORT = $PORT;
    }


    function connect()
    {
        $user = $this->DB_USER;
        $password = $this->DB_PASSWORD;

        try {
            $dsn = "mysql:dbname={$this->DB_DATABASE};host={$this->DB_HOST};port={$this->PORT};";
            $db = new PDO($dsn, $user, $password);
            if ($db) {
                return $db;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function insert($db, string $table_name, $table_data)
    {
        try {

            $addTable_query = "create table if not exists `{$table_name}`(`id` serial primary key,`name` varchar(100) ,`email` varchar(400) unique ,`password` varchar(400),`roomNo` varchar(400) ,`image` varchar(500));";
            $addTable_stmt = $db->prepare($addTable_query);
            $response = $addTable_stmt->execute();


            $insert_query = "insert into `ITI`.`{$table_name}` (name,email,password,roomNo,image) values (:name,:email,:password,:roomNo,:image);";


            $insert_statm = $db->prepare($insert_query);
            $insert_statm->bindParam(":name", $table_data['name'], PDO::PARAM_STR);
            $insert_statm->bindParam(":email", $table_data['email'], PDO::PARAM_STR);
            $insert_statm->bindParam(":password", $table_data['password'], PDO::PARAM_STR);
            $insert_statm->bindParam(":roomNo", $$table_data['roomNo'], PDO::PARAM_STR);
            $insert_statm->bindParam(":image", $table_data['imagename'], PDO::PARAM_STR);



            $response = $insert_statm->execute();
            if ($response == false) {
                var_dump($response);
                $errors['emailrepeat'] = 'Email is already registerd, you can login directly';
                $errors_Str = json_encode($errors);
                header("Location:registerForm.php?errors={$errors_Str}");
            } else {
                header('Location:login.php');
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
   
    function updateUserById($db, string $table_name, $id, $new_user)
    {
        try {
            $update_query = "update  `ITI`.`{$table_name}`
            set `name`=:name,`email`=:email
            where `id`=:id ;";
            $update_statm = $db->prepare($update_query);
            $update_statm->bindParam(":id", $id);
            $update_statm->bindParam(":name", $new_user['name']);
            $update_statm->bindParam(":email", $new_user['email']);
            $update_statm->execute();
            $response = $update_statm->execute();
            if($response == false) {
            $errors['emailrepeat'] = 'Email is already token!!!';
            $errors_Str = json_encode($errors);
            header("Location:updateform.php?id=$id&errors={$errors_Str}");
            } else {
            header('Location:userstable.php');
            
            }

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

    }
    function deleteUserById($connection_obj, string $table_name, $id)
    {
        $update_query = "delete from  `ITI`.`{$table_name}`             
        where `id`=:id ;";

        $update_statm = $connection_obj->prepare($update_query);

        $update_statm->bindParam(":id", $id);
        $update_statm->execute();
        header('Location:userstable.php');

    }
    function validateLogin($connection_obj, string $table_name, $usreData)
    {
        $logged_in = false;
        $auth_query = "select email from `ITI`.`{$table_name}` where `email`=:email and `password`=:password";
        $auth_stmt = $connection_obj->prepare($auth_query);
        $auth_stmt->bindParam(":email", $usreData['email']);
        $auth_stmt->bindParam(":password", $usreData['password']);
        $auth_stmt->execute();
        $response = $auth_stmt->fetch();
        if ($response != false) {
            $logged_in = true;
        }
        if ($logged_in) {
            session_start();
            $_SESSION['email'] = $usreData['email'];
            $_SESSION['login'] = true;
            header("Location:HomePage.php");

        } else {
            $error['valid'] = 'Invalid Email or Password !!!';
            $error_Str = json_encode($error);
            header("Location:login.php?errors={$error_Str}");
        }
    }
    function listAllUsers($connection_obj, string $table_name)
    {
        try {
            echo "
                <!DOCTYPE html>
                 <html lang='en'>
                   <head>
                     <meta charset='UTF-8'>
                     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
                       integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
                     <title>Home Page</title>
                   </head>
                   <body style='background-color: black;'>
                   <div class='container' style='color: white;'>
                     <nav class='navbar navbar-expand-lg  navbar-dark '> 
                       <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                         <span class='navbar-toggler-icon'></span>
                       </button>
                       <div class='collapse navbar-collapse' id='navbarNav'>
                         <ul class='navbar-nav'>
                           <li class='nav-item'>
                             <a class='nav-link active' aria-current='page' href='HomePage.php'>Home</a>
                           </li>
                           <li class='nav-item'>
                             <a class='nav-link active' href='userstable.php'>users</a>
                           </li>
                       </div>  
                       </ul>
                       <ul class='nav navbar-nav navbar-right'>
                       <li class='nav-item '>
                        <a class='nav-link active' href='logOut.php'>Logout</a>
                       </li>
                     </ul>  
                    </nav> ";   
                $select_query = "select * from `ITI`.`{$table_name}`";
                $select_stmt = $connection_obj->prepare($select_query);
                $select_stmt->execute();
                $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

                echo "
                  <table class='table table-dark table-striped text-center my-4'>
                  <thead>
                  <tr>
                  <th scope='col'>Id</th>
                  <th scope='col'>Name</th>
                  <th scope='col'>Email</th>
                  <th scope='col'>Password</th>
                  <th scope='col'>Room No</th>
                  <th scope='col'>Image</th>
                  <th scope='col'>Edit</th>
                  <th scope='col'>Delete</th>
                  </tr>
                  </thead>
                  <tbody>";
                foreach ($data as $row) {
                    echo "<tr>";
                    foreach ($row as $data) {
                        if ($row['image'] == $data && $data != "") {
                            echo "<td><img src='images/{$data}' width='100' heigth='100' ></td>";
                        } else {
                            echo "<td>{$data}</td>";
                        }
                    }
                    echo "<td><a href='updateform.php?id={$row['id']}'class='btn btn-success'>Edit</a></td>";
                    echo "<td><a href='delete.php?id={$row['id']}'class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>
                  </table>
                  </div>
                  </div>
                  </body>";
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }



    }
}







?>