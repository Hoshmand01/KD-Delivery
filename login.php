<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
      
      
        if ($_POST["password"] === $user["password_hash"]) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: service.php");
            exit;
        }

        else if (password_verify($_POST["password"], $user["password_hash"])) {
            
          session_start();
          
          session_regenerate_id();
          
          $_SESSION["user_id"] = $user["id"];
          
          header("Location: service.php");
          exit;
      }

    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Login</title>
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
    

<div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="index.php" class="w3-bar-item w3-button" style="width:33% !important">HOME</a>
      <a href="about.html" class="w3-bar-item w3-button" style="width:33% !important">ABOUT</a>
      
      <a href="contact.html" class="w3-bar-item w3-button" style="width:33% !important">CONTACT</a>
    </div>

      <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      
      /* input fields */
    
      input[type=text], input[type=email] {
        width: 25%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid rgb(255, 255, 255);
        border-radius: 28px;
        box-sizing: border-box;
      }

        input[type=text], input[type=password] {
        width: 25%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid rgb(255, 255, 255);
        border-radius: 28px;
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
      
        <br>
        
        <center>
      
    <h1>Login</h1>
    
    <br>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    

    
    <form method="post">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <br>
        <button style="height:50px; width:100px">Log in</button>
    </form>
    </center>
      
</body>
</html>







