<?php

    $con = mysqli_connect("localhost","root","","ajax_fetch");
    echo $_POST["tweet"];
    $sql = "INSERT INTO chats (CHAT, NAME) VALUES ('".$_POST[tweet]."', '$_POST[name]')";
    mysqli_query($con, $sql);
    
    ?>