<!-- sample page --> <!DOCTYPE html> 
<html>  
<head> 

  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.php">
<link rel="stylesheet" type="text/css" href="css/isostyle.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <meta name="description" content="filter &amp; sort magical layouts">
</head>
<body style='margin-top:40px;' class="page--sorting" data-page="sorting">

<?php
$servername = "localhost";
$username = "carlgordon";
$password = "6190";
$dbname = "partsDB";
$host = 'localhost';
$port = 3306;
$SearchButton = $_POST['submit'];
$searchNAME = $_POST['searchname'];
$searchSALVAGE = $_POST['searchSalvage'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<div style="text-align:center; background:#1b1f20; padding:0px;">
<? 
include ("includes/header.php");

//LOGIN VERIFICATION
$sql3 = "SELECT ID, username, password,verified FROM email WHERE verified =1";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
   // output data of each row
//WHILE LOGGED IN WITH A VERIFIED ACCOUNT
//IF SOMEBODY IS LOGGED IN

 echo "<div style='margin-top:50px;'>";
     //echo "A SESSION IS ACTIVE <br>";
     echo "<h2 style='background-color:rgba(128,195,50,0.9); padding-bottom:10px; padding-top:10px;' >Hello ".$ActiveUsername."! Welcome to Scrapables.net</h2>";
     echo "</div>";
echo "<div class='col-sm-12'><p style='font-size:18px'>Create your own Virtual Workshop to maximise the use of your Parts, Tools and Materials.</p>
<p style='font-size:18px'>Vitrual Workshop helps keep an eye on every part of your inventory so nothing goes missing again!</p>
";
echo "<div  style='margin:auto;width:90%;'>";
echo "<div class='row' style='background:rgba(128,195,50,0.9);' id='corners'>";
echo "<div class='col-sm-6' style='background:rgba(128,195,50,0); padding:20px;'><h2 style=' color:white;'>Find by Keyword</h2>
 <h4>Search your parts and materials</h4>
 <form  method='post' action='index.php'  id='searchform'> 
        <input  type='text' name='searchname'> 
        <input  type='submit' name='submit' value='Search'> 
      </form> 
      <h4 style='color:white;'>Search by category, color, name ...</h4>
</div>";
echo "<div class='col-sm-6' style='background:rgba(128,195,50,0);; padding:20px;'><h2 style='color:white;'>Salvage Mode</h2>
<h4>Source parts from the world around you</h4>
 <form  method='post' action='index.php'  id='searchform'> 
        <input  type='text' name='searchSalvage'> 
        <input  type='submit' name='submit' value='Search'> 
      </form> 
      <h4 style='color:white;'>Source Screws, Batteries, led's ...</h4>
</div>";
echo "
</div></div></div>";
      ?>
       </p>
     <?php
     echo "
<a id='button4' class='instylesmall'>Show/Hide Parts</a>
<div id='item4'>
";
     //if isset search
     if (isset($SearchButton)){
      if(!empty($searchNAME)){
      echo "<h2 style='color:white'>Parts</h2>";
  echo "<p>for search query '$searchNAME'</p>";
$sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Parts WHERE owner = '$ActiveUsername' AND Part LIKE '%" . $searchNAME . "%' OR description LIKE '%" . $searchNAME . "%' OR category LIKE '%" . $searchNAME . "%' ";
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
</div>
       </div>
    ";
}
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
}
//
$sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Tools WHERE  part LIKE '%" . $searchNAME . "%' OR description LIKE '%" . $searchNAME . "%' OR category LIKE '%" . $searchNAME . "%'  ";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  echo "<div id='content' class='main'>";
  echo "<div class='primary-content'>";
  echo "<h2 style='color:white'>Tools + Materials</h2>";
  echo "<p>for search query '$searchNAME'</p>";
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
</div>
      </div>
    ";
}
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
}
 
   //
     if(!empty($searchSALVAGE)){
     echo "<h2 style='color:white'>Search Results by Salvage</h2>";
     echo "<p>RESULTS FOR: $searchSALVAGE</p>";
$sql33 = "SELECT ID,part,salvage,category,sub_category,keywords,description,quantity,availability,owner FROM Salvage WHERE part LIKE '%" . $searchSALVAGE . "%' OR sub_category LIKE '%" . $searchSALVAGE . "%' OR category LIKE '%" . $searchSALVAGE . "%' OR description LIKE '%" . $searchSALVAGE . "%' OR salvage LIKE '%" . $searchSALVAGE . "%' OR keywords LIKE '%" . $searchSALVAGE . "%' ";
$result2 = $conn->query($sql33);
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
   }else{
    $sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Parts WHERE quantity>0  ";
    //SHOW ALL PARTS
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  echo "<div id='content' class='main'>";
  echo "<div class='primary-content'>";
  echo "<h2 style='color:white'>Your Parts</h2>";
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
        </div>
      </div>
    ";
}
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
//END ITEM1
}
//ITEM 2
echo "<div class='breaker' style='background:#000'></div>
<a id='button2' class='instylesmall'>Show/Hide Tools</a>
<div id='item2'>
";
    $sql3 = "SELECT ID,part,category,description,quantity,availability,owner FROM Tools WHERE owner = '$ActiveUsername' AND quantity>0 ";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  echo "
  ";
  echo "<div id='content' class='main'>";
  echo "<div class='primary-content'>";
  echo "<h2 style='color:white'>Your Tools and Materials</h2>";
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
        
      </div>
      </div>
    ";
}
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
//END ITEM1
}
   }
}   
}
//END VERIFY
include ("includes/landing.php");
include ("includes/footer.php");

?>

</div>
</body>
<script>
$(function() {
    $( "#button4" ).click(function() {
        $( "#item4" ).toggle();

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
<script type="text/javascript">
  // external js: isotope.pkgd.js, cells-by-column.js

$('.grid').isotope({
  layoutMode: 'cellsByColumn',
  itemSelector: '.grid-item',
  cellsByColumn: {
    columnWidth: 110,
    rowHeight: 110
  }
});

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/jquery.min.js"><\/script>')</script>
<script src="js/isotope-docs.min.js"></script>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>
<script src="js/isotope-docs.min.js"></script>
</html>