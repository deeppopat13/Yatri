<!doctype html>
<html>

<head>
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
    <title>Forget Password</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<?php
 include 'navigation_bar.html';    
?>
<style>
    .parth {
        width: 330px;
    }

    .box {
        width: 20pc;
    }
    .parth h1 
    {
        font-size:xx-large ;
    }
    p
    {
        color:blue;
    }

</style>

<body>
    <div class="parth">
        <h1>Recover Password</h1>
        <p> pls Enter Valid Email</p>
        <p> New Password Will Be Send On Your Mail</p>
        <form action="forgetpass.php" method="post">
            <table>
                <tr>
                    <td>
                        <div class="box">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" id="email" placeholder="Enter your Email">
                        </div>
                    </td>
                    <td>
                        <label for=""></label>
                    </td>
                </tr>
            </table>
            <button class="btn">Send Mail </button>
            <h3><a href="login.php">Are you log in</a></h3>
        </form>
    </div>
</body>
</html>

