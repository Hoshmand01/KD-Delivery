<?php

$host = "localhost";
$dbname = "id20115014_pkd";
$username = "id20115014_root";
$password = "Lc)R]?MS7>HP#w}i";

session_start();


if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

if(isset($_POST['update'])){

    if (empty($_POST["name"])) {
        die("Name is required");
    }
    
    if (empty($_POST["phnumber"])) {
        die("phone number is required");
    }
    
    if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }
    
    if (strlen($_POST["password"]) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        die("Password must contain at least one letter");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        die("Password must contain at least one number");
    }
    
    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        die("Passwords must match");
    }
    
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    
    $mysqli = require __DIR__ . "/database.php";

    if (!$mysqli) {

        die("Connection failed: " . mysqli_connect_error());
      }


    $name = $_POST['name'];
    $phnumber = $_POST['phnumber'];
    $email = $_POST['email'];
    $password_hash = $_POST['password'];

    $loggedInUser =  htmlspecialchars($user["name"]) ;

    $sql = "UPDATE user SET name='$name', phnumber='$phnumber', email='$email', password_hash='$password_hash' WHERE name = '$loggedInUser'";
   

    if (mysqli_query($mysqli, $sql)) {

         header("Location: acc-up-succ.html");
    exit;

      } else {
        echo "Error updating record: " . mysqli_error($mysqli);
      }
      
      mysqli_close($mysqli);
      


}


?>