<?php session_start();
ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="feedback.css">
	<title>Document</title>
</head>
<?php include'navigation_bar.html'; ?>
<style>
    body
    {
        background:deepskyblue;
    }
    input[type=number], select, textarea {    
    width: 99%;    
    padding: 12px;    
    border: 1px solid rgb(70, 68, 68);    
    border-radius: 4px;    
    resize: vertical;
    }
    .r{
    text-align: center;
    margin-top: 1pc;
  } 
  .container2
  {    
    border-radius: 5px;    
    background-color: darkslategray;    
    padding: 10pc;    
    color: white;
  } 
</style>
<body>
<h2>Payment Information</h2>
<div class="container2">    
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">    
    <div class="row">    
      <div class="col-25">    
        <label for="M_Name">Your Stripe Public Key</label>    
      </div>    
      <div class="col-75">    
		<textarea name="publickey" id="publickey" cols="30" rows="3"></textarea>
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="M_Number">Your Stripe Private Key</label>    
      </div>    
      <div class="col-75">    
	  <textarea name="publickey" id="publickey" cols="30" rows="3"></textarea>   
      </div>    
    </div>  
    <div class="r">    
      <input type="submit" value="Submit">    
    </div>    
  </form>    
</div>    	
</body>
</html>