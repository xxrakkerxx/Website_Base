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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
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
    <script type="text/javascript" src=""></script>
    <!--END OF EXTERNAL SHEETS-->

    <title>Online Community Health Tracking System</title>
</head>
<body>
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
        <a class="nav-link" href="#" data-toggle="modal" data-target="#usr-login"><i class="fas fa-users" style='font-size:18px;color:green'></i> Login</a>
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

<!-- Login Modal toggle by Login in NavBar -->
<div class="modal fade  " id="usr-login" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="Loginmodal" aria-hidden="true"> <!--start-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header  bg-success">
        <p class="modal-title" id="loginmodal">Login or Register</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><!--end of modal-header-->

      <div class="modal-body">
        <form action="" method="post" id="frm">
        
        <p class="text-muted">Username:
          <input type="text" class="form-control" id="usremail" aria-describedby="Username" placeholder="your@username" required>
          <small id="usrwarning" class="form-text text-danger">Do not share your username with anyone else.</small>
        </p>

        <p class="text-muted">Password:
          <input type="password" class="form-control" id="usrpswd"  placeholder="Password" required>  </p>
     
        </form>
       
      </div>

      <div class="modal-footer">
        <!--<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>-->
        <input type="submit" value="Login" class="btn btn-success" form="frm">
        <button type="button" class="btn btn-info">Register</button>
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

    <!--Contents-->
    <div class="row">

        <div class="col-lg-6 offset-lg-3">
            <p><h1><i class='fas fa-stethoscope' style='font-size:28px'></i> Health</h1></p>
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
 
            
        </div>

    </div>
    <!--Contents end-->

    </div><!--div end-->

    <div class="d-flex flex-wrap align-content-end bg-light container-fluid text-center" >
  
  <p class="col-sm-4">About</p>
  <p class="col-sm-4">Contact Us</p>
  <p class="col-sm-4">Links</p>
 
</div>

</body>
</html>