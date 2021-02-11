<?php
session_start();
//$_SESSION["patient_id"] = 0;
//pag walang session idirect sa Home view ng mga guest
if (!isset($_SESSION['admin_level'])) {
    echo '<script>window.location.href = "index_home.php"</script>';
  }

 //check if patient session is present else, set it to 0  to avoid internal error undefined index
 // in javascript in our body_content, query_id set to patient session 
if (!isset($_SESSION["patient_id"])) {
  $_SESSION["patient_id"] = 0; //set this to 0 every unique refresh, this function can't be trigger by button click with proper submit parameters.
}


  $server="localhost";
  $user="root";
  $pass="";
  $db="healthtrack";

  $sql= mysqli_connect($server,$user,$pass,$db);

  if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
  }
  
  $sql1 = "SELECT ID, CODE, FIRSTNAME FROM admin WHERE USERNAME='$_SESSION[admin_level]'"; //get admin ID and room code and make it a session to filter patients record and messages
  $result = $sql->query($sql1);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $_SESSION["admin_room"] = $row["CODE"];
      $_SESSION["admin_id"] = $row["ID"];
      $_SESSION["admin_name"] = $row["FIRSTNAME"];
      $_SESSION['greeting'] = $row["FIRSTNAME"];
    }
    
  }
  else {
     //no action
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

    <!--FA icon and Google Icons-->
   
    <script src="https://kit.fontawesome.com/461d1efd20.js" crossorigin="anonymous"></script>
    
    <!--END OF FA-->

    <!--END OF CDN-->

    <!--EXTERNAL SHEETS-->
    <link rel='stylesheet' type='text/css' media="screen" href='css/index_healthTracking.css'>
    <link rel='stylesheet' type='text/css' media="screen" href='css/loader.css'>
    <script type="text/javascript" src="loader.js"></script>
    <!--END OF EXTERNAL SHEETS-->

    <title>Admin_Community Health Tracking System</title>
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
        <a class="nav-link" style="font-family:Book Antiqua;" href="#" data-toggle="modal" data-target="#patients"><i class="fas fa-user-md" style='font-size:18px;color:green'></i> Patient(s) <sup class="text-danger font-weight-bolder" id="res-patients"></sup></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="font-family:Book Antiqua;" href="#" data-toggle="modal" data-target="#usr-requests"><i class="fas fa-id-card-alt" style='font-size:18px;color:green'></i> Request(s) <sup class="text-danger font-weight-bolder" id="res-pending"></sup></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="font-family:Book Antiqua;" href="#" data-toggle="modal" data-target="#usr-login"><i class="fas fa-user-circle" style='font-size:18px;color:green'></i> Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" style="font-family:Book Antiqua;" href="#"><i class="fas fa-chalkboard-teacher" style='font-size:18px;color:green'></i> Discussion</a>
      </li>
    </ul>
    <span class="navbar-text">
    Online Community Health Tracking System
    </span>
  </div>

</nav><!--END of Navbar-->

<!--Start of Modals-->
<!--patients modal-->

<div class="modal fade  " id="patients" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Loginmodal" aria-hidden="true"> <!--start-->
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary" >
        <h5 class="modal-title text-white" id="loginmodal">Your Members</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><!--end of modal-header-->

      <div class="modal-body">
      <form action="" method="post" id="frm-patients">
      <span id="your-patients">   
     <?php 
      
      if ($sql->connect_error) {
        die("Connection failed: " . $sql->connect_error);
      }
      $admin_room_sess = $_SESSION['admin_room'];

      $sql1 = "SELECT ID, LASTNAME, FIRSTNAME FROM participants WHERE ROOM_CODE= '$admin_room_sess' && STATUS='ENROLLED'";

      $result = $sql->query($sql1);
      $count = mysqli_num_rows($result); //count the result records
      if ($result->num_rows > 0) {
        // output data of each row
        echo "<table style=width:100%;>";
        echo "<tr id=patients-header>";
        echo "<th id=patients-th>ID</th>";
        echo "<th id=patients-th>LASTNAME</th>";
        echo "<th id=patients-th>FIRSTNAME</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td style=text-align:center;>".$row["ID"]."</td>";
          echo "<td>".$row["LASTNAME"]."</td>";
          echo "<td>".$row["FIRSTNAME"]."</td>"; 
          echo "</tr>";
          //echo $_SESSION["admin_room"];
          echo '<script>document.getElementById("res-patients").innerHTML = "'.$count.'"</script>';
        }
        
        echo "</table>";

      }else {
        echo $sql->error;
        echo "<center>Wow! You don't have any members! <i class='fa fa-refresh fa-spin' style='font-size:22px;'></i></center>";
      }
     $sql->close();
     ?>

      </span>
        </form>
      </div>

      <div class="modal-footer">
        <!--<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>-->
        <input type="submit" value="Explore" class="btn btn-primary" form="frm-patients" name="btn-explore" aria-labelledby="explore button">
        
      </div>

    </div><!--end of patients modal-->
  </div><!--end of patients modal dialog-->
</div><!--end patients modal-->
<!--end of patients modal-->


<!--patient requests modal-->

<div class="modal fade" id="usr-requests" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Loginmodal" aria-hidden="true"> <!--start-->
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary" >
        <h5 class="modal-title text-white" id="loginmodal">Subject for Approval</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><!--end of modal-header-->

      <div class="modal-body bg-light">
      <span id="to_approve">
     <?php 

     $server="localhost";
     $user="root";
     $pass="";
     $db="healthtrack";
   
     $sql= mysqli_connect($server,$user,$pass,$db);
  
      if ($sql->connect_error) {
        die("Connection failed: " . $sql->connect_error);
      }
      $admin_room_sess = $_SESSION['admin_room'];

      $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, JOINED FROM participants WHERE ROOM_CODE= '$admin_room_sess' && STATUS='PENDING'";

      $result = $sql->query($sql1);
      $count = mysqli_num_rows($result); //count the result

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
      echo '
      <div class="toast shadow-md p-1 m-1 bg-white rounded mx-auto"  role="status" aria-live="polite" aria-atomic="true" data-autohide="false"> 
      <div class="toast-header">
        <strong class="mr-auto"><i class="far fa-user-circle"></i> Request </strong>
        <small id="time-request">Since: '.$row["JOINED"].'</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body bg-light">
        '."<p>Patient ID: " .$row["ID"] ."<br>" ."LASTNAME: ".$row["LASTNAME"] . "<br>". "FIRSTNAME: " .$row["FIRSTNAME"].'</p>    
        <button name="btn-approve" class="btn btn-primary" id="'.$row["ID"].'" onclick="myfunct(this.id);">Approve</button> 
        <button name="btn-decline" class="btn btn-danger" id="'.$row["ID"].'" onclick="myfunct(this.id);">Decline</button> 
        <span hidden id="request_id"></span>
      </div>
    </div>
    <script>
    function myfunct(id)
    {
      document.getElementById("request_id").innerHTML = id;
    }
    </script>
      '; 
      echo '<script>document.getElementById("res-pending").innerHTML = "'.$count.'"</script>';
      //we hide <span hidden id="sample_id"></span> this element use to filter approving request, if problem persist unhide lang natin to.
      //nasa body_content ang function ng approve at decline button natin.
    }
        
      }else {
        echo $sql->error;
        echo "<center>There's no Request at the moment <i class='fas fa-wind' style='font-size:22px;'></i></center>";
      }
     $sql->close();
     ?>

      </span>
      </div>

      <div class="modal-footer">
        <!--<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>-->
        <p class="mr-auto" id="loader-spin" hidden>Please Wait <i class="spinner-border text-danger spinner-border-sm" role="status"></i></p>
        <input type="submit" value="Approve All" class="btn btn-primary" form="frm-patients" name="btn-approve" aria-labelledby="Approve button">
        
      </div>

    </div><!--end of patient request modal-->
  </div><!--end of patient request modal dialog-->
</div><!--end patient request modal-->
<!--end of patient request modal-->



<!-- USER PROFILE Modal toggle by Profile in NavBar -->
<div class="modal fade  " id="usr-login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Loginmodal" aria-hidden="true"> <!--start-->
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary" >
        <h5 class="modal-title text-white" id="loginmodal">USER PROFILE</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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
            $user_session = $_SESSION['admin_level'];

            $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, AGE, SEX,
            COMMUNITY_ADDRESS, COMMUNITY_NAME, CITY, STATE, ZIP, EMAIL, USERNAME, PASSWORD, CODE FROM admin WHERE USERNAME='$user_session'";

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
            echo '<input type="text" readonly class="form-control" id="BDAY" aria-describedby="BIRTHDATE" name="BDAY" value='.$row["BIRTHDATE"] .'>'; 
            echo '<hr></div>';//end of Div user-profile


            echo '<div class="col-md-6" id="user-profile">';//start of Div user-profile               
            echo "EMAIL:";
            echo '<input type="text" readonly class="form-control" id="UMAIL" aria-describedby="EMAIL" name="UMAIL" value='.$row["EMAIL"] .'>'; 

            echo "<hr>";
            echo "USERNAME:";
            echo '<input type="text" readonly class="form-control" id="UNAME" aria-describedby="FIRSTNAME" name="UNAME" value="'.$row["USERNAME"] .'">';
            
            echo "<hr>"; 
            echo "PASSWORD:";
            echo '<input type="text" readonly class="form-control" id="PWORD" aria-describedby="PASSWORD" name="PWORD" value="'.$row["PASSWORD"] .'">'; 

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
            echo "COMMUNITY ADDRESS:";     
            echo '<input type="text" readonly class="form-control" id="comADD" aria-describedby="ADDRESS name="comADD" value= "'.$row["COMMUNITY_ADDRESS"] .'">'; //always enclose with " " your
                                                                                                                                                        //values if your data 
                                                                                                                                                        //in your database have spaces
                                                                                                                                                        
            echo "<hr>"; 
            echo "COMMUNITY NAME:";
            echo '<input type="text" readonly class="form-control" id="comNAME" aria-describedby="COMMUNITY" name="comNAME" value="'.$row["COMMUNITY_NAME"] .'">'; 

            echo "<hr>"; 
            echo "CITY:";
            echo '<input type="text" readonly class="form-control" id="CTY" aria-describedby="CITY" name="CTY" value="'.$row["CITY"] .'">'; 

            echo "<hr>"; 
            echo "STATE:";
            echo '<input type="text" readonly class="form-control" id="STATE" aria-describedby="STATE" name="STATE" value="'.$row["STATE"] .'">'; 

            echo "<hr>"; 
            echo "ZIP CODE:";
            echo '<input type="text" readonly class="form-control" id="zip" aria-describedby="ZIP CODE" name="zip" value="'.$row["ZIP"] .'">'; 
            
            echo "<hr>";
            echo "ROOM CODE:";
            echo '<input type="text" readonly class="form-control" id="room_code" aria-describedby="ROOM CODE" name="room_code" value='.$row["CODE"] .'>'; 
            //create session for room code to filter record to show for every admins
            $_SESSION['room_code'] = $row["CODE"];
            

            echo '</div>';//end of column
            echo '</div>';//end of row

            echo '</div>';// end of container

            if (empty($row["CODE"])) {
              $update_data = "UPDATE admin SET CODE='$row[ID]' WHERE ID ='$row[ID]'";
              $sql->query($update_data);
            }

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
        <button type="button" class="btn btn-primary"><a class="btnreg" href="admin_edit_profile.php" >Edit Profile</a></button>
      </div>

    </div><!--end of modal-content-->
  </div><!--end of modal-dialog-->
</div><!--end login modal-->

<!--END of Modals-->



    <!--Header-->
    <p style="font-family:Book Antiqua;" class="col-lg-6 offset-lg-3 mx-auto text-center" id="header-title">&nbsp;&nbsp;Track your Community or Household Health</p>
    <?php echo '<script>document.getElementById("header-title").innerHTML="WELCOME BACK '.$_SESSION["greeting"].' HAVE A NICE DAY!";</script>'; ?>
    
    <!--End-->
   

   <br><br><br>
    <div class="container-fluid"> <!--div start-->

    <!-- TO BE BUILD WE STOPPED BELOW -->
    <div class="row pl-0"><!--row Contents-->

        <div class="col-sm-12">
           <?php include 'body_content.php';?>
        </div>
          
          <!--still planning on what to put here
        <div class="col-sm-6" style="border:1px red solid; ">
          
        </div>  -->


    </div><!--row Contents end-->
    <!-- TO BE BUILD WE STOPPED ABOVE -->

    </div><!--div end-->

    <br><br><br><br><br><br><br>
    <div class="d-flex flex-wrap  bg-dark container-fluid text-center justify-content-around p-3" id="footer">

    <p class="col-sm-4"> <a class="footlink"  href="#"><i class='far fa-hand-spock' style='font-size:24px'></i> About</a></p>
    <p class="col-sm-4"> <a class="footlink" href="#"><i class='far fa-paper-plane' style='font-size:24px'></i> Contact Us</a></p>
    <p class="col-sm-4"> <a  class="footlink" href="#"><i class='far fa-comments' style='font-size:24px'></i> Comments</a></p>
   
    <div class="row">

      <div class="col-lg-12 text-center">
      <p> <a  class="footlink" href="#"><i class='' style='font-size:24px'></i> &copy; 2020-<?php echo date("Y");?> Healthtrackph - All Rights Reserved</a></p>
      </div>

    </div>
     </div>

</body>
</html>


<?php 
//PHP LOGIN
//ALWAYS ILAGAY SA PINAKA DULO NG DOCU PARA MA INITIALIZE LAHAT NG ELEMENTS BEFORE MAG TRIGGER NG PHP SCRIPT


if (isset($_POST['log-out'])) {

// remove all session variables
session_unset();

// destroy the session
session_destroy();
echo '<script>window.location.href = "index_home.php"</script>';

}

//END PHP LOGIN

?> 
