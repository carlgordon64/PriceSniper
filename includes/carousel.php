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


$sql3 = "SELECT ID, title,image,active,price,saleprice,link FROM carousel";
$result = $conn->query($sql3);
?>
 <div style="max-width:1280px; margin:auto;" >
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" role="listbox">

<?
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

  echo "<div class='item ".$row['active']."'>
     
    <div class='featuredimg'>
       <p id='carotitle'>".$row['title']."</p>
       <img id='caroimg-inner'  src='".$row['image']."'>
       <a href='".$row['link']."'><div class='carousel-caption'><p id='caroprice'>Hottest Price: <span style='text-decoration:line-through;'>$".$row['price']."</span> <span style='color:#90bc00;'><b>$".$row['saleprice']."</b></span></p>
       <p id="">".$row['shop']."</p>
       </div>
      
      </div></a>
</div>

   
  </div>
";

    }
} else {
    echo "<br> 0 results";
}

?>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</body>

</html>