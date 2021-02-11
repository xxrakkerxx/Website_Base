<?php
session_start();
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";
$sql= mysqli_connect($server,$user,$pass,$db);




if ($sql->connect_error) {
  die("Connection failed: " . $sql->connect_error);
}


//pag user ang naka login!!
if (isset($_SESSION["user_id"])) {
  $session_user = $_SESSION["user_id"];
  $time = $_POST["up_time"];
  $message = htmlentities($_POST['chat_msg']);
  $sender = $_POST['chat_sender'];
  $message_id = $_POST['chat_id'];
  $update_data = "INSERT INTO messages (MESSAGE, SENDER, MESSAGE_ID, DATE_TIME)
  VALUES ('$message','$sender','$message_id', '$time')";
  
    if ($sql->query($update_data) === TRUE) {
  
      //echo $sql->stat;
  
    } else {
  
      echo '<script>document.getElementById("logs").innerHTML="Fatal Error! '.$sql->error.'";</script>';
      
    }
  
}else {

   //if admin session is set! pag admin naka log in!!
   if (isset($_SESSION["admin_id"]) && $_POST["chat_id"]!=0 && $_POST["idbox"] !="") {
    $session_admin = $_SESSION["admin_id"];
    $time = $_POST["up_time"];
    $message = htmlentities($_POST['chat_msg']);
    $sender = $_POST['chat_sender'];
    $message_id = $_POST['chat_id'];
    $update_data = "INSERT INTO messages (MESSAGE, SENDER, MESSAGE_ID, DATE_TIME)
    VALUES ('$message','$sender','$message_id', '$time')";
    
      if ($sql->query($update_data) === TRUE) {
    
        //echo $sql->stat;
    
      } else {
    
        echo '<script>document.getElementById("logs").innerHTML="Fatal Error! '.$sql->error.'";</script>';
        
      }
  
    }else {
      echo "Dude, find some Patient to talk!";
    }
 


 }
 






  $sql->close();

?>
