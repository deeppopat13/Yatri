<?php
    include 'connection.php';
    // include 'forgetpassword.php';
    // session_start();
    $count=1;
    $cus_email;
    $Errmsg="";
    $sql ="SELECT a_id,a_email FROM `admin`";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $Admin_email=$_POST["email"];
      // Generating Password
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $new_password = substr( str_shuffle( $chars ), 0, 8 ); 
        if(empty($Admin_email))
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
                 if($a_email == $row['a_email'])
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
                $query="select * from admin where a_email='$Admin_email'";
                $email=mysqli_query($conn,$query); 
                $cus_nameARR=mysqli_fetch_array($email);
                // $token=$cus_email;
                // $Admin_name=$cus_nameARR['a_name'];
                $Admin_id=$cus_nameARR['a_id'];
                $password =$new_password;
                $Uquery = "update admin set a_password='$password' where a_email='$Admin_email'"; 
                $upadate= mysqli_query($conn,$Uquery); 
                if($upadate)
                {
                    $to_email = $Admin_email;
                    $subject = "Forget Password";
                    $body = "Hello,".
                    "Your New Password Is '$new_password' 
                    Plase Use This TO Log In to Our Web";
                    $headers = "From: yatriweb@gmail.com"; 
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