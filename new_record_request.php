<?php 
//activate email service components this is important positioned above
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";
$sql= mysqli_connect($server,$user,$pass,$db);

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
  }
  
  $update_data = "UPDATE participants SET STATUS='ENROLLED' WHERE ID ='$_POST[patient_id]'";
  
  if ($sql->query($update_data) === TRUE) {
  
      echo "Request has been Approved!";

      //select data to access it's email address to notify the user that the account's already approve or accepted
      $email = "SELECT EMAIL, ROOM_CODE, FIRSTNAME FROM participants WHERE ID='$_POST[patient_id]'";
      $result_email = $sql->query($email);

    if ($result_email->num_rows > 0 ) {

      while($row = $result_email->fetch_assoc()) {

      //====================================================================================================================================
      //this is for email service code sending do not modify it without planning must backup if necessary
      require 'mail/Exception.php';
      require 'mail/PHPMailer.php';
      require 'mail/SMTP.php';
      //require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php' use this method if you are on live hosting;
      
      $user="Healthtrackph System";
      $receiver = $row["EMAIL"];
     
      $mail = new PHPMailer;
      $mail->isSMTP(); 
      $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
      $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
      $mail->Port = 587; // TLS only
      $mail->SMTPSecure = 'tls'; // ssl is deprecated
      $mail->SMTPAuth = true;
      $mail->Username = 'keylupet@gmail.com'; // email
      $mail->Password = 'yourpassword'; // password
      $mail->setFrom('keylupet@gmail.com', 'HealthTrack System Inc.'); // From email and name
      $mail->addAddress($receiver, $row["FIRSTNAME"]); // receiver email and his/her name
      $mail->Subject = 'Account Approval Alert';
    
      $mail->msgHTML('Hello '.$row["FIRSTNAME"].' Your Request to Join Room:'.$row["ROOM_CODE"].' have been Approved! you can now use your account and connects to your respective health admins.<br>
      <p>Check it out!: https://communityhealthtrackph.000webhostapp.com</p>
      <br>
      <p>Best Regards and Goodluck! Stay Healthy</p><br><br><br>
      <i>-Your HealthtrackPh Team</i>');
    
      $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
      $mail->SMTPOptions = array(
                          'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                          )
                      );
    
      if(!$mail->send()){
          echo '<script>alert("'. $mail->ErrorInfo .'"</script>';
    
      }else{
         
      }
    
      //========================================================================================================================================
      //end of email service code sending




       }

    }

    
    } else {
      echo $sql->error;
    }
  
    $sql->close();
  



?>
