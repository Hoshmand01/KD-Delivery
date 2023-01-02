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
    
    <title>KD-packeg</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <style>
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    .w3-row-padding img {margin-bottom: 12px}

 

    /* Set the width of the sidebar to 120px */
    .w3-sidebar {width: 120px;background: #222;}      /*-- remove these stuff --*/
   
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    </style>

</head>

<body class="w3-black">

  

  <div class="w3-container w3-white">
    <a href="index.php" class="w3-bar-item w3-button w3-hover-none w3-left w3-padding-14" title="Home" style="width:77px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="Imgs\kd_icon.jpg" alt="kd_icon" class="w3-image" width="1000">
    </a>
    
    <a href="acc.php" class="w3-bar-item w3-button w3-hover-none w3-right w3-padding-14" title="profile" style="width:70px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="Imgs\user.png" alt="kd_icon" class="w3-image" width="1000">

    
    </a>

  </div>


 <!-- Navbar on top of screens -->

    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="index.php" class="w3-bar-item w3-button" style="width:33% !important">HOME</a>
      <a href="#about" class="w3-bar-item w3-button" style="width:33% !important">ABOUT</a>
      
      <a href="contact.html" class="w3-bar-item w3-button" style="width:33% !important">CONTACT</a>
    </div>

  
 
 <!-- Page Content -->
  <div class="w3-padding-large" id="main">
    <!-- Header/Home -->
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
      <h1 class="w3-jumbo"><span class="w3-hide-small">Hello</span> <?= htmlspecialchars($user["name"]) ?></h1>
     
      <br>
      <br>
   
      

     
     
      <p>Our deliver service will be avalable soon.</p>











      <img src="Imgs\parcel-delivery-package.jpg" alt="boxs" class="w3-image" width="800">
    
      <br>



      
      <?php if (isset($user)): ?>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
      
    <?php endif; ?>


  

      <!-- start of login form-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      
      /* Full-width input fields */
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid rgb(255, 255, 255);
        box-sizing: border-box;
      }
      
      /* Set a style for all buttons */
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
      
      /* Extra styles for the cancel button */
      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
      }
      
      /* Center the image and position the close button */
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
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        padding-top: 60px;
      }
      
      /* Modal Content/Box */
      .modal-content {
        background-color: #000000;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
      }
      
      /* The Close Button (x) */
      .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
      }
      
      .close:hover,
      .close:focus {
        color: red;
        cursor: pointer;
      }
      
      /* Add Zoom Animation */
      .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
      }
      
      @-webkit-keyframes animatezoom {
        from {-webkit-transform: scale(0)} 
        to {-webkit-transform: scale(1)}
      }
        
      @keyframes animatezoom {
        from {transform: scale(0)} 
        to {transform: scale(1)}
      }
      
      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 300px) {
        span.psw {
           display: block;
           float: none;
        }
        .cancelbtn {
           width: 100%;
        }
      }
      </style>
      </head>
      <body>
      





       <br>
       <br>
       <br>
       <br>
       
     <!-- start of footer -->
     <div class="w3-container w3-white">
    <center><p>All rights reserved... somehow.</p></center>
     </div>
     <!-- end of footer -->
    </div>
    

</body>
</html>