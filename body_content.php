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


<div class="container-fluid"><!--start div container-->
<div class="row"><!--row whole start-->
        <div class="col-md-12 p-0"><!--column start-->
        <form action="" method="post" id="form-record-submit">
       
        </form>

   <p class="text-muted">Find Record:</p>
   <input type="text" class="form-control" id="record-search" aria-describedby="Username" placeholder="first name, last name, id etc.." required name="record-search">
   <br><!--<button type="Submit" class="btn btn-danger" id="btn-search" form="form-record-submit" name="btn-search">Search</button>-->
   <!--RESEARCH FEATURE STILL ON BETA AND DI TALAGA OFFICIALLY NA ITO ANG GAGAMITIN NATIN FOR SEARCHING WE SHOULD USE AJAX!!!-->
   <script>
    $(document).ready(function(){
      $("#record-search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#contents_record tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>


   <br><br>
   <table class="table table-responsive table-white pt-3 mb-2 " id="table-records">
   <caption id="cap">Your Member Records</caption>
   <thead style="width:110%;" class="thead-dark">
    <tr class="text-center" id="table-header">

      <th >Action</th>
      <th style="width:200px;">ID</th>
      <th >LAST_NAME</th>
      <th >FIRST_NAME</th>
      <th >MIDDLE_NAME</th>
      <th >BDAY</th>
      <th >AGE</th>
      <th >SEX</th>
      <th >COMMUNITY_NAME</th>
      <th >ADDRESS</th>
      <th >CITY</th>
      <th >EMAIL</th>
      <th >USERNAME</th>     
      <th >Room_Code</th>
      <th >JOINED</th>
      <th>HEALTH_STATUS</th>
      <th >REMARKS</th> 
      <th style="width:180px;">STATUS</th> 
      
      
    </tr>
  </thead>
  <tbody id="contents_record">
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
$query_users = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BDAY, SEX, AGE, COMMUNITY_NAME, ADDRESS, 
CITY, HEALTH_STATUS, EMAIL, USERNAME, ROOM_CODE, JOINED, REMARKS, STATUS FROM participants WHERE ROOM_CODE='$_SESSION[room_code]'";
$result = $sql->query($query_users);

if ($result->num_rows > 0) {

  // output data of each row
  while($row = $result->fetch_assoc()) {

   echo ' 
    <form method="get"><tr">  
    <td>
    <input class="btn btn-warning" type="button" value="Modify" name="modify-record" form="form-details-pass" data-toggle="modal" data-target="#exampleModal">
    </td>
    <td class="text-truncate" style="max-width:30px;" id="td_row">'.$row["ID"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_lname">'.$row["LASTNAME"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_fname">'.$row["FIRSTNAME"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_mname">'.$row["MIDDLENAME"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_bday">'.$row["BDAY"].'</td>   
    <td class="text-truncate" style="max-width:30px;" id="td_age">'.$row["AGE"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_sex">'.$row["SEX"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_comname">'.$row["COMMUNITY_NAME"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_add">'.$row["ADDRESS"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_cty">'.$row["CITY"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_email">'.$row["EMAIL"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_user">'.$row["USERNAME"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_code">'.$row["ROOM_CODE"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_joined">'.$row["JOINED"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_health">'.$row["HEALTH_STATUS"].'</td>
    <td class="text-truncate" style="max-width:30px;" id="td_remarks">'.$row["REMARKS"].'</td>
    <td >'.$row["STATUS"].'</td>
    </tr></form>';
  }

}

else {
  echo '<script>document.getElementById("cap").innerHTML = "No Records to show";</script>';
}

$sql->close();

  ?>

    <script>

                var table = document.getElementById('table-records');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                        
                         document.getElementById("id-record").value = this.cells[1].innerHTML;
                         document.getElementById("lname-record").value = this.cells[2].innerHTML;
                         document.getElementById("fname-record").value = this.cells[3].innerHTML;                                       
                         document.getElementById("age-record").value = this.cells[6].innerHTML;
                         document.getElementById("sex-record").value = this.cells[7].innerHTML;                                     
                         document.getElementById("comname-record").value = this.cells[8].innerHTML;    
                         document.getElementById("healthstat-record").value = this.cells[15].innerHTML;        
                         document.getElementById("remarks-record").value = this.cells[16].innerHTML;

                      
                    };
                }
     

        
  </script>

  </tbody>
</table><hr>
        </div><!--column end-->
    </div><!--row whole end-->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Under Construction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Coming soon!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
      <div class="modal-body">
       Updating a record could lead to permanent loss of data from the user and lead the user to register
       the lost data again do you want to proceed?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger" name="modal_yes" form="form-details-pass">Yes, Please</button>
      </div>
    </div>
  </div>
</div>
<!--end of modals-->

    <br>
        <!--DITO LALABAS ANG DETAILS NG RECORD NA SINELECT SA TABLE NATIN-->
       
        <div class="row"><!--row details starts-->
        <div class="col-sm-4 shadow-lg p-2 mb-2 bg-white rounded border-left border-danger">
        ID:<br>
        <input class="form-control" type="text" name="id-record" id="id-record" form="form-details-pass" readonly><br>
        Last Name:<br>
        <input class="form-control" type="text" name="lname-record" id="lname-record" form="form-details-pass" readonly><br>
        First Name:<br>
        <input class="form-control" type="text" name="fname-record" id="fname-record" form="form-details-pass" readonly><br>
        Community Name:<br>
        <input class="form-control" type="text" name="comname-record" id="comname-record" form="form-details-pass" readonly><br>
        Age:<br>
        <input class="form-control" type="text" name="age-record" id="age-record" form="form-details-pass" readonly><br>
        Sex:<br>
        <input class="form-control" type="text" name="sex-record" id="sex-record" form="form-details-pass" readonly><br><br>
        </div>
        
        <div class="col-sm-4 shadow-lg p-2 mb-2 bg-white rounded border-left border-danger" form="form-details-pass">
        Health Status:<br>
        <textarea class="form-control" rows="8" name="healthstat-record" id="healthstat-record" form="form-details-pass" readonly></textarea>
        <br>
        Remarks:<br>
        <textarea class="form-control" name="remarks-record" id="remarks-record" form="form-details-pass" rows="5"></textarea><br>



        <center>
        <button type="submit" class="btn btn-md btn-info border-left border-warning" name="btn-save" form="form-details-pass">Save</button>
        <button type="button" class="btn btn-md btn-info border-left border-warning" name="btn-update" form=""data-toggle="modal" data-target="#update-confirm">Update</button>
        <button type="button" class="btn btn-md btn-info border-left border-warning" name="btn-enroll" onclick="special_reg()">Enroll</button>
       <!--special reg()-->
       <script>
        function special_reg() {
            document.cookie = "special_session=permission_granted";
            window.open("user_register.php");
          
        }
       </script>
        </center>
        </div>
        
        <!--DITO TAYO HUMINTO GAGAMITAN NATIN NG AJAX TO SA FOR UPDATE NG DATABASE KADA CHAT-->
        <div class="col-sm-4 shadow-lg p-2 mb-2 bg-white rounded border-left border-danger" form="form-details-pass">
        Message:<br>
        <textarea class="form-control" name="chat-record" id="chat-record" form="#" rows="10" placeholder="your message will appear here.."></textarea><br>             
        Message Input:<br>
        <input class="form-control" type="text" name="msg-record" id="msg-record" form="form-details-pass" placeholder="your message.."><br>

        <button type="button" class="btn btn-md btn-info border-warning" name="btn-send-chat" form="form-details-pass">Send</button>
        <button type="button" class="btn btn-md btn-info border-warning" name="btn-email">Email</button>

        </div> 
        </div><!--row details end-->
    
        
        <!--FOR DETAILS FROM TABLES-->
        <form action="" method="post" id="form-details-pass">
        </form>
        <!--END-->   


</div><!--end div container-->
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

if (isset($_POST['btn-save'])) {

    $remarks_mem=   $_POST['remarks-record'];
    $id_mem=        $_POST['id-record'];
    $lname_mem=     $_POST['lname-record'];
    $fname_mem=     $_POST['fname-record'];
    $sex_mem=       $_POST['sex-record'];
    $age_mem=       $_POST['age-record'];
    $comname_mem=   $_POST['comname-record'];
    //$email_mem=     $_POST['email-record'];
    //$room_mem=      $_POST['room-record'];
    $health_mem=    $_POST['healthstat-record'];


  
  $update_data = "UPDATE participants SET REMARKS='$remarks_mem' WHERE ID='$id_mem'";

  //"SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BDAY, SEX, AGE, COMMUNITY_NAME, ADDRESS, 
 //CITY, HEALTH_STATUS, EMAIL, USERNAME, ROOM_CODE, JOINED, REMARKS, STATUS FROM participants WHERE ROOM_CODE='$_SESSION[room_code]'";

  if ($sql->query($update_data) === TRUE) {
    echo "Record updated successfully";

    echo '<script>
    function redirect(){
      window.location.href = "success_login_interface.php";
    }
    setTimeout(redirect,100)
    </script>';

  } else {
    echo "Error updating record: " . $sql->error;
  }
  
  
}

$sql->close();
?>