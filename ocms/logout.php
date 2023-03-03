
<?php
session_start();
unset($_SESSION['ocmsuid']);
session_destroy();
header('location:signup.php');

?>