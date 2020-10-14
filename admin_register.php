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



    <title>Admin Register</title>
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

  <p><h1 class="text-center shadow-sm p-3 mb-5 bg-white rounded">ADMIN REGISTRATION</h1></p>
  <div class="col-md-12">
    <hr class="bg-dark"><!--separator-->
    </div>
  <br><br>
  <div class="form-row">
      <!--FULLNAME,BDAY-->
    <div class="form-group col-md-6">
      <label for="LNAME">LAST NAME</label>
      <input type="text" placeholder="Last Name" class="form-control" id="LNAME" name="LNAME" required oninput="this.value = this.value.toUpperCase()">
    </div>
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
      <input type="date" max="2002-01-01" min="1960-01-01" class="form-control" id="BDAY" name="BDAY" required>
    </div><!--FULLNAME,BDAY END-->

    <!--age,sex AGE WILL BE AUTO CALCULATED ONCE BDAY INPUT WAS DONE-->
    <div class="form-group col-md-3">
      <label for="AGE">AGE</label>
      <input type="number" placeholder="age" class="form-control" id="AGE" name="AGE" required>
    </div>
    <div class="form-group col-md-4">
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

    <div class="form-group col-md-2">
      <label for="ZIPCODE">ZIP CODE</label>
      <input type="text" class="form-control" id="ZIPCODE" name="ZIPCODE" required>
    </div>
  </div><!--ADDRESS END-->

  <div class="col-md-12">
    <hr class="bg-dark"><!--separator-->
    </div>

    <!--EMAIL,PASS-->
    <div class="form-group col-md-6">
      <label for="EMAIL">EMAIL</label>
      <input type="email" class="form-control" id="EMAIL" placeholder="myEmail@gmail.com" name="EMAIL" required>
      <small id="usrwarning" class="form-text text-danger">**Warning! Please use your current active email to receive the code**</small>
    </div>
    <div class="form-group col-md-6">
      <label for="UNAME">CREATE A USERNAME</label>
      <input type="text" class="form-control" id="UNAME" placeholder="myuser12" name="UNAME" required>
    </div>
    <div class="form-group col-md-6">
      <label for="PWORD">SET A PASSWORD</label>
      <input type="password" class="form-control" id="PWORD" name="PWORD" autocomplete="on" required>
    </div>
    <div class="form-group col-md-6">
      <label for="CPWORD">CONFIRM PASSWORD</label>
      <input type="password" class="form-control" id="CPWORD" name="CPWORD" autocomplete="off">
      <small id="PStat" class="form-text"></small>
    </div><!--EMAIL,PASS END-->


  <div class="form-group">

  <button type="button" class="btn btn-danger" onclick="discard()">Discard</button>  
  <button type="submit" class="btn btn-success" form="reg_form" name="btn-reg">Register</button>  

  <script>
      function discard(){
          alert("You have discarded the registration process");
          window.location.href="index.php";
      }
      function reg(){
          alert("Registration Failed(): The System is Under Maintenance");
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
      <div class="modal-header bg-success">
        <h5 class="modal-title">Account Creation Successful</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Record added successfully, You can now use your account.</p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>

<!--END OF RECORD MODAL-->

</body>
</html>
<?php
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
$zip = $_POST['ZIPCODE'];
$mail = $_POST['EMAIL']; 
$username = $_POST['UNAME']; 
$pword = $_POST['PWORD'];   



$sql1 = "INSERT INTO admin (ID, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, AGE, SEX, COMMUNITY_ADDRESS, COMMUNITY_NAME, CITY, STATE, ZIP, EMAIL, USERNAME, PASSWORD)
VALUES ('','$lname', '$fname', '$mname','$bday','$age', '$sex', '$address', '$community', '$city', '$state', '$zip', '$mail', '$username', '$pword')";


if ($sql->query($sql1) === TRUE) {
  
  echo '<script>
  $(document).ready(function(){
     $("#alertmess").modal();
  });
  </script>'; 
  
} else {
  echo "Error: " . $sql1 . "<br>" . $sql->error;
}


$sql->close();

}else {
  //for future use
}

?>


