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

  $admin_room_sess = $_SESSION['admin_room'];

  $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, JOINED FROM participants WHERE ROOM_CODE= '$admin_room_sess' && STATUS='PENDING'";

  $result = $sql->query($sql1);
  $count = mysqli_num_rows($result); //count the result

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  echo ''; 
  echo '';

}
    
  }else {
    echo $sql->error;
    echo "<center>There's no Requests at the moment <i class='fa fa-refresh fa-spin' style='font-size:22px;'></i></center>";
  }





  $sql->close();

?>
