<?php
/* CONNECTION TO DATABASE */
$conn=mysqli_connect("localhost","root","","yatri");//This Code will Connect This File to Database
       
// This code is check the Connection
    if (mysqli_connect_error()) {
        die("<script>'alert(<?phpconnection error'.mysqli_connect_error()?></script>");
    }
else
{
//  echo "connected";
}
/* THE CONNECTION CODE END HERE*/

?>