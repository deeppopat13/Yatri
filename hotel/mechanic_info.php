<?php session_start();
ob_start();?>
<!DOCTYPE html>    
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" href="feedback.css"> 
<title>Mechanic Information</title> 
</head>   
<?php  include'navigation_bar.html'?>
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
    padding: 20pc;    
    color: white;
  }  
</style>
<body>    
<h2>MECHANIC INFORMATION </h2>    
<div class="container2">    
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">    
    <div class="row">    
      <div class="col-25">    
        <label for="M_Name">Mechanic Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="M_name" name="M_name" placeholder="">    
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="M_Number">Mechanic Phone Number</label>    
      </div>    
      <div class="col-75">    
        <input type="number" id="M_number" name="M_number" placeholder="">    
      </div>    
    </div>  
    <div class="row">    
      <div class="col-25">    
        <label for="M_Number">Charge For Mechanic</label>    
      </div>    
      <div class="col-75">    
        <input type="number" id="M_charge" name="M_charge" placeholder="">    
      </div>    
    </div>      
    <div class="r">    
      <input type="submit" value="Submit">    
    </div>    
  </form>    
</div>    
    
</body>    
</html>   
<?php
include 'footer.html';
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $M_name=$_POST['M_name'];
    $M_number=$_POST['M_number'];
    $count=1;
    $M_charge=$_POST['M_charge'];
   
    //NAME VALIDATION
    /* empty name validation*/
    if (empty ($M_name)) {  
        $ErrMsg = "Error! You didn't enter the Name.";
        echo $ErrMsg;
        $count=0;
                
    } else {  
        
        
        if (!preg_match ("/^[a-zA-z ]*$/", $M_name) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed."; 
            echo $ErrMsg;
             $count=0;

        } else {  
            $M_name=trim($M_name);
        } 
        
    }
  //echo "hi";

 
    // NUMBER VALIDATION

    /*empty number  validation */
    if (empty ($M_number)) 
    {  
         $errMsg = "Error! You didn't enter the Number."; 
         $count=0; 
         echo $errMsg;  
     } 
     else 
     {  
         $D_number= trim($M_number); 
        //  $count=1;
          /* only number allowed validation*/  
                if (!preg_match ("/^[0-9]*$/", $M_number) )
                {  
                     $ErrMsg = "Only numeric value is allowed."; 
                    $count=0; 
                     echo $ErrMsg;  
                 } else 
                 {  
                     $M_number=($M_number);    
                 }
                 /* number length validation*/ 
                if (strlen($M_number)  < 10 or strlen ($M_number) > 10) {  
                 $ErrMsg = "Mobile must have 10 digits."; 
                 $count=0; 
                echo $ErrMsg;  
                }  
                else 
                {  
                 $M_number=$M_number;   
                }   
    }  
    if (empty ($M_charge)) {  
      $ErrMsg = "Error! You didn't enter the Charge";
      echo $ErrMsg;
      $count=0;
              
  } else {  
          $M_name=trim($M_name);
  } 
    if($count == 1)
     {
        $h_email=$_SESSION['email'];
        $selectquery="SELECT `h_id` FROM `hotel_rag` WHERE h_email='$h_email'";
        $selectResult=mysqli_query($conn,$selectquery);
        $arr=mysqli_fetch_assoc($selectResult);
        $h_id=$arr['h_id'];
        $h_name=$arr['h_name'];
        
        
        $insert_Mechanic="INSERT INTO `yatri`.`mechanic` (`h_id`, `m_name`, `m_number`,'m_charge') VALUES ('$h_id', '$M_name', '$M_number','$M_charge')";
        $Mechanic_result=mysqli_query($conn,$insert_Mechanic);

        if($Mechanic_result)
        {
          echo "<script> alert('Data Inserted Successful');</script>";

          $to_email = $h_email;
          $subject = "Register To Yatri";
          $body = "Congratulation ".$h_name.
          "You Succefully Register To Yatri.com 
           Welcome To Yatri.com";
          $headers = "From: yatriweb@gmail.com"; 
          mail($to_email, $subject, $body, $headers);
          header("Location:index.php");
          ob_flush();
           
        }
     }
     else
     {
         echo "Error!!";
     }
}     
?> 