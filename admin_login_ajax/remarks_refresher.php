<?php
session_start();
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";
    //$lname = $_POST['lname'];
    
    //if body_content id-record is empty
   if ($_POST['data'] !='' && $_POST["idbox"] !="") {
        $con = mysqli_connect($server,$user,$pass,$db);
        $sql = "SELECT ID, REMARKS FROM participants WHERE ID='".$_POST["data"]."'";
        $res = mysqli_query($con, $sql);
    
        if (mysqli_num_rows($res)>0) {
            while ($row = mysqli_fetch_assoc($res)) {
               echo $row["REMARKS"];
              
            }
        }
        $con->close();
    }

  
?>