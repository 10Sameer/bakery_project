<?php
session_start();

$_SESSION = array();
session_destroy();
 echo '<script>
 alert("Logging Out!!!")
   window.location.href="bakery.php";
     </script>';

exit;
?>
