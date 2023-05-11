<?/*php session_start();
ob_start();*/?>
<!DOCTYPE html>  
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<script src="https://kit.fontawesome.com/4c38f23b8d.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/scripts.js"></script> 
<link rel="stylesheet" href="hotel_info.css"> 
<title>Hotel-Information</title> 
</head>  
<?php include('navigation_bar.html');?>    
<body>    
<h2>HOTEL INFORMATION</h2>
 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"" method="post" enctype="multipart/form-data">  
<div class="conti">     
    <div class="row">    
      <div class="col-25">    
      <Label>HOW MANY ROOMS YOUR HOTEL HAVE</Label>   
      </div>    
      <div class="col-75">    
        <input type="number" id="Room_no" name="Room_no" placeholder="">    
      </div>    
    </div>    
    <div class="row">    
      <div class="col-25">    
          <Label>PLEASE UPLOAD YOUR HOTEL IMAGE HERE</Label>   
      </div>    
      <div class="col-75">    
          <input type="file" name="h_image" id="h_image">   
      </div>    
    </div>    
    <div class="row">    
        <div class="col-25">    
            <Label>IS YOUR HOTEL HAVE A CAB ?</Label> 
        </div>    
        <div class="col-75">    
                <LAbel>YES</LAbel>
                <input type="radio" name="CAB" id="YC" value="YES" name="yes" placeholder="">
                <Label>NO</Label>
                <input type="radio" name="CAB" id="NC" value="NO" name="no"placeholder="">
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
        </div>    
      </div>     
    <div class="row">    
        <div class="col-25">    
            <Label>IS YOUR HOTEL HAVE A MECHANIC?</Label> 
        </div>    
        <div class="col-75">    
        <LAbel>YES</LAbel>
                <input type="radio" name="MEC" id="YM" value="YES" name="yes" placeholder="">
                <Label>NO</Label>
                <input type="radio" name="MEC" id="NM" value="NO" name="no"placeholder="">
                <script type="text/javascript">
                  $(function(){
                    $("input[name='MEC']").click(function(){
                        if($("#YM").is(":checked")){
                          status2 = 1;
                          check();
                      //    $("#Max_Range").removeAttr("disabled");
                       //   $("#Max_Range").focus();
                    }
                    else
                    {
                       //   $("#Max_Range").attr("disabled","disabled");
                       status2 = 0;
                       check();
                    }
                  });
                  });
              </script>     
        </div>    
      </div>    
    <div class="row">    
      <div class="col-25">    
      <Label>IN WHAT MAXIMUM RANGE YOUR HOTEL SEND MECHANIC OR CAB<br>
        <sub>(in Km)</sub>
      </Label>
      </div>    
      <div class="col-75"> 
        <script type="text/javascript">
        function check()
        {
              if(status1 == 1 || status2==1)
              {         $("#Max_Range").removeAttr("disabled");
                          $("#Max_Range").focus();
              }
              else
              {
                $("#Max_Range").attr("disabled","disabled");
              
              }
        }
        </script>   
          <input type="number" name="Max_Range" id="Max_Range" disabled="disabled"/>   
      </div>    
    </div> 
    <div class="row">    
      <div class="col-25">    
      <Label>MINIMUM TIME BOOK ROOM<br>
        <sub>(in Hours)</sub></Label>   
      </div>    
      <div class="col-75">    
        <input type="number" id="Min_hours" name="Min_hours" placeholder="">    
      </div>    
    </div>    
    <div class="r">    
      <input type="submit" value="Submit">    
    </div>       
</div>    
</form>
    
</body>    
</html>   
<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
     $numberOfRooms=$_POST["Room_no"];
     $i_image=$_FILES["h_image"];
     $image_name=$h_image['name'];
     $image_path=$h_image['tmp_name'];
     $image_error=$h_image['error'];
     $image_type=strtolower($h_image['type']);
     $Max_Range="";
     $Min_time_to_book=$_POST['Min_hours']; 
    $count=1; 
     if(empty($numberOfRooms))
    {
      $ErrMessage="PLS ENTER NO OF ROOMS";
      echo $ErrMessage;
      $count=0;
    }
    /* IMAGE VALIDATION*/
    if(empty($h_image))
    {
      $ErrMessage="PLS UPLOAD A IMAGE";
      echo $ErrMessage;
      $count=0; 
    }
    else
    { 
      if($image_error != 0 )
      {
        echo "Pls Enter Image";
        $count=0;
      }
      else
      {
        if($image_type == "image/png" or $image_type == "image/jpeg" or $image_type =="image/jpg" )
      {
          $destination_image_folder='uploaded_image/'.$image_name;
          move_uploaded_file($image_path,$destination_image_folder);
      }
      else
      {
        echo "PLS Enter Valid Type of Image";
        $count=0;
      }
      }
    }
    /* RADIO BUTTON VALIDATOIN (CAB)*/
    if(isset($_REQUEST['CAB']))
    {
      $cabAvaliable=$_REQUEST['CAB'];
      if($cabAvaliable == "YES")
      {
        $cabAvaliable=true;
        $Max_Range=$_POST['Max_Range'];
        if(empty($Max_Range))
        {
          $ErrMessage="Please Enter Maximum Range";
          echo $ErrMessage;
          $count=0; 
        }
        else
        {
          $Max_Range=$Max_Range;
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

    /* RADIO BUTTON VALIDATOIN (MECHANIC)*/
    if(isset($_REQUEST['MEC']))
    {
     $MechanicAvailable=$_REQUEST['MEC'];
     if($MechanicAvailable == "YES")
     {
       $MechanicAvailable=true;
       $Max_Range=$_POST['Max_Range'];
        if(empty($Max_Range))
        {
          $ErrMessage="Please Enter Maximum Range";
          echo $ErrMessage;
          $count=0; 
        } 
     }
     else
     {
      $MechanicAvailable=false;
     }
    }
    else 
    {
      $MechanicAvailable="";
      $ErrMessage= "Please Select Any Radio Button for MECHANIC";  
      echo $ErrMessage;
      $count=0; 
    } 
    
    if($count == 1)
    {
    include 'connection.php';
    $h_email=$_SESSION['email'];
    $selectquery="SELECT `h_id` FROM `hotel_rag` WHERE h_email='$h_email'";
    $selectResult=mysqli_query($conn,$selectquery);
    $arr=mysqli_fetch_assoc($selectResult);

    $h_id=$arr['h_id'];

    $insert_query="INSERT INTO `yatri`.`hotel_info` (`h_id`, `rooms_no`, `image`, `cab_available`, `mechanic_available`, `max_range`,`min_time_book_room`) VALUES ('$h_id', '$numberOfRooms', '$destination_image_folder', '$cabAvaliable', '$MechanicAvailable', '$Max_Range','$Min_time_to_book')";
    $insert=mysqli_query($conn,$insert_query);

    if($insert)
    {
      echo "<script> alert('Data Inserted Successful');</script>";

      header('Location: room_info.php');
      ob_flush();
    }
    else
    {
      header('Location:hotel_info.php');
      ob_flush();
    }
    }
  }

?>