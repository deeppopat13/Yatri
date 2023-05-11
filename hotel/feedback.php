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
<div class="container2">    
  <form>    
    <div class="row">    
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
    </div>    
    <div class="row">    
        <div class="col-25">    
          <label for="email">Mail Id</label>    
        </div>    
        <div class="col-75">    
          <input type="email" id="email" name="mailid" placeholder="Your mail id..">    
        </div>    
      </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="feed_back">Feed Back For Website</label>    
      </div>    
      <div class="col-75">    
        <textarea id="subject" name="subject" placeholder="Write Feedback.." style="height:200px"></textarea>    
      </div>    
    </div>    
    <div class="r">    
      <input type="submit" value="Submit">    
    </div>   
  </form>    
</div>    
    
</body>    
</html>    
