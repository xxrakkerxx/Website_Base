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
    $user_id_session = $_SESSION["user_id"];
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $bday = $_POST["bday"];
    $add = $_POST["add"];
    $com_add = $_POST["com_add"];
    $cty = $_POST["cty"];
    $state = $_POST["state"];
    $room_code = $_POST["room_code"];
    $uname = $_POST["uname"];
    $pword = $_POST["pword"];
    $email = $_POST["email"];
    $admin_email = $_POST["admin_email"];


    $update_data = "UPDATE participants SET LASTNAME= ?, FIRSTNAME= ?, MIDDLENAME=?,
    BDAY=?, AGE=?, SEX=?, COMMUNITY_NAME=?, ADDRESS=?, CITY=?, STATE=?, EMAIL=?, USERNAME=?, 
    PASSWORD=?, ROOM_CODE=?, ADMIN_EMAIL=?  WHERE ID =?";

    $process = $sql->prepare($update_data);
    $process->bind_param("ssssissssssssisi",$lname, $fname, $mname, $bday,
    $age, $sex, $com_add, $add, $cty, $state, $email, $uname,
    $pword, $room_code, $admin_email, $user_id_session);
    $process->execute();

    if ($process->execute() === TRUE) {

        echo "Update Success! <i class='far fa-edit'></i>";
        $_SESSION['user_level'] = $uname;
        //$_SESSION["admin_email"] = $email;
        

    }else {
        echo "<p class='text-danger'>Update Failed <i class='fas fa-exclamation-triangle'></i><br>" . $process->error
         . "</p>This often means that the 'username' or 'email' is already taken by other people please choose another 'username' or 'email' again.";      
    }

  $sql->close();




?>