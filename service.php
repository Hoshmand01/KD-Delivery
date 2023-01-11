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
    
    <title>KD-Package</title>
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
    
    <a href="acc.php" class="w3-bar-item w3-button w3-hover-none w3-right w3-padding-14" title="profile" style="width:70px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="user.png" alt="kd_icon" class="w3-image" width="1000">
    
    </a>

  </div>


 <!-- Navbar -->

    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="index.php" class="w3-bar-item w3-button" style="width:33% !important">HOME</a>
      <a href="about.html" class="w3-bar-item w3-button" style="width:33% !important">ABOUT</a>
      
      <a href="contact.html" class="w3-bar-item w3-button" style="width:33% !important">CONTACT</a>
    </div>

  
  <div class="w3-padding-large" id="main">
  
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">

    <?php if (isset($user)): ?>

      <h1 class="w3-jumbo"><span class="w3-hide-small">Welcome</span> <?= htmlspecialchars($user["name"]) ?></h1>
     
      <?php endif; ?>
      
      
      <br><br><br><br><br>
   
     
      <?php if (isset($user)): ?>
        
      <h3>Shipping a package?</h3> 

      <a href="shipping.html">
      <button  style="height:50px; width:150px" >Ship Now</button>
      </a>

      <br><br><br><br><br><br><br><br><br>

        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
      <h2><a href="login.php">Please Login</a></h2>
      
    <?php endif; ?>



      <!-- login form-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid rgb(255, 255, 255);
        box-sizing: border-box;
      }
      
      /* Style buttons */
      button {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 28px;
        cursor: pointer;
        width: 100%;
      }
      
      button:hover {
        opacity: 0.8;
      }
      
      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }
      
      .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
      }
      
      img.avatar {
        width: 40%;
        border-radius: 50%;
      }
      
      .container {
        padding: 16px;
      }
      
      span.psw {
        float: right;
        padding-top: 16px;
      }
      
      /* The Modal (background) */
      .modal {
        display: none; 
        position: fixed;
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0);  
        background-color: rgba(0,0,0,0.4);  
        padding-top: 60px;
      }
      
      /* Modal Content/Box */
      .modal-content {
        background-color: #000000;
        margin: 5% auto 15% auto;  
        border: 1px solid #888;
        width: 80%;  
      }
      
     
      </style>
      </head>
      <body>
      

       <br><br><br><br>
       
   
     <!-- footer -->
     <div class="w3-container w3-white">
    <center><p>All rights reserved.</p></center>
     </div>
     
    </div>
    

</body>
</html>