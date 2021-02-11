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

if (isset($_SESSION["user_id"])) {
  $message_id = $_SESSION["ID"];
  $refresh_msg = "SELECT MESSAGE, SENDER, MESSAGE_ID, DATE_TIME FROM messages WHERE MESSAGE_ID = '$message_id'";
  $result = mysqli_query($sql, $refresh_msg);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
       echo "<p>" .$row["SENDER"] ."-". $row["DATE_TIME"]. ": " . $row["MESSAGE"] . "</p>";
    }
}

}else {}

  if (isset($_SESSION["admin_id"]) && $_POST["data"] !=0 && $_POST["idbox"] !="") {
    $message_id = $_POST["data"];
    $refresh_msg = "SELECT MESSAGE, SENDER, MESSAGE_ID, DATE_TIME FROM messages WHERE MESSAGE_ID = '$_POST[data]'";
    $result = mysqli_query($sql, $refresh_msg);
  
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
         echo "<p>" .$row["SENDER"] ."-". $row["DATE_TIME"]. ": " . $row["MESSAGE"] . "</p>";
      }
  }
 
  }



$sql->close();


?>