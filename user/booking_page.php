<?php session_start();
if(isset($_SESSION['hotel_ref']) && isset($_SESSION['roomtype']))
{
$h_id=$_SESSION['hotel_ref'];
$selected_room=$_SESSION['roomtype'];
}
else
{
  die("Page is Not Found");
} 
include'connection.php';
$count=1;
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
$roomquery="SELECT * FROM `hotel_info` WHERE `h_id`=$h_id";
$roomresult=mysqli_query($conn,$roomquery);
$room_arr=mysqli_fetch_assoc($roomresult);
$availableRoom=$room_arr['rooms_no'];?>
<!DOCTYPE html>    
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/scripts.js"></script>  
<link rel="stylesheet" href="feedback.css">  
</head>   
 <?php include'navigation_bar.html';?>     
<body>    
<h2>BOOKING FORM</h2>    
<div class="container2">    
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">    
    <div class="row">    
      <div class="col-25">    
        <label for="fname">First Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="fname" name="firstname" placeholder="Your name..">    <br>
          <label for=""></label>   
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
        <label for="lname">Last Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">  <br>
          <label for=""></label>     
      </div>    
    </div>    
    <div class="row">    
        <div class="col-25">    
          <label for="email">Mail Id</label>    
        </div>    
        <div class="col-75">    
          <input type="email" id="email" name="mailid" placeholder="Your mail id..">    <br>
          <label for=""></label>   
        </div>    
    </div>    
    <div class="row">    
        <div class="col-25">    
          <label for="pnumber">Phone Number</label>    
        </div>    
        <div class="col-75">    
          <input type="number" id="pnumber" name="phonenumber" placeholder="Your Phone Number..">    <br>
          <label for=""></label>   
        </div>    
    </div> 
    <div class="row">    
        <div class="col-25">    
          <label for="adate">Arrival Date</label>    
        </div>    
        <div class="col-75">    
          <input type="date" name="adate" id="adate" value=""placeholder="Date.."> <br>
          <label for=""></label>  
        </div>    
    </div> 
    <div class="row">    
        <div class="col-25">    
          <label for="atime">Arrival Time</label>    
        </div>    
        <div class="col-75">    
          <input type="time" id="atime" name="atime" placeholder="Time..">    <br>
          <label for=""></label>   
        </div>    
    </div>
    <div class="row">    
        <div class="col-25">    
          <label for="ddate">Departure Date</label>    
        </div>    
        <div class="col-75">    
          <input type="date" id="ddate" name="ddate" placeholder="Date..">    <br>
          <label for=""></label>   
        </div>    
    </div>
    <div class="row">    
        <div class="col-25">    
          <label for="dtime">Departure Time</label>    
        </div>    
        <div class="col-75">    
          <input type="time" id="dtime" name="dtime" placeholder="Time..">   <br>
          <label for=""></label>    
        </div>    
    </div>
    <div class="row">    
        <div class="col-25">    
          <label for="people">People</label>    
        </div>    
        <div class="col-75">    
          <input type="number" id="People" name="people" placeholder="Number of people.." >  <br>
          <label for=""></label>  
        </div>    
    </div>
    <div class="row">    
        <div class="col-25">    
          <label for="people">Number Of Rooms</label>    
        </div>    
        <div class="col-75">    
          <input type="number" id="rooms" name="rooms" placeholder="Number Of Rooms.." >  <br>
          <label for=""></label>  
        </div>    
    </div>  
    <div class="row">    
        <div class="col-25">    
          <label for="">Need Cab</label>    
        </div>    
        <div class="col-75">    
        <input type="radio" name="CAB" id="YC" value="YES" name="yes" placeholder="">
          <label for="">Yes</label>   
          <input type="radio" name="CAB" id="NC" value="NO" name="no"placeholder="">
          <label for="">No</label>     <br>
          <label for=""></label>       
        </div>    
    </div>
    <script type="text/javascript">
                var status1 = 0;
                var status2= 0;
                  $(function(){
                    $("input[name='CAB']").click(function(){
                        if($("#YC").is(":checked")){
                          status1 = 1;
                          check();
                        //  $("#Max_Range").removeAttr("disabled");
                       //   $("#Max_Range").focus();
                    }
                    else
                    {
                        //   $("#Max_Range").attr("disabled","disabled");
                        status1 = 0;
                        check();
                      
                    }
                  });
                  });
      </script>     
       
       <script type="text/javascript">
        function check()
        {
              if(status1 == 1 || status2==1)
              {         $("#Address").removeAttr("disabled");
                          $("#Address").focus();
              }
              else
              {
                $("#Address").attr("disabled","disabled");
              
              }
        }
        </script>   
      <div class="row">    
        <div class="col-25">    
          <label for="feed_back">Address For Cab</label>    
        </div>    
        <div class="col-75">    
          <textarea id="Address" name="Address" placeholder="Address.." style="height:50px" disabled="disable"></textarea>  <br>
          <label for=""></label>     
        </div>    
    </div>
    <div class="r">    
      <input type="submit" value="Submit">    
    </div>    
  </form>    
</div>     
</body>    
</html>  

<?php
include 'footer.html'; 
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  $f_name=$_POST['firstname'];
  $l_name=$_POST['lastname'];
  $mail=$_POST['mailid'];
  $p_number=$_POST['phonenumber'];
  $arrivalDate=date('d-m-Y',strtotime($_POST['adate']));
  $arrivalTime=date('H:i',strtotime($_POST['atime']));
  $dipatureDate=date('d-m-Y',strtotime($_POST['ddate']));
  $dipatureTime=date('H:i',strtotime($_POST['dtime']));

  $people=$_POST['people'];
  $rooms=$_POST['rooms'];

  
 //FRIST NAME VALIDATION
 if (empty ($f_name)) {  
  $ErrMsg = "Error! You didn't enter the Frist Name.";
  echo $ErrMsg; 
  $count=0;
          
} else {  
  $f_name = trim($f_name); 
  
  if (!preg_match ("/^[a-zA-z ]*$/", $f_name) ) {  
      $ErrMsg = "Only alphabets and whitespace are allowed In Frist Name."; 
     echo $ErrMsg;
   
       $count=0;
  } else {  
      $f_name=trim($f_name);    
  } 
  
}
//LAST NAME VALIDATION
if (empty ($l_name)) {  
  $ErrMsg = "Error! You didn't enter the Last Name.";
  echo $ErrMsg;
  $count=0;
          
} else {  
  $f_name = trim($l_name); 
  
  if (!preg_match ("/^[a-zA-z ]*$/", $l_name) ) {  
      $ErrMsg = "Only alphabets and whitespace are allowed In Last Name."; 
     echo $ErrMsg;
   
       $count=0;
  } else {  
      $l_name=trim($l_name);    
  }   
}
//EMAIL VALIDATION
if (empty ($mail)) {  
  $errMsg = "Error! You didn't enter the Email ."; 
  $count=0; 
  echo $errMsg;  
} else {  
  $mail=trim($mail);
 //  $count=1; 
   /* email pattren validation*/
 if (!preg_match ($pattern, $mail) ){  
     $ErrMsg = "Please!! Enter Valid Email";
     $count=0;  
     echo $ErrMsg;   
  } else {  
     $mail=trim($mail);  
 }   
}

//PHONE NUMBER VALIDATION
if (empty ($p_number)) {  
  $errMsg = "Error! You didn't enter the Number."; 
  $count=0; 
  echo $errMsg;  
} else {  
  $p_number= trim($p_number); 

   /* only number allowed validation*/  
  if (!preg_match ("/^[0-9]*$/", $p_number) ){  
              $ErrMsg = "Only numeric value is allowed."; 
              $count=0; 
              echo $ErrMsg;  
          } else {  
              $p_number=($p_number); 
             
          }
          /* number length validation*/ 
  if (strlen($p_number)  < 10 or strlen ($p_number) > 10) {  
          $ErrMsg = "Mobile must have 10 digits."; 
          $count=0; 
         echo $ErrMsg;  
  } else {  
          $p_number=$p_number;   
         
  }   
}     
//ARRIVAL DATE VALIDATION
if(empty($arrivalDate))
{
  $errMsg="Error!!plaease select Arrival Date";
  echo $errMsg;
  $count=0;
}
else
{
 
}
//ARRIVAL TIME VALIDATION
if(empty($arrivalTime))
{
  $errMsg="Error!!plaease select Arrival Time";
  echo $errMsg;
  $count=0;
}
else
{
 
}
// DIPATURE DATE VALIDATION
if(empty($dipatureDate))
{
  $errMsg="Error!!plaease select Dipature Date";
  echo $errMsg;
  $count=0;
}
else
{
  
}
//DIPATURE TIME VALIDATION
if(empty($dipatureTime))
{
  $errMsg="Error!!plaease select Dipature Time";
  echo $errMsg;
  $count=0;
}
else
{
  
}
//PEOPLES BOX VALIDATION
if(empty($people))
{
  $errMsg="Please!! Enter Number of people";
  echo $errMsg;
  $count=0;
}
else
{
  $people=$people;
}

//ROOMS NO VALIDATION
if(empty($rooms))
{
  $errMsg="Please!! Enter Rooms Number";
  echo $errMsg;
  $count=0;
}
else
{
  if($rooms > $availableRoom)
  {
    echo "<script>alert('Rooms Are Not Availiable');</script>";
    $count=0;
  }
}
  //CAB RADIO BUTTON VALIDATIO
  if(isset($_REQUEST['CAB']))
    {
      $needCab=$_REQUEST['CAB'];
      if($needCab == "YES")
      {
        $needCab=true;
        $Address=$_POST['Address'];
        if(empty($Address))
        {
          $SErrMessage="Please Enter Address";
          echo $ErrMessage;
          $count=0; 
        }
        else
        {
         $Addresse=($Address);
        }
      }
      else
      {
        $cabAvaliable=false; 
      }
    }
    else
    {
      $ErrMessage= "Please Select Any Radio Button for CAB";  
      echo $ErrMessage;
      $count=0;
    }
 }
?>