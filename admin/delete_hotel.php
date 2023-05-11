<?php
    include "connection.php";
    $id=$_GET["id"];
    mysqli_query($conn,"delete from  hotel_rag where h_id=".$id);
    header("location:seehotel.php");
?>