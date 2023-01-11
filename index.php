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
    <link rel="stylesheet" href="Style.css">

  
</head>

<body class="w3-black">


 <!-- Navbar -->
 
  <div class="w3-container w3-white">
    <a href="index.php" class="w3-bar-item w3-button w3-hover-none w3-left w3-padding-14" title="Home" style="width:77px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="kd_icon.jpg" alt="kd_icon" class="w3-image" width="1000">
    </a>
 
    
    <?php if (isset($user)): ?>

    <a href="acc.php" class="w3-bar-item w3-button w3-hover-none w3-right w3-padding-14" title="profile" style="width:70px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="user.png" alt="kd_icon" class="w3-image" width="1000">
    </a>

    <?php endif; ?>

  </div>


    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="index.php" class="w3-bar-item w3-button" style="width:33% !important">HOME</a>
      <a href="about.html" class="w3-bar-item w3-button" style="width:33% !important">ABOUT</a>
      
      <a href="contact.html" class="w3-bar-item w3-button" style="width:33% !important">CONTACT</a>
    </div>

  
 
  <div class="w3-padding-large" id="main">
    
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">

      <h1 class="w3-jumbo"><span class="w3-hide-small">KD</span> package delivery</h1>

      <p>For delivering your packages safe and fast.</p>
      <br>


      <img src="parcel-delivery-package.jpg" alt="boxs" class="w3-image" width="800">
    
      <br><br><br>


      <?php if (isset($user)): ?>
        
        <h3>Shipping a package?</h3> 
  
        <a href="shipping.html">
  
        <button  style="height:50px; width:150px" >Ship Now</button>
  
        </a>
  
        <br><br><br><br><br>

          <p><a href="logout.php">Log out</a></p>
          
      <?php else: ?>

        <br><br><br>

        <h3>Already user?</h3>
      
      <a href="login.php">

      <button  style="height:50px; width:100px" >Login</button>

    </a>


    <center>
        
        <h3>New? Sign Up now</h3> 

       <a href="signup2.html">

        <button  style="height:50px; width:100px" >Sign Up</button>

        </a>

       </center>

          
      <?php endif; ?>

      <meta name="viewport" content="width=device-width, initial-scale=1">
     
      <br>
        
       </header>

              
  </div> 
  <br>

     <!-- footer -->
     <div class="w3-container w3-white">
    <center><p>All rights reserved.</p></center>
     </div>
   
    
    

</body>
</html>