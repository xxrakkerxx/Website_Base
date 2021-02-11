<?php
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";

$sql= mysqli_connect($server,$user,$pass,$db);

if ($sql->connect_error) {
  die("Connection failed: " . $sql->connect_error);
}
//trigger delete
if ($_POST["remarks"] =="invoke_admin_response_del") {

  $update_data = "UPDATE participants SET HEALTH_STATUS='', REMARKS='' WHERE ID ='$_POST[id]'";

  if ($sql->query($update_data) === TRUE) {

      //echo "Record updated successfully";
    
    } else {
      echo $sql->error;
    }
}else {
  
  if(!isset($_POST["remarks"])){

    //no action
  
  }else {
  
    $full_data =htmlentities($_POST['up_time'].": ". $_POST["remarks"]."\n".$_POST["old_remarks"]);
  
    $update_data = "UPDATE participants SET REMARKS='".$full_data."' WHERE ID ='$_POST[id]'";
  
    if ($sql->query($update_data) === TRUE) {
  
        echo "Record updated successfully";
        //call this message using ajax in body_content.php 
        //in the ajax code block under the success call, insert an alert(data); to pop this message out
    
      } else {
        echo $sql->error;
      }
  
  }


}





$sql->close();


?>