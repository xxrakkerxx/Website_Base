<?php
// Starting session
session_start();
 
//check if special cookie created

//special permission
if (isset($_COOKIE["special_session"]) && isset($_SESSION["admin_level"])) {
  //ignore and open this
}//if admin session is present
elseif (isset(($_SESSION['admin_level']))) {
  echo '<script>window.location.href = "success_login_interface.php"</script>';
}//if user session is present
elseif (isset($_SESSION['user_level'])) {
echo '<script>window.location.href = "user_login_interface.php"</script>';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Level Registration</title>

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


<div class="container-fluid"><!--start div-->
    <br><br>
  <div class="row"><!--form row start-->

  <div class="col-lg-6 offset-lg-3 shadow-lg p-3 mb-5 bg-white rounded" id="form-reg"> <!--columnizing-->   
  <form action="" method="post" id="reg_form"><!--Form Start-->
  <p><h3 class="text-center shadow-sm p-3 mb-5 bg-white rounded" id="reg_title">USER REGISTRATION</h3></p>
  <div class="col-md-12">
  <button type="button" class="btn btn-primary float-right" onclick="navigate()"><i class='fas fa-prescription'></i> Admin Level</button>  
    <hr class="bg-dark"><!--separator-->
    </div>
  <br><br>
  <div class="form-row">
      <!--FULLNAME,BDAY-->
      <div class="form-group col-md-6">
      <label for="ROOM_CODE">ROOM CODE</label>
      <input type="text" class="form-control" placeholder="e.g: 23456" id="ROOM_CODE" name="ROOM_CODE" required>
      <small class="text-danger" id="room_code_check"></small>
      </div>
    <div class="form-group col-md-6">
      <label for="LNAME">LAST NAME</label>
      <input type="text" placeholder="Last Name" class="form-control" id="LNAME" name="LNAME" required oninput="this.value = this.value.toUpperCase()">
    </div><br>
    <div class="form-group col-md-6">
      <label for="FNAME">FIRST NAME</label>
      <input type="text" placeholder="First Name" class="form-control" id="FNAME" name="FNAME" required oninput="this.value = this.value.toUpperCase()">
  </div>
    <div class="form-group col-md-6">
      <label for="MNAME">MIDDLE NAME</label>
      <input type="text" placeholder="Middle Name" class="form-control" id="MNAME" name="MNAME" required oninput="this.value = this.value.toUpperCase()">
    </div>
    <div class="form-group col-md-6">
      <label for="BDAY">BIRTH DAY</label>
      <input type="date" max="2002-01-01" min="1960-01-01" onblur="agecalc()" class="form-control" id="BDAY" name="BDAY" required>
    </div><!--FULLNAME,BDAY END-->

    <!--age,sex AGE WILL BE AUTO CALCULATED ONCE BDAY INPUT WAS DONE-->
    <div class="form-group col-md-3">
      <label for="AGE">AGE</label>
      <input type="number" placeholder="age" class="form-control" id="AGE" name="AGE" required max="50" min="18">
    </div>
    <div class="form-group col-md-2">
      <label for="SEX">SEX</label>
      <select id="SEX" class="form-control" name="SEX" >
        
        <option>MALE</option>
        <option>FEMALE</option>
      </select>
    </div><!--AGE, SEX END-->
    
    <div class="col-md-12">
    <hr class="bg-dark"><!--separator-->
    </div>

    <!--ADDRESS-->
    <div class="form-group col-md-6">
    <label for="ADD">ADDRESS OF YOUR COMMUNITY</label>
    <input type="text" class="form-control" id="ADD" placeholder="1234 ST. MANILA" style="font-size:12px;" name="ADD" required oninput="this.value = this.value.toUpperCase()">
  </div>

  <div class="form-group col-md-6">
    <label for="COMNAME">COMMUNITY OR DESIRED NAME</label>
    <input type="text" class="form-control" id="COMNAME" placeholder="MANILA HOME ASSOCIATION 324" style="font-size:12px;" name="COMNAME" required oninput="this.value = this.value.toUpperCase()">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="CTY">CITY</label>
      <input type="text" class="form-control" id="CTY" placeholder="Manila City" name="CTY" required oninput="this.value = this.value.toUpperCase()">
    </div>

    <div class="form-group col-md-4">
      <label for="OPSTATE">STATE</label>
      <select id="OPSTATE" class="form-control" name="OPSTATE" required>
        <option selected>STATE</option>
        <option>NCR</option>
        <option>RIZAL PROVINCE</option>
        <option>QUEZON PROVINCE</option>
      </select>
    </div>

  </div><!--ADDRESS END-->

  <div class="col-md-12">
    <hr class="bg-dark"><!--separator-->
    </div>

    <!--EMAIL,PASS-->
    <div class="form-group col-md-6">
      <label for="EMAIL">EMAIL</label>
      <input type="email" class="form-control" id="EMAIL" placeholder="me@gmail.com" maxlength="30" minlength="5" name="EMAIL" required>
      <small id="email-valid" class="form-text text-danger"></small>
    </div>
    <div class="form-group col-md-6">
      <label for="UNAME">CREATE A USERNAME</label>
      <input type="text" class="form-control" id="UNAME" placeholder="username123" maxlength="12" minlength="5" name="UNAME" required>
      <small id="user-valid" class="text-danger"></small>
    </div>
    <div class="form-group col-md-6">
      <label for="PWORD">SET A PASSWORD</label>
      <input type="password" class="form-control" id="PWORD" name="PWORD" maxlength="20" minlength="10" autocomplete="on" required onkeyup=checker();>
    </div>
    <div class="form-group col-md-6">
      <label for="CPWORD">CONFIRM PASSWORD</label>
      <input type="password"  class="form-control" id="CPWORD" name="CPWORD" maxlength="20" minlength="10" autocomplete="off" required onkeyup=checker();>
      <small id="PStat" class="form-text"></small>
    </div><!--EMAIL,PASS END-->

    <?php //password checker ?>
    <script>

      //get previous date and calculate age
   function agecalc(){
     var min_yr = 1960;
     var max_yr = 2002;
    //year from input bday
    var bday_input = document.getElementById("BDAY").value;
    var yr_get = new Date(bday_input);
    var bday_yr = yr_get.getFullYear();


    //get current yr
    var yr_now = new Date();
    var yr = yr_now.getFullYear();

    if (bday_yr > 2002 || bday_yr < 1960) {
      //alert("invalid year"); no action
      document.getElementById("BDAY").value = "1960-01-01";
    }else{
        //calculate age
        var calculated_age = yr - bday_yr;
        //alert("You are: "+ calculated_age);
        document.getElementById("AGE").value=calculated_age;
    }

   }

      function checker(){
        var pass=document.getElementById("PWORD").value;
        var cpass=document.getElementById("CPWORD").value;

        //check if both pass box is not empty
        if (pass == "" || cpass == "") {
          document.getElementById("PStat").innerHTML="";
          $("#btn-reg").removeAttr("disabled");
        }

        else{
        

          if (document.getElementById("CPWORD").value == document.getElementById("PWORD").value) {

          document.getElementById("PStat").innerHTML="Password Matched!";
          document.getElementById("PStat").style.color="Green";
          $("#btn-reg").removeAttr("disabled");
        
          }
          else
          {

          document.getElementById("PStat").innerHTML="Password Doesn't Matched";
          document.getElementById("PStat").style.color="Red";
          $("#btn-reg").prop("disabled",true);

          }
        }     
      }
      
    </script>
    <?php //end of password checker ?>

  <div class="form-group">

  <button type="button" class="btn btn-danger" onclick="discard()"><i class='fas fa-power-off'></i> Exit</button>  
  <button type="submit" class="btn btn-success" form="reg_form" name="btn-reg" id="btn-reg"><i class='fas fa-database'></i> Register</button>
  

  <script>
      function discard(){
          window.location.href="index.php";
      }
      function reg(){
          alert("Registration Failed(): The System is Under Maintenance");
          window.location.href="admin_register.php";
      }
      function navigate() {
        window.location.href="admin_register.php";
      }
  </script>

  </div>

</form><!--Form End-->
</div><!--form-row end-->
</div><!--columnizing-end-->

</div><!--end div-->

<!--RECORD ADDED MODAL MESSAGE-->

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

<?php
//activate email service components this is important positioned above
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//START OF EVERY PROCESS
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";

//establish connection
$sql= mysqli_connect($server,$user,$pass,$db);

// Check connection
if ($sql->connect_error) {
  die("Connection failed: " . $sql->connect_error);
}

if (isset($_POST['btn-reg'])) {

 echo '<script>
 $(document).ready(function(){
  $("#reg_form").submit(function(){

    $("#btn-reg").prop("disabled",true);

  })
});
 </script>'; 

//get all values before processing
$lname = $_POST['LNAME']; 
$fname = $_POST['FNAME']; 
$mname = $_POST['MNAME']; 
$bday = $_POST['BDAY']; 
$age = $_POST['AGE']; 
$sex = $_POST['SEX']; 
$address = $_POST['ADD']; 
$community = $_POST['COMNAME']; 
$city = $_POST['CTY']; 
$state = $_POST['OPSTATE'];
$room_code= $_POST['ROOM_CODE'];
$mail = $_POST['EMAIL']; 
$username = $_POST['UNAME']; 
$pword = $_POST['PWORD'];   

 //Store Session if ever the registration comes to failed
 $_SESSION["lname"] = $lname;
 $_SESSION["fname"] = $fname;
 $_SESSION["mname"] = $mname;
 $_SESSION["bday"] = $bday;
 $_SESSION["age"] = $age;
 $_SESSION["sex"] = $sex;
 $_SESSION["add"] = $address;
 $_SESSION["comm"] = $community;
 $_SESSION["cty"] = $city;
 $_SESSION["state"] = $state;
 $_SESSION["room_code"] = $room_code;
 $_SESSION["email"] = $mail;
 $_SESSION["uname"] = $username;
 $_SESSION["pword"] = $pword;

//validate if the room input is exist in the admin table!
$room_code_validate = "SELECT CODE, EMAIL FROM admin WHERE BINARY CODE = '$room_code'";
$result_code_validate = $sql->query($room_code_validate);

if ($result_code_validate->num_rows > 0) { //all registration process capsulated here after room code is validated correctly!!
 //if admin code is exist! create a session email from the admin of that room code and continue to execute
 while($row = $result_code_validate->fetch_assoc()) {
  $_SESSION["room_admin_email"] = $row["EMAIL"];
 }
 
//validate email and username first before inserting query strikes
$email_validator = "SELECT  EMAIL FROM participants WHERE BINARY EMAIL = '$mail'";
$username_validator = "SELECT  USERNAME FROM participants WHERE BINARY USERNAME ='$username'";

//let's check admin database for availability of username to avoid future conflicts on login
$admin_uname = "SELECT USERNAME FROM admin WHERE BINARY USERNAME ='$username'";
//================================================================================================

$result_email = $sql->query($email_validator);
$result_username = $sql->query($username_validator);
$result_admin_uname = $sql->query($admin_uname);

//if both username and email is already exist! execute below
  if ($result_email->num_rows > 0 && $result_username->num_rows > 0 && $result_admin_uname->num_rows > 0) {
    //below toggled the following HTML DOM in the range of this query statement
    //a.) <small> tag below username element
    //b.) <small> tag below email element
    //1.) Modal
    //2.) Header class bg color of Our Modal
    //3.) Modal title char value
    //4.) message body value of our Modal 
    //5.) modal dismiss button
     echo '<script>
      document.getElementById("user-valid").innerHTML = "**Username Already Exist!**"
      document.getElementById("email-valid").innerHTML = "**Email Already Exist!**"
      $(document).ready(function(){
      $("#alertmess").modal();
      $("#header").addClass("bg-danger")
      document.getElementById("title").innerHTML = "REGISTRATION FAILED";
      document.getElementById("msg").innerHTML = "Please Check Your Inputs Carefully";
      $("#btn-close").addClass("bg-warning")
    });
    
     </script>';
    
    
    //Fill Fields Automatically with Session acquired
    echo '<script>document.getElementById("LNAME").value="'.$_SESSION["lname"].'"</script>';
    echo '<script>document.getElementById("FNAME").value="'.$_SESSION["fname"].'"</script>';
    echo '<script>document.getElementById("MNAME").value="'.$_SESSION["mname"].'"</script>';
    echo '<script>document.getElementById("BDAY").value="'.$_SESSION["bday"].'"</script>';
    echo '<script>document.getElementById("AGE").value="'.$_SESSION["age"].'"</script>';
    echo '<script>document.getElementById("SEX").value="'.$_SESSION["sex"].'"</script>';
    echo '<script>document.getElementById("ADD").value="'.$_SESSION["add"].'"</script>';
    echo '<script>document.getElementById("COMNAME").value="'.$_SESSION["comm"].'"</script>';
    echo '<script>document.getElementById("CTY").value="'.$_SESSION["cty"].'"</script>';
    echo '<script>document.getElementById("OPSTATE").value="'.$_SESSION["state"].'"</script>';
    echo '<script>document.getElementById("ROOM_CODE").value="'.$_SESSION["room_code"].'"</script>';
    
    
    }elseif ($result_email->num_rows > 0 && $result_admin_uname->num_rows > 0) { //if email exist in participants and username already exist in admin execute below
      //below toggled the following HTML DOM in the range of this query statement
      //a.) <small> tag below username element
      //b.) <small> tag below email element
      //1.) Modal
      //2.) Header class bg color of Our Modal
      //3.) Modal title char value
      //4.) message body value of our Modal 
      //5.) modal dismiss button
       echo '<script>
        document.getElementById("user-valid").innerHTML = "**Username Already Exist!**"
        document.getElementById("email-valid").innerHTML = "**Email Already Exist!**"
        $(document).ready(function(){
        $("#alertmess").modal();
        $("#header").addClass("bg-danger")
        document.getElementById("title").innerHTML = "REGISTRATION FAILED";
        document.getElementById("msg").innerHTML = "Please Check Your Inputs Carefully";
        $("#btn-close").addClass("bg-warning")
      });
      
       </script>';
      
      
      //Fill Fields Automatically with Session acquired
      echo '<script>document.getElementById("LNAME").value="'.$_SESSION["lname"].'"</script>';
      echo '<script>document.getElementById("FNAME").value="'.$_SESSION["fname"].'"</script>';
      echo '<script>document.getElementById("MNAME").value="'.$_SESSION["mname"].'"</script>';
      echo '<script>document.getElementById("BDAY").value="'.$_SESSION["bday"].'"</script>';
      echo '<script>document.getElementById("AGE").value="'.$_SESSION["age"].'"</script>';
      echo '<script>document.getElementById("SEX").value="'.$_SESSION["sex"].'"</script>';
      echo '<script>document.getElementById("ADD").value="'.$_SESSION["add"].'"</script>';
      echo '<script>document.getElementById("COMNAME").value="'.$_SESSION["comm"].'"</script>';
      echo '<script>document.getElementById("CTY").value="'.$_SESSION["cty"].'"</script>';
      echo '<script>document.getElementById("OPSTATE").value="'.$_SESSION["state"].'"</script>';
      echo '<script>document.getElementById("ROOM_CODE").value="'.$_SESSION["room_code"].'"</script>';
 


    }elseif ($result_email->num_rows > 0) {//if email alone exist!, execute below
      
      echo '<script>
       document.getElementById("email-valid").innerHTML = "**Email Already Exist!**"
       $(document).ready(function(){
       $("#alertmess").modal();
       $("#header").addClass("bg-danger")
       document.getElementById("title").innerHTML = "REGISTRATION FAILED";
       document.getElementById("msg").innerHTML = "Email is already taken!";
       $("#btn-close").addClass("bg-warning")
     });
     
      </script>';
    
    //Fill Fields Automatically with Session acquired
      echo '<script>document.getElementById("LNAME").value="'.$_SESSION["lname"].'"</script>';
      echo '<script>document.getElementById("FNAME").value="'.$_SESSION["fname"].'"</script>';
      echo '<script>document.getElementById("MNAME").value="'.$_SESSION["mname"].'"</script>';
      echo '<script>document.getElementById("BDAY").value="'.$_SESSION["bday"].'"</script>';
      echo '<script>document.getElementById("AGE").value="'.$_SESSION["age"].'"</script>';
      echo '<script>document.getElementById("SEX").value="'.$_SESSION["sex"].'"</script>';
      echo '<script>document.getElementById("ADD").value="'.$_SESSION["add"].'"</script>';
      echo '<script>document.getElementById("COMNAME").value="'.$_SESSION["comm"].'"</script>';
      echo '<script>document.getElementById("CTY").value="'.$_SESSION["cty"].'"</script>';
      echo '<script>document.getElementById("OPSTATE").value="'.$_SESSION["state"].'"</script>';
      echo '<script>document.getElementById("ROOM_CODE").value="'.$_SESSION["room_code"].'"</script>';
      echo '<script>document.getElementById("UNAME").value="'.$_SESSION["uname"].'"</script>';
    
      //if username alone exist! in both database, execute below
     }elseif ($result_username->num_rows > 0 || $result_admin_uname->num_rows > 0) {
      
    
       echo '<script>
       document.getElementById("user-valid").innerHTML = "**Username Already Exist!**"
       $(document).ready(function(){
       $("#alertmess").modal();
       $("#header").addClass("bg-danger")
       document.getElementById("title").innerHTML = "REGISTRATION FAILED";
       document.getElementById("msg").innerHTML = "Username is already taken!";
       $("#btn-close").addClass("bg-warning")
      });
      </script>';
     
    
    //Fill Fields Automatically with Session acquired
    echo '<script>document.getElementById("LNAME").value="'.$_SESSION["lname"].'"</script>';
    echo '<script>document.getElementById("FNAME").value="'.$_SESSION["fname"].'"</script>';
    echo '<script>document.getElementById("MNAME").value="'.$_SESSION["mname"].'"</script>';
    echo '<script>document.getElementById("BDAY").value="'.$_SESSION["bday"].'"</script>';
    echo '<script>document.getElementById("AGE").value="'.$_SESSION["age"].'"</script>';
    echo '<script>document.getElementById("SEX").value="'.$_SESSION["sex"].'"</script>';
    echo '<script>document.getElementById("ADD").value="'.$_SESSION["add"].'"</script>';
    echo '<script>document.getElementById("COMNAME").value="'.$_SESSION["comm"].'"</script>';
    echo '<script>document.getElementById("CTY").value="'.$_SESSION["cty"].'"</script>';
    echo '<script>document.getElementById("OPSTATE").value="'.$_SESSION["state"].'"</script>';
    echo '<script>document.getElementById("ROOM_CODE").value="'.$_SESSION["room_code"].'"</script>';
    echo '<script>document.getElementById("EMAIL").value="'.$_SESSION["email"].'"</script>';
    
    }else {
    
    //if email or username are unique continue to inserting 
    //create session code for activation and approve or pending status for accounts
    $code_critical6282639 = mt_rand(100000,999999);
    $_SESSION['code_verification628731'] = mt_rand(100000,999999);
    $_SESSION['account_Status_nice'] = "ENROLLED";//session for participants enrollee
    $_SESSION['account_Status_boo'] = "PENDING"; //session for participants enrollee
    $_SESSION["registrant-type"] ="USER_LEVEL_ACCESS";//session for verification page user-level
    
    
    //====================================================================================================================================
      //this is for email service code sending do not modify it without planning must backup if necessary
      require 'mail/Exception.php';
      require 'mail/PHPMailer.php';
      require 'mail/SMTP.php';
      //require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailerAutoload.php' use this method if you are on live hosting;
      
      $user="Healthtrackph System";
      $receiver = $_SESSION["email"];
      $to2 = $_SESSION["email"];
      $message =$_SESSION["code_verification628731"];
     
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
      $mail->addAddress($receiver, $_SESSION["fname"]); // receiver email and his/her name
      $mail->Subject = 'Health Track System Inc. Welcome Aboard!';
    
      $mail->msgHTML("Hello ".$_SESSION["fname"] ." " . $_SESSION["lname"]. " Welcome Aboard! We have received your application and we need few things from you
      to make sure that you are real.<br>We need your Verification Code Attached to this Email and submit it in the <i>Activation Code Page</i> to finish registration" ."<br><br>"
      ."Your Verification Code is: <p style=color:red;> $message  </p>"
      ."<br><br> 
      Best Regards and Goodluck! Stay Healthy<br><br><br>
      <i>-Your HealthtrackPh Team</i>");
    
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
      
    //below toggle the following HTML DOM
    //1.) Modal
    //2.) Header class bg color of Our Modal
    //3.) Modal title char value
    //4.) message body value of our Modal 
    //5.) page redirecting countdown
      echo '<script>
      $(document).ready(function(){
         $("#alertmess").modal();
         $("#header").addClass("bg-success")
         document.getElementById("title").innerHTML = "Validation Success!";
         document.getElementById("msg").innerHTML = "You will be redirected to the activation page in 5 seconds please wait...";    
      });
     
      function redirect(){
        window.location.href = "verify_process.php";
      }
      setTimeout(redirect,5000)
    
      </script>';  
         
      }
    
      //========================================================================================================================================
      //end of email service code sending
    
    $sql->close();
    }
    
    

}
else {
  //if admin code is not exist! exit the code!
  //Fill Fields Automatically with Session acquired
  echo '<script>document.getElementById("LNAME").value="'.$_SESSION["lname"].'"</script>';
  echo '<script>document.getElementById("FNAME").value="'.$_SESSION["fname"].'"</script>';
  echo '<script>document.getElementById("MNAME").value="'.$_SESSION["mname"].'"</script>';
  echo '<script>document.getElementById("BDAY").value="'.$_SESSION["bday"].'"</script>';
  echo '<script>document.getElementById("AGE").value="'.$_SESSION["age"].'"</script>';
  echo '<script>document.getElementById("SEX").value="'.$_SESSION["sex"].'"</script>';
  echo '<script>document.getElementById("ADD").value="'.$_SESSION["add"].'"</script>';
  echo '<script>document.getElementById("COMNAME").value="'.$_SESSION["comm"].'"</script>';
  echo '<script>document.getElementById("CTY").value="'.$_SESSION["cty"].'"</script>';
  echo '<script>document.getElementById("OPSTATE").value="'.$_SESSION["state"].'"</script>';
  echo '<script>document.getElementById("room_code_check").innerHTML="Room Code not Exist!"</script>';
  echo '<script>document.getElementById("EMAIL").value="'.$_SESSION["email"].'"</script>';


}





}else {
  //for future use
}


?>




</body>
</html>
