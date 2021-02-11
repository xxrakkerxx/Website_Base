<?php
session_start();
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";
    //$lname = $_POST['lname'];
    
   // if (!empty($_POST['lname'])) {
        $con = mysqli_connect($server,$user,$pass,$db);
        $sql = "SELECT HEALTH_STATUS FROM participants WHERE ID='$_POST[data]'";
        $res = mysqli_query($con, $sql);
    
        if ($_POST["idbox"] !="") {
            if (mysqli_num_rows($res)>0) {
                while ($row = mysqli_fetch_assoc($res)) {
                   echo $row["HEALTH_STATUS"];
                   //$id = $row["ID"];
                }
            }
        }

        
        $con->close();
    //}

  
?>