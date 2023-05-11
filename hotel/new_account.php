<!doctype html>
<html>
<head>
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="signin.css">
    <title>Sign in To web</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<?php
        include 'navigation_bar.html';
        ?>
<style>
    .parth
    {
        width: 25pc; 
    }
    .box {
        width: 24pc;
    }
    .ab
    {
    color:black;
    background: none;
    width: 50%;
    padding:5px 10px;
    font-size: 20px;
    border:none ;
    font-weight: bolder; 
    }
    
}
</style>
<body>

<form action="signin.php" method="post"> 
    <div class="parth">
        <h1>Sign In</h1>
        <div class="box">
                <i class="fa fa-user icon"></i> 
                <input type="text" name="name" id="name" placeholder="Enter Hotel Name">
        </div>
        <div class="box">
                <i class="fa fa-phone"></i>
                <input type="number" name="number" id="number" placeholder="Enter Your Hotel Number">
        </div>
        <div class="box">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Enter your Hotel Email">
        </div>
        <div class="box">  
            <i class="fa fa-address-card"></i> 
            <textarea name="address" id="" row="5" column="5" placeholder="Enter Your Hotel Address" ></textarea>  
        </div>
        <div class="box">  
            <i class="fa fa-address-card"></i>  
            <input type="text" name="city" id="city" placeholder="Enter Your Hotel City"> 
        </div>
        <div class="box">
                <i class="fa fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Enter your Hotel Password">
        </div>
        <div class="box" style="border-bottom: none">
        
           <input type="checkbox" name="t&m" id="t&m" value="yes" style="width:5%">
           <lable class="ab"> Accept Our<a href="terms_and_conditions.html"> Terms & Condition</a></lable>
                
        </div>
        <button class="btn">Sign In </button>
    </div>
    </form>
</body>

</html>