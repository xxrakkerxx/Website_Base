<?php
session_start();

//pag walang session idirect sa Home view ng mga guest
if (!isset($_SESSION['User'])) {
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

    <title>Online Community Health Tracking System</title>
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
            $user_session = $_SESSION['User'];

            $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, AGE, SEX,
            COMMUNITY_ADDRESS, COMMUNITY_NAME, CITY, STATE, ZIP, EMAIL, USERNAME, PASSWORD FROM admin WHERE USERNAME='$user_session'";

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
            echo  '<input type="text" readonly class="form-control" id="LNAME" aria-describedby="LASTNAME" name="LNAME" value='.$row["LASTNAME"] .'>';
            
            echo "<hr>"; 
            echo "FIRST NAME:";
            echo '<input type="text" readonly class="form-control" id="FNAME" aria-describedby="FIRSTNAME" name="FNAME" value='.$row["FIRSTNAME"] .'>';   

            echo "<hr>"; 
            echo "MIDDLE NAME:";
            echo '<input type="text" readonly class="form-control" id="MNAME" aria-describedby="MIDDLENAME" name="MNAME" value='.$row["MIDDLENAME"] .'>';  

            echo "<hr>"; 
            echo "BIRTH DATE:";
            echo '<input type="text" readonly class="form-control" id="BDAY" aria-describedby="BIRTHDATE" name="BDAY" value='.$row["BIRTHDATE"] .'>'; 
            echo '</div>';//end of Div user-profile


            echo '<div class="col-md-6" id="user-profile">';//start of Div user-profile               
            echo "EMAIL:";
            echo '<input type="text" readonly class="form-control" id="UMAIL" aria-describedby="EMAIL" name="UMAIL" value='.$row["EMAIL"] .'>'; 

            echo "<hr>";
            echo "USERNAME:";
            echo '<input type="text" readonly class="form-control" id="FNAME" aria-describedby="FIRSTNAME" name="FNAME" value='.$row["USERNAME"] .'>';
            
            echo "<hr>"; 
            echo "PASSWORD:";
            echo '<input type="text" readonly class="form-control" id="PWORD" aria-describedby="PASSWORD" name="PWORD" value='.$row["PASSWORD"] .'>'; 

            echo "<hr>"; 
            echo "AGE:";
            echo '<input type="text" readonly class="form-control" id="AGE" aria-describedby="AGE name="AGE" value='.$row["AGE"] .'>'; 

            echo "<hr>"; 
            echo "SEX:";
            echo '<input type="text" readonly class="form-control" id="SEX" aria-describedby="SEX" name="SEX" value='.$row["SEX"] .'>'; 
            echo '</div>';//end of Div user-profile
            echo '</div>';//row end


            //home address and city etc..
            echo '<div class="row">';//row start
            echo '<div class="col-md-12">';//column start
           
            echo "<hr>"; 
            echo "COMMUNITY ADDRESS:";     
            echo '<input type="text" readonly class="form-control" id="comADD" aria-describedby="ADDRESS name="comADD" value= "'.$row["COMMUNITY_ADDRESS"] .'">'; //always enclose with " " your
                                                                                                                                                        //values if your data 
                                                                                                                                                        //in your database have spaces
                                                                                                                                                        
            echo "<hr>"; 
            echo "COMMUNITY NAME:";
            echo '<input type="text" readonly class="form-control" id="comNAME" aria-describedby="COMMUNITY" name="comNAME" value='.$row["COMMUNITY_NAME"] .'>'; 

            echo "<hr>"; 
            echo "CITY:";
            echo '<input type="text" readonly class="form-control" id="CTY" aria-describedby="CITY" name="CTY" value='.$row["CITY"] .'>'; 

            echo "<hr>"; 
            echo "STATE:";
            echo '<input type="text" readonly class="form-control" id="STATE" aria-describedby="STATE" name="STATE" value='.$row["STATE"] .'>'; 

            echo "<hr>"; 
            echo "ZIP CODE:";
            echo '<input type="text" readonly class="form-control" id="zip" aria-describedby="ZIP CODE" name="zip" value='.$row["ZIP"] .'>'; 



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
        <button type="button" class="btn btn-info"><a class="btnreg" href="admin_register.php">Enroll Participants</a></button>
      </div>

    </div><!--end of modal-content-->
  </div><!--end of modal-dialog-->
</div><!--end login modal-->

<!--END of Modals-->



    <!--Header-->
    <p class="col-lg-6 offset-lg-3 text-sm-center" id="header-title">&nbsp;&nbsp;Track your Community or Household Health</p>
    
    <!--End-->
   

   <br><br><br>
    <div class="container-fluid"> <!--div start-->

    
    <div class="row"><!--row Contents-->

        <div class="col-lg-6 offset-lg-3">
            <p><h3><i class='fas fa-stethoscope' style='font-size:28px'></i> Health</h3> <span class="text-success" id="STATS"></span></p>
            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The meaning of health has evolved over time.
            In keeping with the biomedical perspective, early definitions of health focused on the theme of the body's ability to function; health was seen as a state of normal function that could be disrupted from time to time by disease.
            An example of such a definition of health is: "a state characterized by anatomic, physiologic, and psychological integrity; ability to perform personally valued family, work, and community roles; ability to deal with physical, biological, psychological, and social stress".
            Then in 1948, in a radical departure from previous definitions, the World Health Organization (WHO) proposed a definition that aimed higher: linking health to well-being, in terms of "physical, mental, and social well-being, and not merely the absence of disease and infirmity". 
            Although this definition was welcomed by some as being innovative, it was also criticized as being vague, excessively broad and was not construed as measurable. 
            For a long time, it was set aside as an impractical ideal and most discussions of health returned to the practicality of the biomedical model.</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Systematic activities to prevent or cure health problems and promote good health in humans are undertaken by health care providers. 
            Applications with regard to animal health are covered by the veterinary sciences. 
            The term "healthy" is also widely used in the context of many types of non-living organizations and their impacts for the benefit of humans, such as in the sense of healthy communities, healthy cities or healthy environments. 
            In addition to health care interventions and a person's surroundings, a number of other factors are known to influence the health status of individuals, including their background, lifestyle, and economic, social conditions and spirituality; these are referred to as "determinants of health." 
            Studies have shown that high levels of stress can affect human health.</p>

            <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the first decade of the 21st century, the conceptualization of health as an ability opened the door for self-assessments to become the main indicators to judge the performance of efforts aimed at improving human health. 
            It also created the opportunity for every person to feel healthy, even in the presence of multiple chronic diseases, or a terminal condition, 
            and for the re-examination of determinants of health, away from the traditional approach that focuses on the reduction of the prevalence of diseases.</p>
            <pre class="text-right text-danger">Source:<a class="links"  href="https://en.wikipedia.org/wiki/Health" target="_blank">wikipedia.com</a></pre>
            <hr class="bg-danger">
        </div>
        
        <div class="col-lg-6 offset-lg-3">
        <p><h3><i class='fas fa-stethoscope' style="font-size:28px"></i> Community Health</h3></p>
        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Community health is generally measured by geographical information systems and demographic data. 
          Geographic information systems can be used to define sub-communities when neighborhood location data is not enough.
          Traditionally community health has been measured using sampling data which was then compared to well-known data sets, like the National Health Interview Survey or National Health and Nutrition Examination Survey.
          With technological development, information systems could store more data for small scale communities, cities, and towns; as opposed to census data that only generalizes information about small populations based on the overall population. 
          Geographical information systems (GIS) can give more precise information of community resources, even at neighborhood levels. 
          The ease of use of geographic information systems (GIS), advances in multilevel statistics, and spatial analysis methods makes it easier for researchers to procure and generate data related to the built environment.
        </p>

        <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Social media can also play a big role in health information analytics.
          Studies have found social media being capable of influencing people to change their unhealthy behaviors and encourage interventions capable of improving health status. 
          Social media statistics combined with geographical information systems (GIS) may provide researchers with a more complete image of community standards for health and well being.
         
        </p>
        <pre class="text-right text-danger">Source:<a class="links"  href="https://en.wikipedia.org/wiki/Community_health#:~:text=Community%20health%20is%20a%20branch,its%20impact%20on%20people's%20health." target="_blank">wikipedia.com</a></pre>
        <hr class="bg-danger">    
    </div>

        
        <div class="col-lg-6 offset-lg-3">
        <br><br><br>
        <div id="carouselbox" class="carousel slide carousel-fade" data-ride="carousel" >
        <div class="carousel-inner" id="carousel-main">
          <div class="carousel-item active bg-dark" data-interval="10000">
            <img src="img/heal-world.png" class="d-block w-100" style="height:500px;"alt="heal the world">

            <div class="carousel-caption d-none d-md-block bg-success" id="car1">
            <h5>Heal The World</h5>
            <p>There's nothing more important than our good health - that's our principal capital asset.</p>
            </div>

          </div>
          <div class="carousel-item bg-dark" data-interval="2000" id="carousel-main">
            <img src="img/healthy-lifestyle.png" class="d-block w-100" style="height:500px;" alt="healthy">

            <div class="carousel-caption d-none d-md-block bg-success"  id="car2">
            <h5>Make it a Better Place!</h5>
            <p>Happiness is nothing more than good health and a bad memory.</p>
            </div>

          </div>
          <div class="carousel-item bg-dark" id="carousel-main">
            <img src="img/better-world.png" class="d-block w-100" style="height:500px;" alt="...">

            <div class="carousel-caption d-none d-md-block bg-success"  id="car3">
            <h5>For you and for me!</h5>
            <p>All the money in the world can't buy you back good health.</p>
            </div>

          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselbox" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselbox" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

        </div>

    </div><!--row Contents end-->
    

    </div><!--div end-->

    <br><br><br><br><br><br><br>
    <div class="d-flex flex-wrap  bg-dark container-fluid text-center justify-content-around p-3" id="footer">

    <p class="col-sm-4"> <a class="footlink"  href="#"><i class='far fa-hand-spock' style='font-size:24px'></i> About</a></p>
    <p class="col-sm-4"> <a class="footlink" href="#"><i class='far fa-paper-plane' style='font-size:24px'></i> Contact Us</a></p>
    <p class="col-sm-4"> <a  class="footlink" href="#"><i class='far fa-comments' style='font-size:24px'></i> Comments</a></p>
   
    <div class="row">

      <div class="col-lg-12 text-center">
      <p> <a  class="footlink" href="#"><i class='' style='font-size:24px'></i> &copy; 2020 Healthtrackph - All Rights Reserved</a></p>
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
