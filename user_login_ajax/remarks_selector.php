<?php
session_start();
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";


    $con = mysqli_connect($server,$user,$pass,$db);
    $sql = "SELECT REMARKS FROM participants WHERE ID='".$_SESSION["ID"]."'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res)>0) {
        while ($row = mysqli_fetch_array($res)) {
           echo $row["REMARKS"];
        }
    }

?>