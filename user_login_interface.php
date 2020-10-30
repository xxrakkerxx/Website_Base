<?php 
session_start();

//check if user level session is set!
if (!isset($_SESSION['user_level'])) {
    echo '<script>window.location.href="index_home.php";</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CDN-->
    <!--BS CSS-->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
     integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!--END BS CSS-->

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--END JS-->

    <!--FA icon-->
    <script src="https://kit.fontawesome.com/461d1efd20.js" crossorigin="anonymous"></script>
    <!--END OF FA-->

    <!--END OF CDN-->

    <!--EXTERNAL SHEETS-->
    <link rel='stylesheet' type='text/css' media="screen" href='css/index_healthTracking.css'>
    <link rel='stylesheet' type='text/css' media="screen" href='css/loader.css'>
    <script type="text/javascript" src="loader.js"></script>
    <!--END OF EXTERNAL SHEETS-->

    <title>Welcome to your Panel!</title>

</head>
<body>
<!--LOADER-->
<span id="tp"></span>
  <div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>  
<!--END OF LOADER-->

<!--Navbar natin-->
<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="index.php"><i class='fas fa-ellipsis-v' style='font-size:20px;color:green'></i></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-clinic-medical" style='font-size:18px;color:green'></i> Home Remedies<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fab fa-wikipedia-w" style='font-size:18px;color:green'></i>ikis</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#usr-login"><i class="fas fa-users" style='font-size:18px;color:green'></i> Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-address-card" style='font-size:18px;color:green'></i> Talk to Expert</a>
      </li>
    </ul>
    <span class="navbar-text">
    Online Community Health Tracking System
    </span>
  </div>

</nav><!--END of Navbar-->

<!--Start of Modals-->

<!-- USER PROFILE Modal toggle by Profile in NavBar -->
<div class="modal fade  " id="usr-login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Loginmodal" aria-hidden="true"> <!--start-->
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success" >
        <p class="modal-title" id="loginmodal">USER PROFILE</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><!--end of modal-header-->

      <div class="modal-body">
      <form action="" method="post" id="frm">
      <span id="info">   
       
       <?php

            $server="localhost";
            $user="root";
            $pass="";
            $db="healthtrack";

            $sql= mysqli_connect($server,$user,$pass,$db);

            if ($sql->connect_error) {
              die("Connection failed: " . $sql->connect_error);
            }
            $user_session = $_SESSION['user_level'];

            $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BDAY, AGE, SEX,
            COMMUNITY_NAME, ADDRESS, CITY, STATE, HEALTH_STATUS, ROOM_CODE, EMAIL, USERNAME, PASSWORD, JOINED, REMARKS, STATUS, ADMIN_EMAIL FROM participants WHERE USERNAME='$user_session'";

            //$sql1 = "SELECT LASTNAME, FIRSTNAME, USERNAME FROM admin WHERE USERNAME='$user_session'";
            $result = $sql->query($sql1);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

            echo '<div class="container-fluid">';//start of container
            echo '<div class="row">';
            echo '<div class="col-md-6" id="user-profile">';//start of Div user-profile
            echo "USER-ID:";
            echo '<input type="text" readonly class="form-control" id="UID" aria-describedby="USER ID" name="UID" value='.$row["ID"] .'>';
            
            echo "<hr>"; 
            echo "LAST NAME:";
            echo  '<input type="text" readonly class="form-control" id="LNAME" aria-describedby="LASTNAME" name="LNAME" value="'.$row["LASTNAME"] .'">';
            
            echo "<hr>"; 
            echo "FIRST NAME:";
            echo '<input type="text" readonly class="form-control" id="FNAME" aria-describedby="FIRSTNAME" name="FNAME" value="'.$row["FIRSTNAME"] .'">';   

            echo "<hr>"; 
            echo "MIDDLE NAME:";
            echo '<input type="text" readonly class="form-control" id="MNAME" aria-describedby="MIDDLENAME" name="MNAME" value="'.$row["MIDDLENAME"] .'">';  

            echo "<hr>"; 
            echo "BIRTH DATE:";
            echo '<input type="text" readonly class="form-control" id="BDAY" aria-describedby="BIRTHDATE" name="BDAY" value='.$row["BDAY"] .'>'; 
            echo '<hr></div>';//end of Div user-profile


            echo '<div class="col-md-6" id="user-profile">';//start of Div user-profile               
            echo "EMAIL:";
            echo '<input type="text" readonly class="form-control" id="UMAIL" aria-describedby="EMAIL" name="UMAIL" value='.$row["EMAIL"] .'>'; 

            echo "<hr>";
            echo "USERNAME:";
            echo '<input type="text" readonly class="form-control" id="UNAME" aria-describedby="FIRSTNAME" name="UNAME" value='.$row["USERNAME"] .'>';
            
            echo "<hr>"; 
            echo "PASSWORD:";
            echo '<input type="text" readonly class="form-control" id="PWORD" aria-describedby="PASSWORD" name="PWORD" value='.$row["PASSWORD"] .'>'; 

            echo "<hr>"; 
            echo "AGE:";
            echo '<input type="text" readonly class="form-control" id="AGE" aria-describedby="AGE name="AGE" value='.$row["AGE"] .'>'; 

            echo "<hr>"; 
            echo "SEX:";
            echo '<input type="text" readonly class="form-control" id="SEX" aria-describedby="SEX" name="SEX" value='.$row["SEX"] .'>'; 
            echo '<hr></div>';//end of Div user-profile
            echo '</div>';//row end


            //home address and city etc..
            echo '<div class="row">';//row start
            echo '<div class="col-md-12" id="user-profile">';//column start
           
            echo "<hr>"; 
            echo "COMMUNITY NAME:";     
            echo '<input type="text" readonly class="form-control" id="comADD" aria-describedby="ADDRESS name="comName" value= "'.$row["COMMUNITY_NAME"] .'">'; //always enclose with " " your
                                                                                                                                                        //values if your data 
                                                                                                                                                        //in your database have spaces
                                                                                                                                                        
            echo "<hr>"; 
            echo "COMMUNITY ADDRESS:";
            echo '<input type="text" readonly class="form-control" id="comNAME" aria-describedby="COMMUNITY" name="address" value="'.$row["ADDRESS"] .'">'; 

            echo "<hr>"; 
            echo "CITY:";
            echo '<input type="text" readonly class="form-control" id="CTY" aria-describedby="CITY" name="CTY" value="'.$row["CITY"] .'">'; 

            echo "<hr>"; 
            echo "STATE:";
            echo '<input type="text" readonly class="form-control" id="CTY" aria-describedby="STATE" name="state" value="'.$row["STATE"] .'">'; 


            echo "<hr>"; 
            echo "HEALTH STATUS:";
            echo '<textarea readonly class="form-control" style="font-size:small;" id="STATE" aria-describedby="STATE" rows="5" name="health_stat">'.$row["HEALTH_STATUS"].'</textarea>'; 
            

            echo "<hr>"; 
            echo "ROOM CODE:";
            echo '<input type="text" readonly class="form-control" id="zip" aria-describedby="ZIP CODE" name="room_code" value='.$row["ROOM_CODE"] .'>'; 
            
            echo "<hr>";
            echo "JOINED DATE:";
            echo '<input type="text" readonly class="form-control" id="room_code" aria-describedby="ROOM CODE" name="joined" value="'.$row["JOINED"] .'">'; 

            echo '</div>';//end of column
            echo '</div>';//end of row

            echo '</div>';// end of container
            
            $_SESSION["health-stats"] = $row["HEALTH_STATUS"];//pointed to health-stats textarea
            $_SESSION["health-remarks"] = $row["REMARKS"];//pointed to remarks textarea
            $_SESSION["ID"] = $row["ID"];//pointed to updating section and consultation email
            $_SESSION["user-email"] = $row["EMAIL"];//pointed to Consultation textarea form
            $_SESSION["user-fname"] = $row["FIRSTNAME"];//pointed to Consultation textarea form
            $_SESSION["user-lname"] = $row["LASTNAME"];//pointed to Consultation textarea form
            $_SESSION["admin_email"] = $row["ADMIN_EMAIL"];//pointed to Consultation form
            
            
             }


            } else {
              echo "0 results";
            }
            $sql->close();


       ?>
        </span>
        </form>
      </div>

      <div class="modal-footer">
        <!--<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>-->
        <input type="submit" value="Sign Out" class="btn btn-success" form="frm" name="log-out">
        <button type="button" class="btn btn-info"><a class="btnreg" href="#">Edit Profile</a></button>
      </div>

    </div><!--end of modal-content-->
  </div><!--end of modal-dialog-->
</div><!--end login modal-->

<!--END of Modals-->
<div class="container-fluid"><!--div class-fluid-->
<form method="post">
<div class="row"  style="margin-top:150px;"><!--row start-->
<div class="col-lg-6 offset-lg-3">
<p id="erro_logs" class="text-center text-danger"></p>
<hr>
<p id="title-remarks">Health Logs Timeline</p>
<!--THIS PART CONTAINS YOUR HEALTH LOGS, ANY CHANGES HERE WILL BE LOST FOREVER, MODIFY AT YOUR OWN RISK!-->
<textarea class="w-100 shadow-lg  p-2 mb-2 bg-white rounded" readonly rows="10" name="health-stats" style="font-size:12px;">
<?php echo $_SESSION["health-stats"] ;?>
</textarea>

<div class="col-lg-12 border border-info pb-3 pt-3">
<label for="txt-status" id="title-status">Health Status Update:</label><input type="text" class="form-control" placeholder="Tell us what do you feel.." name="update-data">
<input type="hidden" id="time" name="time">
<br>
<input type="submit" class="btn btn-danger" name="btn-update-health" value="Update">
<br>
</div>
<hr>
<p id="title-prescription">Physician's Prescriptions and Remarks</p>
<textarea class="w-100 shadow-lg p-2 mb-5 bg-white rounded" rows="10" readonly name="health-remarks">
<?php echo $_SESSION["health-remarks"] ;?>
</textarea>
</form>
</div>

<div class="col-lg-6 offset-lg-3">
<hr>
<form method="post" id="frm-email-consult">
<p id="title-remarks">Health Consultations</p>
<p class="text-justify">Your assigned Health Manager will receive an Email from you about your Consultation.</p>
<textarea class="w-100 shadow-lg p-2 mb-2 bg-white rounded" rows="10" required name="consult_message" placeholder="Your Message here..">
</textarea>
<br>
<button type="submit" class="btn btn-danger mb-5" name="btn-consult">Send Consultation</button>
</form>
</div>

</div><!--row end-->

</div><!--end of div class-fluid-->

<!--CONSULTATION MESSAGE MODAL-->

<div class="modal fade"  id="alertmess" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success" id="header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="msg"></p>
        <p id="active-code"></p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-close">Dismiss</button>
     
      </div>
    </div>
  </div>
</div>

<!--END OF RECORD MODAL-->


</body>
</html>

<!-- GET LOCAL DATE AND TIME AND SEND TO TIME INPUT TYPE="HIDDEN" ABOVE THEN FETCH IT USING PHP SCRIPT-->
  <script> 
    var t =new Date();
    document.getElementById("time").value = t;  
  </script>

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

if (isset($_POST['log-out'])) {
    session_unset();
    session_destroy();
    echo '<script>window.location.href="index_home.php"</script>';
}
if (isset($_POST['btn-update-health']) && $_POST["update-data"]!="") {

  //set session for content
  $_SESSION["health_stats_session"] = $_POST["health-stats"];
  //get time
   $dt = $_POST["time"]; 
   //verify all variables then send it to below variable
   $full_data = $dt.": " .$_POST['update-data'] ."\n" .$_SESSION["health_stats_session"];

   $update_data = "UPDATE participants SET HEALTH_STATUS='$full_data' WHERE ID ='$_SESSION[ID]'";
   
  //"SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BDAY, SEX, AGE, COMMUNITY_NAME, ADDRESS, 
//CITY, HEALTH_STATUS, EMAIL, USERNAME, ROOM_CODE, JOINED, REMARKS, STATUS FROM participants WHERE ROOM_CODE='$_SESSION[room_code]'";
  
  if ($sql->query($update_data) === TRUE) {
    echo "Record updated successfully";

  echo '<script>
    function redirect(){
      window.location.href = "success_login_interface.php";
    }
    setTimeout(redirect,100)
  
    </script>';
  

  } else {
    echo '<script>document.getElementById("error_logs")="'. $sql->error.'"</script>';
  }

  
  $sql->close();
}

//===================if button consult is click================================
if (isset($_POST['btn-consult']) && $_POST["consult_message"]!="") {

  //this if for email service code sending do not modify it without planning
 require 'mail/Exception.php';
 require 'mail/PHPMailer.php';
 require 'mail/SMTP.php';
 //require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php' use this method if you are on live hosting;
 
 $user="Healthtrackph System";
 $receiver = $_SESSION["admin_email"];
 $message = $_POST["consult_message"];

 //sample email and pass
 $em_receiver = "camachodennis12@gmail.com";

 $mail = new PHPMailer;
 $mail->isSMTP(); 
 $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
 $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
 $mail->Port = 587; // TLS only
 $mail->SMTPSecure = 'tls'; // ssl is deprecated
 $mail->SMTPAuth = true;
 $mail->Username = 'keylupet@gmail.com'; // email
 $mail->Password = 'dedeonahack'; // password
 $mail->setFrom('keylupet@gmail.com', $_SESSION["user-fname"] ." ". $_SESSION["user-lname"]); // From email and name
 $mail->addAddress($receiver); // receiver email and his/her name
 $mail->Subject = 'Health Track System Consulting';

 $mail->msgHTML("Hello I'm <b>" . $_SESSION["user-fname"] ."</b> i'm one of your patients. I have a Consultation Message Please take a look on it.<br><br>"
                 ."<u>My Message:</u><br><p style=color:red;>". nl2br($message)."</p>"."<br>Patient ID: ".$_SESSION["ID"] . "<br>Patient Name: " . $_SESSION["user-lname"] . " " . $_SESSION["user-fname"]
                ."<br><br><br><p style=color:red;>**This is an auto generated message, do not reply**</p>");

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
 
  echo '<script>
  $(document).ready(function(){
    $("#alertmess").modal();
    $("#header").addClass("bg-danger")
    document.getElementById("title").innerHTML = "Consultation Message Sent!";
    document.getElementById("msg").innerHTML = "Someone will get in touch on your Consultation Letter, For now just relax and wait. have a nice day!";
    $("#btn-close").addClass("bg-success")
  });
  
   </script>
  ';
    
 }
 //========================================================================================================================================
 //end of email service code sending

}//end


?>