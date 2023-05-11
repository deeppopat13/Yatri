<?php session_start();
ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/scripts.js"></script> 
    <link rel="stylesheet" href="hotel_info.css">
    <title>Room Information</title> 
</head>
<style>
    body
    {
        background: black;
   
    }
    .conti{
        padding: 0pc;
        height:70pc;
    }
    .row{
        padding:1pc;
    }
    h2
    {
        color: black;       
    }
</style>
<?php include'navigation_bar.html';?>
<body>
<h2>PLEASE FILL ROOM INFORMATION</h2>    
<div class="conti">    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">  
    <div class="row">    
      <div class="col-25">    
        <label for="fname">UPLOAD ROOM IMAGE</label>    
      </div>    
      <div class="col-75">    
        <input type="file" name="image_room" id="image_room">   
      </div>    
    </div>  
    <div class="row">    
      <div class="col-25">    
        <label for="lname">PRICE FOR NORMAL ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="NUMBER" id="price" name="price" placeholder="">    
      </div>    
    </div>   
    <div class="row">    
        <div class="col-25">    
            <Label>IS YOUR HOTEL HAVE AC  ROOM</Label> 
        </div>    
        <div class="col-75">    
        <LAbel>YES</LAbel>
                <input type="radio" name="ACR" id="YAC" value="YES" name="yes" placeholder="">
                <Label>NO</Label>
                <input type="radio" name="ACR" id="NAC" value="NO" name="no"placeholder="">
                <script type="text/javascript">
                var stutas_acr=0;
                var stutas_dlr=0;
                var status_sdl=0;
                 $(function(){
                     $("input[name='ACR']").click(function(){
                         if($("#YAC").is(":checked"))
                         {
                          stutas_acr=1;
                          checkAcr();
                         }
                         else
                         {
                            stutas_acr=0;
                            checkAcr();
                         }
                     });
                     
                 });
              </script>
        </div>    
      </div>  
      <div class="row">    
      <div class="col-25">    
        <label for="fname">UPLOAD A IMAGE OF AC ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="file" name="ac_room" id="ac_room" disabled="disabled">   
      </div>    
    </div>      
    <div class="row">    
      <div class="col-25">    
        <label for="lname">PRICE FOR AC ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="NUMBER" id="ac_price" name="ac_price" placeholder="" disabled="disabled">    
      </div>    
    </div>   
    <div class="row">    
        <div class="col-25">    
            <Label>IS YOUR HOTEL HAVE A DELUX ROOM</Label> 
        </div>    
        <div class="col-75">    
        <LAbel>YES</LAbel>
                <input type="radio" name="DLR" id="YDL" value="YES" name="yes" placeholder="">
                <Label>NO</Label>
                <input type="radio" name="DLR" id="NDL" value="NO" name="no"placeholder="">
                <script type="text/javascript">
                  $(function(){
                    $("input[name='DLR']").click(function(){
                        if($("#YDL").is(":checked")){
                          stutas_dlr=1;

                          checkDlr();
                    }
                    else
                    {
                        stutas_dlr=0;
                          checkDlr(); 
                    }
                  });
                  });
              </script>
        </div>    
      </div> 
      <div class="row">    
      <div class="col-25">    
        <label for="fname">UPLOAD A IMAGE OF DELUX ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="file" name="delux_room" id="delux_room" disabled="DISABLED">   
      </div>    
    </div>  
      <div class="row">    
      <div class="col-25">    
        <label for="lname">PRICE FOR DELUX ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="NUMBER" id="d_price" name="d_price" placeholder="" disabled="disabled">    
      </div>    
    </div>     
    <div class="row">    
        <div class="col-25">    
            <Label>IS YOUR HOTEL HAVE SUPERDELUX ROOM</Label> 
        </div>    
        <div class="col-75">    
        <LAbel>YES</LAbel>
                <input type="radio" name="SDP" id="YSD" value="YES" name="yes" placeholder="">
                <Label>NO</Label>
                <input type="radio" name="SDP" id="NSD" value="NO" name="no"placeholder="">
                <script type="text/javascript">
                 $(function(){
                     $("input[name='SDP']").click(function(){
                         if($("#YSD").is(":checked"))
                         {
                           status_sdl=1;
                           checkSdl(); 
                         }
                         else
                         {
                           status_sdl=0;
                            checkSdl();
                         }
                     });
                     
                 });
              </script>

              <script Type="text/javascript">
               function checkAcr()
               {
                 if(stutas_acr == 1)
                 {
                  $("#ac_price").removeAttr("disabled");
                  $("#ac_price").focus();
                  $("#ac_room").removeAttr("disabled");
                  $("#ac_room").focus();
                 }
                 else
                 {
                    $("#ac_price").attr("disabled","disabled");
                    $("#ac_room").attr("disabled","disabled");
                 }
               } 
               function checkDlr()
               {
                if(stutas_dlr == 1)
                {
                  $("#d_price").removeAttr("disabled");
                  $("#d_price").focus();
                  $("#delux_room").removeAttr("disabled");
                  $("#delux_room").focus();
                }
                else
                {
                  $("#d_price").attr("disabled","disabled");
                  $("#delux_room").attr("disabled","disabled");
                } 
               }

               function checkSdl() 
               {

                 if(status_sdl == 1)
                 {
                  $("#spd_price").removeAttr("disabled");
                  $("#spd_price").focus();
                  $("#spd_room").removeAttr("disabled");
                  $("#spd_room").focus(); 
                 }
                 else
                 {
                  $("#spd_price").attr("disabled","disabled");
                  $("#spd_room").attr("disabled","disabled"); 
                 }
                 
               }
              </script>
        </div>    
      </div>   
      <div class="row">    
      <div class="col-25">    
        <label for="fname">UPLOAD A IMAGE OF SUPERDELUX ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="file" name="spd_room" id="spd_room" disabled="DISABLED">   
      </div>    
    </div>  
      <div class="row">    
      <div class="col-25">    
        <label for="lname">PRICE FOR SUPER DELUX ROOM</label>    
      </div>    
      <div class="col-75">    
        <input type="NUMBER" id="spd_price" name="spd_price" placeholder="" disabled="disabled">    
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
include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $room_image=$_FILES['image_room'];
  $r_price=$_POST['price'];
  $count=1;
  //AC ROOMS VARIABLES
  $acr=false;       //acr= AC ROOM
  $acri="";      //acri = AC ROOM IMAGE
  $acrp = 0;       // acrp= AC ROOM PRICE
              
 // DELUX ROOMS VARIABLES 

 $dlr=false;   //dlr =DELUX ROOM
 $dlri="";  //dlri= DELUX ROOM IMAGE 
 $dlrp=0;   // dlrp = DELUX ROOM PRICE;
  
 // SUPER DELUX ROOM VARIABLE 
  
$sdr=false;  //sdr=SUPER DELUX ROOM
$sdri="";    //sdri = SUPER DELUX ROOM IMAGE
$sdrp=0;      // sdrp = SUPER DELUX ROOM PRICE



              // NORMAL ROOM VALIDATION 

              $image_name=$room_image['name'];
              $image_path=$room_image['tmp_name'];
              $image_error=$room_image['error'];
              $image_type=strtolower($room_image['type']);
 
              /* IMAGE VALIDATION */
              if($image_error != 0)
              {
              $ErrMessage="PLS UPLOAD A IMAGE";
              echo $ErrMessage;
              $count=0; 
              }
              else
              { 
               
                  if($image_type == "image/png" or $image_type == "image/jpeg" or $image_type =="image/jpg" )
                  {
                      $destination_image_folder="room_uploaded_image/normal_room/".$image_name;
                      trim($destination_image_folder);
                      move_uploaded_file($image_path,$destination_image_folder);
                      // echo "<script> alert('hello');</script>"; 
                     
                  }
                  else
                  {
                      echo "PLS Upload  Valid Type of Image";
                      $count=0;
                  }
                
             }


             /* ROOM PRICE VALIDATION */

             if(empty($r_price))
             {
              $ErrMessage="PLEASE ENTER ROOM PRICE";
              echo $ErrMessage;
              $count=0;  
             }
             else
             {
              $r_price=$r_price; 
             }

             // AC ROOM VALIDATION 
             $acriDestination_image_folder="";// This Pre Declaration of The VAriable 
             if(isset($_REQUEST['ACR']))
             {
               $acr=$_REQUEST['ACR'];

               if($acr ==  "YES")
               {
                 $acr=TRUE;
                 $acri=$_FILES['ac_room'];

                 $acri_name=$acri['name'];
                 $acri_path=$acri['tmp_name'];
                 $acri_error=$acri['error'];
                 $acri_type=strtolower($acri['type']);
                 
                 
                 if($acri_error != 0)
                {
                    $ErrMessage="PLS UPLOAD A  AC ROOM IMAGE ";
                    echo $ErrMessage;
                    $count=0; 
                }
                else
                {  
                    if($acri_type == "image/png" or $acri_type == "image/jpeg" or $scri_type =="image/jpg" )
                    {
                      $acriDestination_image_folder="room_uploaded_image/ac_room/".$acri_name;
                       move_uploaded_file($acri_path,$acriDestination_image_folder);
                      // echo "<script> alert('hello');</script>"; 
                     
                    }
                    else
                    {
                      echo "PLS Enter Valid Type of Image";
                      $count=0;
                    } 
                }

                $acrp=$_POST['ac_price'];

                if(empty ($acrp))
                {
                  echo "PLS ENTER A AC ROOM PRICE";
                  $count=0;

                }
                else
                {
                  $acrp=$acrp;  
                }

               }
               else
               {
                $acr=false;
                // echo "hello";
               }
             }
             else
             {
                echo "Please select any Radio Button";
                $count=0; 
             }


             // DELUX ROOM VALIDATION
             $dlriDestination_image_folder="";// This Pre Declaration of The VAriable 
             if(isset($_REQUEST['DLR']))
             {
              $dlr=$_REQUEST['DLR'];

              if($dlr ==  "YES") 
              {
                $dlr=true;

                $dlri=$_FILES['delux_room'];

                $dlri_name=$dlri['name'];
                $dlri_path=$dlri['tmp_name'];
                $dlri_error=$dlri['error'];
                $dlri_type=strtolower($dlri['type']);


                if($dlri_error != 0)
                {
                    $ErrMessage="PLS UPLOAD A  DELUX ROOM IMAGE ";
                    echo $ErrMessage;
                    $count=0; 
                } 
                else
                {
                    if($dlri_type == "image/png" or $dlri_type == "image/jpeg" or $dlri_type =="image/jpg" )
                    {
                      $dlriDestination_image_folder="room_uploaded_image/delux_room/".$dlri_name;
                       move_uploaded_file($dlri_path,$dlriDestination_image_folder);
                      // echo "<script> alert('hello');</script>";  
                    }
                    else
                    {
                      echo "PLS Enter Valid Type of Image";
                      $count=0;
                    }  
                }

                $dlrp=$_POST['d_price'];

                if(empty($dlrp))
                {
                  echo "Pls Enter Delux Room Price";
                  $count=0;
                }
                else
                {
                  $dlrp=$dlrp;
                }

              }
              else
              {
                $dlr=false;
                // echo "hello";
              }
             }
             else
             {
               echo "Pls Select Any Radio Button";
               $count=0;
             }


             //  SUPER DELUX ROOM VALIDATION
             $sdriDestination_image_folder="";// This Pre Declaration of The VAriable 
             if(isset($_REQUEST['SDP']))
             {
                $sdr=$_REQUEST['SDP'];
                
                if($sdr == "YES")
                {
                  $sdr=true;

                  $sdri=$_FILES['spd_room'];
  
                  $sdri_name=$sdri['name'];
                  $sdri_path=$sdri['tmp_name'];
                  $sdri_error=$sdri['error'];
                  $sdri_type=strtolower($sdri['type']); 


                  if($sdri_error != 0)
                  {
                    $ErrMessage="PLS UPLOAD A SUPER DELUX ROOM IMAGE";
                    echo $ErrMessage;
                    $count=0; 
                  } 
                  else
                  {
                    if($sdri_type == "image/png" or $sdri_type == "image/jpeg" or $sdri_type =="image/jpg" )
                    {
                      $sdriDestination_image_folder="room_uploaded_image/super_delux_room/".$sdri_name;
                      move_uploaded_file($sdri_path,$sdriDestination_image_folder);
                      // echo "<script> alert('hello');</script>";  
                    }
                    else
                    {
                      echo "PLS Enter Valid Type of Image";
                      $count=0;
                    }  
                  }
                  
                  $sdrp=$_POST['spd_price'];

                  if(empty($sdrp))
                  {
                    echo "Please Enter A Price of Super Delux Room";
                    $count=0;
                  }
                  else
                  {
                    $sdrp=$sdrp;
                  }
                }
                else
                {
                  $sdr=false;
                }
             } 
             else
             {
              echo "pls Select Any Radio Button";
              $count=0; 
             }



             if($count == 1)
             {
              
              
              $h_email=$_SESSION['email'];
              $selectquery="SELECT `h_id` FROM `hotel_rag` WHERE h_email='$h_email'";
              $selectResult=mysqli_query($conn,$selectquery);
              $arr=mysqli_fetch_assoc($selectResult);

              $h_id=$arr['h_id'];

              
             $insert_query="INSERT INTO `yatri`.`room_info` (`h_id`, `room_image`, `price`, `ac_room`, `ac_room_image`, `ac_room_price`, `delux_room`, `delux_room_image`, `delux_room_price`, `super_delux_room`, `super_delux_image`, `super_delux_price`) VALUES (' $h_id', '$destination_image_folder', ' $r_price', ' $acr', '$acriDestination_image_folder', '$acrp', '$dlr', '$dlriDestination_image_folder', '$dlrp', '$sdr', '$sdriDestination_image_folder', '$sdrp')";


                $result=mysqli_query($conn,$insert_query);


                if($result)
                {
                  echo "<script> alert('YOUR DETAILS HAS BEEN SAVED')</script>";
                  $cabquery="SELECT * FROM `hotel_info` WHERE `h_id`=$h_id";
                  $cabresult=mysqli_query($conn,$cabquery);
                  $cab_arr=mysqli_fetch_assoc($cabresult);
                  $cab=$cab_arr['cab_available'];
                  $mechanic=$cab_arr['mecanic_available'];
                  if($cab)
                  
                  {
                    header("Location:Cab_info.php");
                    ob_flush();
                  }
                  elseif($mechanic)
                  {
                    header("Location:mechanic_info.php");
                    ob_flush();
                  }
                  else
                  {
                    $to_email = $h_email;
                    $subject = "Register To Yatri";
                    $body = "Congratulation ".$h_name.
                    "You Succefully Register To Yatri.com 
                    Welcome To Yatri.com";
                    $headers = "From: yatriweb@gmail.com";
                    header("Location:index.php"); 
                    ob_flush(); 
                  }
                }
                else
                {
                  echo "Error".mysqli_error($conn);
                }

                
             }
}
?>