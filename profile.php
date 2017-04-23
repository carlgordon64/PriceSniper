<!-- sample page --> <!DOCTYPE html> 
<html>  
<head> 
<link rel="stylesheet" type="text/css" href="css/style.php">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/isostyle.css">
<link href='https://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
session_start();

$servername = "localhost";
$username = "carlgordon";
$password = "6190";
$dbname = "partsDB";
$host = 'localhost';
$port = 3306;

$ActiveUsername = $_SESSION['Username'];
$ActivePassword = $_SESSION['Password'];
$logged=$_SESSION['LoggedIn'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else
{
	//echo "welcome to DogDash!";
}
//include ("includes/base.php"); 


//error_reporting(0);
// includes header
?>

<div style="text-align:center">
<? 

 //include ("includes/verify.php");


include ("includes/header.php");






?>


<?
include ("includes/my-parts.php");


//include("includes/logout.php");
?>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/jquery.min.js"><\/script>')</script>
<script src="js/isotope-docs.min.js"></script>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>
<script src="js/isotope-docs.min.js"></script>
</html>