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
<html>

    <title>Update Acc</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Style2.css">


<body>


  <div class="w3-container w3-white">


    <a href="acc.php" class="w3-bar-item w3-button w3-hover-none w3-left w3-padding-14" title="Home" style="width:77px">
      <i class="fa fa-logo ws-text-green ws-hover-text-green" style="position:relative;font-size:42px!important;"></i>
      <img src="kd_icon.jpg" alt="kd_icon" class="w3-image" width="1000">
    </a>


  </div>


 <!-- top bar -->

    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="acc.php" class="w3-bar-item w3-button" style="width:100% !important">Back</a>
    </div>



  
    <!-- update form   -->
 
  <form class="modal-content"  action="process-update-acc.php" method="post" novalidate>

    <div class="container">
      
      <h1>Update Acc Information </h1> <h2> User: <?= htmlspecialchars($user["name"]) ?></h2> 
     
      <p>Please fill in this form to update your account information.</p>
      
      <hr>

        <div>
          <label for="name">New Name</label>
          <input type="text" placeholder="Enter User name" id="name" name="name" value="<?= htmlspecialchars($user["name"]) ?>">
      </div>
        
      <div>
        <label for="phnumber">New Phone Number</label>
        <input type="text" id="phnumber" placeholder="Enter Phone Number" name="phnumber"  >
      </div>

        <div>
          <label for="email">New Email</label>
          <input type="text" id="email" placeholder="Enter Emaill" name="email" value="<?= htmlspecialchars($user["email"]) ?>">
        </div>
   
        <div>
          <label for="password">New Password</label>
          <input type="password" id="password" placeholder="Enter password" name="password">
        </div>
    
        <div>
          <label for="password_confirmation">Repeat New Password</label>
          <input type="password" id="password_confirmation" placeholder="Repeat password"name="password_confirmation">
        </div>


         <div class="clearfix">
       
        
          <button type="submit" name="update" class="signupbtn">Update</button>

          </div>

    </div>

  </form>



</body>
</html>
