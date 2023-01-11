<?php


if (empty($_POST["name"])) {
    die("Name is required");
}

if (empty($_POST["phnumber"])) {
    die("phone number is required");
}

if (empty($_POST["address"])) {
    die("address is required");
}

if (empty($_POST["pkaddress"])) {
    die("package address is required");
}

if (empty($_POST["Contents"])) {
    die("Contents is required");
}

if (empty($_POST["weight"])) {
    die("weight is required");
}

if (empty($_POST["date"])) {
    die("date is required");
}
   
        
$mysqli = require __DIR__ . "/database.php";



$sql = "INSERT INTO shipd (name, phnumber, address, pkaddress, Contents, weight, date)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssssss",
                    $_POST["name"],
                    $_POST["phnumber"],
                    $_POST["pkaddress"],
                    $_POST["address"],
                    $_POST["Contents"],
                    $_POST["weight"],
                    $_POST["date"]);

if ($stmt->execute()) {

    header("Location: shipping-succ.html");
    exit;
    
} else {
      
        die($mysqli->error . " " . $mysqli->errno);
    
}


?>