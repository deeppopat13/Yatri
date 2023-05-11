<?php
include "connection.php";
$count=1;
$sql ="SELECT a_email,a_password FROM `admin`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);


    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $Admin_email=$_POST["email"];
    $Admin_password=$_POST["password"];

    if (empty ($Admin_email)) {  
        $errMsg = "Error! You didn't enter the Email ."; 
        $count=0; 
        echo $errMsg;  
    }
    else
    {
        $Admin_email=trim($Admin_email);
    }

    if (empty ($Admin_password)) {  
        $errMsg = "Error! You didn't enter the password."; 
        $count=0; 
         echo $errMsg;  
        } else
        {  
        $Admin_password=$Admin_password;
        }
     if($count == 1)
    {
        if($num >0)
        while ( $row=mysqli_fetch_assoc($result))
        {
            // echo $row['c_email'];
            // echo "<br>";
            $count2=1;
            if($Admin_email == $row['a_email'] && $Admin_password == $row['a_password'])
             {
                
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$Admin_email;
                echo "<script>alert('Log In Successfull');
                window.location.href='index.php';</script>"; 
                 $count2=0;
                 break;
             }
    
        }
        if($count2 == 1)
        {
            echo "<script>alert('Error!!! Pls Enter Correct Username or Password');
            window.location.href='login.php';</script>";
        } 
    }
}
?>
