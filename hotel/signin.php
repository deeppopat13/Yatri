<?php
session_start();
$hotel_name=$hotel_number=$hotel_email=$hotel_password=$hotel_address="";
$count=1;
$error_code=0; 
settype($cus_number,"string");
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 

include 'connection.php';


/* BUTTON CLICKED EVENT OCCURS */
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $hotel_name=$_POST["name"];
    $hotel_number=$_POST["number"];
    $hotel_email=$_POST["email"];
    $hotel_password=$_POST["password"];
    $hotel_city=$_POST["city"];
    $hotel_address=$_POST["address"];
    
    //NAME VALIDATION
    /* empty name validation*/
    if (empty ($hotel_name)) {  
        $ErrMsg = "Error! You didn't enter the Name.";
        echo $ErrMsg;
        $error_code=1; 
        $count=0;
                
    } else {  
        $hotel_name = $_POST["name"]; 
        // $count=1;
        if (!preg_match ("/^[a-zA-z ]*$/", $hotel_name) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed."; 
           // echo $ErrMsg
        //    $cookie_value = $ErrMsg;
            // $error_code=1;  
             $count=0;

        } else {  
            $hotel_name=trim($hotel_name);
            // $count=1
            // $cookie_value = "$cus_name";

        } 
        
    }
  //echo "hi";

 
    // NUMBER VALIDATION

    /*empty number  validation */
   if (empty ($hotel_number)) {  
         $errMsg = "Error! You didn't enter the Number."; 
         $count=0; 
         echo $errMsg;  
     } else {  
         $hotel_number= trim($hotel_number); 
        //  $count=1;
          /* only number allowed validation*/  
         if (!preg_match ("/^[0-9]*$/", $hotel_number) ){  
                     $ErrMsg = "Only numeric value is allowed."; 
                    //  $count=0; 
                     echo $ErrMsg;  
                 } else {  
                     $hotel_number=($hotel_number); 
                    //  $count=1; 
                 }
                 /* number length validation*/ 
         if (strlen($hotel_number)  < 10 or strlen ($hotel_number) > 10) {  
                 $ErrMsg = "Mobile must have 10 digits."; 
                 $count=0; 
                echo $ErrMsg;  
         } else {  
                 $hotel_number=$hotel_number;   
                //  $count=1; 
         }   
     }     
     //EMAIL VALIDATION

    /* empty email validation */ 
     if (empty ($hotel_email)) {  
         $errMsg = "Error! You didn't enter the Email ."; 
         $count=0; 
         echo $errMsg;  
     } else {  
         $hotel_email=trim($hotel_email);
        //  $count=1; 
          /* email pattren validation*/
        if (!preg_match ($pattern, $hotel_email) ){  
            $ErrMsg = "Email is not valid.";
            $count=0;  
            echo $ErrMsg;   
         } else {  
            $hotel_email=trim($_POST["email"]); 
            // $count=1; 
        }   
     } 
     //Address Validation 
    if(empty($hotel_address))
    {
        echo"Error!! You Did Not Enter Address";
        $count=0;
    }
    else
    {
        $hotel_address=trim($hotel_address);
    } 
     //PASSWORD VALIDATION
     /* empty password validation */
    if (empty ($hotel_password)) {  
    $errMsg = "Error! You didn't enter the password."; 
    $count=0; 
     echo $errMsg;  
    } else {  
    $hotel_password=$hotel_password;
    // $count=1;
        /* password length validation */ 
        if (strlen($hotel_password)  < 8 or strlen ($hotel_password) > 20) {  
            $ErrMsg = "password must be Between  8 to 20 digits.";  
            echo $ErrMsg; 
            $count=0; 
        } else {  
            $hotel_password=$hotel_password;
            // $count=1;
        }  
    }
   
    //City Validation
    if (empty ($hotel_city)) {  
        $ErrMsg = "Error! You didn't enter the city Name.";
        echo $ErrMsg;
        $error_code=1; 
        $count=0;
                
    } else {  
        $hotel_city = $_POST["city"]; 
        // $count=1;
        if (!preg_match ("/^[a-zA-z ]*$/", $hotel_city) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed."; 
            echo $ErrMsg;
        //    $cookie_value = $ErrMsg;
            // $error_code=1;  
             $count=0;

        } else {  
            $hotel_city=trim($hotel_city);
            // $count=1
            // $cookie_value = "$cus_name";

        } 
        
    }
    //Terms and Condition Validation
    if(isset($_POST['t&m']))
    {
        $termsAndCondition=true;
    }
    else
    {
        Echo "Please Accecept Our Terms And Condition";
        $count=0;
    }
    // if hotel is alredy register !! this code check this
    $sql ="SELECT h_id,h_email FROM `hotel_rag`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    // echo $num;
    // echo "<br>";
    
    if($num >0)
    {
        while ( $row=mysqli_fetch_assoc($result))
        {
            // echo $row['c_email'];
            // echo "<br>";
            if($hotel_email == $row['h_email'])
             {
                 echo "Error !! You Are Already Registered";
                 $count=0;
             } 
    
        }
    } 
    // echo $count;
    if($count == 1)
     {

        /* DATA INSERTED TO DATABASE*/
   $query="INSERT INTO `yatri`.`hotel_rag` (`h_name`, `h_number`, `h_email`, `h_password`, `h_city`, `h_address`,`termscondition`) VALUES ('$hotel_name', '$hotel_number', '$hotel_email', '$hotel_password', '$hotel_city', '$hotel_address','$termsAndCondition')";
     //This code will conformation to user that your data is inserted succesfull0y
     if(mysqli_query($conn,$query))
     {
        $_SESSION['email']="$hotel_email";
        echo "<script>alert('Data inserted')
        window.location.href='hotel_info.php';</script>";
         
        // header('Location: hotel_info.php');
     }
     else
     {
          echo "failed".mysqli_error($conn);
     }          
        // header('Location: login.php');
     
       

    }
    else{
        // header('Location: new_account.php');
    }
}
?>