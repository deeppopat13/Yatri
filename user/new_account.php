<!doctype html>
<html>
<head>
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
    <title>Sign in To web</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<?php
        include 'navigation_bar.html';
        ?>
<style>
    .container3{
        width: 330px;
    }

    .box {
        width: 330px;
    }
</style>
<body>
<link rel="stylesheet" href="signin.css">
<form action="signin.php" method="post"> 
    <div class="parth">
        <h1>Sign In</h1>
        <div class="box">
            <!-- <form action="" method="POST"> -->
                <i class="fa fa-user icon"></i> 
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <!-- </form> -->
        </div>
        <div class="box">
            <!-- <form action="" method="POST"> -->
                <i class="fa fa-phone"></i>
                <input type="number" name="number" id="number" placeholder="Enter Your Number">

            <!-- </form> -->
        </div>
        <div class="box">
            <!-- <form action="" method="POST"> -->
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Enter your Email">
            <!-- </form> -->
        </div>
        <div class="box">
            <!-- <form action="" method="post"> -->
                <i class="fa fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Enter your Password">
            <!-- </form> -->
        </div>
        <button class="btn">Sign In </button>
    </div>
    </form>
</body>

</html>