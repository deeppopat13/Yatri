<?php
session_start();
include "connection.php";
$count=1;
$sql ="SELECT c_email,c_password FROM `cus_rag`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $cus_email=$_POST["email"];
    $cus_password=$_POST["password"];

    if (empty ($cus_email)) {  
        $errMsg = "Error! You didn't enter the Email ."; 
        $count=0; 
        echo $errMsg;  
    }
    else
    {
        $cus_email=trim($cus_email);
    }

    if (empty ($cus_password)) {  
        $errMsg = "Error! You didn't enter the password."; 
        $count=0; 
         echo $errMsg;  
        } else
        {  
        $cus_password=$cus_password;
        }
     if($count == 1)
    {
        if($num >0)
        while ( $row=mysqli_fetch_assoc($result))
        {
            // echo $row['c_email'];
            // echo "<br>";
            $count2=1;
            if($cus_email == $row['c_email'] && $cus_password == $row['c_password'])
             {
                echo '<script>alert("Log In Successfull")</script>';
                header("location:index.php");
               
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$cus_email; 
                 $count2=0;
                 break;
             }
    
        }
        if($count2 == 1)
        {
            echo '<script>alert("Error!!! Pls Enter Correct Username or Password")</script>';
        } 
    }
}
?>
