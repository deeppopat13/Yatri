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
  
  <title>See Hotels</title>
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
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<table class="w3-table w3-black" border="5" >
        <thead>
          <tr class="tr">
            <th scope="col">Hotel Id</th>
            <th scope="col">Hotel Name</th>
            <th scope="col">Hotel Image</th>
            <th scope="col">Hotel Number</th>
            <th scope="col">Hotel Email</th>
            <th scope="col">Hotel Address</th>
            <th scope="col">Hotel Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody> 
<?php

include 'connection.php';
$quary="SELECT * FROM `hotel_rag`";
$result=mysqli_query($conn,$quary);
$num= mysqli_num_rows($result);
if($result)
{
      if($num>0)
      {
          while($row=mysqli_fetch_assoc($result))
          {
            $h_id=$row['h_id'];
            $h_name=$row['h_name'];
            $h_address= $row['h_address'];
            $h_number=$row['h_number'];
            $h_email=$row['h_email'];
            // echo $h_id; 
            $roomquery="SELECT * FROM `room_info` WHERE `h_id`=$h_id";
            $roomresult=mysqli_query($conn,$roomquery);
            $r_price_arr=mysqli_fetch_assoc($roomresult);
            $Room_Price=$r_price_arr['price'];
            
            $imagequery="SELECT * FROM `hotel_info` WHERE `h_id`=$h_id";
            $imageresult=mysqli_query($conn,$imagequery);
            $image_arr=mysqli_fetch_assoc($imageresult);
            $image=$image_arr['image'];

            echo"<tbody>
            <tr>
                <td>$h_id</td>
                <td>$h_name</td>
                <td><img src=/Yatri/hotel/$image alt='Image Not Found' width='20%'></td>
                <td>$h_number</td>
                <td>$h_email</td>
                <td>$h_address</td>
                <td>$Room_Price</td>
                <td><div class='ab'><a href='delete_hotel.php?id=$h_id'>Delete</a></div></td> 
            </tr> 
          </tbody>";
          }
     }
}
?>
   </tbody> 
</body>
</html>