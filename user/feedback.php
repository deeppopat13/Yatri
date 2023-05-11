<?php session_start();?>
<!DOCTYPE html>  
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">   
<link rel="stylesheet" href="feedback.css"> 
<title>Feedback</title> 
</head> 
<?php
include 'navigation_bar.html';
?>      
<body>    
<h2>FEED BACK FORM</h2>
 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"" method="post">  
<div class="container2">     
    <!-- <div class="row">    
      <div class="col-25">    
        <label for="fname">First Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="fname" name="firstname" placeholder="Your name..">    
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="lname">Last Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">    
      </div>    
    </div>     -->
    <div class="row">    
        <div class="col-25">    
          <label for="email">Enter Mail Id</label>    
        </div>    
        <div class="col-75">    
          <input type="email" id="email" name="mailid" placeholder="Your mail id..">    
        </div>    
      </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="feed_back">Feed Back For Hotel</label>    
      </div>    
      <div class="col-75">    
        <textarea id="hotelFeedback" name="hotel" placeholder="Write Feedback..." style="height:200px"></textarea>    
      </div>    
    </div>   
    <div class="row">    
      <div class="col-25">    
        <label for="feed_back">Feed Back For Website</label>    
      </div>    
      <div class="col-75">    
        <textarea id="webFeedback" name="web" placeholder="Write Feedback.." style="height:200px"></textarea>    
      </div>    
    </div>    
    <div class="r">    
      <input type="submit" value="Submit">    
    </div>       
</div>    
</form>
    
</body>    
</html>   
<?php
include'footer.html';
?> 
<?php
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  //  echo  $_SESSION['username'];
  if(isset($_SESSION) && $_SESSION['loggedin'])
  {
  $hotelFeedback=$_POST['hotel'];
  $webFeedback=$_POST['web'];

  echo $hotelFeedback;
  echo "<br>".$webFeedback;
 }
 else
 {
  echo '<script>alert("Error!!! You Are Not Logged In")</script>';
  //  header("location:login.php");
 }
}
?>