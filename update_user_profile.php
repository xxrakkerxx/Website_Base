<?php
session_start();

//initialize a session for filtering this form
//auto ridirect to login page if the session for this form is not present 
if ($_SESSION["patient_id"] ===0 || !isset($_SESSION["admin_level"])) {
    echo '<script>alert("Access Denied!!");
    window.location.href="index_home.php";
    </script>';

}else {
    //for future use
}
//database credentials/ connection
$server="localhost";
$user="root";
$pass="";
$db="healthtrack";

$sql= mysqli_connect($server,$user,$pass,$db);

if ($sql->connect_error) {
  die("Connection failed: " . $sql->connect_error);
}

$sql1 = "SELECT ID, LASTNAME, FIRSTNAME, MIDDLENAME, BDAY, AGE, SEX, COMMUNITY_NAME, ADDRESS, CITY, STATE, HEALTH_STATUS, EMAIL, USERNAME, PASSWORD, ROOM_CODE, REMARKS, STATUS, ADMIN_EMAIL FROM participants WHERE ID='$_SESSION[patient_id]'"; //get user record ID and make it a session to filter patients record and messages
$result = $sql->query($sql1);

$patient_id = $_SESSION["patient_id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Update</title>
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

</head>
<body>
    <div class="container-fluid"><!--container start-->
    <div class="row mt-5 p-2"><!--row1 start-->
    <div class="col-md-6 offset-md-3 bg-white shadow-lg p-3 mb-5 rounded"><!--col1 start-->
        <p class="pt-2 text-center shadow-lg p-3 mb-5 rounded">Member's Profile Editor</p>
        <div class="row mr-auto"><!--row header1-->
        <?php            
        if ($result->num_rows > 0) {
              // output data of each row
        while($row = $result->fetch_assoc()) {
            $remarks = $row["REMARKS"];
            $health_stat = $row["HEALTH_STATUS"];
        ?>
        <div class="col-md-6"><label for="id">ID:</label>
        <input class="form-control" type="text" id="id" name="id" readonly value="<?php echo $patient_id;?>"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="rcode">Room Code:</label>
        <input class="form-control" type="text" id="rcode" name="rcode" value="<?php echo $row["ROOM_CODE"];?>"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="lname">Last Name:</label>
        <input class="form-control " type="text" id="lname" name="lname" value="<?php echo $row["LASTNAME"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="fname">First Name:</label>
        <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $row["FIRSTNAME"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="mname">Middle Name:</label>
        <input class="form-control" type="text" id="mname" name="mname" value="<?php echo $row["MIDDLENAME"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-4"><label for="age">Age:</label>
        <input class="form-control" type="number" id="age" name="age" value="<?php echo $row["AGE"];?>"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="bday">Birth Date:</label>
        <input class="form-control" type="text" id="bday" name="bday" value="<?php echo $row["BDAY"];?>"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="sex">Sex:</label>
        <select class="form-control" type="text" id="sex" name="sex">
        <option id="male">MALE</option>
        <option id="female">FEMALE</option>
        </select><hr class="p-0">
        <script>
        var gender = "<?php echo $row["SEX"];?>"

        if (gender=="MALE") {
            $("#male").prop("selected",true);
        }else{
            $("#female").prop("selected",true);
        }

        </script>

        </div>

        <div class="col-md-6"><label for="cname">Community Name:</label>
        <input class="form-control" type="text" id="cname" name="cname" value="<?php echo $row["COMMUNITY_NAME"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="cadd">Community Address:</label>
        <input class="form-control" type="text" id="cadd" name="cadd" value="<?php echo $row["ADDRESS"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="cty">City:</label>
        <input class="form-control" type="text" id="cty" value="<?php echo $row["CITY"];?>" name="cty"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="state">State:</label>
        <input class="form-control" type="text" id="state" value="<?php echo $row["STATE"];?>" name="state"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="health_stat">Health Status:</label>
        <textarea class="form-control text-danger" id="health_stat" name="health_stat" rows="5"><?php echo $health_stat; ?></textarea><hr class="p-0">
        </div>
        <div class="col-md-6"><label for="rmarks">Remarks:</label>
        <textarea class="form-control text-danger" id="rmarks" name="rmarks" rows="5"><?php echo $remarks; ?></textarea><hr class="p-0">
        </div>
        <!--User and pass-->
        <div class="col-md-6"><label for="email">Email:</label>
        <input class="form-control" type="text" id="email" name="email" value="<?php echo $row["EMAIL"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="user">Username:</label>
        <input class="form-control" type="text" id="user" name="user" value="<?php echo $row["USERNAME"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="psw">Password:</label>
        <input class="form-control" type="text" id="psw" name="psw" value="<?php echo $row["PASSWORD"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>

        <div class="col-md-6"><label for="admail">Admin Email:</label>
        <input class="form-control" type="text" id="admail" name="admail" value="<?php echo $row["ADMIN_EMAIL"];?>" required oninput="this.value = this.value.toUpperCase()"><hr class="p-0">
        </div>
       <!--end of user and pass block-->

        <div class="col-md-6 offset-md-3"><center><label for="stat">Status:</label></center>
        <select class="form-control" id="stat" name="stat">
        <option id="enrolled">ENROLLED</option>
        <option id="pending">PENDING</option>
        </select><hr class="p-0">
        </div>
        <script>
        var status_user = "<?php echo $row["STATUS"]; ?>"
        if (status_user == "ENROLLED") {
            $("#enrolled").prop("selected",true);
        }else{
            $("#pending").prop("selected",true);
        }
        </script>
        <?php   
        }//connected from line 74
    }// connected from line 76

        $sql->close(); 
        //close the database connected from line 15?>

 
        </div><!--row header 1 end-->
        <center>
        <form method="post" id="btn-nav">
        <div class="col-md-6">
        <button class="btn btn-primary" id="btn-save" name="btn-save">Save</button>
        <button class="btn btn-danger" id="btn-del" name="btn-del">Delete</button>
        <button type="submit" class="btn btn-primary" id="btn-cancel" name="btn-cancel">Cancel</button><hr class="p-0">
        </div>
       </form>
        </center>
        

        <div class="row p-0">
        <div class="col-md-6"></div>
        <div class="col-md-6"></div>
        </div>
        

    </div><!--end of col1-->
    </div><!--row1 end-->

    </div><!--div end-->
</body>
</html>
<!-- PHP CODE-->
<?php 
    if (isset($_POST["btn-cancel"])){ 

    $_SESSION["patient_id"] = 0; //set patient_id to 0
    echo '<script>window.location.href="index_home.php";</script>';
    }


    ?>
   
<script>
$(document).ready(function(){
    //if btn save clicked 
    $("#btn-save").click(function(){
        //some php code.. and ajax!!!
    });

        //if btn delete clicked 
        $("#btn-del").click(function(){
        //some php code.. and ajax!!
    });
});

</script>