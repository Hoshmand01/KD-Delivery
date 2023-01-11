<?php


if (empty($_POST["cnumber"])) {
    die("Card number is required");
}

$cnumber_hash = $_POST["cnumber"];

if (empty($_POST["name"])) {
    die("Name is required");
}

if (empty($_POST["Cdate"])) {
    die("Card date is required");
}

if (empty($_POST["scode"])) {
    die("Security code is required");
}


$host = "localhost";
$dbname = "id20115014_pkd";
$username = "id20115014_root";
$password = "Lc)R]?MS7>HP#w}i";
        
$conn = mysqli_connect( $host,
                        $username,
                        $password,
                        $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO bill (cnumber_hash, name, Cdate, scode)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssi",
                       $cnumber_hash,
                       $_POST["name"],
                       $_POST["Cdate"],
                       $_POST["scode"]);

mysqli_stmt_execute($stmt);

header("Location: payment-succ.html");

?>