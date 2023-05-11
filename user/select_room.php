<?php
session_start();
ob_start();
$h_id=$_SESSION['hotel_ref'];
include 'connection.php';
$roomquery="SELECT * FROM `room_info` WHERE `h_id`=$h_id";
$roomresult=mysqli_query($conn,$roomquery);
$r_price_arr=mysqli_fetch_assoc($roomresult);

// Normal Room VAriable
$Room_Price=$r_price_arr['price'];
$room_image=$r_price_arr['room_image'];

// Ac room Variable
$acr=$r_price_arr['ac_room'];
$acr_price=$r_price_arr['ac_room_price'];
$acr_image=$r_price_arr['ac_room_image'];

//delux room variable

$dlr=$r_price_arr['delux_room'];
$dlr_price=$r_price_arr['delux_room_price'];
$dlr_image=$r_price_arr['delux_room_image'];

//super delux room variable

$sdr=$r_price_arr['super_delux_room'];
$sdr_price=$r_price_arr['super_delux_price'];
$sdr_image=$r_price_arr['super_delux_image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 	
	<link rel="stylesheet" href="feedback.css">
	<title>Room Select</title>
</head>
<style>
body
{
	background-color: gainsboro;
}
.r
{
	margin:2pc;
}
*{
	font-family: 'Langar', cursive; 
}
</style>
<?php
include 'navigation_bar.html';
?>
<body style="background-color: gainsboro" >
<h2 style="font-family: 'Langar', cursive; ">Please Select Room Type</h2>
<div class="container2">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

<table class="w3-table w3" >
<tbody> 
	<tr class="abc">
			<td class="abc">
				<input type="radio" name="roomtype" id="Normal" placeholder="roomtype.." value='normal'> 
				<label for=>Normal</label>	
			</td>
			<td class="abc">
			<?php	echo"<img src='/Yatri/hotel/".$room_image."' alt='bna' srcset='' height='100'>";?>
			</td>
			<td class="abc">
				<?php	echo"<label>price:" .$Room_Price."</label>";?>
				</td>
	</tr>
<?php
if($acr)
{
	echo"
	<tr class='abc'>
			<td class='abc'>
				<input type='radio' name='roomtype' id='Ac' value='AC' > 
				<label for=>A/C</label>	
			</td>
			<td class='abc'>
			
				<img src='/Yatri/hotel/$acr_image' alt='bna' srcset='' height='100'>
				
			</td>
			<td class='abc'>
					<label>price: $acr_price</label>
			</td>
	</tr>
 ";
}

if($dlr)
{
	echo"
	<tr class='abc'>
			<td class='abc'>
				<input type='radio' name='roomtype' id='dlr' value='delux' > 
				<label for=>Delux Room</label>	
			</td>
			<td class='abc'>
			
				<img src='/Yatri/hotel/$dlr_image' alt='bna' srcset='' height='100'>
				
			</td>
			<td class='abc'>
					<label>price: $dlr_price</label>
			</td>
	</tr>
";		
}
if($sdr)
{
	echo"
	<tr class='abc'>
			<td class='abc'>
				<input type='radio' name='roomtype' id='sdr' value='super_delux' > 
				<label for=>Super Delux Room</label>	
			</td>
			<td class='abc'>
			
				<img src='/Yatri/hotel/".$sdr_image."' alt='bna' srcset='' height='100'>
				
			</td>
			<td class='abc'>
					<label>price:".$sdr_price."</label>
			</td>
	</tr>
";	
}?>
</tbody> 
</table> 
<div class="r">
<input type="submit" value="Select"> 
</div>
</form>            
</div>	
</body>
</html>
<?php
$count=1;
if($_SERVER["REQUEST_METHOD"]== "POST")
{
	if(isset($_REQUEST['roomtype']))
    {
      $roomtype=$_REQUEST['roomtype'];

	  if($roomtype == "normal")
	  {
		  $_SESSION['roomtype']="normal";
	  }
	  elseif($roomtype == "AC")
	  {
		$_SESSION['roomtype']="AC";
	  }
	  elseif($roomtype == "delux")
	  {
		$_SESSION['roomtype']="delux";
	  }
	  elseif($roomtype == "super_delux")
	  {
		$_SESSION['roomtype']="super_delux";
	  }
    }
    else
    {
      echo"<script>alert('Please Select Any Room');</script>"; 
	  $count=0; 
      
	}

	if($count ==1)
	{	
		if(isset($_SESSION['loggedin']))
		{
		if($_SESSION['loggedin'] == true)
		{
			header("Location:booking_page.php");
		}
		else
		{
			echo"<script>alert('Please Login');</script>";
		}
		}
		else
		{
			echo"<script>alert('Please Login');</script>";
		}
	}
}
ob_flush();
?>