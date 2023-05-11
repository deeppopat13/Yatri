<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigation_bar.css">
    <title>Document</title>
</head>
<style>
    .logo{
        align-items: normal;
    }
</style>
<body>
    <header>
        <?php
        ?>
        <div class="container">
            <!--navigation-------------------->
            <nav class="navigation">
                <!--logo------------>
                
                <a href="#" class="logo">
                    <img src="logo.jpg" />
                </a>
                <!--menu-btn------->
                <input type="checkbox" class="menu-btn" id="menu-btn">
                <label for="menu-btn" class="menu-icon">
                    <span class="nav-icon"></span>
                </label>
                <!--menu------------->
                <ul class="menu">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">Search Hotel</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Feedback</a></li>
                </ul>
                <!--sign-up-btn----->

                <!--nav-2------------------>

            </nav>
            <?php include 'test4.php';
            ?>
       

