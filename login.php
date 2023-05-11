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
<!-- <style>
    /* .container3{
        width: 330px;
    }

    .box {
        width: 330px;
    } */
    body {
        background: url(signin.jpg)no-repeat center center fixed;
         background-size: 100%; 
  }
</style> -->
<body>
  <div class="parth">
    <h1>Log In</h1>
    <div class="box">
      <form action="" method="POST">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Enter your Email">
      </form>
    </div>
    <div class="box">
      <form action="" method="post">
        <i class="fa fa-key"></i>
        <input type="password" name="password" id="password" placeholder="Enter your Password">
      </form>
    </div>
    <button class="btn">Log In </button>
    <h3><a href="new_Account.php">Create a New Account</a></h3>
    <h3><a href="Forget_password.html">Forget Password</a></h3>
  </div>
</body>

</html>