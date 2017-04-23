<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style.css">
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
	 <?php
	 //session_start();
$servername = "localhost";
$username = "carlgordon";
$password = "6190";
$dbname = "myDatabase";
$host = 'localhost';
$port = 3306;

$Logged=$_SESSION['LoggedIn'];

$ActiveUsername = $_SESSION['Username'];
$ActivePassword = $_SESSION['Password'];
$logged=$_SESSION['LoggedIn'];

$Subbutton= $_POST['Subbutton'];
$user_email= $_POST['useremail'];
$user_name= $_POST['username'];
$mydate =  date("Y-m-d") ;

$Actualday =date('l', strtotime($mydate));
//
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

</head>

<body style="margin-top:0px;">

<?


?>
<!--body below-->

<div style="width:100%; min-height:340px; margin-top:0px; background-color:#fff;">
<div style="text-align:center;">
<?
//echo "active user: $ActiveUsername";
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']) && !empty($_SESSION['Password']))
{
	 echo "<div style='margin-top:50px;'>";
	   //echo "A SESSION IS ACTIVE <br>";
	   echo "<h2 style='background-color:rgba(128,195,50,0.9); padding-bottom:10px; padding-top:10px;' >Hello ".$ActiveUsername."! Welcome to your owner profile</h2>";
	   echo "<br></div>";
	}else{
		echo "<div style='margin-top:50px;'>";
	   //echo "A SESSION IS ACTIVE <br>";
	   echo "<h2 style='background-color:rgba(128,195,50,0.9); padding-bottom:10px; padding-top:10px;' >Hello, Please sign up to create an owner profile</h2>";
	   echo "<br></div>";
	}
?>

<?
/*
//PROFILE PIC UPLOAD
<form action='includes/accept-file.php' method='post' enctype='multipart/form-data'>
	<h4>Your Photo:</h4> <input style='text-align:center; margin:auto;' type='file' name='photo' size='25' />
	<input type='submit' name='submit' value='Upload' />
</form>
*/
$Dogcount =0;
if ($ActiveUsername!==null) {
	$sql3 = "SELECT ID,name,owner,breed,gender,age,pace,personality,places,walks,verified FROM Dogs WHERE owner = '$ActiveUsername' AND verified = 1 ";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$Dogcount +=1;

  }

  }
  //
  $Bookingcount =0;
if ($ActiveUsername!==null) {
	$sql6 = "SELECT ID,owner,booked FROM time_slots WHERE owner = '$ActiveUsername' AND booked = 1 ";
$result = $conn->query($sql6);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$Bookingcount +=1;

  }
//echo "$Bookingcount";
  }
}
  //
  $Walkcount =0;
if ($ActiveUsername!==null) {
	$sql9 = "SELECT ID,owner,verified,walks FROM Dogs WHERE owner = '$ActiveUsername' AND verified =1  ";
$result = $conn->query($sql9);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$Walkcount +=$row['walks'];

  }
//echo "$Walkcount";
  }
}



	echo "<div style='padding:20px; padding-top:20px;'class='row panel-footer'>";
	echo "
<div class='col-sm-3'>
<div style='width:100%; background-color:red;'>
   <div id='DP' style='width:100%; max-width:360px; margin:auto; height:200px; background-color:grey;'>
  <h4>Your Photo:</h4> 
   </div>
</div>
</div>
	    ";
	echo "<div  class='col-sm-7 panel-heading' style='padding:0px'>
	
    <h2 id='profileName'style='padding:0px;'>$ActiveUsername</h2>
    <br>";

$sql13 = "SELECT ID,description,contact FROM email WHERE username = '$ActiveUsername' AND verified = 1 ";
$result = $conn->query($sql13);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
echo "<div class='panel-body'><p style='margin-top:-20px; background:transparent; font-size:18px;'>".$row['description']."
<div class='panel-footer'><p>".$row['contact']."</p></div>
</p></div>


</div>";

	}
  }



echo "<div  class='col-sm-2 panel' style='padding-left:0px; margin-auto; background-color: rgba(255,223,0,0.2); text-align:center'>
<h4 style='padding-left:5px;'>$Dogcount Dogs</h4>
<div style='background-color: rgba(255,223,0,0.9);'class='breaker'></div>
<h4 style='padding-left:5px;'>$Walkcount Walks</h4>
<div style='background-color: rgba(255,223,0,0.9);'class='breaker'></div>
<h4 style='padding-left:5px;'>$Bookingcount Bookings</h4>
</div>
";
echo "<div class='col-sm-12'><h4><a href='account-settings.php'>Account Settings</a></h4></div>";





	echo "</div>";
	}
	?>


</div>
<?
//2D ARRAY
/*
$oxo = array(
	array('x','','o'),
	array('o','o','x'),
	array('x','o',''));
	*/
//
//FUNCTIONS
/*
$temp="the date is ";
echo $temp . longdate(time());
function longdate($timestamp){
	$temp = date("l F jS Y",$timestamp);
return date("l F jS Y",$timestamp);
}
*/
//
?>

<div>
<?
//2D ARRAY CALL
//echo "".$oxo[1][1].""
//PRINT RETURNS TRUE OR FALSE FOR A VARIABLE, FASTER THAN BOOLEAN.
//PRINTS LEFT VALUE IF TRUE, RIGHT VALUE IF FALSE
//$oxo ? print "YEA!" : print "NAH";
//MAGIC CONSTANTS
//echo "this is line ".__LINE__." of the file ".__FILE__."";
//
?>
</div>
<div id="welcometint2">
<div style="margin:auto; text-align:center;">
	<div class="row" style="text-align:center;">
<?
if ($ActiveUsername!==null) {
  echo "<p style='font-size:40px; text-transform: capitalize;'>".$ActiveUsername."'s Dogs</p>";
}
?>
<div class="breaker"></div>
		</div><br>
<!--NEWDOG-->
<?
include ("includes/addDog.php");

?>
<!--NEWDOG END-->
		</div>
		</div>
		<div class="row" id="dogitars">
  
		</div><br>
		
	</div>

</div>

<!--NEXT BODY DIVISION-->
<div style="width:100%;  margin-top:0px; background-color:#80c332;">
<div style='border-bottom:5px dotted #fff;'></div>
<div id="welcometint2">
<div style="margin:auto; padding:20px; text-align:center;">
	<div class="row" style="text-align:center;">
<p style="font-size:40px;">Walk Stories</p>
		
	<?

$sql3 = "SELECT ID, day,walkdate,location, rating, comment,owner FROM walk_stories WHERE owner = '$ActiveUsername' ORDER BY ID ASC LIMIT 3";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<div class='col-sm-4' style='color: #1b1f20; text-align:center'><h4>".$row["day"]."</h4><br><b>".$row["walkdate"]."</b><br>".$row["location"]."<br>".$row["rating"]."/10<br>".$row["comment"]."</div>";
   }
} else {
    echo "<br> <p style='font-size:20px;'>Your Dog's haven't been on any walks yet!</p>";
}

?>

		</div><br>
		<div class="pholder3" style="background:transparent"><p style="font-size:18px;">Here at Dashdogs we want to keep you in the loop! for every walk your Dog takes will be a story detailing the adventure. </p></div>
		</div>



		</div>
		<div style='border-bottom:5px dotted #fff'></div>
</div>
<!--NEXT BODY DIVISION-->
<!--HOW IT WORKS-->

<div style="width:100%; margin-top:0px; background-color:#fff; padding:10px;">
<div id="welcometint2">
<div style="margin:auto; text-align:center;">
	<div class="row" style="text-align:center; ">
		<p style="font-size:40px;">Photo Gallery</p>
		</div><br>
		<div class="pholder3" style=" background:transparent; "><p style="font-size:18px;">Order a Walk and one of our Registered Dog Dashers will come pick up your Dog and take them to their favourite spot. Find a Dog Dasher in your area or select one from our registered list of Dog lovers.</p></div>
		</div>
		<div class="row" style='' id="imgholder">
			<div class="col-sm-3"><p>Find a Dog Dasher near You</p>
			<img class="responsive" id="corners" style="border:6px solid #ffdf00; width:100%;"src="http://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Maps-icon.png"></div>
			<div class="col-sm-3"><p>Pick up + drop off available</p>
            <img class="responsive" id="corners" style="border:6px solid #ffdf00; width:100%;" src="http://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Maps-icon.png"></div>

            <div class="col-sm-3"><p>Get an activity report after every walk</p>
			<img class="responsive" id="corners" style="border:6px solid #ffdf00; width:100%;" src="http://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Maps-icon.png"></div>
            <div class="col-sm-3"><p>Recieve photo updates of your dog</p>
            <img class="responsive" id="corners" style="border:6px solid #ffdf00; width:100%;" src="http://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Maps-icon.png"></div>

    </div>
 

		</div>



</div>
<button class="instyle">GET STARTED!</button>
<!--NEXT BODY DIVISION-->
<div style="width:100%; min-height:340px; margin-top:0px; background-color:#80c332;">
<div id="welcometint2">
<div style="margin:auto; text-align:center;">
	<div class="row" style="text-align:center;">
		<p style="font-size:40px;">Rest Assured</p>
		</div><br>
		<div class="pholder3" style="background:transparent"><p style="font-size:18px;">Rest easy knowing your dog is in good care with a certified Dashdog pet care professional. Dog walkers and dog sitters on DashDogs have passed a rigorous screening process to become DD Certified including a background check and hands-on assessment. All DD dog care services are bonded and covered by premium pet insurance. </p></div>
		</div>
		</div>
</div>
<!--NEXT BODY DIVISION-->
</body>
</html>