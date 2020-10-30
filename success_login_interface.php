<?php
session_start();

//pag walang session idirect sa Home view ng mga guest
if (!isset($_SESSION['admin_level'])) {
    echo '<script>window.location.href = "index_home.php"</script>';
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
        <a class="nav-link" href="#"><i class="fas fa-clinic-medical" style='font-size:18px;color:green'></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fab fa-wikipedia-w" style='font-size:18px;color:green'></i>ikis</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#usr-login"><i class="far fa-address-card" style='font-size:18px;color:green'></i> Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-address-card" style='font-size:18px;color:green'></i> About</a>
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
            $_SESSION['greeting'] = $row["FIRSTNAME"];

            echo '</div>';//end of column
            echo '</div>';//end of row

            echo '</div>';// end of container

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



    <!--Header-->
    <p class="col-lg-6 offset-lg-3 mx-auto text-center" id="header-title">&nbsp;&nbsp;Track your Community or Household Health</p>
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
