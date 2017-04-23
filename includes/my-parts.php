<!DOCTYPE html>
<html>
<head>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this part?');
}
function checkDelete2(){
    return confirm('Are you sure you want to delete this tool?');
}
</script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <meta name="description" content="filter &amp; sort magical layouts">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/isostyle.css">
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
	 <?php
	 //session_start();
$servername = "localhost";
$username = "carlgordon";
$password = "6190";
$dbname = "partsDB";
$host = 'localhost';
$port = 3306;

$Logged=$_SESSION['LoggedIn'];

$ActiveUsername = $_SESSION['Username'];
$ActivePassword = $_SESSION['Password'];
$logged=$_SESSION['LoggedIn'];

$addTech= $_POST['addTech'];
$updateTech= $_POST['updateTech'];

$addParts= $_POST['addParts'];
$updateParts= $_POST['updateParts'];
$delParts= $_POST['deleteParts'];

$addTools= $_POST['addTools'];
$updateTools= $_POST['updateTools'];

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
<body style="margin-top:0px;" class="page--sorting" data-page="sorting">
<!--body below-->
<div style="width:100%; min-height:340px; margin-top:0px; background-color:#1b1f20;">
<div style="text-align:center;">
<?
//echo "active user: $ActiveUsername";
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']) && !empty($_SESSION['Password']))
{
	 echo "<div style='margin-top:50px;'>";
	   //echo "A SESSION IS ACTIVE <br>";
	   echo "<h2 style='background-color:rgba(128,195,50,0.9); padding-bottom:10px; padding-top:10px;' >Hello ".$ActiveUsername."! Welcome to your Workshop</h2>";
	   echo "</div>
<p style='font-size:18px;'>Get a dynamic overview of your Workshop to efficiently manage the use  of your Parts, Tools and Materials.</p>
<p style='font-size:18px;'>Calculate your technical capacity</p>
     ";
	}else{
		echo "<div style='margin-top:50px;'>";
	   //echo "A SESSION IS ACTIVE <br>";
	   echo "<h2 style='background-color:rgba(128,195,50,0.9); padding-bottom:10px; padding-top:10px;' >Hello, Please sign up to create a Workshop</h2>";
	   echo "<br></div>";
	}
/*
//PROFILE PIC UPLOAD
<form action='includes/accept-file.php' method='post' enctype='multipart/form-data'>
	<h4>Your Photo:</h4> <input style='text-align:center; margin:auto;' type='file' name='photo' size='25' />
	<input type='submit' name='submit' value='Upload' />
</form>
*/
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

//USER INFORMATION - DESCRIPTION ETC.
$sql13 = "SELECT ID,description,contact FROM email WHERE username = '$ActiveUsername' AND verified = 1 ";
$result = $conn->query($sql13);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
echo "<div class='panel-body'><p style='margin-top:-20px; background:transparent; font-size:18px;'>".$row['description']."
<div class='panel-footer'><p>".$row['contact']."</p></div>
</p></div>
</div>";
// END USER INFO
	}
  }
  $Partcount =0;
if ($ActiveUsername!==null) {
	$sql3 = "SELECT part,owner FROM Parts WHERE owner = '$ActiveUsername' ";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
$Partcount +=1;

  }

  }
  echo "<div  class='col-sm-2 panel' style='padding-left:0px; margin-auto; background-color: rgba(255,223,0,0.2); text-align:center'>
<h4 style='padding-left:5px;'>Parts ($Partcount)</h4>
<div style='background-color: rgba(255,223,0,0.9);'class='breaker'></div>
<h4 style='padding-left:5px;'>$Walkcount Next Order (0)</h4>
<div style='background-color: rgba(255,223,0,0.9);'class='breaker'></div>
<h4 style='padding-left:5px;'>$Bookingcount Loans (0)</h4>
</div>
";
echo "<div class='col-sm-12'><h4><a href='account-settings.php'>Account Settings</a></h4>
<br>
<h2>Your Resources</h2>
</div>";
echo "</div>";
	}

//ADD TECHNOLOGY FOR SCRAPS
if ($ActiveUsername!==null) {
  echo "
<div class='col-sm-12' style='background:#1b1f20;'>
<p style='font-size:40px; text-transform: capitalize;'>".$ActiveUsername."s Scrapables</p>
<p>Here you can list the Tech you want to salvage for parts</p>
<a id='button3' class='instylesmall'>Show/Hide</a>
<div id='item3'>
<div class='row'>
<!--ADD PART-->
<div class='col-sm-6' >
<h4>Add Part</h4>
<form class='addTech'name='addTech' method='post' action='Profile.php'>
 <fieldset >
        <label for='TechName'>Part Name: </label><input type='text' name='TechName' id='TechName' /><br />
        <label for='TechDescript'>Description: </label><input type='text' name='TechDescript' id='TechDescript' /><br />
        <label for='TechQuan'>Quantity: </label><input type='text' name='TechQuan' placeholder='1'id='TechQuan' /><br />
</fieldset>
  <label for='CAT3'>Category: </label>
  <select name='CAT3'>
 <optgroup value='FABRIC' label='FABRIC'>
 <option value='Leather'>Leather</option>
    <option value='Denim'>Denim</option>
    <option value='Cloth'>Cloth</option>
  </optgroup>
    <optgroup value='PLASTIC' label='PLASTICS'>
    <option value='Bottle'>Bottle</option>
    <option value='Sheet'>Sheet</option>
  </optgroup>
    <optgroup value='CRAFT' label='CRAFTS'>
    <option value='Paper'>Paper</option>
    <option value='CardBoard'>Card Board</option>
  </optgroup>
    <optgroup value='COMPUTER' label='COMPUTERS'>
    <option value='Laptop'>Laptop</option>
    <option value='PC'>PC</option>
    <option value='Monitor'>Monitor</option>
  </optgroup>
    <optgroup value='PHONE' label='PHONES'>
    <option value='SmartPhone'>SmartPhone</option>
    <option value='CellPhone'>Cell Phone</option>
  </optgroup>
  <optgroup value='MUSIC-PLAYER' label='MUSIC PLAYERS'>
    <option value='Speaker'>Speakers</option>
    <option value='Radio'>Radio</option>
    <option value='MP3'>IPod / MP3</option>
  </optgroup>
   <optgroup value='MEDIA-PLAYER' label='MEDIA PLAYERS'>
    <option value='HDTV'>HDTV</option>
    <option value='TV'>TV</option>
    <option value='DVD-Player'>DVD Player</option>
    <option value='X-Box'>X Box</option>
    <option value='PS3'>Playstation 3</option>
  </optgroup>
    <optgroup value='REMOTE-CONTROL' label='REMOTE CONTROL'>
    <option value='Remote-Control'>Remote Control</option>
    <option value='Drone'>Drone / RC Heli</option>
    <option value='RC-Car'>RC Car</option>
    <option value='RC-Boat'>RC Boat</option>
    <option value='RC-Plane'>RC Plane</option>
  </optgroup>
    <optgroup value='OTHER' label='OTHER'>
   <option value='Batery'>Battery</option>
    <option value='Palette'>Palette</option>
   <option value='Lamp'>Lamp</option>
   <option value='Torch'>Torch</option>

<option value='Camera'>Camera</option>
    <option value='Power-Tool'>Power Tool</option>
  </optgroup>
</select>
<input class='addButton' style='color:white;' value='Add Tech' type='submit' name='addTech' placeholder='Filter'>
</form>
<!--END ADD TECH FOR SCRAPS-->
</div>
<div class='col-sm-6' >
<h4>Update Tech</h4>
<form class='addTech'  name='updateTech' method='post' action='Profile.php'>
 <fieldset>
<label for='updateQuan3'>Quantity: </label><input type='text' name='updateQuan3' id='updateQuan3' /><br />
       <label for='updateDescript3'>Description: </label><input type='text' name='updateDescript3' id='updateDescript3' /><br />
</fieldset>
 <select name='updateTechName'>
";

if (isset($addTech)){
  $TechName = $_POST['TechName'];
  $TechDescript = $_POST['TechDescript'];
  $TechQuan = $_POST['TechQuan'];
  $TechCat = $_POST['CAT3'];
  if($TechCat == 'Denim'||$TechCat == 'Cloth'|| $TechCat == 'Leather'){
    $subCat = 'FABRIC';
  }
   if($TechCat == 'Bottle'||$TechCat == 'Sheet'){
    $subCat = 'PLASTIC';
  }
  if($TechCat == 'Laptop'||$TechCat == 'PC'||$TechCat == 'Monitor'){
    $subCat = 'COMPUTER';
  }
   if($TechCat == 'SmartPhone'||$TechCat == 'CellPhone'){
    $subCat = 'PHONE';
  }
  if($TechCat == 'Paper'||$TechCat == 'CardBoard'){
    $subCat = 'CRAFT';
  }
   if($TechCat == 'MP3'||$TechCat == 'Radio'||$TechCat == 'Speaker'){
    $subCat = 'MUSIC-PLAYER';
  }
  if($TechCat == 'Remote-Control'||$TechCat == 'Drone'||$TechCat == 'RC-Car'||$TechCat == 'RC-Boat' ||$TechCat == 'RC-Plane'){
    $subCat = 'REMOTE-CONTROL';
  }
   if($TechCat == 'HDTV'||$TechCat == 'TV'||$TechCat == 'DVD-Player' ||$TechCat == 'X-Box'||$TechCat == 'PS3'){
    $subCat = 'MEDIA-PLAYER';
  }
  if($TechCat == 'Battery'||$TechCat == 'Palette'||$TechCat == 'Lamp' ||$TechCat == 'DVD-Player'||$TechCat == 'Camera'||$TechCat == 'Power-Tool'||$TechCat == 'Torch'){
    $subCat = 'OTHER';
  }
  else{
      $TechCat = $_POST['CAT3'];
  }
//WRITE TO DB
  $sql19 = "INSERT INTO Scraptech (part,sub_category,category,description,quantity,owner) VALUES ('$TechName','$TechCat','$subCat','$TechDescript','$TechQuan','$ActiveUsername')";
           if ($conn->query($sql19) === TRUE) {
    echo "Inserting this info to db:";
  echo"$TechName, $TechDescript, $TechQuan";
} else {
    echo "Error: " . $sql19 . "<br>" . $conn->error;
}   
}//UPDATE TECH FOR SCRAPS 
if (isset($_POST['updateTech'])) {
 if(!is_null($_POST['updateQuan3'])){
$techQuan=$_POST['updateQuan3'];
$techDescript=$_POST['updateDescript3'];
$TechName = $_POST['updateTechName'];
  # code...
  echo "insert new tool data, $techQuan, $techDescript";
  $sql18="UPDATE Scraptech SET quantity='$techQuan' WHERE part='$TechName' AND owner='$ActiveUsername'";
if ($conn->query($sql18) === TRUE) {
    echo "updating: $ToolName to quantity $toolQuan"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}
  if(!empty($_POST['updateDescript3'])){
$techQuan=$_POST['updateQuan3'];
$techDescript=$_POST['updateDescript3'];
$TechName = $_POST['updateTechName'];
  # code...
  echo "insert new tech data, $techQuan, $techDescript";
  $sql17="UPDATE Scraptech SET description='$techDescript' WHERE part='$TechName' AND owner='$ActiveUsername'";
if ($conn->query($sql17) === TRUE) {
    echo "updating: $TechName to description $techDescript"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}
}
$sql5 = "SELECT ID,part,category,description,quantity,availability,owner FROM Scraptech WHERE owner = '$ActiveUsername'";
$result = $conn->query($sql5);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
   echo " <option value='".$row['part']."'>".$row['part']."</option>";
}
}
echo "
  </select>
<input class='addButton' style='color:white' value='Update Tech' type='submit' name='updateTech' placeholder='Filter'>
</form>
<form class='addPart' onsubmit='return checkDelete()' name='updateParts' method='post' action='Profile.php'>
<input class='addButton' style='color:white' value='Delete' type='submit' name='deleteParts' placeholder='Filter'>
</form>

</div>
<!--END UPDATE SCRAPABLES-->

</div>

";
//DISPLAY SCRAPABLES IN ISOTOPE STRUCTURE
$sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Scraptech WHERE owner = '$ActiveUsername' AND quantity >0";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  echo "<div id='content' class='main'>";
  echo "<div class='primary-content'>";
  echo "
<div class='big-demo go-wide' data-js-module='sorting-demo'>
<div class='button-group sort-by-button-group js-radio-button-group'>
    <button class='button is-checked' data-sort-by='original-order'>original order</button>
    <button class='button' data-sort-by='name'>name</button>
    <button class='button' data-sort-by='weight'>quantity</button>
    <button class='button' data-sort-by='category'>category</button>
  </div>
   <div class='grid'>
  ";
  while($row = $result->fetch_assoc()) {
echo "
<div class='element-item ".$row['category']." ' data-category='".$row['category']."'>
        <div id='tintout'>
        <h5 class='name'>".$row['part']."</h5>
        <p class='weight'>".$row['quantity']."</p>
        <p class='descript'>".$row['description']."</p>
        <p class='category' id='".$row['category']."'>".$row['category']."</p>
      </div></div>

    ";
  }
//SCRAPPABLE SALVAGE CALCULATOR
echo "</div></div>";
echo "
<div class='col-sm-12'>
<a id='button5' class='instylesmall'>Show/Hide SALVAGE</a>
<div id='item5'>
<p>Based on your Scrapable Tech you can salvage the following parts:</p>
<div class='row' style='background:#1b1f20; color:#000'>
";
//PROCESS TO DETERMINE WHAT PARTS THE USER CAN GAIN FROM SCRAPPING
$sql30 = "SELECT ID,part,category,sub_category,description,quantity,availability,owner FROM Scraptech WHERE owner = '$ActiveUsername'  AND quantity >0";
$result = $conn->query($sql30);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
//echo "<div class='col-sm-12'>".$row['category']."</div>";
$subcat=$row['sub_category'];
$part=$row['part'];
$salv=$row['salvage'];
$sql31 = "SELECT ID,part,salvage,category,sub_category,description,quantity,availability,owner FROM Salvage WHERE part LIKE '%". $part ."%' AND part LIKE '%". $salv ."%'";
$result2 = $conn->query($sql31);
$num_rows2 = mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
echo "
<div class='col-sm-12' style='background:rgba(0,0,0,0.5); margin-bottom:5px;'>
<div class='panel-heading' style='padding:5px;'>
<p style='font-size:18px;'>With <span style='color:white'>".$row2['part']."</span></p>
<p style='font-size:14px;'> ".$row2['sub_category']."</p>
</div>
<div class='panel-body' style='padding:0px;'>
<p style='margin-top:0px;'>You can salvage: <p style='color:white'>".$row2['salvage']."</p></p>
</div>
</div>

";
}
}
}
echo "</div>";
echo "
</div>
";
echo "</div></div>";
}
echo "
</div>
</div>";
}
	?>
</div>
</div>
<div>
<!--USERS PARTS-->
<div id="welcometint2">
<div style="margin:auto; text-align:center;">
	<div class="row" style="text-align:center;">
<?
//ADD PARTS TO WORKSHOP
if ($ActiveUsername!==null) {
  echo "<p style='font-size:40px; text-transform: capitalize;'>".$ActiveUsername."s Parts</p>";
 echo "<a id='button2' class='instylesmall'>Show/Hide</a>
<div id='item2'>
<div class='row'>
<!--ADD PART-->
<div class='col-sm-6' >
<h4>Add Part</h4>
<form class='addPart'name='addPart' method='post' action='Profile.php'>
 <fieldset >
        <label for='PartName'>Part Name: </label><input type='text' name='PartName' id='PartName' /><br />
        <label for='PartDescript'>Description: </label><input type='text' name='PartDescript' id='PartDescript' /><br />
        <label for='PartQuan'>Quantity: </label><input type='text' name='PartQuan' placeholder='1'id='PartQuan' /><br />
</fieldset>
	<label for='CAT'>Category: </label>
	<select name='CAT'>
    <option value='MICRO-CONTROLLER'>MICRO-CONTROLLER</option>
    <option value='MICRO-COMPUTER'>MICRO-COMPUTER</option>
    <option value='SENSOR'>SENSOR</option>
    <option value='MODULE'>MODULE</option>
    <option value='MOTOR'>MOTOR</option>
    <option value='LED'>LED</option>
    <option value='POWER'>POWER SUPPLY</option>
    <option value='MISC'>MISC</option>
    <option value='OTHER'>OTHER</option>
  </select>
<input class='addButton' style='color:white;' value='Add Part' type='submit' name='addParts' placeholder='Filter'>
</form>
</div>
<!--END ADD PART-->
<!--ADD PART-->
<div class='col-sm-6' >
<h4>Update Part</h4>
<form class='addPart'  name='updateParts' method='post' action='Profile.php'>
 <fieldset>
<label for='updateQuan'>Quantity: </label><input type='text' name='updateQuan' id='updateQuan' /><br />
       <label for='updateDescript'>Description: </label><input type='text' name='updateDescript' id='updateDescript' /><br />
</fieldset>
 <select name='updatePartName'>
";
$sql5 = "SELECT ID,part,category,description,quantity,availability,owner FROM Parts WHERE owner = '$ActiveUsername'";
$result = $conn->query($sql5);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
   echo " <option value='".$row['part']."'>".$row['part']."</option>";
}
}
echo "
  </select>
<input class='addButton' style='color:white' value='Update' type='submit' name='updateParts' placeholder='Filter'>

<input class='addButton' style='color:white' onsubmit='return checkDelete()' value='Delete' type='submit' name='deleteParts' placeholder='Filter'>
</form>

</div>
<!--END ADD PART-->
";
//ATTEMPT TO ADD PARTS
if (isset($addParts)){
	$PartName = $_POST['PartName'];
	$PartDescript = $_POST['PartDescript'];
	$PartQuan = $_POST['PartQuan'];
	$PartCat = $_POST['CAT'];
//WRITE TO DB
	$sql = "INSERT INTO Parts (part,category,description,quantity,owner) VALUES ('$PartName','$PartCat','$PartDescript','$PartQuan','$ActiveUsername')";
           if ($conn->query($sql) === TRUE) {
    echo "Inserting this info to db:";
	echo"$PartName, $PartDescript, $PartQuan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}
	//
if (isset($delParts)){
  if(!is_null($_POST['updatePartName'])){
  $PartName = $_POST['updatePartName'];
//WRITE TO DB - DELETE SELECTED DATABASE ENTRY
  $sql14="UPDATE Parts SET quantity=0 WHERE part='$PartName' AND owner='$ActiveUsername'";
if ($conn->query($sql14) === TRUE) {
    echo "DELETED: $PartName"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}

}
//
if (isset($updateParts)){
	//IF THE USER HAS ATTEMPTED TO CHANGE THE QUANTITY OF A PART
	if(!is_null($_POST['updateQuan'])){
	$PartName = $_POST['updatePartName'];
	$PartQuan = $_POST['updateQuan'];
//WRITE TO DB - UPDATE SELECTED DATABASE ENTRY TO SET QUANTITY
	$sql41="UPDATE Parts SET quantity='$PartQuan' WHERE part='$PartName' AND owner='$ActiveUsername'";
if ($conn->query($sql41) === TRUE) {
    //echo "updating: $PartName to quantity $PartQuan"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}else{
	echo "Update quantity or description";
}
if(!empty($_POST['updateDescript'])){
  //run another sql query here to get the default value for quantity for the part equal to partname
  
	$PartName = $_POST['updatePartName'];
	$PartDescript = $_POST['updateDescript'];
//WRITE TO DB
	$sql4="UPDATE Parts SET description='$PartDescript' WHERE part='$PartName' AND owner='$ActiveUsername'";
if ($conn->query($sql4) === TRUE) {
   // echo "updating: $PartName to quantity $PartQuan"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}
}
}
//
?>
		</div>

<?
//DISPLAY ALL PARTS WITH QUANTITY > 0
$sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Parts WHERE owner = '$ActiveUsername' AND quantity >0";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	echo "<div id='content' class='main'>";
  echo "<div class='primary-content'>";
	echo "
<div class='big-demo go-wide' data-js-module='sorting-demo'>
<div class='button-group sort-by-button-group js-radio-button-group'>
    <button class='button is-checked' data-sort-by='original-order'>original order</button>
    <button class='button' data-sort-by='name'>name</button>
    <button class='button' data-sort-by='weight'>quantity</button>
    <button class='button' data-sort-by='category'>category</button>
  </div>
   <div class='grid'>
	";
  while($row = $result->fetch_assoc()) {
echo "
<div class='element-item ".$row['category']." ' data-category='".$row['category']."'>
        <div id='tintout'>
        <h5 class='name'>".$row['part']."</h5>
        <p class='weight'>".$row['quantity']."</p>
        <p class='descript'>".$row['description']."</p>
        <p id='".$row['category']."' class='category'>".$row['category']."</p>
      </div></div>
    ";
  }
echo "</div></div>";
echo "</div></div></div>";
}
//END ADD PARTS
?>
		<br>

<!--USERS TOOLS-->
</div>
		</div>
		<div id="welcometint2">
<div style="margin:auto; text-align:center;">
	<div class="row" style="text-align:center;">

<?
//ADD TOOLS + MATERIALS TO WORKSHOP
if ($ActiveUsername!==null) {
  echo "<p style='font-size:40px; text-transform: capitalize;'>".$ActiveUsername."s Tools + Materials</p>";
  echo "
  <a id='button' class='instylesmall'>Show/Hide</a>
<div id='item'>
<div class='row'>
<!--ADD PART-->
<div class='col-sm-6' >
<h4>Add Tool or Material</h4>
<form class='addTool'name='addTool' method='post' action='Profile.php'>
 <fieldset >
        <label for='ToolName'>Name: </label><input type='text' name='ToolName' id='ToolName' /><br />
        <label for='ToolDescript'>Description: </label><input type='text' name='ToolDescript' id='ToolDescript' /><br />
        <label for='ToolQuan'>Quantity: </label><input type='text' name='ToolQuan' placeholder='1'id='ToolQuan' /><br />
</fieldset>
	<label for='CAT2'>Category: </label>
	<select name='CAT2'>
    <option value='POWER-TOOL'>POWER TOOL</option>
    <option value='HAND-TOOL'>HAND TOOL</option>
    <option value='UTILITY'>UTILITY</option>
    <option><br></option>
    <option value='FABRIC'>FABRIC</option>
    <option value='WOOD'>WOOD</option>
    <option value='PLASTIC'>PLASTIC</option>
    <option value='METAL'>METAL</option>
</select>
<input class='addButton' style='color:white;' value='Add Tool' type='submit' name='addTools' placeholder='Filter'>
</form>
</div>
<!--END ADD PART-->
<!--ADD PART-->
<div class='col-sm-6' >
<h4>Update Tool</h4>
<form class='addTool' name='updateTools' method='post' action='Profile.php'>
 <fieldset>
<label for='updateQuan2'>Quantity: </label><input type='text' name='updateQuan2' id='updateQuan2' /><br />
       <label for='updateDescript2'>Description: </label><input type='text' name='updateDescript2' id='updateDescript2' /><br />
</fieldset>
 <select name='updateToolName'>
";
$sql5 = "SELECT ID,part,category,description,quantity,availability,owner FROM Tools WHERE owner = '$ActiveUsername'";
$result = $conn->query($sql5);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
   echo " <option value='".$row['part']."'>".$row['part']."</option>";
}
}
echo "
  </select>
<input class='addButton' style='color:white' value='Update' type='submit' name='updateTools' placeholder='Filter'>
</form>
</div>
<!--END ADD PART-->
</div>
";
//ATTEMPT TO ADD TOOL TO WORKSHOP
if (isset($addTools)){
	$ToolName = $_POST['ToolName'];
	$ToolDescript = $_POST['ToolDescript'];
	$ToolQuan = $_POST['ToolQuan'];
	$ToolCat = $_POST['CAT2'];
//WRITE TO DB
	$sql = "INSERT INTO Tools (part,category,description,quantity,owner) VALUES ('$ToolName','$ToolCat','$ToolDescript','$ToolQuan','$ActiveUsername')";
           if ($conn->query($sql) === TRUE) {
    echo "Inserting this info to db:";
	echo"$ToolName, $ToolDescript, $ToolQuan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}   
}//ATTEMPT TO UPDATE QUANTITY
if (isset($_POST['updateTools'])) {
	if(!is_null($_POST['updateQuan2'])){
$toolQuan=$_POST['updateQuan2'];
$toolDescript=$_POST['updateDescript2'];
$ToolName = $_POST['updateToolName'];
	# code...
	echo "insert new tool data, $toolQuan, $toolDescript";
	$sql6="UPDATE Tools SET quantity='$toolQuan' WHERE part='$ToolName' AND owner='$ActiveUsername'";
if ($conn->query($sql6) === TRUE) {
    echo "updating: $ToolName to quantity $toolQuan"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}
//ATTEMPT TO UPDATE DESCRIPTION
	if(!empty($_POST['updateDescript2'])){
$toolQuan=$_POST['updateQuan2'];
$toolDescript=$_POST['updateDescript2'];
$ToolName = $_POST['updateToolName'];
	# code...
	echo "insert new tool data, $toolQuan, $toolDescript";
	$sql7="UPDATE Tools SET description='$toolDescript' WHERE part='$ToolName' AND owner='$ActiveUsername'";
if ($conn->query($sql7) === TRUE) {
    echo "updating: $ToolName to description $toolDescript"; 
} else {
    echo "Error updating record: " . $conn->error;
}
}
//END UPDATE TOOLS
}
}
// DISPLAY ALL TOOLS AND MATERIALS > 0
$sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Tools WHERE owner = '$ActiveUsername' AND quantity >0";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	echo "<div id='content' class='main'>";
  echo "<div class='primary-content'>";
	echo "
<div class='big-demo go-wide' data-js-module='sorting-demo'>
<div class='button-group sort-by-button-group js-radio-button-group'>
    <button class='button is-checked' data-sort-by='original-order'>original order</button>
    <button class='button' data-sort-by='name'>name</button>
    <button class='button' data-sort-by='weight'>quantity</button>
    <button class='button' data-sort-by='category'>category</button>
  </div>
   <div class='grid'>
	";
  while($row = $result->fetch_assoc()) {

 echo "
<div class='element-item ".$row['category']." ' data-category='".$row['category']."'>
        <div id='tintout'>
        <h5 class='name'>".$row['part']."</h5>
        <p class='weight'>".$row['quantity']."</p>
        <p class='descript'>".$row['description']."</p>
        <p class='category' id='".$row['category']."'>".$row['category']."</p>
      </div></div>
    ";
  }
echo "</div></div>";
echo "</div></div>";
}
?>
		</div>
		</div>
		</div>
	</div>
</div>
</body>
<script>
$(function() {
    $( "#button" ).click(function() {
        $( "#item" ).toggle();

    });
});
</script>
<script>
$(function() {
  $( "#item5" ).toggle();
    $( "#button5" ).click(function() {
        $( "#item5" ).toggle();

    });
});
</script>
<script>
$(function() {
    $( "#button2" ).click(function() {
        $( "#item2" ).toggle();
    });
});
</script>
<script>
$(function() {
    $( "#button3" ).click(function() {
        $( "#item3" ).toggle();
    });
});
</script>
</html>