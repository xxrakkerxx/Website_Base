<?php 
  //activate email service components this is important positioned above
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  $server="localhost";
  $user="root";
  $pass="";
  $db="healthtrack";

  $sql= mysqli_connect($server,$user,$pass,$db);

  if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
  }

  if ($_POST["input"]=="activation") {
   
    $email = $_POST["email"];
    $sqladmin = "SELECT EMAIL, USERNAME,  STATUS FROM admin WHERE EMAIL='$email' AND STATUS='PENDING'";
    $result = $sql->query($sqladmin);

   if ($result->num_rows > 0) {

    $sqladmin_update = "UPDATE admin SET STATUS='APPROVE' WHERE EMAIL='$email'";
    if ($sql->query($sqladmin_update) === TRUE) {
        echo "The Account Activated Successfully, you may now use it.";
      } else {
        echo "There's an Error Occured Please try again or Contact Help to fix: " . $sql->error;
      }
    
  }
  else {
   echo "There's no such record Exist! Please check your input carefully.";
  }

  }//end of activation statement
  
  //receive forgot password data here...
  if ($_POST["input"]=="forgot_psw") {
   
    $email = $_POST["email"];
    $sqladmin = "SELECT EMAIL, USERNAME, PASSWORD FROM admin WHERE EMAIL='$email' "; //for admin database
    $sqluser = "SELECT EMAIL, USERNAME, PASSWORD FROM participants WHERE EMAIL='$email' "; //for user database
    $result = $sql->query($sqladmin);
    $result_user = $sql->query($sqluser);

    //validate first if such email exist! before sending such email 
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $account_email = $row["EMAIL"];
      $account_name = $row["USERNAME"];
      $account_pswd = $row["PASSWORD"];

       //this if for email service code sending do not modify it without planning
        require '../mail/Exception.php';
        require '../mail/PHPMailer.php';
        require '../mail/SMTP.php';
        //require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php' use this method if you are on live hosting;
        
        $user="Healthtrackph System";

        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = 'keylupet@gmail.com'; // email
        $mail->Password = 'dedeonahack'; // password
        $mail->setFrom('keylupet@gmail.com',"Healthtrackph System", $account_name); // From email and name
        $mail->addAddress($account_email); // receiver email and his/her name
        $mail->Subject = 'Forgot Credentials';

        $mail->msgHTML("Hi! " . $account_name . "<p> You are requesting for these credentials:</p><br><br>"
        ."Username: " .$account_name . "<br>Password: " . $account_pswd . "<br><br><br><p>If you didn't expecting this email please have secure your account immediately.</p><br><p><i>-Healthtrackph Team</i></p>");

        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );

        if(!$mail->send()){
          //if email failed
            echo $mail->ErrorInfo;

        }else{
        //if email success!
          echo "Email sent successfully!";
        }
        //========================================================================================================================================
        //end of email service code sending

    }//end of while
    
    //for user database search and emailing
  }else if ($result_user->num_rows > 0) {

    while($row = $result_user->fetch_assoc()) {
      $account_email = $row["EMAIL"];
      $account_name = $row["USERNAME"];
      $account_pswd = $row["PASSWORD"];

       //this if for email service code sending do not modify it without planning
        require '../mail/Exception.php';
        require '../mail/PHPMailer.php';
        require '../mail/SMTP.php';
        //require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php' use this method if you are on live hosting;
        
        $user="Healthtrackph System";

        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = 'keylupet@gmail.com'; // email
        $mail->Password = 'dedeonahack'; // password
        $mail->setFrom('keylupet@gmail.com',"Healthtrackph System", $account_name); // From email and name
        $mail->addAddress($account_email); // receiver email and his/her name
        $mail->Subject = 'Forgot Credentials';

        $mail->msgHTML("Hi! " . $account_name . "<p> You are requesting for these credentials:</p><br><br>"
        ."Username: " .$account_name . "<br>Password: " . $account_pswd . "<br><br><br><p>If you didn't expecting this email please have secure your account immediately.</p><br><p><i>-Healthtrackph Team</i></p>");

        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );

        if(!$mail->send()){
          //if email failed
            echo $mail->ErrorInfo;

        }else{
        //if email success!
          echo "Email sent successfully!";
        }
        //========================================================================================================================================
        //end of email service code sending

    }//end of while


  }//end of statement for user database

  //if wala talagang match
  else {
   echo "There's no such record Exist! Please check your input carefully.";
  }

  }//end of forgot psw statement

  $sql->close();
?>
