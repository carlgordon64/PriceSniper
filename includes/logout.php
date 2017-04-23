<?php include "base.php"; 
session_start();
session_destroy();
$parent = dirname($_SERVER['REQUEST_URI']);
header("Location: ../index.php");
exit;

 ?>
<meta http-equiv="refresh" content="0;index.php">
