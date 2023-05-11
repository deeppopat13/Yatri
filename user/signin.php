<?php
$cus_name=$cus_number=$cus_email=$cus_password="";
$count=1;
$error_code=0; 
settype($cus_number,"string");
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 

/* CONNECTION TO DATABASE */
include 'connection.php';
/* THE CONNECTION CODE END HERE*/


/* BUTTON CLICKED EVENT OCCURS */
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $cus_name=$_POST["name"];
    $cus_number=$_POST["number"];
    $cus_email=$_POST["email"];
    $cus_password=$_POST["password"];

    //NAME VALIDATION
    $cookie_name = "username_vali";
    /* empty name validation*/
    if (empty ($cus_name)) {  
        $ErrMsg = "Error! You didn't enter the Name.";
        echo $ErrMsg
        ;
        $error_code=1; 
        $count=0;
      
    //    $cookie_value = $ErrMsg;
                
    } else {  
        $cus_name = $_POST["name"]; 
        // $count=1;
        if (!preg_match ("/^[a-zA-z ]*$/", $cus_name) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed."; 
           // echo $ErrMsg
           $cookie_value = $ErrMsg;
            $error_code=1;  
             $count=0;

        } else {  
            $cus_name=$cus_name;
            // $count=1
            $cookie_value = "$cus_name";

        } 
        
    }
  //echo "hi";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day 
   
//exit;
 
    


    // NUMBER VALIDATION

    /*empty number  validation */
   if (empty ($cus_number)) {  
         $errMsg = "Error! You didn't enter the Number."; 
         $count=0; 
         echo $errMsg;  
     } else {  
         $cus_number= $cus_number; 
        //  $count=1;
          /* only number allowed validation*/  
         if (!preg_match ("/^[0-9]*$/", $cus_number) ){  
                     $ErrMsg = "Only numeric value is allowed."; 
                    //  $count=0; 
                     echo $ErrMsg;  
                 } else {  
                     $cus_number=$cus_number; 
                    //  $count=1; 
                 }
                 /* number length validation*/ 
         if (strlen($cus_number)  < 10 or strlen ($cus_number) > 10) {  
                 $ErrMsg = "Mobile must have 10 digits."; 
                 $count=0; 
                echo $ErrMsg;  
         } else {  
                 $cus_number=$cus_number;   
                //  $count=1; 
         }   
     }     
     //EMAIL VALIDATION

    /* empty email validation */ 
     if (empty ($cus_email)) {  
         $errMsg = "Error! You didn't enter the Email ."; 
         $count=0; 
         echo $errMsg;  
     } else {  
         $cus_email=$cus_email;
        //  $count=1; 
          /* email pattren validation*/
        if (!preg_match ($pattern, $cus_email) ){  
            $ErrMsg = "Email is not valid.";
            $count=0;  
            echo $ErrMsg;   
         } else {  
            $cus_email=$_POST["email"]; 
            // $count=1; 
        }   
     }  
     //PASSWORD VALIDATION
     /* empty password validation */
    if (empty ($cus_password)) {  
    $errMsg = "Error! You didn't enter the password."; 
    $count=0; 
     echo $errMsg;  
    } else {  
    $cus_password=$cus_password;
    // $count=1;
        /* password length validation */ 
        if (strlen($cus_password)  < 8 or strlen ($cus_password) > 20) {  
            $ErrMsg = "password must be Between  8 to 20 digits.";  
            echo $ErrMsg; 
            $count=0; 
        } else {  
            $cus_password=$cus_password;
            // $count=1;
        }  
    } 

    $sql ="SELECT c_id,c_email FROM `cus_rag`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    // echo $num;
    // echo "<br>";
    
    if($num >0)
        while ( $row=mysqli_fetch_assoc($result))
        {
            // echo $row['c_email'];
            // echo "<br>";
            if($cus_email == $row['c_email'])
             {
                 echo "Error !! You Are Already Registered";
                 $count=0;
             } 
    
        }
     
    // echo $count;
    if($count == 1)
     {

        /* DATA INSERTED TO DATABASE*/
    $query ="INSERT INTO `cus_rag` (`c_name`,`c_number`,`c_email`,`c_password`) VALUES ('$cus_name','$cus_number','$cus_email','$cus_password')";
     //This code will conformation to user that your data is inserted succesfully
     if(mysqli_query($conn,$query))
     {
         echo "<script>alert('Successful');</script>";
     }
     else
     {
          echo "failed".mysqli_error($conn);
     }          
        header('Location: login.php');
        //  echo '<script>alert("Data inserted")</script>';

    }
    else{
        // header('Location: new_account.php');
    }
}
?>