<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #chat{
           
            box-shadow:0px 3px 10px 0px black;
            width:50%;
        }
        </style>
</head>
<body>
    
</body>
</html>
<?php

$con = mysqli_connect("localhost","root","","ajax_fetch");
    $sql = "SELECT * FROM chats ORDER BY ID DESC";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res)>0) {
        while ($row = mysqli_fetch_array($res)) {
            echo '<p id="chat" style="color:'.$row["CHAT_COLOR"].';">'.$row["NAME"].": ".$row["CHAT"].'</p>';
        }
    }

?>