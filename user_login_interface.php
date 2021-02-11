<?php 
session_start();

//check if user level session is set!
if (!isset($_SESSION['user_level'])) {
    echo '<script>window.location.href="index_home.php";</script>';
}

$server="localhost";
$user="root";
$pass="";
$db="healthtrack";

$sql= mysqli_connect($server,$user,$pass,$db);

if ($sql->connect_error) {
  die("Connection failed: " . $sql->connect_error);
}

$sql1 = "SELECT ID, ROOM_CODE FROM participants WHERE USERNAME='$_SESSION[user_level]'"; //get user ID and room code and make it a session to filter  record and messages
$result = $sql->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["user_room"] = $row["ROOM_CODE"];
    $_SESSION["user_id"] = $row["ID"];

  }
  
}
else {
   //no action
}
$sql->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

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
   <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
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
        <a class="nav-link" href="#" style="font-family:Book Antiqua;"><i class="fas fa-clinic-medical" style='font-size:18px;color:green'></i> Home Remedies<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" style="font-family:Book Antiqua;"><i class="fab fa-wikipedia-w" style='font-size:18px;color:green'></i>ikis</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" style="font-family:Book Antiqua;" data-toggle="modal" data-target="#usr-login"><i class="fas fa-users" style='font-size:18px;color:green'></i> Profile</a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="#" style="font-family:Book Antiqua;"><i class="fas fa-comments" style='font-size:18px;color:green'></i> Chat</a>
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
      <div class="modal-header bg-primary" >
        <p class="modal-title text-white" id="loginmodal">USER PROFILE</p>
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
            echo '<input type="text" readonly class="form-control" id="STATE" aria-describedby="STATE" name="state" value="'.$row["STATE"] .'">'; 


            echo "<hr>"; 
            echo "HEALTH STATUS:";
            echo '<textarea readonly class="form-control" style="font-size:small;max-height:250px;" id="HEALTH" aria-describedby="STATE" rows="5" name="health_stat">'.$row["HEALTH_STATUS"].'</textarea>'; 
            

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
        <input type="submit" value="Sign Out" class="btn btn-danger" form="frm" name="log-out">
        <button type="button" class="btn btn-primary"><a class="btnreg" href="user_edit_profile.php">Edit Profile</a></button>
      </div>

    </div><!--end of modal-content-->
  </div><!--end of modal-dialog-->
</div><!--end login modal-->

<!--END of Modals-->
<div class="container-fluid"><!--div class-fluid-->
<form method="post">
</form>
<div class="row p-1"  style="margin-top:150px;"><!--row start-->
<div class="col-lg-6 offset-lg-3 shadow-lg p-2 mb-2 bg-white rounded">
<p id="erro_logs" class="text-center text-danger"></p>

  <ul class="nav nav-tabs" id="myTab" role="tablist"><!--start-->
    <li class="nav-item" role="presentation">
      <a  class="nav-link text-dark active  mb-2 btn-outline-success" id="home-tab" data-toggle="tab" href="#healthmark-panel" role="tab" aria-controls="healthmarks" aria-selected="true"><i class='fas fa-prescription'></i> Status and Remarks</a>
    </li>&nbsp;
    <li class="nav-item" role="presentation">
      <a  class="nav-link text-dark mb-2 btn-outline-success" id="email-tab" data-toggle="tab" href="#email-panel" role="tab" aria-controls="email" aria-selected="false"><i class='fas fa-at'></i> Email</a>
    </li>&nbsp;
    <li class="nav-item" role="presentation">
      <a  class="nav-link text-dark mb-2 btn-outline-success" id="chat-tab" data-toggle="tab" href="#chat-panel" role="tab" aria-controls="chat" aria-selected="false"><i class='fas fa-envelope'></i> Messages</a>
    </li>

  </ul>
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="healthmark-panel" role="tabpanel" aria-labelledby="healthmark-panel"> 
    <br>
    <p style="font-size:22px;" id="title-remarks">Health Logs Timeline</p>
    <!--THIS PART CONTAINS YOUR HEALTH LOGS, ANY CHANGES HERE WILL BE LOST FOREVER, MODIFY AT YOUR OWN RISK!-->
    <textarea class="w-100 shadow-lg  p-2 mb-2 bg-white rounded" readonly rows="10" name="health-stats" style="max-height:250px;" id="status-textarea">
    <?php echo $_SESSION["health-stats"] ;?>
    </textarea>

    <div class="col-lg-12 border border-info pb-3 pt-3">
    <label for="txt-status" id="title-status">Health Status Update:</label><input type="text" class="form-control" placeholder="Tell us what do you feel.." name="update-data" id="txt-update">
    <input type="hidden" id="time" name="time">
    <br>
    <!--<input type="button" class="btn btn-danger" name="btn-update-health" id="btn-update" value="Update">-->
    <button type="button" class="btn btn-primary" name="btn-update-health" id="btn-update"><i class='far fa-paper-plane'></i> Update</button>
    </div>
    <br>

    <hr>
    <p style="font-size:22px;" id="title-prescription">Physician's Prescriptions and Remarks</p><!--Remarks area-->
    <textarea class="w-100 shadow-lg p-2 mb-5 bg-white rounded" rows="10" readonly name="health-remarks" id="health-remarks-status" style="max-height:250px;">
    <?php echo $_SESSION["health-remarks"] ;?>
    </textarea>
    </div><!--end-->

    <div class="tab-pane fade" id="email-panel" role="tabpanel" aria-labelledby="email-panel"> <!--email to admin area-->
    <br>
    <form method="post" id="frm-email-consult">
    <p style="font-size:22px;" id="title-remarks">Health Consultations</p>
    <p class="text-justify">Your assigned Health Manager will receive an Email from you about your Consultation.</p>
    <textarea class="w-100 shadow-lg p-2 mb-2 bg-white rounded" style="max-height:250px;" rows="10" required name="consult_message" id="consult_message" placeholder="Your Message here..">
    </textarea>
    <br>
    <button type="submit" class="btn btn-primary" name="btn-consult" id="btn-consult"><i class='far fa-paper-plane'></i> Send</button>
    </form>  
    </div><!--end-->

    <div class="tab-pane fade" id="chat-panel" role="tabpanel" aria-labelledby="chat-panel">  <!--chatting area-->
    <br>
    <p style="font-size:22px;" id="title-status" >Messages:</p>

    <div class="container-fluid bg-active" id="msg-output" style="overflow:auto;height:320px;box-shadow:0px 0px 6px black; padding:1px; margin:0px;">
        
     </div><br>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
      <span class="input-group-text bg-dark" id="msg-group" ><i class='far fa-envelope text-success' style="font-size:22px;"></i></span>
      </div>
      <input type="text" class="form-control" name="msg-text" id="msg-text" placeholder="Type here.." aria-label="Message area" aria-describedby="msg-group" style="font-size:22px;">
      </div>
       
      <p name="remarks-record " class="text-success text-center" id="remarks-status"></p>
      <button type="button" class="btn btn-md btn-primary" name="btn-send" id="btn-send"><i class='far fa-paper-plane'></i> Send</button>
     </div><!--end-->

    </div><!--end tab content-->

  </div><!--end tab control-->

<!--Trigger Update button using js and declare audios-->
<script>
//GET LOCAL DATE AND TIME AND SEND TO TIME INPUT TYPE="HIDDEN" ABOVE THEN FETCH IT USING PHP SCRIPT-->
var t =new Date();
document.getElementById("time").value = t;  

var input = document.getElementById("txt-update");
var msg = document.getElementById("msg-text");

input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("btn-update").click();
  }
});

  msg.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("btn-send").click();
  }
  });
  var user_mail = document.getElementById("consult_message").value;
  var cut = user_mail.trim();
  if (cut='') {
    document.getElementById("btn-consult").preventDefault();
  }

</script>
<audio id ="adu">
<source src="sound/sent_health.mp3" type="audio/mp3">
</audio>
<!--end -->


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
    session_unset();//LOL!
    session_destroy();
    echo '<script>window.location.href="index_home.php"</script>';
}

//===================if button consult is click================================
if (isset($_POST['btn-consult']) && strlen(trim($_POST["consult_message"])) <> 0) {

  //this if for email service code sending do not modify it without planning
 require 'mail/Exception.php';
 require 'mail/PHPMailer.php';
 require 'mail/SMTP.php';
 //require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php' use this method if you are on live hosting;
 
 $user="Healthtrackph System";
 $receiver = $_SESSION["admin_email"];
 $message = $_POST["consult_message"];

 //sample email and pass
 //$em_receiver = "camachodennis12@gmail.com";

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

<!--OUR AJAX SCRIPT-->
<script>
$(document).ready(function(){




//if button update is clicked!-->
    $('#btn-update').click(function(){
      var d = new Date();
      var yr = d.getFullYear();
      var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      var monthname =  months[d.getMonth()]
      var day = d.getDate();
      var all = monthname + " [" + day + "] " + yr

      var hr = d.getHours();
      var mn = d.getMinutes();
      var sec = d.getSeconds();
      var alltime = hr +":" + mn + ":" + sec
      //end of date and time


        var update_time = all + ":" + alltime;

    
        var query_txt = $('#txt-update').val();
        var query_txt2 = query_txt.replace(/['"]/g, '*');
        var query_id = <?php echo $_SESSION["ID"]; ?> ;
        var query_old = $('#status-textarea').val();

     

        if ($.trim(query_txt) !='') {
            $.ajax({
                url:"user_login_ajax/insert.php",
                method:"POST",
                data:{health_status:query_txt2,
                 id: query_id, old:query_old, up_time:update_time},
                dataType:"text",
                success:function(data){
                    $('#txt-update').val("");
                    //alert(data);
                    var sound = document.getElementById("adu");
                    sound.play();
                    
                
                }
            });
        }

    });

    //if btn send  in chat clicked trigger this ajax script
    $('#btn-send').click(function(){

       //date and time exact
      var d = new Date();
      var yr = d.getFullYear();
      var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      var monthname =  months[d.getMonth()]
      var day = d.getDate();
      var all = monthname + " [" + day + "] " + yr

      var hr = d.getHours();
      var mn = d.getMinutes();
      var sec = d.getSeconds();
      var alltime = hr +":" + mn + ":" + sec
      //end of date and time


        var update_time = all + ": " + alltime;

      //initialize all variables 
      var ini_message = $("#msg-text").val();
      var chat_msg = ini_message.replace(/['"]/g, '*');
      var chat_sender = "<span style=color:red;>" + "<?php echo $_SESSION['user-fname']?>" +"</span>";
      var chat_id = "<?php echo $_SESSION['ID']?>";

      //initiate ajax script
      if ($.trim(ini_message) !='') {
            $.ajax({
                url:"user_login_ajax/user_message_insert.php",
                method:"POST",
                data:{chat_msg:chat_msg,
                chat_sender: chat_sender, chat_id:chat_id, up_time:update_time},
                dataType:"text",
                success:function(data){
                    $('#msg-text').val("");
                    //alert(data);
                    var sound = document.getElementById("adu");
                    sound.play();
                    myscroll();
                
                }
            });
        }
    });


    setInterval(function(){
        $('#status-textarea').load("user_login_ajax/selector.php").fadeIn("slow");  //refresh health stat
        $('#health-remarks-status').load("user_login_ajax/remarks_selector.php").fadeIn("slow"); //refresh remarks
        $('#msg-output').load("user_login_ajax/user_message_refresh.php").fadeIn("slow"); //refresh msg
    }, 1000);


//see console window to detect the events
$("#msg-text").hover(function(){  
    interval = setInterval(function(){
        $("#msg-output").animate({scrollTop: $("#msg-output")[0].scrollHeight }); 
        //$("#msg-output").scrollTop($("#msg-output")[0].scrollHeight);   //put this for not animated scrolldown
        $('#msg-output').load("user_login_ajax/user_message_refresh.php", {data:query_id, idbox:id_box}).fadeIn("slow"); //refresh msg
        //console.log("Mouse hover! in textbox");
    }, 500);

   }, function(){
      clearInterval(interval);
      //console.log("Mouse Not hover! in textbox");
   });


});

function myscroll() {
 
 $("#msg-output").animate({scrollTop: $("#msg-output")[0].scrollHeight });
 //$("#msg-output").scrollTop($("#msg-output")[0].scrollHeight);  put this for not animated scrolldown
 
}

</script>