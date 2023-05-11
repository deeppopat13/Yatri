<?php
include "connection.php";
$count=1;
$sql ="SELECT h_email,h_password FROM `hotel_rag`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $hotel_email=$_POST["email"];
    $hotel_password=$_POST["password"];

    if (empty ($hotel_email)) {  
        $errMsg = "Error! You didn't enter the Email ."; 
        $count=0; 
        echo $errMsg;  
    }
    else
    {
        $hotel_email=trim($hotel_email);
    }

    if (empty ($hotel_password)) {  
        $errMsg = "Error! You didn't enter the password."; 
        $count=0; 
         echo $errMsg;  
        } else
        {  
        $hotel_password=$hotel_password;
        }
     if($count == 1)
    {
        if($num >0)
        while ( $row=mysqli_fetch_assoc($result))
        {
            // echo $row['c_email'];
            // echo "<br>";
            $count2=1;
            if($hotel_email == $row['h_email'] && $hotel_password == $row['h_password'])
             {
                //  echo "Error !! You Are Already Registered";
                echo "<script>alert('Log In Successfull');
                window.location.href='index.php';</script>";
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$hotel_email; 
                 $count2=0;
                 break;
             }
    
        }
        if($count2 == 1)
        {
            echo "<script>alert('Error!!! Pls Enter Correct Username or Password');
            window.location.href='login.php';</script>';
        } 
    }
}
?>
