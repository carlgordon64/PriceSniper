<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="css/style.php"/>
   
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>

  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>
</head>
<body>
<?php

    

$servername = "localhost";
$username = "carlgordon";
$password = "6190";
$dbname = "partsDB";
$host = 'localhost';
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql3 = "SELECT ID, pagename, link FROM Pages";
$result = $conn->query($sql3);






?>
 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container" ><div class="navbar-header">
        <button type="button" id="branded"class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button> 
<a class="navbar-brand stylo" id="branded" href="index.php">
<img src="img/logosmallres.jpg">
</a>

      </div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<?
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<li class='active'><a href='".$row["link"]."'><span class='glyphicon glyphicon-home' aria-hidden='true'></span></a></li>";
  //echo " <li class='active'><a href='".$row["link"]."'>".$row["pagename"]."</a></li> ";
    }
} else {
    echo "<br> 0 results";
}

?>

  </ul>

</div>
 </div>
</div> <!--END NAVBAR-->





</body>

</html>