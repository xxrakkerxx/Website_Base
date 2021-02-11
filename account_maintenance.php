<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

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
   <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script>-->
    <!--END OF FA-->

    <!--END OF CDN-->

    <!--EXTERNAL SHEETS-->
    <link rel='stylesheet' type='text/css' media="screen" href='css/index_healthTracking.css'>
    <link rel='stylesheet' type='text/css' media="screen" href='css/loader.css'>
    <script type="text/javascript" src="loader.js"></script>
    <!--END OF EXTERNAL SHEETS-->
    <title>Account Maintenance</title>
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
<div class="container-fluid">
<br><br>
<div class="row p-2">
<div class="col-md-6 mx-auto shadow-lg p-3 mb-5 bg-white rounded">
<h5 class="modal-title text-secondary text-center">Account Maintenance Page</h5>
<center><small class="modal-title text-danger">Recover or Activate your account</small></center>
<p><h5>Options</h5></p>
<hr>

  <input type="radio" id="forgot" name="maintenance" value="Forgot">
  <label for="forgot">Forgot Password</label><br>

  <input type="radio" id="act" name="maintenance" value="Activate">
  <label for="act">Activate Account</label><br>
  <hr>
  <input type="email" class="form-control" id="email" name="email" placeholder="yourmail@gmail.com"><br></form>
  <center><button type="button" class="btn btn-primary " id="btn-send" name="btn-send">Send Code</button> 
  <button type="button" class="btn btn-primary " id="btn-home" name="btn-home">Homepage</button>
  <p class="text-center" id="load-spin" hidden>Please Wait <i class="spinner-grow text-success spinner-grow-sm" role="status"></i></p>
  </center>

  <br><br>



</div>

</div>

</div>
<script>

      var btnsend = document.getElementById("email");
      btnsend.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-send").click();
        }

      });

      $(document).ready(function(){

        $("#btn-home").click(function(){
          window.location.href="index_home.php";
        });

      });
      


</script>
<!-- modal sent to-->

<div class="modal fade" id="status-alert" tabindex="-1" aria-labelledby="accountchangestatus" aria-hidden="true">
  <div class="modal-dialog  mx-auto">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="modal-title"></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="status-msg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary ml-auto" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>

<!--end of modal natin to-->
</body>
</html>
<script>
var text_email = document.getElementById("email");


text_email.addEventListener("keyup", function(event) {
   if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("btn-send").click();
 
   }
 });

//ajax goes here
 $(document).ready(function(){

    //click received 
    $("#btn-send").click(function(){
        
        var forgot = document.getElementById("forgot");
        var act = document.getElementById("act");
        var mail = document.getElementById("email").value;

        //activating pending account for admins
        if(act.checked){

          $("#load-spin").prop("hidden",false);
          $.ajax({
                  url:"admin_login_ajax/account_maintenance_ajax.php",
                  method:"POST",
                  data:{email:mail, input:"activation"},
                  dataType:"text",
                  success:function(data){
                    //alert(data);

                    document.getElementById("modal-title").innerHTML = act.value + " Account Status";
                    document.getElementById("status-msg").innerHTML = data;
                    $("#load-spin").prop("hidden",true);
                    $("#status-alert").modal();
                    $("#btn-send").prop("disabled",false);
                    $("#email").val("")
                    $("#act").prop("checked",false);
                  }
                
              });


        }//end of activate.checked

        //forgot password
        if(forgot.checked){
        $("#load-spin").prop("hidden",false);
        $("#btn-send").prop("disabled",true);
        $.ajax({
                url:"admin_login_ajax/account_maintenance_ajax.php",
                method:"POST",
                data:{email:mail, input:"forgot_psw"},
                dataType:"text",
                success:function(data){
                  //alert(data);
                  
                  $("#load-spin").prop("hidden",true);
                  document.getElementById("modal-title").innerHTML = forgot.value + " Password Status";
                  document.getElementById("status-msg").innerHTML = data;
                  $("#status-alert").modal();
                  $("#btn-send").prop("disabled",false);
                  $("#email").val("")
                  $("#forgot").prop("checked",false);
                }
              
            });


        }

    }); //end of btn-send.click

 });//end of document ready

</script>


