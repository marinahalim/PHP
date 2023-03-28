<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST["gender"] == "male"){
    echo "Thanks Mr.",($_POST["firstName"])," ",($_POST["lastName"]);  
}
else{
    echo "Thanks Mrs.",($_POST["firstName"]), " ",($_POST["lastName"]);

}
echo "<div>PLease review your information please </div> <br>";

echo "Name : ",($_POST["firstName"]), "  ",($_POST["lastName"]),"<br>";
echo "Address : ",($_POST["address"]),"-",($_POST["country"]),"<br>";

echo "Your Skills : ";
//$arr=$_POST["skills"];
foreach( $_POST["skills"] as $skill){
    echo "{$skill}"," ";
}



echo "<br>";
echo "Department : ",($_POST["department"]),"<br>";

?>