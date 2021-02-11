<?php
session_start();

//pag walang session idirect sa Home view ng mga guest
if (!isset($_SESSION['user_level'])) {
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
  
  $sql1 = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BDAY, AGE, SEX,
  ADDRESS, COMMUNITY_NAME, CITY, STATE, EMAIL, USERNAME, PASSWORD, ROOM_CODE, ADMIN_EMAIL FROM participants WHERE USERNAME='$_SESSION[user_level]'";
  $result = $sql->query($sql1);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $_SESSION["user_id"] = $row["ID"];
      $_SESSION["user_lname"] = $row["LASTNAME"];
      $_SESSION["user_fname"] = $row["FIRSTNAME"];
      $_SESSION["user_mname"] = $row["MIDDLENAME"];
      $_SESSION["user_bday"] = $row["BDAY"];
      $_SESSION["user_age"] = $row["AGE"];
      $_SESSION["user_sex"] = $row["SEX"];
      $_SESSION["user_comm"] = $row["ADDRESS"];
      $_SESSION["user_comm_name"] = $row["COMMUNITY_NAME"];
      $_SESSION["user_cty"] = $row["CITY"];
      $_SESSION["user_state"] = $row["STATE"];
      $_SESSION["user_email"] = $row["EMAIL"];
      $_SESSION["user_uname"] = $row["USERNAME"];
      $_SESSION["user_pword"] = $row["PASSWORD"];
      $_SESSION["user_code"] = $row["ROOM_CODE"];
      $_SESSION["user_admin_email"] = $row["ADMIN_EMAIL"];


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
<div class="row p-3"> <!--1st row-->
<div class="col-md-6 m-2 mx-auto shadow-lg p-3 mb-5 bg-white rounded"><!--start of tab column-->
<ul class="nav nav-tabs" id="tab-panel" role="tablist">
        <li class="nav-item" role="presentation">
          <a  class="nav-link text-dark active  mb-2 btn-outline-success" id="home-tab" data-toggle="tab" href="#personal-panel" role="tab" aria-controls="details" aria-selected="true"><i class="fas fa-user-circle"></i> Personal Details</a>
        </li>&nbsp;
        <li class="nav-item" role="presentation">
          <a  class="nav-link text-dark  mb-2 btn-outline-success" id="profile-tab" data-toggle="tab" href="#consultation-panel" role="tab" aria-controls="consultation" aria-selected="false"><i class='fas fa-prescription'></i> Account</a>
        </li>
      </ul>

      <div class="tab-content" id="panel-content">
      <div class="tab-pane fade show active" id="personal-panel" role="tabpanel" aria-labelledby="details-tab">
         <!-- PERSONAL DETAILS COLUMN-->
         <p><h4>Personal Details</h4></p>
         
        <hr>
        <br>
        <form method="post" id="profile-edit"><!--form-->
        <label for="lname">Last Name:</label>
        <input type="text"  required oninput="this.value = this.value.toUpperCase()" autocomplete="off" class="form-control " name="lname" id="lname" value="<?php echo  $_SESSION["user_lname"]; ?>">
        <br>
        <label for="fname">First Name:</label>
        <input type="text"  oninput="this.value = this.value.toUpperCase()" class="form-control " name="fname" id="fname" value="<?php echo   $_SESSION["user_fname"]; ?>"> 
        <br>
        <label for="mname">Middle Name:</label>
        <input type="text"  oninput="this.value = this.value.toUpperCase()" class="form-control " name="mname" id="mname" value="<?php echo  $_SESSION["user_mname"]; ?>">
        <br>
        <label for="age">Age:</label>
        <input type="number"  max="60" readonly min="18" class="form-control " name="age" id="age" value="<?php echo   $_SESSION["user_age"]; ?>">
        <br>
        <label for="sex">SEX</label>
        <select id="sex" class="form-control" name="SEX">
        <option id="male">MALE</option>
        <option id="female">FEMALE</option>

        <script>
        var gender = "<?php echo $_SESSION["user_sex"]; ?>";

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
        <input type="date" max="2002-01-01" min="1960-01-01" onblur="agechecker()" class="form-control " name="bday" id="bday" value="<?php echo  $_SESSION["user_bday"]; ?>">
        <hr>
        <br>
        <label for="add_community">Address:</label>
        <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" name="add_community" id="add_community" value="<?php echo  $_SESSION["user_comm"]; ?>">
        <br>
        <label for="add_community_name">Community Name:</label>
        <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" name="add_community_name" id="add_community_name" value="<?php echo  $_SESSION["user_comm_name"]; ?>">
        <br><br>
         </div> <!--end of personal details tab-->


         <div class="tab-pane fade show" id="consultation-panel" role="tabpanel" aria-labelledby="details-tab">
         <!-- account settings COLUMN-->
         <p><h4>Account Settings</h4></p>
        <hr>
        <br>
        <label for="id">User ID:</label>
        <input type="text" class="form-control col-sm-5"  readonly name="id" id="id" value="<?php echo  $_SESSION["user_id"]; ?>">
        <br>
        <label for="code">Room Code:</label>
        <input type="text" class="form-control " name="code" id="code" value="<?php echo  $_SESSION["user_code"]; ?>">
        <br>
        <label for="uname">User Name:</label>
        <input type="text"  class="form-control" name="uname" id="uname" value="<?php echo  $_SESSION["user_uname"]; ?>">
        <br>
        <label for="pword">Password:</label>
        <input type="text" class="form-control" name="pword" id="pword" max="20" min="8" value="<?php echo  $_SESSION["user_pword"]; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo  $_SESSION["user_email"]; ?>">

        <br>
        <hr>
        <label for="cty">City:</label>
        <input type="text" class="form-control " name="state" id="cty" value="<?php echo  $_SESSION["user_cty"]; ?>">
        <br>
        <label for="state">State:</label>
        <input type="text"  class="form-control " name="state" id="state" value="<?php echo   $_SESSION["user_state"]; ?>">
        <br>
        <label for="admin_mail">Admin Email:</label>
        <input type="text"  class="form-control " name="admin_mail" id="admin_mail" value="<?php echo   $_SESSION["user_admin_email"]; ?>">
        <br><br>
         </div> <!--end of account details tab-->


      </div><!--end of tab content-->
      <!--buttons and status-->
      
      <button type="button" class="btn btn-primary mr-auto" name="btn-home" id="btn-home"><a class="btnreg" href="index_home.php">Home</a></button>
      <button type="button" class="btn btn-primary mr-auto" name="btn-save" id="btn-save"  >&nbsp; Save &nbsp;</button>
      <button type="button" class="btn btn-danger mr-auto" name="btn-delete" id="btn-delete" data-toggle="modal" data-target="#delete-confirm">Delete</button>  
      <br>
      <p class="text-center" id="load-spin" hidden>Please Wait <i class="spinner-border text-danger spinner-border-sm" role="status"></i></p>
      
      </div><!--end of tab column-->
      <br><br>
      </form><!--form end-->
      </div><!--1st row end-->


<!-- modal natin to-->

<div class="modal fade" id="status-alert" tabindex="-1" aria-labelledby="accountchangestatus" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mx-auto">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Profile Edit Status</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="status-msg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>

<!--end of modal natin to-->
<!--delete modal-->
<!-- Modal -->
<div class="modal fade" id="delete-confirm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateConfirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="update-confirm-title"><i class="fas fa-exclamation-triangle"></i> Delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
       You are about to delete this record, erasing the record could no longer be retrieved. Are you sure you want to finalize the decision and proceed?
      </div>
      <div class="modal-footer">
        <p class="mr-auto" id="delete-spin" hidden>Deleting Please Wait <i class="spinner-border text-danger spinner-border-sm" role="status"></i></p>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="del-yes" id="del-yes">Proceed</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--end of modals-->


</div><!--container-fluid-->



</body>
</html>
<!--Ajax-->
<script>
//age checker

    function agechecker(){
    var min_yr = 1960;
    var max_yr = 2002;
    //year from input bday
    var bday_input = document.getElementById("bday").value;
    var yr_get = new Date(bday_input);
    var bday_yr = yr_get.getFullYear();


    //get current yr
    var yr_now = new Date();
    var yr = yr_now.getFullYear();

    if (bday_yr > 2002 || bday_yr < 1960) {
      //alert("invalid year"); no action
      document.getElementById("bday").value = "1960-01-01";
    }else{
        //calculate age
        var calculated_age = yr - bday_yr;
        //alert("You are: "+ calculated_age);
        document.getElementById("age").value=calculated_age;
    }

    }

//toggle enter entries in textboxes
var text_lname = document.getElementById("lname");
var text_fname = document.getElementById("mname");
var text_mname = document.getElementById("fname");
var text_add = document.getElementById("add_community");
var text_add_name = document.getElementById("add_community_name");
var text_code = document.getElementById("code");
var text_uname = document.getElementById("uname");
var text_pword = document.getElementById("pword");
var text_email = document.getElementById("email");
var text_cty = document.getElementById("cty");
var text_admin_email = document.getElementById("admin_mail");
var text_state = document.getElementById("state");


     text_lname.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_fname.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_mname.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_add.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_add_name.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_code.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_uname.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_pword.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_email.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_cty.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_admin_email.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });
      text_state.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }
      });



$(document).ready(function(){

  //if btn save clicked
  $("#btn-save").click(function(){
    
    //declare and assign values every click for variables
    var lname = document.getElementById("lname").value;
    var fname = document.getElementById("fname").value;
    var mname = document.getElementById("mname").value;
    var age = document.getElementById("age").value;
    var sex = document.getElementById("sex").value;
    var bday = document.getElementById("bday").value;
    var add = document.getElementById("add_community").value;
    var com_add = document.getElementById("add_community_name").value;
    var cty = document.getElementById("cty").value;
    var state = document.getElementById("state").value;
    var room_code = document.getElementById("code").value;
    var uname = document.getElementById("uname").value;
    var pword = document.getElementById("pword").value;
    var email = document.getElementById("email").value;
    var admin_email = document.getElementById("admin_mail").value;



    //check every "var" if totoo na hindi blanko
    //execute the line if "true"
   if ($.trim(lname)!='' && $.trim(fname)!='' && $.trim(mname)!='' && $.trim(room_code)!='' && $.trim(uname)!='' && $.trim(pword)!='' && $.trim(email)!='' && $.trim(age)!='' 
        && $.trim(add)!='' && $.trim(com_add)!='' && $.trim(cty)!=''&& $.trim(state)!='' && $.trim(room_code)!='' && $.trim(admin_email)!='') {
      //$("#load-spin").prop("hidden",false);

      $.ajax({
                  url:"user_edit_profile_process.php",
                  method:"POST",
                  data:{lname:lname, fname:fname, mname:mname, age:age, sex:sex, bday:bday, add:add, 
                  com_add:com_add, state:state, cty:cty, room_code:room_code, uname:uname, pword:pword, email:email, admin_email:admin_email},
                  dataType:"text",
                  success:function(data){

                   // $("#load-spin").prop("hidden",true);
                   // alert(data);
                   //call modal alert instead 
                   //window.location.href="admin_edit_profile.php";
                   document.getElementById("status-msg").innerHTML=data;
                   $('#status-alert').modal();
                   
                
                  }

              });

    }else{
        //if isa sa kanila ang blanko 
        //execute below line
        //$("#load-spin").prop("hidden",false);  
        document.getElementById("status-msg").innerHTML="<span class='text-danger'>Please don't leave any fields blank.</span><br><h5 class='text-danger'>Input Invalid</h5>";
        $('#status-alert').modal();
    }
    //enable below for testing
    //alert(lname +"\n"+ fname +"\n"+ mname +"\n"+ age +"\n"+ sex +"\n"+ bday +"\n"+ add +"\n"+ com_add +"\n"+ state +"\n"+ zip +"\n"+ room_code +"\n"+ uname +"\n"+ pword +"\n"+ email +"\n"+ status +"\n");

  });

});


</script>
<!--delete-->
<?php 
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";
$sql= mysqli_connect($server,$user,$pass,$db);

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
  }

  //if proceed button in delete modal clicked
  if (isset($_POST['del-yes'])) {
    $del_query = "DELETE FROM participants WHERE ID='$_SESSION[user_id]'"; //delete their record
    $del_msg = "DELETE FROM messages WHERE MESSAGE_ID='$_SESSION[user_id]'"; //also their messages including the admin messages to them
    if ($sql->query($del_query) === TRUE && $sql->query($del_msg) === TRUE) {
      echo 'Success!';
      session_destroy();
      echo '<script>window.location.href="index_home.php";</script>';
    } else {
      echo "Error Please Contact Support: " . $sql->error;
    }
  }

  
  $sql->close();

?>