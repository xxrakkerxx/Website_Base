<?php
// Start the session
session_start();
//This is our Initializer before processing other files

//if admin session exist!
if (isset($_SESSION['admin_level'])) {
  echo '<script>window.location.href = "success_login_interface.php"</script>';
  
}
//if user session exist!
elseif (isset($_SESSION['user_level'])) {
  echo '<script>window.location.href = "user_login_interface.php"</script>';
}
else {
  //default if both sessions are not present
  echo '<script>window.location.href = "index_home.php"</script>';
}

?>
