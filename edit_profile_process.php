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
    
    $admin_id_session = $_SESSION["admin_id"];
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
    $zip = $_POST["zip"];
    $room_code = $_POST["room_code"];
    $uname = $_POST["uname"];
    $pword = $_POST["pword"];
    $email = $_POST["email"];
    $status = $_POST["status"];


    $update_data = "UPDATE admin SET LASTNAME= ?, FIRSTNAME= ?, MIDDLENAME=?, BIRTHDATE=?, AGE=?, SEX=?, COMMUNITY_NAME=?,  COMMUNITY_ADDRESS=?, CITY=?,
    STATE=?, ZIP=?, EMAIL=?, USERNAME=?, PASSWORD=?, STATUS=?, CODE=?  WHERE ID =?";

    $process = $sql->prepare($update_data);
    $process->bind_param("ssssissssssssssii",$lname, $fname,$mname, $bday, $age, $sex, $com_add, $add, $cty, $state, $zip, $email, $uname,
    $pword, $status, $room_code,  $admin_id_session);
    $process->execute();

    if ($process->execute() === TRUE) {

        echo "Update Success! <i class='far fa-edit'></i>";
        $_SESSION['admin_level'] = $uname;
        //$_SESSION["admin_email"] = $email;
        

    }else {
        echo "<p class='text-danger'>Update Failed <i class='fas fa-exclamation-triangle'></i><br>" . $process->error
         . "</p>This often means that the 'username' or 'email' is already taken by other people please choose another 'username' or 'email' again.";      
    }
    
 
    

  $sql->close();




?>