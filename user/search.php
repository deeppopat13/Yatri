<?php 
session_start();
include 'navigation_bar.html';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $search=$_POST["search"];

    include 'connection.php';

    // $search=strtoupper($search);
    $quary="SELECT * FROM `hotel_rag` WHERE h_city='$search'";
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
                 
                $roomquery="SELECT * FROM `room_info` WHERE `h_id`=$h_id";
                $roomresult=mysqli_query($conn,$roomquery);
                $r_price_arr=mysqli_fetch_assoc($roomresult);
                $Room_Price=$r_price_arr['price'];
                
                $imagequery="SELECT * FROM `hotel_info` WHERE `h_id`=$h_id";
                $imageresult=mysqli_query($conn,$imagequery);
                $image_arr=mysqli_fetch_assoc($imageresult);
                $image=$image_arr['image'];

                $_SESSION['hotel_ref']=$h_id;

               
                
                

                echo "<div class='about-section'> 
                <Table>
                <tr>
            <td> 
                <div class='picture'>
                    <img src=/Yatri/hotel/$image alt='lg' width='50%'>
                </div>
            </td>
            <td>
                <div class='text'>
       
                        <P>$h_name</P>
                        <p>$h_address </p> 
                        <p>Price :$Room_Price</p>
                        
                        <a href='select_room.php'>Book Now</a> 
                </div>
            </td>
        </tr>
    </Table>
</div> "; 
              }
          }
          else
    {
        echo "Record Not Found";
    } 
    }
    


   

    
}
?>