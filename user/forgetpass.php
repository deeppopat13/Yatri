<?php
    include 'connection.php';
    // include 'forgetpassword.php';
    // session_start();
    $count=1;
    $cus_email;
    $Errmsg="";
    $sql ="SELECT c_id,c_email FROM `cus_rag`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cus_email=$_POST["email"];
      // Generating Password
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $new_password = substr( str_shuffle( $chars ), 0, 8 ); 
        if(empty($cus_email))
        {
            $Errmsg="Error !! You Did'nt Enter Email";
            echo $Errmsg;
            $count=0;
        } 
         else
         {
            
        
             if($num > 0)
             {
             while ( $row=mysqli_fetch_assoc($result))
             {
                 if($cus_email == $row['c_email'])
                  {
                      $count=11;
                      break;
                  }
                  else
                  {
                      $count=100;
                  } 
        
             }
             if($count == 11)
             { 
                $query="select * from cus_rag where c_email='$cus_email'";
                $email=mysqli_query($conn,$query); 
                $cus_nameARR=mysqli_fetch_array($email);
                // $token=$cus_email;
                $cus_name=$cus_nameARR['c_name'];
                $cus_id=$cus_nameARR['c_id'];
                $password =$new_password;
                $Uquery = "update cus_rag set c_password='$password' where c_email='$cus_email'"; 
                $upadate= mysqli_query($conn,$Uquery); 
                if($upadate)
                {
                    $to_email = $cus_email;
                    $subject = "Forget Password";
                    $body = "Hello,.$cus_name.
                    we Send You a Your New Password
                    Your New Password Is '$new_password' 
                    Plase Use This TO Log In to Our Web
                    http://localhost:8080/Yatri/login.php";
                    $headers = "From: parthjaishur@gmail.com"; 
                  if (mail($to_email, $subject, $body, $headers)) 
                  {
                  echo "<script>alert('New Password has been sent to your  $to_email, Please check your mail and LogIn...')</script>";
                  } 
                  else 
                  {
                  echo "<script>alert('Email sending failed...')</script>";
                  } 
                }
              
        
            }
            else
            {
                echo "Pls Enter Valid Email";
            }
            }
        }
    }  
?>