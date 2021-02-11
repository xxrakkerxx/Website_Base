<?php
session_start();

//pag walang session idirect sa Home view ng mga guest
if (!isset($_SESSION['admin_level'])) {
    echo '<script>window.location.href = "index_home.php"</script>';
  }

  $server="localhost";
  $user="root";
  $pass="";
  $db="healthtrack";

  $sql= mysqli_connect($server,$user,$pass,$db);

  if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
  }
  
  $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BIRTHDATE, AGE, SEX,
  COMMUNITY_ADDRESS, COMMUNITY_NAME, CITY, STATE, ZIP, EMAIL, USERNAME, PASSWORD, CODE, STATUS FROM admin WHERE USERNAME='$_SESSION[admin_level]'";
  $result = $sql->query($sql1);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $_SESSION["admin_id"] = $row["ID"];
      $_SESSION["admin_lname"] = $row["LASTNAME"];
      $_SESSION["admin_fname"] = $row["FIRSTNAME"];
      $_SESSION["admin_mname"] = $row["MIDDLENAME"];
      $_SESSION["admin_bday"] = $row["BIRTHDATE"];
      $_SESSION["admin_age"] = $row["AGE"];
      $_SESSION["admin_sex"] = $row["SEX"];
      $_SESSION["admin_comm"] = $row["COMMUNITY_ADDRESS"];
      $_SESSION["admin_comm_name"] = $row["COMMUNITY_NAME"];
      $_SESSION["admin_cty"] = $row["CITY"];
      $_SESSION["admin_state"] = $row["STATE"];
      $_SESSION["admin_zip"] = $row["ZIP"];
      $_SESSION["admin_email"] = $row["EMAIL"];
      $_SESSION["admin_uname"] = $row["USERNAME"];
      $_SESSION["admin_pword"] = $row["PASSWORD"];
      $_SESSION["admin_code"] = $row["CODE"];
      $_SESSION["admin_stat"] = $row["STATUS"];


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


    <title>Profile Management</title>
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

<div class="container-fluid p-1">

<br><br><br>
<!--<p class="text-align-center"><h4>Profile Management</h4></p>-->
<div class="row col-md-9 mx-auto shadow-lg p-0 mb-2 bg-white rounded"> <!--1st row-->
<hr>
<br>
<div class="col-md-6 border-secondary border rounded"><!--start of personal details-->
<p><h4>Personal Details</h4></p>
<hr>
<br>
<form method="post" id="profile-edit"><!--form-->
<label for="lname">Last Name:</label>
<input type="text" autocomplete="off" class="form-control " name="lname" id="lname" value="<?php echo  $_SESSION["admin_lname"]; ?>">
<br>
<label for="fname">First Name:</label>
<input type="text" class="form-control " name="fname" id="fname" value="<?php echo   $_SESSION["admin_fname"]; ?>"> 
<br>
<label for="mname">Middle Name:</label>
<input type="text" class="form-control " name="mname" id="mname" value="<?php echo  $_SESSION["admin_mname"]; ?>">
<br>
<label for="age">Age:</label>
<input type="number" max="60" min="18" class="form-control " name="age" id="age" value="<?php echo   $_SESSION["admin_age"]; ?>">
<br>
<label for="SEX">SEX</label>
<select id="SEX" class="form-control" name="SEX">
<option id="male">MALE</option>
<option id="female">FEMALE</option>

<script>
var gender = "<?php echo $_SESSION["admin_sex"]; ?>";

if (gender == "MALE") {
  $("#male").prop("selected",true)
 // $("#female").prop("selected", false);
}else{
  $("#female").prop("selected", true);
 // $("#male").prop("selected", false);
}

</script>        
</select>
<!--AGE, SEX END-->
<br>
<label for="bday">Birth Day:</label>
<input type="date" max="2002-01-01" min="1960-01-01" class="form-control " name="bday" id="bday" value="<?php echo  $_SESSION["admin_bday"]; ?>">
<hr>
<br>
<label for="add_community">Address:</label>
<input type="text" class="form-control" name="add_community" id="add_community" value="<?php echo  $_SESSION["admin_comm"]; ?>">
<br>
<label for="add_community_name">Community Name:</label>
<input type="text" class="form-control" name="add_community_name" id="add_community_name" value="<?php echo  $_SESSION["admin_comm_name"]; ?>">

<br><br>
</div><!--end of personal details-->


<div class="col-md-6 border-secondary border rounded"><!--start of account details-->
<p><h4>Account and Others</h4></p>
<hr>
<br>
<label for="ide">Admin ID:</label>
<input type="text" class="form-control col-sm-5"  readonly name="id" id="id" value="<?php echo  $_SESSION["admin_id"]; ?>">
<br>
<label for="code">Room Code:</label>
<input type="text" class="form-control " name="code" id="code" value="<?php echo  $_SESSION["admin_code"]; ?>">
<br>
<label for="uname">User Name:</label>
<input type="text" class="form-control" name="uname" id="uname" value="<?php echo  $_SESSION["admin_uname"]; ?>">
<br>
<label for="pword">Password:</label>
<input type="text" class="form-control" name="pword" id="pword" max="20" min="8" value="<?php echo  $_SESSION["admin_pword"]; ?>">
<br>
<label for="email">Email:</label>
<input type="text" class="form-control" name="email" id="email" value="<?php echo  $_SESSION["admin_email"]; ?>">
<br>
<label for="stat">STATUS</label>
<select id="stat" class="form-control" name="STATUS">
<option id="approve">APPROVED</option>
<option id="pending">PENDING</option>

<script>
var stat = "<?php echo $_SESSION["admin_stat"]; ?>";

if (gender == "APPROVE") {
  $("#approve").prop("selected",true)

}else{
  $("#pending").prop("selected", true);

}

</script>        
</select>
<br>
<hr>
<br>
<label for="state">State:</label>
<input type="text" class="form-control " name="state" id="state" value="<?php echo   $_SESSION["admin_state"]; ?>">
<br>
<label for="zip">Zip Code:</label>
<input type="text" class="form-control " name="zip" id="zip" value="<?php echo   $_SESSION["admin_zip"]; ?>">



<br>
<p class="mr-auto" id="delete-spin">Please Wait <i class="spinner-border text-danger spinner-border-sm" role="status"></i></p>
<button type="button" class="btn btn-primary mr-auto" name="btn-home" id="btn-home">Home</button>
<button type="button" class="btn btn-primary mr-auto" name="btn-save" id="btn-save">&nbsp; Save &nbsp;</button>
<button type="button" class="btn btn-danger mr-auto" name="btn-delete" id="btn-delete">Delete</button>


<br><br>
</div><!--end of account details-->


</form><!--form end-->
</div><!--1st row end-->

</div><!--container-fluid-->


    
</body>
</html>