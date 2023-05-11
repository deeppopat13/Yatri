<?php
    include "connection.php";
    $id=$_GET["id"];
    mysqli_query($conn,"delete from  cus_rag where c_id=".$id);
    header("location:seecustomer.php");
?>