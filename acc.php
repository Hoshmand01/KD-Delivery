<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>KD-packeg</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <style>
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    .w3-row-padding img {margin-bottom: 12px}
    .w3-sidebar {width: 120px;background: #222;}   
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    </style>


</head>



<body class="w3-black">


<div class="w3-container w3-white">
    <a href="index.php" class="w3-bar-item w3-button w3-hover-none w3-left w3-padding-14" title="Home" style="width:77px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="kd_icon.jpg" alt="kd_icon" class="w3-image" width="1000">
    </a>
 

 <!-- Navbar on top of screens -->

 <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">

<a href="service.php" class="w3-bar-item w3-button" style="width:100% !important">Back</a>

</div>


  <div class="w3-padding-large" id="main">
   
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">

    <?php if (isset($user)): ?>

      <h1 class="w3-jumbo"><span class="w3-hide-small"></span><?= htmlspecialchars($user["name"]) ?></h1>
     
      <?php endif; ?>
    
      <img src="user.png" alt="kd_icon" class="w3-image" width="100">




      <style>

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

output[type=text], output[type=password] {
  width: 350px;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #0d4982;
}

.container {
  padding: 16px;
}

.modal {
  display: none; 
  position: fixed;
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: #474e5d;
  padding-top: 50px;
}

.modal-content {
  background-color: #222;
  margin: 5% auto 15% auto;
  border: 1px solid rgb(0, 0, 0);
  width: 50%; 

  border-radius: 15px;
}

hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

      </style>




<form class="modal-content">
    <div class="container">
      

    <?php if (isset($user)): ?>

      <p>User ID: <?= htmlspecialchars($user["id"]) ?></p>
      <p>Phone Number: <?= htmlspecialchars($user["phnumber"]) ?></p>
      <p>Email: <?= htmlspecialchars($user["email"]) ?></p>

      <?php else: ?>

        <h3>Already user?</h3>
      
        <h2><a href="login.php">Login</a></h2>


        <br><br>
    
        
        <h3>New? Sign Up now</h3> 

        <h2><a href="signup2.html">Sign Up</a></h2>
        <?php endif; ?>

       
        <?php if (isset($user)): ?>
        
        
        <br><br><br><br><br>

          <p><a href="logout.php">Log out</a></p>
          
          <?php endif; ?>

      <div class="clearfix">
       
        
        
      </div>
    </div>
  </form>
  
  <a href="update-acc.php">
<button  style="height:50px; width:100px" >Update Acc</button>
</a>

</body>
</html>