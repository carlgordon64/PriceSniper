<!-- sample page --> <!DOCTYPE html> 
<html>  
<head> 

  <link href='https://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Nixie+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>
 <link href="https://fonts.googleapis.com/css?family=Rajdhani:400,500" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="css/style.php">
<link rel="stylesheet" type="text/css" href="css/isostyle.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <meta name="description" content="filter &amp; sort magical layouts">
</head>
<body style='margin-top:40px; background-size:cover;' id="blurgrad" class="page--sorting" data-page="sorting">

<?php
$servername = "localhost";
$username = "carlgordon";
$password = "6190";
$dbname = "partsDB";
$host = 'localhost';
$port = 3306;
$SearchButton = $_POST['submit'];
$searchNAME = $_POST['searchname'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
include ("includes/header.php");

?>
<div class="row" style="text-align:center; background:transparant; padding:0px;">

<? 

echo "<div class='row'>";
     ?>

     <div style="max-width:1280px; margin:auto;" >
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?
$sql30 = "SELECT ID, title,image,active,price,saleprice,shop,link FROM carousel";
$result44 = $conn->query($sql30);

if ($result44->num_rows > 0) {
    // output data of each row
    while($row = $result44->fetch_assoc()) {

  echo "<div class='item ".$row['active']."'>
  <a target='blank'href='".$row['link']."'>
  <div class='featuredimg'>
       <p id='carotitle'>".$row['title']."</p>

       <img id='caroimg-inner'  src='".$row['image']."'>
<div class='carousel-caption'><p id='caroprice'>Hottest Price: <span style='text-decoration:line-through;'>$".$row['price']."</span> <span style='color:#90bc00;'><b>$".$row['saleprice']."</b></span></p>
       
        <p >".$row['shop']."</p>
</div>
       </div>
</a>
</div>
";

    }
}

   ?>
</div>
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
     <?
echo "<div class='col-sm-12' style='padding:0px; background:rgba(0,0,0,0); '>";

echo "<div  style='margin:auto;width:100%; padding:0px; max-width:1280px; margin:auto;'>";
echo "<div class='row' style='background:rgba(0,0,0,0.15); background-image:url(https://www.toptal.com/designers/subtlepatterns/patterns/topography.png); padding-bottom:20px;'>";
echo "<div style='background:rgba(128,195,50,0); padding:0px;'><h2 id='raj' style=' color:#1b1f20; padding:10px;'>Search for Games</h2>
 <form  method='post' action='index.php'  id='searchform'> 
 <div style=''>
        <input id='searchbar' style='margin:0px;'type='text' name='searchname'> 
        <input id='searchsub'style=''type='submit' value='>' name='submit'> 
         </div>
         <div style='margin-top:15px;'> <button id='modalbtn' type='button' style='border-radius:100%; border:none; width:50px; height:50px; margin:auto; text-align:center;  font-family:'Roboto', sans-serif;'class='instyle3' data-toggle='modal' data-target='#myModal'>
  <span class='glyphicon glyphicon-question-sign' aria-hidden='true'></span>

</button>
 <a href='index.php'><button id='modalbtn' type='button' style='border-radius:100%; border:none; width:50px; height:50px; margin:auto; text-align:center;  font-family:'Roboto', sans-serif;' >
  <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>

</button></a></div>

      </form> 
      <h4 style='color:#1b1f20; padding:10px;'>Search by title, genre, keyword ...</h4>
</div></div></div></div>";

      ?>
       </p>
     <?php
     echo "
<div>
";
     //if isset search
     if (isset($SearchButton)){
      if(!empty($searchNAME)){
      echo "<p style='background:#fff;max-width:1280px; margin:auto; color:#1b1f20; padding:0px;'>Games for search query '$searchNAME'</p>";
$sql3 = "SELECT ID,platform,part,coverimg,genre,tags,price1,price2,price3,shop1,shop2,shop3,availability FROM Parts WHERE  Part LIKE '%" . $searchNAME . "%' OR platform LIKE '%" . $searchNAME . "%' OR genre LIKE '%" . $searchNAME . "%' OR tags LIKE '%" . $searchNAME . "%' OR shop1 LIKE '%" . $searchNAME . "%' OR shop2 LIKE '%" . $searchNAME . "%' OR shop3 LIKE '%" . $searchNAME . "%' ORDER BY ID DESC ";
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  echo "<div id='content' class='main' style='max-width:1280px; margin:auto;'>";
  echo "<div class='primary-content'>";
  echo "
<div data-js-module='sorting-demo' >
<div class='row' style='background:rgba(255,255,255,0.15); padding:0px;'>
<div style='background:#fff;' class='col-sm-12'>
<div style='background:#fff;' class='col-sm-7'>
<div id='filters' class='button-group'>  <button class='button is-checked' data-filter='*'>All <span id='gicon' class='glyphicon glyphicon-th' aria-hidden='true'></span></button>
  <button  class='button'  data-filter='.PS4'>PS4</button>
  <button class='button'  data-filter='.PS3'>PS3</button>
  <button class='button'  data-filter='.XBOX1'>XBOX ONE</button>
  <button class='button' data-filter='.XBOX360'>XBOX 360</button>
  <button class='button'  data-filter='.SWITCH'>SWITCH</button>
  <button class='button' data-filter='.PC'>PC</button>
</div>
</div>
<div style='background:#fff;' class='col-sm-5'>
<div class='button-group sort-by-button-group js-radio-button-group'>
    <button class='button is-checked' data-sort-by='original-order'>Date <span id='gicon' class='glyphicon glyphicon-calendar' aria-hidden='true'></span></button>
    <button class='button' data-sort-by='name'>Title <span id='gicon' class='glyphicon glyphicon-font' aria-hidden='true'></span></button>
    <button class='button' data-sort-by='weight'>Price <span id='gicon' class='glyphicon glyphicon-tag' aria-hidden='true'></span></button>
    <button class='button' data-sort-by='category'>Genre <span id='gicon' class='glyphicon glyphicon-knight' aria-hidden='true'></span></button>
</div>
  </div>
  </div>
   <div class='grid col-sm-12'>
  ";
  while($row = $result->fetch_assoc()) {
    
    echo "
<div class='element-item ".$row['genre']." ".$row['platform']." ' data-category='".$row['genre']." ".$row['platform']."'>
        <div>
        <div class='gameimg".$row['platform']."' style='background-size:cover;background-image:url(".$row['coverimg'].");'></div>
        <h5 id='faded'class='name'>".$row['part']."</h5>
        <p class='weightb'>$".$row['price1']."  <span id='price1'>".$row['shop1']."</span></p>
        <p class='weight2b'>$".$row['price2']."  <span id='price2'>".$row['shop2']."</span></p>
        <p class='weight3b'>$".$row['price3']."  <span id='price3'>".$row['shop3']."</span></p>
<p style='display:none;'class='weight'>".$row['price1']."</p>
        <p id='faded'class='platform'>".$row['platform']."</p>
        <p id='faded' class='category' id='".$row['genre']."'>".$row['genre']."</p>
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
 
   //
   
   }
}
//else show all games
else{
    $sql3 = "SELECT ID,platform,part,coverimg,genre,price1,price2,price3,shop1,shop2,shop3,availability FROM Parts WHERE price1>0 ORDER BY ID DESC  ";
    //SHOW ALL PARTS
$result = $conn->query($sql3);
$num_rows = mysqli_num_rows($result);
if ($result->num_rows > 0) {
  echo "<div id='content' class='main' style='max-width:1280px; margin:auto;'>";
  echo "<div class='primary-content'>";
  echo "
<div data-js-module='sorting-demo' >
<div class='row' style='background:rgba(255,255,255,0.15); padding:0px;'>
<div style='background:#fff;' class='col-sm-12'>
<div style='background:#fff;' class='col-sm-7'>
<div id='filters' class='button-group'>  <button class='button is-checked' data-filter='*'>All <span id='gicon' class='glyphicon glyphicon-th' aria-hidden='true'></span></button>
  <button class='button'  data-filter='.PS4'>PS4</button>
  <button class='button'  data-filter='.PS3'>PS3</button>
  <button class='button'  data-filter='.XBOX1'>XBOX ONE</button>
  <button class='button' data-filter='.XBOX360'>XBOX 360</button>
  <button class='button'  data-filter='.SWITCH'>SWITCH</button>
  <button class='button' data-filter='.PC'>PC</button>
</div>
</div>
<div style='background:#fff;' class='col-sm-5'>
<div class='button-group sort-by-button-group js-radio-button-group'>
    <button class='button is-checked' data-sort-by='original-order'>Date <span id='gicon' class='glyphicon glyphicon-calendar' aria-hidden='true'></span></button>
    <button class='button' data-sort-by='name'>Title <span id='gicon' class='glyphicon glyphicon-font' aria-hidden='true'></span></button>
    <button class='button' data-sort-by='weight'>Price <span id='gicon' class='glyphicon glyphicon-tag' aria-hidden='true'></span></button>
    <button class='button' data-sort-by='category'>Genre <span id='gicon' class='glyphicon glyphicon-knight' aria-hidden='true'></span></button>
</div>
  </div>
  </div>
   <div class='grid col-sm-12' >
  ";
  while($row = $result->fetch_assoc()) {
    
    echo "
<div class='element-item ".$row['genre']." ".$row['platform']." ' data-category='".$row['genre']." ".$row['platform']."'>
        <div>
        <div class='gameimg".$row['platform']."' style='background-size:cover;background-image:url(".$row['coverimg'].");'></div>
        <h5 id='faded'class='name'>".$row['part']."</h5>
        <a href='#'><p class='weightb'>$".$row['price1']."  <span id='price1'>".$row['shop1']."</span></p></a>
        <a href='#'><p class='weight2b'>$".$row['price2']."  <span id='price2'>".$row['shop2']."</span></p></a>
        <a href='#'><p class='weight3b'>$".$row['price3']."  <span id='price3'>".$row['shop3']."</span></p></a>
        <p style='display:none;'class='weight'>".$row['price1']."</p>
        <p id='faded'class='platform'>".$row['platform']."</p>
        <p id='faded' class='category' id='".$row['genre']."'>".$row['genre']."</p>
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
   }


?>

</div>
</body>
<?
include ("includes/modal_exe.php");
include ("includes/footer.php");
?>
<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel({interval: 5000});
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
<script src="js/index.js"></script>
</html>