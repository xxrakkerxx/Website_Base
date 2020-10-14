<?php
// Start the session
session_start();
//This is our Initializer before processing other files

//if walang session idirect ang user sa home view na nakikita ng mga guest
if (!isset($_SESSION['User'])) {
  echo '<script>window.location.href = "index_home.php"</script>';
}
//if meron diretso sa profile dashboard ng mga logged in users
else {
  echo '<script>window.location.href = "success_login_interface.php"</script>';
}

?>
