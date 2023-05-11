<?php session_start();
ob_start();?>
<!DOCTYPE html>    
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" href="feedback.css"> 
<title>Cab Information</title> 
</head>   
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
<?php include'navigation_bar.html';?>
<body>    
<h2>CAB INFORMATION </h2>    
<div class="container2">    
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">    
    <div class="row">    
      <div class="col-25">    
        <label for="Driver_Name">Driver Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="D_name" name="D_name" placeholder="">    
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="Driver_Number">Driver Phone Number</label>    
      </div>    
      <div class="col-75">    
        <input type="number" id="D_number" name="D_number" placeholder="">    
      </div>    
    </div>    
    <div class="row">    
        <div class="col-25">    
          <label for="Cab Number">Cab Number<br><!--<sub>(Please Enter Full Number)</sub>!--></label>    
        </div>    
        <div class="col-75">    
          <input type="text" id="Cab_number" name="Cab_number" placeholder="">    
        </div>    
      </div>    
  
    <div class="row">    
      <div class="col-25">    
        <label for="feed_back">Cab Charge<br></label>    
      </div>    
      <div class="col-75">    
        <input type="number" name="Cab_charge" id="Cab_charge">
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
    $D_name=$_POST['D_name'];
    $D_number=$_POST['D_number'];
    $cab_number=$_POST['Cab_number'];
    $cab_charge=$_POST['Cab_charge']; 


    $count=1;
   /* echo $D_name;
    echo $D_number;
    echo $cab_number;
    echo $cab_charge;*/
    //NAME VALIDATION
    /* empty name validation*/
    if (empty ($D_name)) {  
        $ErrMsg = "Error! You didn't enter the Name.";
        echo $ErrMsg;
        $count=0;
                
    } else {  
        
        
        if (!preg_match ("/^[a-zA-z ]*$/", $D_name) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed."; 
            echo $ErrMsg;
             $count=0;

        } else {  
            $D_name=trim($D_name);
        } 
        
    }
  //echo "hi";

 
    // NUMBER VALIDATION

    /*empty number  validation */
    if (empty ($D_number)) 
    {  
         $errMsg = "Error! You didn't enter the Number."; 
         $count=0; 
         echo $errMsg;  
     } 
     else 
     {  
         $D_number= trim($D_number); 
        //  $count=1;
          /* only number allowed validation*/  
                if (!preg_match ("/^[0-9]*$/", $D_number) )
                {  
                     $ErrMsg = "Only numeric value is allowed."; 
                    $count=0; 
                     echo $ErrMsg;  
                 } else 
                 {  
                     $D_number=trim($D_number);    
                 }
                 /* number length validation*/ 
                if (strlen($D_number)  < 10 or strlen ($D_number) > 10) {  
                 $ErrMsg = "Mobile must have 10 digits."; 
                 $count=0; 
                echo $ErrMsg;  
                }  
                else 
                {  
                 $D_number=$D_number;   
                }   
     }     
     if(empty($cab_number))
     {
         $errMsg = "Error! You didn't enter the Car Number."; 
         $count=0; 
         echo $errMsg;   
     }
     else
     {
         $cab_number=trim($cab_number);
     }

     if(empty($cab_charge))
     {
        $errMsg = "Error! You didn't enter the Cab Charge."; 
        $count=0; 
        echo $errMsg;  
     }
     else
     {
         $cab_charge=trim($cab_charge);
     }

     if($count == 1)
     {
        $h_email=$_SESSION['email'];
        $selectquery="SELECT `h_id` FROM `hotel_rag` WHERE h_email='$h_email'";
        $selectResult=mysqli_query($conn,$selectquery);
        $arr=mysqli_fetch_assoc($selectResult);
        $h_id=$arr['h_id'];
        $h_name=$arr['h_name'];
        
        
        
        $insert_cab="INSERT INTO `yatri`.`cab` (`h_id`, `driver_name`, `driver_p_no`, `cab_number`, `cab_charge`) VALUES ('$h_id', '$D_name', '$D_number', '$cab_number', '$cab_charge')";
        $cab_result=mysqli_query($conn,$insert_cab);

        if($cab_result)
        {
          echo "<script> alert('Data Inserted Successful');</script>";
          $cabquery="SELECT * FROM `hotel_info` WHERE `h_id`=$h_id";
                  $cabresult=mysqli_query($conn,$cabquery);
                  $cab_arr=mysqli_fetch_assoc($cabresult);
                  $mechanic=$cab_arr['mecanic_available']; 
                  if($mechanic)
                  {
                    header("Location:mechanic_info.php");
                    ob_flush();
                  }
                  else
                  {
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
     }
     else
     {
         echo "Error!!";
     }
    

}
    
?>