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

  $del_query = "DELETE FROM participants WHERE ID='$_POST[id]'"; //delete their record
  $del_msg = "DELETE FROM messages WHERE MESSAGE_ID='$_POST[id]'"; //also their messages including the admin messages to them
  if ($sql->query($del_query) === TRUE && $sql->query($del_msg) === TRUE) {
    echo 'Success!;';
  } else {
    echo "Error Please Contact Support: " . $sql->error;
  }
  
  $sql->close();

?>