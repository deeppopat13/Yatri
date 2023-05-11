<?php session_start();
if(isset($_SESSION['loggedin']))
{
  if($_SESSION['loggedin'] == true)
  {

  }
  else
  {
    die ("<script>alert('Please Log In Frist'); 
    window.location.href='login.php';</script>");
    
  }
}
else
{
  die ("<script>alert('Please Log In Frist'); 
  window.location.href='login.php';</script>");
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <title>See Customer</title>
</head>
<?php
include 'navigation_bar.html';?>
<style>
  body
  {
    background: url(bcseeh.jpg);
  }
.ab  a{
    background:darkslategrey;
    color:#fff;
    text-decoration: none;
    padding: 10px 25px;
    border-radius: 5px;
    display: inline-block;
    /* margin-top: 30px; */
}
.ab a:hover{
    color: blue;
    background: black;
}
.tr{
	background:blue;
	text-align: center;
  color:white;
}
  </style>
<body>
<table class="w3-table w3-black" border="5" >
        <thead>
          <tr class="tr">
            <th scope="col">Customer Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Number</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody> 

<?php

include 'connection.php';
$quary="SELECT * FROM `cus_rag`";
$result=mysqli_query($conn,$quary);
$num= mysqli_num_rows($result);
if($result)
{
      if($num>0)
      {
          while($row=mysqli_fetch_assoc($result))
          {
            $c_id=$row['c_id'];
            $c_name=$row['c_name'];
            $c_number=$row['c_number'];			
            $c_Email=$row['c_email'];			



            // echo $h_id; 
        

            echo"<tbody>
            <tr>
                <td>$c_id</td>
                <td>$c_name</td>
                <td>$c_number</td>
                <td>$c_Email</td>
                <td><div class='ab'><a href='delete_customer.php?id=$c_id'>Delete</a></div></td> 
            </tr> 
          </tbody>";
          }
     }
}
?>
   </tbody> 
</body>
</html>