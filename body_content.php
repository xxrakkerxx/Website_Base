<?php 
//session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Content</title>
    
</head>
<body>


<div class="container-fluid p-1"><!--start div container-->
<div class="row"><!--row whole start-->
        <div class="col-md-12 p-0"><!--column start-->
        <form action="" method="post" id="form-record-submit">
       
        </form>
  
   <p class="text-muted text-center">Patient Locator:</p>
   <center>
   <form method="post" id="search-form">
   <input type="text" class="form-control" id="record-search" aria-describedby="search" placeholder="Patient ID" name="record-search"  autofocus>
   </form><br>
   <p class="text-danger" id="fetch-result"></p>
  </center>
   <br><!--<button type="Submit" class="btn btn-danger" id="btn-search" form="form-record-submit" name="btn-search">Search</button>-->

     <hr><!-- LINE SEPARATOR -->
        </div><!--column end-->
    </div><!--row whole end-->

   
    <br>
       
        <div class="row"><!--row details starts-->
       
        <div class="col-sm-8 offset-sm-2 shadow-lg p-0 mb-2 bg-white rounded">
        <ul class="nav nav-tabs" id="tab-panel" role="tablist">
        <li class="nav-item" role="presentation">
          <a  class="nav-link text-dark active  mb-2 btn-outline-success" id="home-tab" data-toggle="tab" href="#personal-panel" role="tab" aria-controls="details" aria-selected="true"><i class="fas fa-user-circle"></i> Personal Details</a>
        </li>&nbsp;
        <li class="nav-item" role="presentation">
          <a  class="nav-link text-dark  mb-2 btn-outline-success" id="profile-tab" data-toggle="tab" href="#consultation-panel" role="tab" aria-controls="consultation" aria-selected="false"><i class='fas fa-prescription'></i> Consultation</a>
        </li>&nbsp;
        <li class="nav-item" role="presentation">
          <a  class="nav-link  text-dark  mb-2 btn-outline-success" id="contact-tab" data-toggle="tab" href="#msg-panel" role="tab" aria-controls="chatting" aria-selected="false"><i class='fas fa-envelope'></i> Messages</a>
        </li>
      </ul>
      <div class="tab-content" id="panel-content">
        <div class="tab-pane fade show active" id="personal-panel" role="tabpanel" aria-labelledby="details-tab">
         <!-- PERSONAL DETAILS COLUMN-->
         <br>
         <div class="col-md-8 offset-sm-2 ">
         Patient ID:<br>
        <input class="form-control " type="text" name="id_record" id="id-record" value="" readonly form="form-details-pass" >
        <br>
        Last Name:<br>
        <input class="form-control " type="text" name="lname-record" id="lname-record" form="form-details-pass" readonly><br>
        First Name:<br>
        <input class="form-control " type="text" name="fname-record" id="fname-record" form="form-details-pass" readonly><br>
        Community Name:<br>
        <input class="form-control " type="text" name="comname-record" id="comname-record" form="form-details-pass" readonly><br>

        <label for="age-record">Age:</label>
        <input class="form-control w-50 " type="text" name="age-record" id="age-record" form="form-details-pass" readonly><br>

        <label for="age-record">Sex:</label>
        <input class="form-control w-50 " type="text" name="sex-record" id="sex-record" form="form-details-pass" readonly><br>
        <!--<p class="mr-auto" id="delete-spin" >Deleting <i class="spinner-border text-danger spinner-border-sm" role="status"></i></p>-->
        <button type="button" class="btn btn-md btn-primary" onclick="del_modal_call()" name="btn-delete" id="btn-delete"><i class='far fa-trash-alt'></i> Delete</button>
        <button type="button" class="btn btn-md btn-primary" name="btn-update" form="" data-toggle="modal" data-target="#update-confirm"><i class='fas fa-wrench'></i> Update</button>
        <button type="button" class="btn btn-md btn-primary" name="btn-enroll" onclick="special_reg()"><i class='far fa-id-card'></i> New</button>
       </div><br>

       
        </div><!--END OF PERSONAL DET. COL-->

        <div class="tab-pane fade" id="consultation-panel" role="tabpanel" aria-labelledby="consultation-tab">
         <!--HEALTH STAT AND REMARKS COL-->
         <br>
         <div class="col-md-8 offset-sm-2">
         <p>Health Status: <span class="text-danger">(Latest to Oldest)</span></p>
        <textarea class="form-control" rows="8" name="healthstat-record" id="healthstat-record" form="form-details-pass" readonly style="max-height:250px;"></textarea>
        <br>
        <p>Remarks: <span class="text-danger">(Latest to Oldest)</span></p>
        <textarea class="form-control" name="remarks-record" id="remarks-record" form="form-details-pass" rows="5" readonly style="max-height:250px;"></textarea><br>
        <p>Update Remarks:</p>
        <input class="form-control" type="text" name="updatemarks-record" id="updatemarks-record" placeholder="Your remarks..">
        <p name="remarks-record " class="text-success text-center" id="remarks-status"></p>
        <button type="button" class="btn btn-md btn-primary" name="btn-save" id="btn-save"><i class='far fa-paper-plane'></i> Send</button>
        
         </div><br>
        </div><!--END OF HEALTH STAT AND REMARKS COL-->

        <div class="tab-pane fade" id="msg-panel" role="tabpanel" aria-labelledby="chat-tab">
        <!--CHAT COLUMN-->
        <br>
        <div class="col-md-8 offset-sm-2  p-1">
        <p>Messages:</p>
        <!--<textarea class="form-control" name="remarks-record" id="remarks-record" form="form-details-pass" rows="10" readonly style="max-height:250px;"></textarea><br>-->
        <div class="bg-white" id="msg-output" style="overflow:auto;height:320px; box-shadow:0px 0px 6px black; padding:1px; margin:5px;">
        

        </div><br>
        <hr>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text bg-dark" id="msg-group" ><i class='far fa-envelope text-success' style="font-size:22px;"></i></span>
        </div>
        <input type="text" class="form-control" name="msg-text" id="msg-text" placeholder="Type here.." aria-label="Message area" aria-describedby="msg-group" style="font-size:22px;">
      </div>
       
        <p name="remarks-record " class="text-success text-center" id="remarks-status"></p>
        <button type="button" class="btn btn-md btn-primary" name="btn-send" id="btn-send"><i class='far fa-paper-plane'></i> Send</button>
        </div><br>
        </div><!--END OF CHAT COLUMN-->

        </div>
        </div><!--col-sm-8 end-->

       <!--special reg()-->
       <script>
        function special_reg() {
            document.cookie = "special_session=permission_granted";
            window.open("user_register.php");
          
        }
     //Trigger Update remarks and send message button using js and declare audios-->
     //preventdefault , prevents submit function in button inside the form
      var update_marks = document.getElementById("updatemarks-record");
      var text_message = document.getElementById("msg-text");
      var search_str = document.getElementById("record-search");
      update_marks.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-save").click();
        }

      });

      text_message.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-send").click();
        }

      });

      </script>
      <audio id ="adu">
      <source src="sound/sent.wav" type="audio/wav">
      </audio>
      <audio id ="norec">
      <source src="sound/norecord.wav" type="audio/wav">
      </audio>
      <audio id ="delete">
      <source src="sound/delete.wav" type="audio/wav">
      </audio>
      <!--end --> 
        </div><!--row details end-->

<form method="post" id="form-details-pass">
</form>
<!--END-->   

</div><!--end div container-->

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
        <button type="button" class="btn btn-danger" name="del-yes" id="del-yes">Proceed</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--end of modals-->

<!--update confirm modal-->
<!-- Modal -->
<div class="modal fade" id="update-confirm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateConfirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="update-confirm-title"><i class="fas fa-exclamation-triangle"></i> Updating Notice!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
      <div class="modal-body">
       Updating a record could lead to permanent loss of data from the user and those changed data can no longer be retrieved.
       Do you want to proceed?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="modal_yes">Proceed</button>
        <!--If modal_yes clicked, create a session before landing to update user profile page-->

      </div>
      </form>
    </div>
  </div>
</div>
<!--end of modals-->

<!--save-success modal-->
<!-- Modal -->
<div class="modal fade" id="save-success"  tabindex="-1" aria-labelledby="updateConfirm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <p class="modal-title text-white" id="update-confirm-title"><i class='far fa-calendar-check'></i> Success!</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Remarks for this Patient Sent!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Got it!</button>
      </div>
    </div>
  </div>
</div>
<!--end of modals-->

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
  
    //search function
  if (isset($_POST['record-search'])) {
    $key = $_POST['record-search'];  
    $search = "SELECT ID, LASTNAME, FIRSTNAME, AGE, SEX, COMMUNITY_NAME, HEALTH_STATUS, REMARKS, ROOM_CODE FROM participants WHERE ID=? && ROOM_CODE=? && STATUS='ENROLLED'";
    $process = $sql->prepare($search);
    $process->bind_param("ii", $key, $_SESSION['room_code']);
    $process->execute();
    $result = $process->get_result();

    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {

          echo '<script>
  
          document.getElementById("id-record").value="'.$row["ID"].'";
          document.getElementById("lname-record").value="'.$row["LASTNAME"].'";
          document.getElementById("fname-record").value="'.$row["FIRSTNAME"].'";
          document.getElementById("comname-record").value="'.$row["COMMUNITY_NAME"].'";
          document.getElementById("age-record").value="'.$row["AGE"].'";
          document.getElementById("sex-record").value="'.$row["SEX"].'";
          
          $(document).ready(function(){
            var query_id = "'.$row["ID"].'";
            $("#remarks-record").load("admin_login_ajax/remarks_refresher.php", {data:query_id }).fadeIn("slow");
            $("#healthstat-record").load("admin_login_ajax/healthstat_refresher.php", {data:query_id }).fadeIn("slow");
          });
       
          </script>';
  
         $_SESSION["patient_id"] = $row["ID"]; //use by admins for messaging the searched user
        

        }
    }     
    else
    {
      echo '<script>
      
      document.getElementById("fetch-result").innerHTML="Patient ['. $_POST['record-search'] .'] Not Found or might not under your Supervision, Please Try Again.";
      var sound = document.getElementById("norec");
                  sound.play();
      </script>';
      $_SESSION["patient_id"] = 0; //reset patient id if no patient found in search
    }
    $sql->close();


  }
  if (isset($_POST["modal_yes"])) {
    echo '<script>
          window.location.href="update_user_profile.php";
          </script>';
  }

?>

<!--OUR AJAX SCRIPT-->
<script>
$(document).ready(function(){

$('.toast').toast('show') //initialize toast in modal request in success_login_interface
var id_box = $("#id-record").val();

//this is for delete button to trigger the delete modal
var del_id = <?php echo $_SESSION["patient_id"] ?>;
        del_modal_call = function(){ 
          if (del_id === 0 || id_box =='' ) {
         //no action
       }else
       {
         $("#delete-confirm").modal();
         var sound = document.getElementById("delete");
         sound.play();
         //to be continued
       }
    }

//trigger proceed button in the delete modal
$("#del-yes").click(function(){
  var query_id = "<?php echo $_SESSION['patient_id']?>";
  $("#delete-spin").prop("hidden",false);
  $("#del-yes").prop("disabled",true);
  if (query_id!=0 && $.trim(id_box)!='') {
  
    $.ajax({
                  url:"admin_login_ajax/delete_record.php",
                  method:"POST",
                  data:{id:query_id},
                  dataType:"text",
                  success:function(data){
                    //alert(data);
                    window.location.href="index_home.php";

                  }
                
              });
  
  
  }});


    //remarking the patient health status
    $('#btn-save').click(function(){

        var query_id = "<?php echo $_SESSION['patient_id']?>";
        var query_remarks = $("#updatemarks-record").val();
        var query_remarks2 = query_remarks.replace(/['"]/g, '*'); //replace single and double quote with asterisk before submission
        
        //if error persist use this methods
        //.replace(/[^a-zA-Z0-9]/g,' ');
        //.replace(/[&\/\\#, +()$~%.'":*?<>{}]/g, '*');
        var query_old_remarks = $("#remarks-record").val();

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

        var query_time = all +":" + alltime ;
      
if ($.trim(query_remarks)!='' && $.trim(id_box)!='') {
    
  $.ajax({
                url:"admin_login_ajax/update.php",
                method:"POST",
                data:{id:query_id,up_field:query_remarks,
                      old_remarks:query_old_remarks,
                      remarks:query_remarks2, 
                      up_time:query_time},
                dataType:"text",
                success:function(data){
                  var sound = document.getElementById("adu");
                  sound.play();
                $("updatemarks-record").focus();
                $('#updatemarks-record').val("");
                $('#save-success').modal();
                }
              
            });

}else
{
  //no action
          }          
    });

//for success_login_interface request modal approve and decline button
$('button[name="btn-approve"]').click(function() {
  $('button[name="btn-approve"]').prop("disabled", true); //disable the button to avoid double clicks
  $('#loader-spin').prop("hidden",false);//show the loader
  var request_id = $("#request_id").text();
//console.log(request_id); uncomment this line for testing

$.ajax({
          url:"admin_login_ajax/new_record_request.php",
          method:"POST",
          data:{patient_id: request_id},
          dataType:"text",
          success:function(data){
             //alert(data);
              //var sound = document.getElementById("adu");
              //sound.play();
              window.location.href="success_login_interface.php";
              
          
          }
      });


});


//if btn send in chat clicked trigger this ajax script
$("#btn-send").click(function(){

if ($.trim(id_box)!='') {

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


var admin_update_time = all + ": " + alltime;

//initialize all variables 
var admin_ini_message = $("#msg-text").val();
var admin_chat_msg = admin_ini_message.replace(/['"]/g, '*');
var admin_chat_sender = "<span style=color:green;> ADMIN " + "<?php echo $_SESSION['admin_name']?>" +"</span>";
var chat_id = "<?php echo $_SESSION['patient_id']?>";

//initiate ajax script
if ($.trim(admin_ini_message) !='') {
      $.ajax({
          url:"user_login_ajax/user_message_insert.php",
          method:"POST",
          data:{chat_msg:admin_chat_msg,
          chat_sender: admin_chat_sender,
          chat_id:chat_id,
          up_time:admin_update_time, 
          idbox:id_box},
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
  
}

});
//NAKUMPUNI NATIN YUNG MESSAGING NG ADMIN TO USER HAHAHAHA DI TAYO BOBO!

var query_id = "<?php echo $_SESSION['patient_id']?>";
    //refresh health stat, remarks every sec
    setInterval(function(){
    
          $("#healthstat-record").load("admin_login_ajax/healthstat_refresher.php", {data:query_id, idbox:id_box}).fadeIn("slow");//remove data:query todo!
          $("#remarks-record").load("admin_login_ajax/remarks_refresher.php", {data:query_id, idbox:id_box}).fadeIn("slow"); //remove data:query todo!
          $('#msg-output').load("user_login_ajax/user_message_refresh.php", {data:query_id, idbox:id_box}).fadeIn("slow"); //refresh msg
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
 //$("#msg-output").scrollTop($("#msg-output")[0].scrollHeight); //put this for not animated scrolldown

}



</script>

