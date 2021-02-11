<?php
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";

$sql= mysqli_connect($server,$user,$pass,$db);

if ($sql->connect_error) {
  die("Connection failed: " . $sql->connect_error);
}

$full_data =htmlentities($_POST["up_time"].": " .$_POST['health_status']."\n".$_POST["old"]);

$update_data = "UPDATE participants SET HEALTH_STATUS='".$full_data."' WHERE ID ='$_POST[id]'";

if ($sql->query($update_data) === TRUE) {

    echo "Record updated successfully";
  

  } else {
    echo $sql->error;
  }

  $sql->close();


?>