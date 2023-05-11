<!doctype html>
<html>
<?php
        include 'navigation_bar.html';
 ?> 
<head>
  <!-- Place your kit's code here -->
  <script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
  <title>log in</title>
  <link rel="stylesheet" href="signin.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<body>
<form action="log_in.php" method="post">
  <div class="parth">
    <h1>Log In</h1>
    <div class="box">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Enter your Email">
    </div>
    <div class="box">  
        <i class="fa fa-key"></i>
        <input type="password" name="password" id="password" placeholder="Enter your Password">
    </div>
    <button class="btn">Log In </button>
   
    <h3><a href="forgetpassword.php">Forget Password !</a></h3>
  </div>
  </form>
</body>

</html>