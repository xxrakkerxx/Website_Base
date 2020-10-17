<?php 
session_start();
/*enable this to test session if we feel confused lol
if (isset($_SESSION['code_veri'])) {
    echo '<script>alert("'.$_SESSION['code_veri'].'")</script>';
}*/

if (!isset($_SESSION['code_verification628731'])) {
  echo'<script>window.location.href="index.php";</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!--JS-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--END JS-->


   <!-- <script src="js/fancy.js"></script> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Sender</title>

</head>
<body>

<!--<center> -->
    <br><br>
    <div class="col-md-4 offset-md-4 shadow-lg p-3 mb-5 bg-white rounded">
    <form  method="post" action="">
    <center>
    <p>Activation Code:</p><input type="text" name="code-verify" placeholder="123456" class=" shadow-lg p-3 mb-3 bg-white rounded"  id="user-code" style="font-size:15px;"
    ><br> 
    <button class="btn-info" type="Submit" name="activate" style="">Activate</button>
    <!--<button class="btn-danger" type="Submit" name="resend">Resend</button>-->
    </center>
    <br>
    <p class="text-success text-center">We have sent 6 digit Activation Code to this email: <?php echo "<span style=color:red;>". $_SESSION["email"] ."</span>";?></p>
    <center>
    <span class="text-warning" id="logs"></span> <!-- Activation STATUS OUTPUT AREA -->
    </center>
    </form>

    </div>
 <!--Activation Success ADDED MODAL MESSAGE-->

<div class="modal fade"  id="alertmess" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success" id="header">
        <h5 class="modal-title" id="title">Account Registration Success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="msg">You can now use it! Goodluck and Stay safe.</p>
        <p id="active-code"></p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-close">Dismiss</button>
     
      </div>
    </div>
  </div>
</div>
<!--END OF activation MODAL-->

</body>
</html>
<?php
//session name $_SESSION["code_verification628731"]

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

if (isset($_POST['activate'])) {

$get_data = $_POST['code-verify'];
if ($get_data == $_SESSION["code_verification628731"]) {

//still vulnerable to sql attacks will fix this soon...
$sql1 = "INSERT INTO admin (ID, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, AGE, SEX, COMMUNITY_ADDRESS, COMMUNITY_NAME, CITY, STATE, ZIP, EMAIL, USERNAME, PASSWORD, STATUS)
VALUES ('','$_SESSION[lname]', '$_SESSION[fname]', '$_SESSION[mname]','$_SESSION[bday]','$_SESSION[age]', '$_SESSION[sex]', '$_SESSION[add]', '$_SESSION[comm]', '$_SESSION[cty]',
       '$_SESSION[state]', '$_SESSION[zip]', '$_SESSION[email]', '$_SESSION[uname]', '$_SESSION[pword]', '$_SESSION[account_Status_nice]')";

  if ($sql->query($sql1) === TRUE) {
    
      //once success destroy verifier code instantly! and email
      unset($_SESSION['code_verification628731']);
      unset($_SESSION['email']);

      //launch Modal Success
      echo '<script>$(document).ready(function(){
        $("#alertmess").modal();
        })
        function redirect(){
          window.location.href = "index.php";
        }
        setTimeout(redirect,5000)
        </script>';

    } else {
      echo '<script>document.getElementById("logs").innerHTML="Fatal Error Oh no! Contact Help for Assistance";</script>';
      
    }
    $sql->close();

  }else {

  echo '<script>document.getElementById("logs").innerHTML="Verification is Invalid, Please try again";</script>';

} 

}else{ //end of activate button
    //echo '<script>document.getElementById("logs").innerHTML="Something went wrong";</script>';
  }
    
?>